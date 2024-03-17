<?php

namespace App\Livewire\Account\stores;
use Jantinnerezo\LivewireAlert\LivewireAlert;

use Livewire\Component;
use App\Models\Niche;
use App\Models\Nichestore;
use App\Models\stores;
use App\Models\Product;
use App\Models\Storeuser;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Contracts\Cache\Store;
class AddStore extends Component
{
    use LivewireAlert;

    public $url = '';
 
    public $nicheoption = '';

    public function render()
    {
        if(check_user_type() != 'user')
        {
            redirect()->route('dashboard')->with('error','You can not access this page.');
        }

        $user_id = Auth::user()->id;
        $storeuser = Storeuser::where('user_id', $user_id)->count();

        $storelimit = check_store_limit();
        // get user's stores
        $totalstores = Storeuser::where('user_id', $user_id)->pluck('store_id');
        $totalstores = count($totalstores);

        if(currentTeam()->onTrial()){

            if($storeuser >=3 ){
                return redirect()->route('storesearch.index')->with('error','You can not add more stores on trial');
            
            }
        }
        else if(check_store_limit() <= $storeuser)
        {
            $storeLimit = check_store_limit();
            if ($storeLimit) {
                $this->alert('warning', __('You can not add stores more than :limit', ['limit' => $storeLimit]));
                return redirect()->route('storesearch.index');
            }
        }

        //to add niche to store
        $allniches = Niche::where('user_id', $user_id)->get();

        if ($allniches->isEmpty()) {

            DB::table('niches')->insert([
                "name" => 'All',
                "user_id" => $user_id,
            ]);

        }
        return view('livewire.account.stores.add-store', compact('allniches','storelimit','totalstores'));
    }


    //add store function

    public function save()
    {

        try {
            $validated = $this->validate([
                'url' => 'required',
                'nicheoption' => 'required',
            ]);
        
            // Validation passed, continue with your logic
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Validation failed, handle the error here
            $this->alert('warning', __('url not valid!'));
        
            // Redirect back to the previous page with the validation errors
            return redirect()->back()->withErrors($e->validator);
        }
      
  
        if(check_user_type() != 'user')
        {
            return redirect()->route('dashboard')->with('error','You can not access this page.');
        }

        $user_id = Auth::user()->id;
        $storeuser = Storeuser::where('user_id', $user_id)->count();

        if(check_store_limit() <= $storeuser)
        {
            return redirect()->route('account.storesearch.index')->with('error','You can not add stores more than '.check_store_limit());
        }

        //if domaine with url ;;; 
        $parsedUrl = parse_url($this->url);

        if (isset($parsedUrl['host'])) {
            $domain = $parsedUrl['scheme'] . '://' . $parsedUrl['host']. '/' ;

        } else {
            $this->alert('warning', __('This Store not Supported by Weenify !'));

            // return redirect()->route('account.storesearch.index');
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
                            "niche_id" => $this->nicheoption,
                            "created_at" => now(),
                            "updated_at" => now()
                       ]);
                       //make status On
                       DB::table('stores')->where('id', $stores->id)->update(array('status' => 1));
                       return redirect()->route('account.storesearch.index');
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
                             "niche_id" => $this->nicheoption,
                             "created_at" => now(),
                             "updated_at" => now()
                        ]);
                        DB::table('stores')->where('id', $stores->id)->update(array('status' => 1));

                        return redirect()->route('account.storesearch.index');
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
                            'tag' => '',
                            'revenue' => 0,
                            'city' => $metas->city,
                            'country' => $metas->country,
                            'currency' => $metas->currency,
                            'shopifydomain' => $metas->myshopify_domain,
                            'allproducts' => $metas->published_products_count,
                            'todaysales' => 0,
                            'yesterdaysales' => 0,
                            'day3sales' => 0,
                            'day4sales' => 0,
                            'day5sales' => 0,
                            'day6sales' => 0,
                            'day7sales' => 0,
                            'weeksales' => 0,
                            'monthsales' => 0,
                            'dropshipping' => 1,
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
                             "niche_id" => $this->nicheoption,
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
                        $this->alert('warning', __('This Store not Supported by Weenify !'));
                        // return redirect()->route('account.storesearch.index');

                        // Log::error($exception->getMessage());
                    }
                }

        // return redirect()->route('account.stores.index');
        $this->alert('success', __('Store has been Added successfully , wait Between 2h To 24h to get All Sales'));
        return redirect()->route('account.storesearch.index');
  

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
            $image ='';
        }
        if (isset($product->images[1])) {
            $image2 = $product->images[1]->src;
        }else $image2 ='';

        if (isset($product->images[2])) {
            $image3 = $product->images[2]->src;
        }else $image3 ='';

        if (isset($product->images[3])) {
            $image4 = $product->images[3]->src;
        }else $image4 ='';

        if (isset($product->images[4])) {
            $image5 = $product->images[4]->src;
        }else $image5 ='';

        if (isset($product->images[5])) {
            $image6 = $product->images[5]->src;
        }else $image6 ='';

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
            "monthsales" => 0,
            'dropshipping' => 1,
            'price_aliexpress'=>0,
            'description' => $product->body_html,
            'created_at_shopify' => $product->published_at,
            'created_at_favorite' => $product->published_at,
            'image2' => $image2,
            'image3' => $image3,
            'image4' => $image4,
            'image5' => $image5,
            'image6' => $image6,
        ]);
    }
}

