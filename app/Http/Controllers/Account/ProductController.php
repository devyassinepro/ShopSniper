<?php

namespace App\Http\Controllers\Account;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\stores;
use App\Models\Storeuser;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
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

        // get user's store
        $user_id = Auth::user()->id;

        // get user's stores
        $totalstores = Storeuser::where('user_id', $user_id)->pluck('store_id')->ToArray();

 //Version 1 with filtre
        // $totalsalesmin = 0;
        // $pagination = 50;
        // $urlstore = "";
        //  if($request->ordreby){
        //      $products = Product::orderBy($request->ordreby,'desc');

        //  }else  $products = Product::orderBy('revenue','desc');
        //  if( $request->title){
        //       $products = $products->where('title', 'ilike', "%" . strtoupper($request->title) . "%");
        //  }
        //  if( $request->min_revenue && $request->max_revenue ){
        //      $products = $products->where('revenue', '>=', $request->min_revenue)
        //                   ->where('revenue', '<=', $request->max_revenue);
        //  }
        //  if( $request->min_sales && $request->max_sales ){
        //      $products = $products->where('totalsales', '>=', $request->min_sales)
        //                   ->where('totalsales', '<=', $request->max_sales);
        //  }
        //version 2 without filtre
        // $products->whereIn('stores_id', $totalstores);

        // $products = $products->withCount(['todaysales', 'yesterdaysales']);
        // $products = $products->paginate($pagination)->withQueryString();

        return view('account.product.index')
        ->with('totalproducts',Product::whereIn('stores_id', $totalstores)->count());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $products = $request->json()->all();

    foreach ($products as $product) {
        Product::create($product);
    }
        // return Product::create($request->all());

    }


      /**
     * Display the specified resource.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function importproduct($id){
       
        $url = Product::where('id', $id)->value('url');


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
        return response()->download($csvFilePath)->deleteFileAfterSend(true);

        // return view('account.product.index')


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
            redirect()->route('dashboard')->with('error','You can not access this page.');
        }

    // $products = Product::withCount(['todaysales', 'yesterdaysales' , 'day3sales' , 'day4sales' , 'day5sales' , 'day6sales'])
    //                     ->where('stores_id',$id)
    //                     ->orderBy('totalsales','desc')->paginate(100);


    // return view('account.product.index', compact('products'))
    // ->with('totalproducts',Product::where('stores_id',$id)->count());

    $dates = [];
    for ($i = 6; $i >= 0; $i--) {
        $dates[] = Carbon::now()->subDays($i)->format('Y-m-d');
    }
    $totalsalesmin = 0;
    $pagination = 50;

   $products = Product::orderBy('revenue','desc')
   ->where('id', $id);

//    $products = $products->withCount(['todaysales', 'yesterdaysales' , 'day3sales' , 'day4sales' , 'day5sales' , 'day6sales', 'day7sales']);

   $products = $products->get();

    return view('account.product.show', compact('products','dates'));

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
        //
        // $task = Task::findorFail($id); //searching for object in database using ID
        // if($task->delete()){ //deletes the object
        //     return 'deleted successfully'; //shows a message when the delete operation was successful.
        // }

    }

}
