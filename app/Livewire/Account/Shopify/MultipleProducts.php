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

class MultipleProducts extends Component
{
    use LivewireAlert;
    use RequestTrait, FunctionTrait;

    public $url = ''; 
    public function render()
    {
        return view('livewire.account.shopify.multiple-products');
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
 
        //  Log::info('$this->url:'.$this->url);
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
        //  Log::info('Shopify totalProducts:'.$totalProducts);
 
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
                //  Log::info('Shopify API Response:', ['response' => $response]);
 
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
                //  Log::error('Error in publishProductUrl:', ['message' => $e->getMessage()]);
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
