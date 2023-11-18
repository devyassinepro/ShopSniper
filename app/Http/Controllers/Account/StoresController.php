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
         return view('account.stores.index');
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

        if ($allniches->isEmpty()) {

            DB::table('niches')->insert([
                "name" => 'All',
                "user_id" => $user_id,
            ]);

        }
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
                //if domaine with url ;;; 
                $parsedUrl = parse_url($request->url);

                if (isset($parsedUrl['host'])) {
                    $domain = $parsedUrl['scheme'] . '://' . $parsedUrl['host']. '/' ;

                } else {
                    return redirect()->route('account.stores.create')->with('error','This Store not Supported by Weenify');
                }

                // check if store already added
                $stores = stores::where('url', $domain)->first();
                if($stores)
                {
                    $storeuser = Storeuser::where('user_id', $user_id)->where('store_id', $stores->id)->count();
                    if($storeuser > 0)
                    {
                        // redirect()->route('account.stores.create')->with('error','You have already created that store.');
                        Storeuser::create([
                            "store_id" => $stores->id,
                            "user_id" => $user_id,
                            "created_at" => now(),
                            "updated_at" => now()
                        ]);
                        Nichestore::create([
                            "stores_id" => $stores->id,
                            "niche_id" => $request->nicheid,
                            "created_at" => now(),
                            "updated_at" => now()
                       ]);
                       //make status On
                       DB::table('stores')->where('id', $stores->id)->update(array('status' => 1));
                       return redirect()->route('account.stores.index');
                        // return redirect()->route('account.stores.show',$stores->id);
                    }
                    else
                    {
                        Storeuser::create([
                            "store_id" => $stores->id,
                            "user_id" => $user_id,
                            "created_at" => now(),
                            "updated_at" => now()
                        ]);

                        Nichestore::create([
                             "stores_id" => $stores->id,
                             "niche_id" => $request->nicheid,
                             "created_at" => now(),
                             "updated_at" => now()
                        ]);
                        DB::table('stores')->where('id', $stores->id)->update(array('status' => 1));

                        return redirect()->route('account.stores.index');
                    }
                }
                else
                {
                    try {
                        $opts = array('http'=>array('header' => "User-Agent:MyAgent/1.0\r\n"));
                        $context = stream_context_create($opts);
                        $meta = file_get_contents($domain.'meta.json',false,$context);
                        $metas = json_decode($meta);
                        $totalproducts = $metas->published_products_count;

                        $store_id = DB::table('stores')->insertGetId(
                            ['url' => $domain,
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
                            createstore($domain,$store_id,1);


                        }else if($totalproducts<=500){
                            for ($i = 1; $i <= 2; $i++) {
                                createstore($domain,$store_id,$i);

                            }
                         }else if($totalproducts<=750){
                            for ($i = 1; $i <= 3; $i++) {
                                createstore($domain,$store_id,$i);

                            }
                        }
                        else if($totalproducts<=1000 || $totalproducts>1000){
                            for ($i = 1; $i <= 4; $i++) {
                                createstore($domain,$store_id,$i);
                            }
                        }
                    } catch(\Exception $exception) {
                        return redirect()->route('account.stores.create')->with('error','This Store not Supported by Weenify');

                        // Log::error($exception->getMessage());
                    }
                }

        // return redirect()->route('account.stores.index');
        return redirect()->route('account.stores.index')->with('success','Store has been Added successfully , wait Between 2h To 24h to get All Sales');
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

        $totalsalesmin = 0;
        // $pagination = 50;
        $products = Product::where('stores_id',$id)
                        ->where('totalsales', '>=', $totalsalesmin)
                        ->orderBy('totalsales','desc')->take(10)->get();

    return view('account.stores.show', compact('products','storedata','dates'))
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
                if($store_added_by_total_users > 1)
                {
                    // Storeuser::where('store_id', $id)->delete();
                    // DB::table('products')->where('stores_id', $id)->delete();
                    // $store->delete();
                    // return redirect()->route('account.stores.index')->with('success','deleted successfully');
                    Storeuser::where('user_id', $user_id)->where('store_id', $id)->delete();
                    return redirect()->route('account.stores.index')->with('success','deleted successfully');

                }
                else
                {
                    Storeuser::where('user_id', $user_id)->where('store_id', $id)->delete();
                    DB::table('stores')->where('id', $id)->update(array('status' => 0));
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
        $products = Product::where('stores_id',$id)
                        ->where('totalsales', '>=', $totalsalesmin)
                        ->orderBy('totalsales','desc')->paginate($pagination);

    return view('account.stores.storeproducts', compact('products','storedata'))
    ->with('totalproducts',Product::where('stores_id',$id)->count());

    }



      /**
     * Display the specified resource.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function importstore($id){
     

        $url = stores::where('id', $id)->value('url');

    //   get url of store by id 

    // import all product from products.json and start writing 
        $csvFilePath = 'all_products.csv';
        $csvFile = fopen($csvFilePath, 'w');

                
        // Define the header row
        $headerRow = [
            'Handle',
            'Title',
            'Body (HTML)',
            'Vendor',
            'Product Category',
            'Type',
            'Tags',
            'Published',
            'Option1 Name',
            'Option1 Value',
            'Option2 Name',
            'Option2 Value',
            'Option3 Name',
            'Option3 Value',
            'Variant SKU',
            'Variant Grams',
            'Variant Inventory Tracker',
            'Variant Inventory Qty',
            'Variant Inventory Policy',
            'Variant Fulfillment Service',
            'Variant Price',
            'Variant Compare At Price',
            'Variant Requires Shipping',
            'Variant Taxable',
            'Variant Barcode',
            'Image Src',
            'Image Position',
            'Image Alt Text',
            'Gift Card',
            'SEO Title',
            'SEO Description',
            'Google Shopping / Google Product Category',
            'Google Shopping / Gender',
            'Google Shopping / Age Group',
            'Google Shopping / MPN',
            'Google Shopping / AdWords Grouping',
            'Google Shopping / AdWords Labels',
            'Google Shopping / Condition',
            'Google Shopping / Custom Product',
            'Google Shopping / Custom Label 0',
            'Google Shopping / Custom Label 1',
            'Google Shopping / Custom Label 2',
            'Google Shopping / Custom Label 3',
            'Google Shopping / Custom Label 4',
            'Variant Image',
            'Variant Weight Unit',
            'Variant Tax Code',
            'Cost per item',
            'Price / International',
            'Compare At Price / International',
            'Status',
        ];
        
        // Write the header row to the CSV file
        fputcsv($csvFile, $headerRow);

        $opts = array('http'=>array('header' => "User-Agent:MyAgent/1.0\r\n"));
        $context = stream_context_create($opts);
        $html = file_get_contents($url.'products.json?page=1&limit=250',false,$context);
        $products = json_decode($html)->products;

        foreach ($products as $productData) {
        // Main product data row
        $mainProductRow = [
            $productData->handle,
            $productData->title,
            $productData->body_html,
            $productData->vendor,
            $productData->product_type,
            '',
            implode(',', $productData->tags), // Assuming tags is an array
            $productData->published_at,
            $productData->options[0]->name ?? '',
            $productData->variants[0]->option1 ?? '',
            $productData->options[1]->name ?? '',
            $productData->variants[0]->option2 ?? '',
            $productData->options[2]->name ?? '',
            $productData->variants[0]->option3 ?? '',
            $productData->variants[0]->sku,
            '',
            '',
            '0',
            'deny',
            'manual',
            $productData->variants[0]->price,
            $productData->variants[0]->compare_at_price,
            $productData->variants[0]->requires_shipping ? 'TRUE' : 'FALSE',
            '',
            '',
            $productData->images[0]->src,
            $productData->images[0]->position,
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            $productData->images[0]->src,
            '',
            '',
            '',
            '',
            '',
            'active',
        ];
        
        // Write the main product data row to the file
        fputcsv($csvFile, $mainProductRow);
        $positionCounter = 1; // Initialize the position counter to 1

        $variantImageIds = [];

        $firstimage = "";
        
        foreach ($productData->variants as $variant) {
            $image = null; // Initialize $image outside the if block

            if ($positionCounter > 1 && property_exists($variant, 'image_id')) {
                // Find the image associated with the variant based on image_id

                foreach ($productData->images as $img) {
                    if ($img->id == $variant->image_id) {
                        $image = $img;

                        if (!empty($img->src)) {
                            $firstimage = $img->src;
                        }
                        break;
                    }
                }
          
        
                // Get the image source (URL) or set it to an empty string if no image is found
                // $imageSrc = $image ? $image['src'] : '';

                            // Get the image source (URL) or set it to an empty string if no image is found
            $imageSrc = $image ? $image->src : '';


        
                $variantRow = [
                    $productData->handle,
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    $variant->option1 ?? '',
                    '',
                    $variant->option2 ?? '',
                    '',
                    $variant->option3 ?? '',
                    $variant->sku,
                    $variant->grams,
                    '',
                    '0',
                    'deny',
                    'manual',
                    $variant->price,
                    $variant->compare_at_price,
                    $variant->requires_shipping ? 'TRUE' : 'FALSE',
                    '',
                    '',
                    $imageSrc, // Updated with image source (URL)
                    $positionCounter, // Use the position counter
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    $image ? $image->src : $productData->images[0]->src, // Updated with image source (URL)
                    $productData->variants[0]->weight_unit,
                    '',
                    '',
                    '',
                    '',
                    'active',
                ];
        
                // Write the variant row to the file
                fputcsv($csvFile, $variantRow);

                if ($image) {
                    $variantImageIds[] = $image->id;
                }

            }
        
            // Increment the position counter for the next variant
            $positionCounter++;
        }

// Create an array to store image IDs associated with variants

            foreach ($productData->images as $img) {
          
                // Find the image associated with the variant based on image_id
          
                if (!in_array($img->id, $variantImageIds)) {
                    $imageSrc = $img->src; // Get the image source for non-associated images
                    $imagesRow = [
                    $productData->handle,
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    $imageSrc, // Updated with image source (URL)
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                ];
        
                // Write the variant row to the file
                fputcsv($csvFile, $imagesRow);
          
            }
         
        }
    }
        
        // Close the CSV file
        fclose($csvFile);
        
        // Return the path to the generated CSV file
        return response()->download($csvFilePath)->deleteFileAfterSend(true);

        // return view('account.product.index')


    } 

        /**Trackstore from product research
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

                        $storeStartTracking = array(
                        'status' => 1,
                        );
                        // if no movement in 7 days Stop Update store
                    DB::table('stores')->where('id', $id)->update($storeStartTracking);
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
