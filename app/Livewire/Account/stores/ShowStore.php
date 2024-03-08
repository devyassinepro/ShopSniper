<?php

namespace App\Livewire\Account\Stores;

use Livewire\Component;
use App\Models\stores;
use App\Models\Product;
use App\Models\Storeuser;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

use DB;

class ShowStore extends Component
{

    public $storeId;
    public $deleteId = '';
    public $storeid = '';

    public function mount($id)
    {
        $this->storeId = $id;
    }

    public function trackstore($id)
    {
        $this->storeid = $id;
    }

    public function render()
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

        $storedata = DB::table('stores')->where('id', $this->storeId)->get();

        $totalsalesmin = 0;
        // $pagination = 50;
        $products = Product::where('stores_id',$this->storeId)
                        ->where('totalsales', '>=', $totalsalesmin)
                        ->orderBy('totalsales','desc')->take(10)->get();

    return view('livewire.account.stores.show-store', compact('products','storedata','dates'))
    ->with('totalproducts',Product::where('stores_id',$this->storeId)->count());

    }


     /**
     * Write code on Method
     *
     * @return response()
     */
    public function Remove($id)
    {
        $this->deleteId = $id;
    }
   
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function delete()
    {
     
        $store = stores::findorFail($this->deleteId); //searching for object in database using ID

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
                Storeuser::where('user_id', $user_id)->where('store_id', $this->deleteId)->delete();
                return redirect()->route('account.storesearch.index')->with('success','deleted successfully');
            }
            else
            {
                $store_added_by_total_users = Storeuser::where('store_id', $this->deleteId)->count();
                if($store_added_by_total_users > 1)
                {
                    Storeuser::where('user_id', $user_id)->where('store_id', $this->deleteId)->delete();
                    return redirect()->route('account.storesearch.index')->with('success','deleted successfully');

                }
                else
                {
                    Storeuser::where('user_id', $user_id)->where('store_id', $id)->delete();
                    DB::table('stores')->where('id', $this->deleteId)->update(array('status' => 0));
                    return redirect()->route('account.storesearch.index')->with('success','deleted successfully');
                }
            }
        }
        else
        {
            return redirect()->route('account.storesearch.index')->with('error','Something went wrong');
        }
        session()->flash('message', 'Niche has been Deleted successfully.');
 
        return redirect()->to('/account/stores');


    }

  
    public function untrackstore(){


        $store = stores::findorFail($this->storeid); //searching for object in database using ID

        if(check_user_type() != 'user')
        {
            return redirect()->route('dashboard')->with('error','You can not access this page.');
        }

        $user_id = Auth::user()->id;
        $storeuser = Storeuser::where('user_id', $user_id)->where('store_id', $this->storeid)->count();
        if($storeuser > 0)
        {
            // if store added by admin
            if(empty($store->user_id))
            {
                Storeuser::where('user_id', $user_id)->where('store_id', $this->storeid)->delete();
                return redirect()->route('account.storesearch.index')->with('success','deleted successfully');
            }
            else
            {
                $store_added_by_total_users = Storeuser::where('store_id', $this->storeid)->count();
                if($store_added_by_total_users > 1)
                {

                    Storeuser::where('user_id', $user_id)->where('store_id', $this->storeid)->delete();
                    return redirect()->route('account.storesearch.index')->with('success','deleted successfully');

                }
                else
                {
                    Storeuser::where('user_id', $user_id)->where('store_id', $this->storeid)->delete();
                    DB::table('stores')->where('id', $this->storeid)->update(array('status' => 0));
                    return redirect()->route('account.storesearch.index')->with('success','deleted successfully');
                }
            }
        }
        else
        {
            return redirect()->route('account.storesearch.index')->with('error','Something went wrong');
        }

    }

     /**
     * Display the specified resource.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function exportToCsv($id){
     

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
}
