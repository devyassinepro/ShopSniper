<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Storeuser;
use App\Models\stores;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductExport;
// use App\Http\Livewire\ProductExport;


class ProductSearch extends Component
{


    use WithPagination;
    public $name;
    public $price;
    public $selectedProductId;
    public $search = "";
    public $filter = '';
    public $filtrePagination = "";
    public $filtreorderby = '';

    public $productUrl;

   
    protected $paginationTheme = 'bootstrap';

    public function updatePagination($perPage)
    {
        $this->filtrePagination = $perPage;
        $this->resetPage(); // Reset to page 1 when changing the items per page.

    }

    public function updateOrderBy($orderBy)
    {
        $this->filtreorderby = $orderBy;
        $this->resetPage(); // Reset to page 1 when changing the sorting order.

    }

    public function exportToCsv($url)
    {

        // $productData = json_decode($html)->product;
        
        // Fetch or prepare your product data here

        // Convert $productData to an array of associative arrays
        // $productArray = [];
        // foreach ($productData as $item) {
        //     $productArray[] = (array) $item;
        // }
        $opts = array('http' => array('header' => "User-Agent:MyAgent/1.0\r\n"));
        $context = stream_context_create($opts);
        $html = file_get_contents($url . '.json', false, $context);
        $productData = json_decode($html, true);
        
        // Define the CSV file path
        $csvFilePath = 'product_' . $productData['product']['handle'] . '.csv';
        
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
        
        // Main product data row
        $mainProductRow = [
            $productData['product']['handle'],
            $productData['product']['title'],
            $productData['product']['body_html'],
            $productData['product']['vendor'],
            $productData['product']['product_type'],
            $productData['product']['template_suffix'],
            $productData['product']['tags'],
            $productData['product']['published_at'],
            $productData['product']['options'][0]['name']?? '',
            $productData['product']['variants'][0]['option1']?? '',
            $productData['product']['options'][1]['name'] ?? '',
            $productData['product']['variants'][0]['option2'] ?? '',
            $productData['product']['options'][2]['name'] ?? '',
            $productData['product']['variants'][0]['option3'] ?? '',
            $productData['product']['variants'][0]['sku'],
            $productData['product']['variants'][0]['weight'],
            '',
            '0',
            'deny',
            'manual',
            $productData['product']['variants'][0]['price'],
            $productData['product']['variants'][0]['compare_at_price'],
            $productData['product']['variants'][0]['requires_shipping'],
            '',
            '',
            $productData['product']['images'][0]['src'],
            $productData['product']['images'][0]['position'],
            $productData['product']['images'][0]['alt'],
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
            $productData['product']['images'][0]['src'],
            $productData['product']['variants'][0]['weight_unit'],
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
        
        foreach ($productData['product']['variants'] as $variant) {
            if ($positionCounter > 1) {
                // Find the image associated with the variant based on image_id
                $image = null;
                foreach ($productData['product']['images'] as $img) {
                    if ($img['id'] == $variant['image_id']) {
                        $image = $img;

                        if(!empty($img['src'])){
                            $firstimage = $img['src'];
                        }
                        break;
                    }
                }
        
                // Get the image source (URL) or set it to an empty string if no image is found
                // $imageSrc = $image ? $image['src'] : '';
        
                $variantRow = [
                    $productData['product']['handle'],
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    $variant['option1']?? '',
                    '',
                    $variant['option2']?? '',
                    '',
                    $variant['option3']?? '',
                    $variant['sku'],
                    $variant['grams'],
                    '',
                    '0',
                    'deny',
                    'manual',
                    $variant['price'],
                    $variant['compare_at_price'],
                    $variant['requires_shipping'] ? 'TRUE' : 'FALSE',
                    '',
                    '',
                    $image ? $image['src'] : $productData['product']['images'][0]['src'], // Updated with image source (URL)
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
                    $image ? $image['src'] : $productData['product']['images'][0]['src'], // Updated with image source (URL)
                    $productData['product']['variants'][0]['weight_unit'],
                    '',
                    '',
                    '',
                    '',
                    'active',
                ];
        
                // Write the variant row to the file
                fputcsv($csvFile, $variantRow);

                if ($image) {
                    $variantImageIds[] = $image['id'];
                }

            }
        
            // Increment the position counter for the next variant
            $positionCounter++;
        }

// Create an array to store image IDs associated with variants

        foreach ($productData['product']['images'] as $img) {
          
                // Find the image associated with the variant based on image_id
          
                if (!in_array($img['id'], $variantImageIds)) {
                $imageSrc = $img['src']; // Get the image source for non-associated images
                $imagesRow = [
                    $productData['product']['handle'],
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

        
        // Close the CSV file
        fclose($csvFile);
        
        // Return the path to the generated CSV file
        return response()->download($csvFilePath);
        // This code will manually create a CSV file with the product data and then provide a download link to the user.
        
    }


    public function render()
    {

        if(check_user_type() != 'user')
        {
            redirect()->route('dashboard')->with('error','You can not access this page.');
        }

        $user_id = Auth::user()->id;

        // get user's stores
        $totalstores = Storeuser::where('user_id', $user_id)->pluck('store_id')->ToArray();

        // Get stores of this user and select the COALESCE calculation
        $products = Product::whereIn('stores_id', $totalstores)
            ->where('title', '>=', 10)
            ->select('products.*', DB::raw('COALESCE(todaysales, 0) AS calculated_todaysales'), DB::raw('COALESCE(yesterdaysales, 0) AS calculated_yesterdaysales'));


        if($this->search != ""){
            $this->resetPage();
            $products->where("title", "LIKE",  "%". $this->search ."%")
                         ->orWhere("url","LIKE",  "%". $this->search ."%");
        }

        if ($this->filtreorderby != "") {

            if($this->filtreorderby == "todaysales") {
                $products = $products->orderBy('calculated_todaysales', 'desc');
            }

            if($this->filtreorderby == "yesterdaysales") {
                $products = $products->orderBy('calculated_yesterdaysales', 'desc');
            }

            if($this->filtreorderby == 'totalsales') {
                $products =$products->orderBy($this->filtreorderby,'desc');
            }


        } else {
            $products = $products->orderBy('revenue', 'desc');
        }

        if($this->filtrePagination != ""){

                $products =$products->paginate($this->filtrePagination);
        }else{
            // $products =$products->paginate(5);
            $products = $products->paginate($this->filtrePagination ?: 25);

        }

        // return view('livewire.product-search',compact('products'));
        return view('livewire.product-search', [
            'products' => $products,
        ]);
    }


    public function updatingQuery(){
        $this->resetPage();
    }


}
