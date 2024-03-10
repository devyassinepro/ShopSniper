<?php

namespace App\Livewire\Account\products;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Storeuser;
use App\Models\stores;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductExport;

class ListProductSearch extends Component
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
    public $page = 1;
    
    public function placeholder()
    {
        return view('skeleton');
    }

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
            // $products = $products->paginate($this->filtrePagination ?: 25);

        }

        if($this->page > 1){
            $products = $products->paginate(25, ['*'], 'page', $this->page);
        }else {
            $products =  $products->paginate(25);
        }

        return view('livewire.account.products.list-product-search', [
            'products' => $products,
        ]);
     
    }


}
