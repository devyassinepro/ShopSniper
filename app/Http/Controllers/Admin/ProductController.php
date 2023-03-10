<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\stores;
use DB;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
 //conf standard 
 $totalsalesmin = 0;
 $pagination = 50;
 $urlstore = "";

  if($request->ordreby){
      $products = Product::orderBy($request->ordreby,'desc');

  }else  $products =  Product::orderBy('revenue','desc');
  if( $request->title){
       $products = $products->where('title', 'ilike', "%" . strtoupper($request->title) . "%");
  }
  if( $request->min_revenue && $request->max_revenue ){
      $products = $products->where('revenue', '>=', $request->min_revenue)
                   ->where('revenue', '<=', $request->max_revenue);
  }
  if( $request->min_sales && $request->max_sales ){
      $products = $products->where('totalsales', '>=', $request->min_sales)
                   ->where('totalsales', '<=', $request->max_sales);
  }else  $products = $products->where('totalsales', '>=', $totalsalesmin);
 //version 2 without filtre 

 $products = $products->withCount(['todaysales', 'yesterdaysales']);
 $products = $products->paginate($pagination)->withQueryString();

        return view('admin.product.index', compact('products'))
        ->with('totalproducts',Product::all()->count());
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    // $products = Product::withCount(['todaysales', 'yesterdaysales' , 'day3sales' , 'day4sales' , 'day5sales' , 'day6sales'])
    //                     ->where('stores_id',$id)
    //                     ->orderBy('totalsales','desc')->paginate(100);


    // return view('admin.product.index', compact('products'))
    // ->with('totalproducts',Product::where('stores_id',$id)->count());
                //conf standard 
                $totalsalesmin = 0;
                $pagination = 50;
             
               $products = Product::orderBy('revenue','desc')
               ->where('id', $id);
   
                $products = $products->withCount(['todaysales', 'yesterdaysales' , 'day3sales' , 'day4sales' , 'day5sales' , 'day6sales', 'weeklysales', 'montlysales']);
                $products = $products->get();
        
                return view('admin.product.show', compact('products'));
    
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
