<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Storeuser;
use App\Models\stores;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
class ProductSearch extends Component
{


    use WithPagination;
    public $name;
    public $price;
    public $selectedProductId;
    public $search = "";
    public $filter = '';
    public $filtrePagination = "";
    public $filtreorder = "";


    protected $paginationTheme = 'bootstrap';

    public function render()
    {

        if(check_user_type() != 'user')
        {
            redirect()->route('dashboard')->with('error','You can not access this page.');
        }

        $user_id = Auth::user()->id;

        // get user's stores
        $totalstores = Storeuser::where('user_id', $user_id)->pluck('store_id')->ToArray();
        // get stores of this user
        $products = Product::whereIn('stores_id', $totalstores);
        if($this->search != ""){
            $this->resetPage();
            $products->where("title", "LIKE",  "%". $this->search ."%")
                         ->orWhere("url","LIKE",  "%". $this->search ."%");
        }
        if($this->filtreorder != ""){

            $products =$products->orderBy($this->filtreorder,'desc');
        }else{
            $products =$products->orderBy('revenue','desc');
        }

        if($this->filtrePagination != ""){

                $products =$products->paginate($this->filtrePagination);
        }else{
            $products =$products->paginate(10);
        }



        return view('livewire.product-search',compact('products'));
    }


    public function updatingQuery(){
        $this->resetPage();
    }


}
