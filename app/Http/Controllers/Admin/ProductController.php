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

        return view('admin.product.index');
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
    
                $totalsalesmin = 0;
                $pagination = 50;
             
               $products = Product::where('id', $id);
   
                // $products = $products->withCount(['todaysales', 'yesterdaysales' , 'day3sales' , 'day4sales' , 'day5sales' , 'day6sales', 'weeklysales', 'montlysales']);
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
      
        $product = Product::findorFail($id); // uses the id to search values that need to be updated.


        $product->price_aliexpress = $request->input('pricealiexpress');
        $product->save();//saves the values in the database. The existing data is overwritten.


        $products = Product::where('id', $id);
        $products = $products->get();


            // Fetch the product data after updating

    return view('admin.product.show', compact('products'));
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
