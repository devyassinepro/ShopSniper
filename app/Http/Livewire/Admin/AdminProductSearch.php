<?php

namespace App\Http\Livewire\Admin;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Storeuser;
use App\Models\stores;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminProductSearch extends Component
{
    use WithPagination;
    public $search = "";
    public $filtrePagination = "";
   
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
    public $favorites = '';

    

    protected $debug = true;


    protected $paginationTheme = 'bootstrap';

    public function updatePagination($perPage)
    {
        $this->filtrePagination = $perPage;
    }

    public function save(){
    }

    public function toggleFavoris($productId, $currentFavoris)
    {
        $product = Product::find($productId);
    
        if ($product) {
            $product->favoris = $currentFavoris == 1 ? 0 : 1;
            $product->save();
        }
    }

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

        if ($this->favorites) {
            // If "Favorites" checkbox is checked, filter for favorites (where the field is 1)
            $products->where('favoris', 1);
        } else {
            // If "Favorites" checkbox is not checked, include all products (where the field is 0)
            $products->where('favoris', 0);
        }

        if($this->filtrePagination != ""){

                $products =$products->paginate($this->filtrePagination);
        }else{
            $products =$products->paginate(20);
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
