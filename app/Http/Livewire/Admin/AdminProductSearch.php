<?php

namespace App\Http\Livewire\Admin;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Storeuser;
use App\Models\stores;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class AdminProductSearch extends Component
{
    use WithPagination;
    public $search = "";
    public $filtrePagination = "";
    protected $paginationTheme = 'bootstrap';

   
//    filters data
    public $title = '';
    public $titleexclude = '';
    public $description = '';
    public $descriptionexlude = '';
    public $url = ''; 
    public $urlexlude = '';
    public $pricemin = '';
    public $pricemax = '';
    public $storemin = '';
    public $storemax = '';
    public $country = '';
    public $currency = '';
    public $winning = '';
    public $dropshipping = '';


    public $selectAll = false;
    public $selectedProducts = [];
    public $bulkAction = '';

    public function applyBulkAction()
    {

        //  dd($this->bulkAction);
        //  dd($this->selectedProducts);

        if ($this->bulkAction === 'add-to-dropshipping') {
            foreach ($this->selectedProducts as $productId => $isSelected) {
                if ($isSelected) {              
                    $this->toggleDropshipping($productId, 1); // 1 means "Add to Favorites"
                }
            }
        }
        else if($this->bulkAction === 'add-to-winning'){
            foreach ($this->selectedProducts as $productId => $isSelected) {
                if ($isSelected) {
                    $this->toggleWinning($productId, 1); // 1 means "Add to Favorites"
                }
            }
        }

        // Clear selected products
        $this->selectedProducts = [];
    }

    protected $debug = true;


    public function toggleWinning($productId, $currentFavoris)
    {
        $product = Product::find($productId);

        if ($product) {
            $product->favoris = $currentFavoris;
            // $product->favoris = $currentFavoris == 1 ? 0 : 1;
            $product->created_at_favorite = Carbon::now()->format('Y-m-d');
            $product->save();
        }
    }

    
    public function toggleDropshipping($productId, $currentDropshipping)
    {
        $product = Product::find($productId);

        if ($product) {
            // $product->dropshipping = $currentDropshipping == 1 ? 0 : 1;
            $product->dropshipping = $currentDropshipping;
            $product->save();
        }
    }


    public function onetoggleWinning($productId, $currentFavoris)
    {
        $product = Product::find($productId);

        if ($product) {
            $product->favoris = $currentFavoris == 1 ? 0 : 1;
            $product->created_at_favorite = Carbon::now()->format('Y-m-d');
            $product->save();
        }
    }

    
    public function onetoggleDropshipping($productId, $currentDropshipping)
    {
        $product = Product::find($productId);

        if ($product) {
            $product->dropshipping = $currentDropshipping == 1 ? 0 : 1;
            $product->save();
        }
    }


    public function updatePagination($perPage)
    {
        $this->filtrePagination = $perPage;
    }

    public function save(){
    }

    // public function toggleFavoris($productId, $currentFavoris)
    // {
    //     $product = Product::find($productId);
    
    //     if ($product) {
    //         $product->favoris = $currentFavoris == 1 ? 0 : 1;
    //         $product->created_at_favorite = Carbon::now()->format('Y-m-d');
    //         $product->save();
    //     }
    // }


    public function render()
    {
    
        // Get stores of this user and select the COALESCE calculation
        $products = Product::where('title', '>=', 10)
            ->select('products.*', DB::raw('COALESCE(todaysales, 0) AS calculated_todaysales'), DB::raw('COALESCE(yesterdaysales, 0) AS calculated_yesterdaysales'));


        // filters
        if($this->title != ""){
            // $this->resetPage();
            $products->where("title", "LIKE",  "%". $this->title ."%");
        }
        if($this->url != ""){
            $products->where('url', 'LIKE', "%{$this->url}%");
        }

        if (!empty($this->titleexclude)) {
            $products->where('title', 'not like', "%{$this->titleexclude}%");
        }

        if (!empty($this->urlexlude)) {
            $products->where('url', 'not like', "%{$this->urlexlude}%");
        }

        if (!empty($this->pricemin)) {

            // $products->where('prix', '>=', $this->priceMin);
            $products->where('prix', '>=', $this->pricemin);

        }
        if (!empty($this->pricemax)) {
            $products->where('prix', '<=', $this->pricemax);
        }
        if (!empty($this->storemin)) {
            // $products->where('prix', '>=', $this->priceMin);
            $products->whereHas('stores', function ($query) {
                $query->where('allproducts', '<=', $this->storemin);
            });
        }
        if (!empty($this->storemax)) {
            $products->whereHas('stores', function ($query) {
                $query->where('allproducts', '<=', $this->storemax);
            });
        }
        if (!empty($this->country)) {
            $products->whereHas('stores', function ($query) {
                $query->where('country', '=', $this->country);
            });
        }
        if (!empty($this->currency)) {
            $products->whereHas('stores', function ($query) {
                $query->where('currency', '=', $this->currency);
            });
        }

        if ($this->winning) {
            // If "Favorites" checkbox is checked, filter for favorites (where the field is 1)
            $products->where('favoris', 1);
        } 
        if ($this->dropshipping) {
            // If "Favorites" checkbox is checked, filter for favorites (where the field is 1)
            $products->where('dropshipping', 1);
        } 
        if($this->filtrePagination != ""){

                $products =$products->paginate($this->filtrePagination);
        }else{
            $products =$products->paginate(25);
        }
        return view('livewire.admin.admin-product-search',compact('products'));

    }

    public function updated($property)
    {
        if ($property === 'search') {
            $this->resetPage();
        }
    }

    public function updatingQuery(){
        $this->resetPage();
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }
}
