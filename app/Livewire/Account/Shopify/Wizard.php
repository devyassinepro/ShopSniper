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

class Wizard extends Component
{
    use LivewireAlert;
    use RequestTrait, FunctionTrait;
    public $urlshopify = ''; 
    public $urltoken = ''; 
    public $apikey = ''; 
    public $apisecret = ''; 
    public function render()
    {
        return view('livewire.account.shopify.wizard');
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
        // Log::info('Shopify API Response:', ['response' => $response]);

        if($response['statusCode'] == 200) {
            $shop_body = $response['body']['shop'];
            // Log::info('$this->urlshopify:'.$shop_body['email']);

            // Check if the store already exists
            $existingStore = Shopifystores::where('store_id', $shop_body['id'])->first();
            
            if ($existingStore) {
                // Store already exists, log a message or alert the user
                // Log::info('Store already exists with store_id: '.$shop_body['id']);
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
