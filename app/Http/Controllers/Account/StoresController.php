<?php

namespace App\Http\Controllers\Account;
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
use Illuminate\Support\Facades\Auth;

class StoresController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        
        if(check_user_type() != 'user')
        {
            redirect()->route('dashboard')->with('error','You can not access this page.');
        }

        $user_id = Auth::user()->id;
        // get stores of this user
        $storeuser = Storeuser::where('user_id', $user_id)->pluck('store_id');

        $stores = stores::whereIn('id', $storeuser)
        ->withSum('products', 'totalsales')
        ->withSum('products', 'revenue')
        ->with('products');

         if($request->ordreby){
             $stores = $stores::orderBy($request->ordreby,'desc');

         }else  $stores = $stores->orderBy('products_sum_revenue','desc');
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

 
          $stores = $stores->paginate(50);
        //  $stores =  $stores->paginate(25)->withQueryString();
        //  $stores = stores::orderBy('id','desc')->paginate(25);
        // $stores = $stores->paginate(25)->withQueryString();
        // $stores = stores::orderBy('sales','desc')->paginate(25);
        return view('account.stores.index', compact('stores'))
        ->with('totalstores',stores::all()->count());
    }

      /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        if(check_user_type() != 'user')
        {
            redirect()->route('dashboard')->with('error','You can not access this page.');
        }

        $user_id = Auth::user()->id;
        $storeuser = Storeuser::where('user_id', $user_id)->count();

        if(currentTeam()->onTrial()){

            if($storeuser >=3 ){
                return redirect()->route('account.stores.index')->with('error','You can not add more stores on trial');

            }
        } 
        else if(check_store_limit() <= $storeuser)
        {
            return redirect()->route('account.stores.index')->with('error','You can not add stores more than '.check_store_limit());
        }

        //to add niche to store 
        $allniches = Niche::where('user_id', $user_id)->get();
        return view('account.stores.create', compact('allniches'));
    }
 /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        if(check_user_type() != 'user')
        {
            return redirect()->route('dashboard')->with('error','You can not access this page.');
        }

        $user_id = Auth::user()->id;
        $storeuser = Storeuser::where('user_id', $user_id)->count();
        
        if(check_store_limit() <= $storeuser)
        {
            return redirect()->route('account.stores.index')->with('error','You can not add stores more than '.check_store_limit());
        }

                $request->validate([
                    'url' => 'required',
                    'nicheid' =>'required'
                ]);

                // check if store already added
                $stores = stores::where('url', $request->url)->first();
                if($stores)
                {
                    $storeuser = Storeuser::where('user_id', $user_id)->where('store_id', $stores->id)->count();
                    if($storeuser > 0)
                    {
                        redirect()->route('account.stores.create')->with('error','You have already created that store.');
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
                else
                {
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
                            'user_id' => $user_id
                            ]
                        );
                        
                        Storeuser::create([
                            "store_id" => $store_id,
                            "user_id" => $user_id,
                            "created_at" => now(),
                            "updated_at" => now()
                        ]);

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

                            }
                        }
                        else if($totalproducts<=1000 || $totalproducts>1000){
                            for ($i = 1; $i <= 4; $i++) {
                                createstore($request->url,$store_id,$i);   
                            }  
                        }
                    } catch(\Exception $exception) {
                        return redirect()->route('account.stores.index')->with('error','This Store not Supported by Weenify');
    
                        // Log::error($exception->getMessage());
                    }
                }
        
        return redirect()->route('account.stores.index')->with('success','Store has been created successfully.');
    }
  

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(check_user_type() != 'user')
        {
            return redirect()->route('dashboard')->with('error','You can not access this page.');
        }

        $user_id = Auth::user()->id;
        $storeuser = Storeuser::where('user_id', $user_id)->count();
        
        
    $dates = [];
    for ($i = 6; $i >= 0; $i--) {
        $dates[] = Carbon::now()->subDays($i)->format('Y-m-d');
    }

        $storedata = DB::table('stores')->where('id', $id)->get();
        $storesrevenue = stores::withSum('products', 'totalsales')
        ->withSum('products', 'revenue')
        ->withCount(['todaysales', 'yesterdaysales' , 'day3sales' , 'day4sales' , 'day5sales' , 'day6sales','day7sales'])
        ->where('id', $id)
        ->get();

        $totalsalesmin = 0;
        // $pagination = 50;
        $products = Product::withCount(['todaysales', 'yesterdaysales' , 'weeklysales', 'montlysales'])
                        ->where('stores_id',$id)
                        ->where('totalsales', '>=', $totalsalesmin)
                        ->orderBy('totalsales','desc')->take(10)->get();

    return view('account.stores.show', compact('products','storedata','storesrevenue','dates'))
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
        $store = stores::findorFail($id); //searching for object in database using ID
        
        if(check_user_type() != 'user')
        {
            return redirect()->route('dashboard')->with('error','You can not access this page.');
        }

        $user_id = Auth::user()->id;
        $storeuser = Storeuser::where('user_id', $user_id)->where('store_id', $id)->count();
        if($storeuser > 0)
        {
            // if store added by admin
            if(empty($store->user_id))
            {
                Storeuser::where('user_id', $user_id)->where('store_id', $id)->delete();
                return redirect()->route('account.stores.index')->with('success','deleted successfully');
            }
            else
            {
                $store_added_by_total_users = Storeuser::where('store_id', $id)->count();
                if($store_added_by_total_users == 1)
                {
                    Storeuser::where('store_id', $id)->delete();
                    DB::table('products')->where('stores_id', $id)->delete();
                    $store->delete();
                    return redirect()->route('account.stores.index')->with('success','deleted successfully');
                }
                else
                {
                    Storeuser::where('user_id', $user_id)->where('store_id', $id)->delete();
                    return redirect()->route('account.stores.index')->with('success','deleted successfully');
                }
            }
        }
        else
        {
            return redirect()->route('account.stores.index')->with('error','Something went wrong');
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
        if(check_user_type() != 'user')
        {
            return redirect()->route('dashboard')->with('error','You can not access this page.');
        }
        $storedata = DB::table('stores')->where('id', $id)->get();

        $totalsalesmin = 0;
         $pagination = 50;
        $products = Product::withCount(['todaysales', 'yesterdaysales' , 'day3sales' , 'day4sales' , 'day5sales' , 'day6sales', 'weeklysales', 'montlysales'])
                        ->where('stores_id',$id)
                        ->where('totalsales', '>=', $totalsalesmin)
                        ->orderBy('totalsales','desc')->paginate($pagination);

    return view('account.stores.storeproducts', compact('products','storedata'))
    ->with('totalproducts',Product::where('stores_id',$id)->count());
    
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
        ]);
    } 
}
