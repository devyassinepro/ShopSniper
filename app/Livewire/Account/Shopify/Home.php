<?php

namespace App\Livewire\Account\Shopify;
use App\Traits\FunctionTrait;
use App\Traits\RequestTrait;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use App\Models\Shopifystores;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Home extends Component
{
    use LivewireAlert;
    use RequestTrait, FunctionTrait;

    public $progress = 0;
    public $url = ''; 
    public $urlsingle = ''; 
    public $changestore = "";
    // varaibles token stores 
    public $urlshopify = ''; 
    public $urltoken = ''; 
    public $apikey = ''; 
    public $apisecret = ''; 
    public $activeStore = null;

    public function mount()
    {
        $user_id = Auth::user()->id;
        $activeStore = Shopifystores::where('user_id', $user_id)
                                    ->where('status', 'active')
                                    ->first();
        if ($activeStore) {
            $this->activeStore = $activeStore->store_id;
            $this->changestore = $activeStore->name;
        }

        $wizardactive = Shopifystores::where('user_id', $user_id)
        ->first();
        if (!$wizardactive) {
            return redirect()->route('account.wizard.index'); // Replace 'route-name' with your route name

        }

    }


    public function changeStore($store)
    {

        $user_id = Auth::user()->id;

         // Find the selected store by name
         $selectedStore = Shopifystores::where('store_id', $store)->
         where('user_id', $user_id)->first();

         if ($selectedStore) {
             // Update the status of the selected store to active
             $selectedStore->update(['status' => 'active']);
 
             // Update the status of all other stores to inactive
             Shopifystores::where('id', '!=', $selectedStore->id)
                            ->where('user_id', $user_id)
                            ->update(['status' => 'inactive']);
 
             // Set the changestore property to the selected store's name
             $this->changestore = $selectedStore->name;
             $this->activeStore = $selectedStore->store_id;

 
             Log::info('Selected store is now active: ' . $this->changestore);
         } else {
             Log::error('Store not found: ' . $storeName);
             session()->flash('error', 'Store not found');
         }
        Log::info('$this->changestore: ' . $this->changestore);


    }
    public function render()
    {
        $user_id = Auth::user()->id;
        // $stores = Shopifystores::where('user_id', '=', $user_id)->get();
        $stores = Shopifystores::where('user_id', $user_id)
                                    //   ->where('status', 'active')
                                      ->get();
        return view('livewire.account.shopify.home', compact('stores'));

    }

    public function savesecret() {

        $user_id = Auth::user()->id;
        $urlshopify = $this->urlshopify;
        $urltoken = $this->urltoken ;
        $apikey = $this->apikey ;
        $apisecret = $this->apisecret ;


        try {
            $validated = $this->validate([
                'urlshopify' => 'required',
                'urltoken' => 'required',
                'apikey' => 'required',
                'apisecret' => 'required',
            ]);
        
            // Validation passed, continue with your logic
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Validation failed, handle the error here
            $this->alert('warning', __('information not valid!'));
            return redirect()->route('account.homeshopify.index');
        
            // Redirect back to the previous page with the validation errors
            // return redirect()->back()->withErrors($e->validator);
        }
        // App shopify online

        $store_arr = [
            'api_key' => $apikey,
            'api_secret_key' => $apisecret,
            'myshopify_domain' => $urlshopify,
            'access_token' => $urltoken
        ];
        $endpoint = getShopifyURLForStore('shop.json', $store_arr);
        $headers = getShopifyHeadersForStore($store_arr);

        $response = $this->makeAnAPICallToShopify('GET', $endpoint, null, $headers);
        Log::info('Shopify API Response:', ['response' => $response]);

        if($response['statusCode'] == 200) {
            $shop_body = $response['body']['shop'];
            Log::info('$this->urlshopify:'.$shop_body['email']);

            // Check if the store already exists
            $existingStore = Shopifystores::where('store_id', $shop_body['id'])->first();
            
            if ($existingStore) {
                // Store already exists, log a message or alert the user
                Log::info('Store already exists with store_id: '.$shop_body['id']);
                $this->alert('warning', __('Store already exists!'));
            } else {
                // Store does not exist, create a new record
                Shopifystores::create(array_merge($store_arr, [
                    'store_id' => $shop_body['id'],
                    'email' => $shop_body['email'],
                    'name' => $shop_body['name'],
                    'phone' => $shop_body['phone'],
                    'address1' => $shop_body['address1'],
                    'address2' => $shop_body['address2'],
                    'zip' => $shop_body['zip'],
                    'user_id' => $user_id,
                    'status' => '',
                ]));
    
                return redirect()->route('account.homeshopify.index');
                $this->alert('success', __('Infos added successfully'));


            }
            
        }else{
           
            return redirect()->route('account.homeshopify.index');
            $this->alert('warning', __('Store Information Incorrect !'));

        }
       

    }
}
