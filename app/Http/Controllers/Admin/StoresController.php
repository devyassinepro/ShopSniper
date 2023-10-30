<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Niche;
use App\Models\Nichestore;
use App\Models\stores;
use App\Models\Product;
use App\Models\Storeuser;
use Carbon\Carbon;
use DB;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Integer;

class StoresController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $stores = stores::withSum('products', 'totalsales')
        // ->withSum('products', 'revenue')
        // ->with('products');


        $stores = stores::query();


         if($request->ordreby){
             $stores = $stores::orderBy($request->ordreby,'desc');

         }else  $stores = $stores->orderBy('revenue','desc');
         if( $request->title){
              $stores = $stores->where('url', 'ilike', "%" . strtoupper($request->url) . "%");
         }
         if( $request->min_revenue && $request->max_revenue ){
             $stores = $stores->where('products_sum_revenue', '>=', $request->min_revenue)
                          ->where('products_sum_revenue', '<=', $request->max_revenue);
         }
         if( $request->min_sales && $request->max_sales ){
             $stores = $stores->where('products_sum_totalsales', '>=', $request->min_sales)
                          ->where('products_sum_totalsales', '<=', $request->max_sales);
         }

 
          $stores = $stores->paginate(10);
        return view('admin.stores.index', compact('stores'))
        ->with('totalstores',stores::all()->count());
    }

      /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        $allniches = Niche::all();
        return view('admin.stores.create', compact('allniches'));
    }
 /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
       
        $request->validate([
            'url' => 'required',
            'nicheid' =>'required'
        ]);
        // check if store already added
        $stores = stores::where('url', $request->url)->first();
        if($stores){

     return redirect()->route('admin.stores.index')->with('success','Company has been created successfully.');

        }else{
        try {
          $opts = array('http'=>array('header' => "User-Agent:MyAgent/1.0\r\n")); 
                 $context = stream_context_create($opts);
                 $meta = file_get_contents($request->url.'meta.json',false,$context);
                 $metas = json_decode($meta);
                 $totalproducts = $metas->published_products_count;
               
                 $store_id = DB::table('stores')->insertGetId(
                    ['url' => $request->url,
                    'name' => $metas->name,
                    'status' => 1,
                    'sales' => 0,
                    'revenue' => 0,
                    'city' => $metas->city,
                    'country' => $metas->country,
                    'currency' => $metas->currency,
                    'shopifydomain' => $metas->myshopify_domain,
                    'allproducts' => $metas->published_products_count,
                    'created_at' => now(),
                    'updated_at' => now(),
                    'user_id' => 1
                     ]
                );
                    Nichestore::create([
                     "stores_id" => $store_id,
                     "niche_id" => $request->nicheid,
                     "created_at" => now(),
                     "updated_at" => now()
                 ]);  
                 if($totalproducts<=250){
                  
                    createstore($request->url,$store_id,1);

                  
                 }else if($totalproducts<=500){
                    for ($i = 1; $i <= 2; $i++) {
                        createstore($request->url,$store_id,$i);

                    }
                 }else if($totalproducts<=750){
                    for ($i = 1; $i <= 3; $i++) {
                        createstore($request->url,$store_id,$i);

                    }}
                else if($totalproducts<=1000 || $totalproducts>1000){
                    for ($i = 1; $i <= 4; $i++) {
                        createstore($request->url,$store_id,$i);
                    }  
                }
        } catch(\Exception $exception) {
            return redirect()->route('admin.stores.index')->with('error','This Store not Supported by Weenify');

            // Log::error($exception->getMessage());
        }
    }       
        return redirect()->route('admin.stores.index')->with('success','Company has been created successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        // $nichesall = Niche::find($id);
        // $stores=$nichesall->stores()->withSum('products', 'totalsales')->withSum('products', 'revenue')
        // ->orderBy('products_sum_revenue','desc')
        // ->paginate(50);
        // return view('admin.stores.index', compact('stores'));

        $storedata = DB::table('stores')->where('id', $id)->get();
        $storesrevenue = stores::withSum('products', 'totalsales')
        ->withSum('products', 'revenue')
        ->where('id', $id)
        ->get();

        $totalsalesmin = 0;
        // $pagination = 50;
        $products = Product::withCount(['todaysales', 'yesterdaysales' , 'day3sales' , 'day4sales' , 'day5sales' , 'day6sales', 'weeklysales', 'montlysales'])
                        ->where('stores_id',$id)
                        ->where('totalsales', '>=', $totalsalesmin)
                        ->orderBy('totalsales','desc')->take(10)->get();

    return view('admin.stores.show', compact('products','storedata','storesrevenue'))
    ->with('totalproducts',Product::where('stores_id',$id)->count());
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [ // the new values should not be null
            'title' => 'required',
            'timestamp' => 'required',
            'vendor' => 'required',
            'store' => 'required',
            'totalsales' => 'required',
        ]);
  
        $product = Product::findorFail($id); // uses the id to search values that need to be updated.
        $product->title = $request->input('title'); //retrieves user input
        $product->timestamp = $request->input('timestamp'); //retrieves user input
        $product->vendor = $request->input('vendor'); //retrieves user input
        $product->store = $request->input('store');////retrieves user input
        $product->totalsales = $request->input('totalsales');////retrieves user input

        $product->save();//saves the values in the database. The existing data is overwritten.
        return $product; // retrieves the updated object from the database
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $store = stores::findorFail($id); //searching for object in database using ID
        DB::table('products')->where('stores_id', $id)->delete();
            if($store->delete()){ //deletes the object
            Storeuser::where('store_id', $id)->delete();
            // return 'deleted successfully'; //shows a message when the delete operation was successful.
            return redirect()->route('admin.stores.index')->with('success','deleted successfully');

        }

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function storeproducts($id)
    {

        $storedata = DB::table('stores')->where('id', $id)->get();

        $totalsalesmin = 0;
         $pagination = 50;
        $products = Product::withCount(['todaysales', 'yesterdaysales' , 'day3sales' , 'day4sales' , 'day5sales' , 'day6sales', 'weeklysales', 'montlysales'])
                        ->where('stores_id',$id)
                        ->where('totalsales', '>=', $totalsalesmin)
                        ->orderBy('totalsales','desc')->paginate($pagination);

    return view('admin.stores.storeproducts', compact('products','storedata'))
    ->with('totalproducts',Product::where('stores_id',$id)->count());
    
    }
    


        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function trackstore($id)
    {

        if(check_user_type() != 'user')
        {
            return redirect()->route('dashboard')->with('error','You can not access this page.');
        }

        $user_id = Auth::user()->id;
        $storeuser = Storeuser::where('user_id', $user_id)->count();

        if(check_store_limit() <= $storeuser)
        {
            return redirect()->route('subscription.plans');
        }
         $storedata = DB::table('stores')->where('id', $id)->first();
         $stores = stores::where('url', $storedata->url)->first();

            if($stores)
            {
                $storeuser = Storeuser::where('user_id', $user_id)->where('store_id', $stores->id)->count();
                if($storeuser > 0)
                {
                    redirect()->route('account.stores.create');
                }
                else
                {
                    Storeuser::create([
                        "store_id" => $stores->id,
                        "user_id" => $user_id,
                        "created_at" => now(),
                        "updated_at" => now()
                    ]);
                }

            }
            return redirect()->route('account.stores.index');


    }

}




