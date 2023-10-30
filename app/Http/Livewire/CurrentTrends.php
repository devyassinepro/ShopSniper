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

class CurrentTrends extends Component
{
   
    use WithPagination;
    public $search = "";
    public $filtrePagination = "";

    public $productUrl;

   
    protected $paginationTheme = 'bootstrap';

    public function updatePagination($perPage)
    {
        $this->filtrePagination = $perPage;
        $this->resetPage(); // Reset to page 1 when changing the items per page.

    }
    
    public function render()
    {

        if(check_user_type() != 'user')
        {
            redirect()->route('dashboard')->with('error','You can not access this page.');
        }

        // Get stores of this user and select the COALESCE calculation
        $products = Product::where('title', '>=', 10)
            ->where('title', '>=', 10)
            ->select('products.*');


        if($this->search != ""){
            $this->resetPage();
            $products->where("title", "LIKE",  "%". $this->search ."%")
                         ->orWhere("url","LIKE",  "%". $this->search ."%");
        }


        if($this->filtrePagination != ""){

                $products =$products->paginate($this->filtrePagination);
        }else{
            // $products =$products->paginate(5);
            $products = $products->paginate($this->filtrePagination ?: 25);

        }

        // return view('livewire.product-search',compact('products'));
        return view('livewire.current-trends', [
            'products' => $products,
        ]);
    }


    public function updatingQuery(){
        $this->resetPage();
    }

}
