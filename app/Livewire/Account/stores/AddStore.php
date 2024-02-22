<?php

namespace App\Livewire\Account\stores;

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

    public $url = '';
 
    public $nicheid = '';

    public function render()
    {
        if(check_user_type() != 'user')
        {
            redirect()->route('dashboard')->with('error','You can not access this page.');
        }

        $user_id = Auth::user()->id;
        $storeuser = Storeuser::where('user_id', $user_id)->count();

        if(currentTeam()->onTrial()){

            if($storeuser >=3 ){
                return redirect()->route('storesearch.index')->with('error','You can not add more stores on trial');

            }
        }
        else if(check_store_limit() <= $storeuser)
        {
            return redirect()->route('storesearch.index')->with('error','You can not add stores more than '.check_store_limit());
        }

        //to add niche to store
        $allniches = Niche::where('user_id', $user_id)->get();

        if ($allniches->isEmpty()) {

            DB::table('niches')->insert([
                "name" => 'All',
                "user_id" => $user_id,
            ]);

        }
        return view('livewire.account.stores.add-store', compact('allniches'));
    }


    //add store function

    public function save()
    {
        $validated = $this->validate([ 
            'url' => 'required',
            'nicheid' => 'required',
        ]);

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
                    return redirect()->route('account.AddStore.index')->with('error','This Store not Supported by Weenify');
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
                            "niche_id" => $this->nicheid,
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
                             "niche_id" => $this->nicheid,
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
                             "niche_id" => $this->nicheid,
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
                        return redirect()->route('account.AddStore.index')->with('error','This Store not Supported by Weenify');

                        // Log::error($exception->getMessage());
                    }
                }

        // return redirect()->route('account.stores.index');
        return redirect()->route('account.storesearch.index')->with('success','Store has been Added successfully , wait Between 2h To 24h to get All Sales');
  

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