function createstore ($store ,$store_id, $i){
    $opts = array('http'=>array('header' => "User-Agent:MyAgent/1.0\r\n")); 
    $context = stream_context_create($opts);
    $html = file_get_contents($store.'products.json?page='.$i.'&limit=250',false,$context);
    $products = json_decode($html)->products;
    foreach ($products as $product) {

        if(isset($product->variants[0]->price)){
            $price= $product->variants[0]->price;
        }else{
            $price=0;
        }
        if(isset($product->images[0]->src)){
            $image= $product->images[0]->src;
        }else{
            $image="default";
        }

        $timeconvert = strtotime($product->updated_at);
        $totalsales = 0;
        $urlproduct = $store.'products/'.$product->handle;
        Product::firstOrCreate([
            "id" => $product->id,
            "title" => $product->title,
            "timesparam" => $timeconvert,
            "prix" => $price,
            "revenue" => 0,
            "stores_id" => $store_id,
            "url" => $urlproduct,
            "imageproduct" => $image,
            "favoris" => 0,
            "totalsales" => $totalsales,
            "todaysales" => 0,
            "yesterdaysales" => 0,
            "day3sales" => 0,
            "day4sales" => 0,
            "day5sales" => 0,
            "day6sales" => 0,
            "day7sales" => 0,
            "weeksales" => 0,
            "monthsales" => 0
        ]);
    } 
}
