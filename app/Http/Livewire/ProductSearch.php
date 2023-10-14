<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Storeuser;
use App\Models\stores;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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


    protected $paginationTheme = 'bootstrap';

    public function updatePagination($perPage)
    {
        $this->filtrePagination = $perPage;
    }

    public function updateOrderBy($orderBy)
    {
        $this->filtreorderby = $orderBy;
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
            $products =$products->paginate(25);
        }



        return view('livewire.product-search',compact('products'));
    }


    public function updatingQuery(){
        $this->resetPage();
    }


}
