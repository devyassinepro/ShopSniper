<?php

namespace App\Livewire\Account;
use App\Traits\FunctionTrait;
use App\Traits\RequestTrait;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use App\Models\Shopifystores;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Shopify extends Component
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

        return view('livewire.account.shopify', compact('stores'));

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
        
            // Redirect back to the previous page with the validation errors
            return redirect()->back()->withErrors($e->validator);
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
    
                $this->alert('success', __('Infos added successfully'));
            }
            
        }else{
           
            $this->alert('warning', __('Store Information Incorrect !'));

        }
       

    }
    public function importsingleproduct() {


        try {
            $validated = $this->validate([
                'urlsingle' => 'required'
            ]);
        
            // Validation passed, continue with your logic
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Validation failed, handle the error here
            $this->alert('warning', __('url not valid!'));
        
            // Redirect back to the previous page with the validation errors
            return redirect()->back()->withErrors($e->validator);
        }

        Log::info('$this->url:'.$this->urlsingle);

        $user_id = Auth::user()->id;
        $store = Shopifystores::where('user_id', $user_id)
                               ->where('status', 'active')
                               ->get(); 

        $storeArray = $store->toArray();
        $store = $storeArray[0];

        try {
            $productCreateMutation = 'productCreate (input: {' . $this->getGraphQLPayloadForProductPublishUrl($store, $this->urlsingle) . '}) { 
                product { id }
                userErrors { field message }
            }';
            Log::info("Json file " . $productCreateMutation);
            $mutation = 'mutation { ' . $productCreateMutation . ' }';
            
            $endpoint = getShopifyURLForStore('graphql.json', $store);
            Log::info('Shopify endpoint:'.$endpoint);

            $headers = getShopifyHeadersForStore($store);
            $payload = ['query' => $mutation];
            
            $response = $this->makeAnAPICallToShopify('POST', $endpoint, null, $headers, $payload);
            Log::info('Shopify API Response:', ['response' => $response]);
            
            // Check the response
            if (isset($response['statusCode']) && $response['statusCode'] == 200) {
                if (isset($response['body']['data']['productCreate']['userErrors']) && !empty($response['body']['data']['productCreate']['userErrors'])) {
                    $errors = $response['body']['data']['productCreate']['userErrors'];
                    $errorMessages = array_map(function($error) {
                        return $error['message'];
                    }, $errors);
                    return back()->with('error', 'Product creation failed: ' . implode(', ', $errorMessages));
                }

                $this->alert('success', __('Product Imported successfully'));


                // return back()->with('success', 'Product Created!');
            } else {
                return back()->with('error', 'Product creation failed!');
            }
        } catch (Exception $e) {
            Log::error('Error in publishProductUrl:', ['message' => $e->getMessage()]);
            return back()->with('error', 'Product creation failed: ' . $e->getMessage());
        }
    }

    
    private function getGraphQLPayloadForProductPublishUrl($store, $url) {
  
        $opts = array('http' => array('header' => "User-Agent:MyAgent/1.0\r\n"));
        $context = stream_context_create($opts);
        $html = file_get_contents($url . '.json', false, $context);
        $productData = json_decode($html, true);
    
        $temp = [];
        $temp[] = 
            ' title: "' . $productData['product']['title'] . '",
              published: true,
              vendor: "' . $productData['product']['vendor'] . '" ';
        if (isset($productData['product']['body_html']) && $productData['product']['body_html'] !== null)
             $escapedDescriptionHtml = json_encode($productData['product']['body_html']);

            $temp[] = ' descriptionHtml: ' . $escapedDescriptionHtml . '';

        if (isset($productData['product']['product_type']))
            $temp[] = ' productType: "' . $productData['product']['product_type'] . '"';
            $temp[] = ' tags: ["' . implode('", "', explode(',', $productData['product']['tags'])) . '"]';

            if (isset($productData['product']['options']) && is_array($productData['product']['options'])) {
                // Extract all option values and combine them into a single string
                $optionValues = array_reduce($productData['product']['options'], function($carry, $option) {
                    // Combine the values of each option into a single string, separated by commas
                    return $carry . implode(',', $option['values']) . ',';
                }, '');
            
                // Remove the trailing comma
                $optionValues = rtrim($optionValues, ',');
            
                // Wrap the combined option values in quotes and prepare the final options array format
                $formattedOptions = '"' . $optionValues . '"';
            
                $temp[] = 'options: [' . $formattedOptions . ']';
            } else {
                $formattedOptions = '';
            }

        if (isset($productData['product']['variants']) && is_array($productData['product']['variants'])) {
            $temp[] = 'variants: [' . $this->getVariantsGraphQLConfigUrl($productData) . ']';

        }

        if (isset($productData['product']['images']) && is_array($productData['product']['images'])) {
            $temp[] = 'images: [' . $this->getImagesGraphQLConfigUrl($productData) . ']';

        }
    
        return implode(',', $temp);
    }
    

    private function getVariantsGraphQLConfigUrl($productData) {
        try {
            $str = [];
            foreach ($productData['product']['variants'] as $key => $variant) {

                $compareAtPrice = !empty($variant['compare_at_price']) ? $variant['compare_at_price'] : 'null';
                $compareAtPriceField = $compareAtPrice !== 'null' ? 'compareAtPrice: ' . $compareAtPrice . ',' : '';

                  // Ensure option values are correctly set
                $optionValues = [];
                if (isset($variant['option1']) && $variant['option1'] !== null) {
                    $optionValues[] = $variant['option1'];
                }
                if (isset($variant['option2']) && $variant['option2'] !== null) {
                    $optionValues[] = $variant['option2'];
                }
                if (isset($variant['option3']) && $variant['option3'] !== null) {
                    $optionValues[] = $variant['option3'];
                }
                $formattedOptionValues = implode('", "', $optionValues);
            

                $str[] = '{
                    taxable: false,
                    title: "'.$variant['title'].'",
                    ' . $compareAtPriceField . '
                    sku: "'.$variant['sku'].'",
                    options: [" '.$formattedOptionValues.' "],
                    position: '.$variant['position'].',
                    imageSrc: "'.$variant['image_id'].'",
                    inventoryItem: {cost: '.$variant['price'].', tracked: false},
                    inventoryManagement: null,
                    inventoryPolicy: DENY,
                    price: '.$variant['price'].'
                }';
            }
            return implode(',', $str); 
        } catch (Exception $e) {
            dd($e->getMessage().' '.$e->getLine());
            return null;
        }
    }

    private function getImagesGraphQLConfigUrl($productData) {
        try {
            $str = [];
            foreach ($productData['product']['images'] as $key => $image) {
                $str[] = '{
                    src: "'.$image['src'].'",
                }';
            }
            return implode(',', $str); 
        } catch (Exception $e) {
            dd($e->getMessage().' '.$e->getLine());
            return null;
        }
    }

    // import All Store 

    public function importstore()
    {

        try {
            $validated = $this->validate([
                'url' => 'required'
            ]);
        
            // Validation passed, continue with your logic
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Validation failed, handle the error here
            $this->alert('warning', __('url not valid!'));
        
            // Redirect back to the previous page with the validation errors
            return redirect()->back()->withErrors($e->validator);
        }

        Log::info('$this->url:'.$this->url);
        $url = $this->url;

       // JSON string
          // store Dev
        // $store = '{"table_id":2,"id":67046080733,"email":"devyassinepro@gmail.com","name":"Weenify","access_token":"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","api_key":"59a995e864b719f1c5405554b7156bfb","api_secret_key":"d687a676685b8e18ececd78abc3b39d5","myshopify_domain":"weenify.myshopify.com","phone":null,"fulfillment_service_response":null,"address1":null,"fulfillment_orders_opt_in":0,"fulfillment_service":0,"address2":null,"zip":null,"created_at":"2024-06-07T12:03:34.000000Z","updated_at":"2024-06-07T12:03:34.000000Z"}';

        $user_id = Auth::user()->id;
        $store = Shopifystores::where('user_id', $user_id)
                               ->where('status', 'active')
                               ->get(); 

        $storeArray = $store->toArray();
        $store = $storeArray[0];

        $opts = array('http' => array('header' => "User-Agent:MyAgent/1.0\r\n"));
        $context = stream_context_create($opts);
        $html = file_get_contents($url . 'products.json?page=1&limit=250', false, $context);
        $products = json_decode($html)->products;

        $totalProducts = count($products);
        Log::info('Shopify totalProducts:'.$totalProducts);

        $processedProducts = 0;

        foreach ($products as $product) {
            try {

                $productCreateMutation = 'productCreate (input: {' . $this->getGraphQLPayloadForStorePublishUrl($product) . '}) { 
                    product { id }
                    userErrors { field message }
                }';
    
                // Log::info("Json file " . $productCreateMutation);

                $mutation = 'mutation { ' . $productCreateMutation . ' }';
    
                $endpoint = getShopifyURLForStore('graphql.json', $store);

                $headers = getShopifyHeadersForStore($store);

                $payload = ['query' => $mutation];
    
                $response = $this->makeAnAPICallToShopify('POST', $endpoint, null, $headers, $payload);
                Log::info('Shopify API Response:', ['response' => $response]);

                // $processedProducts++;
                // $this->progress = round(($processedProducts / $totalProducts) * 100);
                // $this->alert('success', __('Product Imported successfully') . $product->title .'');


                    // Check the response
                      // Check the response
                if (isset($response['statusCode']) && $response['statusCode'] == 200) {
                    if (isset($response['body']['data']['productCreate']['userErrors']) && !empty($response['body']['data']['productCreate']['userErrors'])) {
                        $errors = $response['body']['data']['productCreate']['userErrors'];
                        $errorMessages = array_map(function($error) {
                            return $error['message'];
                        }, $errors);
                        return back()->with('error', 'Product creation failed: ' . implode(', ', $errorMessages));
                    }

                    $this->alert('success', __('Product Imported successfully'));


                    // return back()->with('success', 'Product Created!');
                } else {
                    return back()->with('error', 'Product creation failed!');
                }

            } catch (Exception $e) {
                Log::error('Error in publishProductUrl:', ['message' => $e->getMessage()]);
                return back()->with('error', 'Product creation failed: ' . $e->getMessage());
            }
        }

    }
     
    private function getGraphQLPayloadForStorePublishUrl($product) {
        $temp = [];
        $temp[] = 'title: "' . addslashes($product->title) . '"';
        $temp[] = 'published: true';
        $temp[] = 'vendor: "' . addslashes($product->vendor) . '"';
    
        if (isset($product->body_html)) {
            $escapedDescriptionHtml = json_encode($product->body_html);
            $temp[] = 'descriptionHtml: ' . $escapedDescriptionHtml;
        }
    
        if (isset($product->product_type)) {
            $temp[] = 'productType: "' . addslashes($product->product_type) . '"';
        }
    
    
        if (isset($product->options) && is_array($product->options)) {
            $options = [];
            foreach ($product->options as $option) {
                $optionValues = implode(',', array_map('addslashes', $option->values));
                $options[] = '"' . $optionValues . '"';
            }
            $temp[] = 'options: [' . implode(', ', $options) . ']';

        }
    
        if (isset($product->variants) && is_array($product->variants)) {
            $temp[] = 'variants: [' . $this->getVariantsGraphQLConfigUrlStore($product->variants) . ']';
        }
    
        if (isset($product->images) && is_array($product->images)) {
            $temp[] = 'images: [' . $this->getImagesGraphQLConfigUrlStore($product->images) . ']';
        }
    
        return implode(', ', $temp);
    }
    
    private function getVariantsGraphQLConfigUrlStore($variants) {
        $str = [];
        foreach ($variants as $variant) {
            $compareAtPriceField = !empty($variant->compare_at_price) ? 'compareAtPrice: "' . $variant->compare_at_price . '",' : '';
    
            // Ensure option values are correctly set
            $optionValues = [];
            if (isset($variant->option1)) $optionValues[] = addslashes($variant->option1);
            if (isset($variant->option2)) $optionValues[] = addslashes($variant->option2);
            if (isset($variant->option3)) $optionValues[] = addslashes($variant->option3);
            $formattedOptionValues = implode('", "', $optionValues);
    
            $str[] = '{
                taxable: false,
                title: "' . addslashes($variant->title) . '",
                ' . $compareAtPriceField . '
                sku: "' . addslashes($variant->sku) . '",
                options: ["' . $formattedOptionValues . '"],
                position: ' . $variant->position . ',
                inventoryItem: {cost: ' . $variant->price . ', tracked: false},
                inventoryManagement: null,
                inventoryPolicy: DENY,
                price: ' . $variant->price . '
            }';
        }
        return implode(', ', $str);
    }
    
    private function getImagesGraphQLConfigUrlStore($images) {
        $str = [];
        foreach ($images as $image) {
            $str[] = '{
                src: "' . addslashes($image->src) . '"
            }';
        }
        return implode(', ', $str);
    }


}
