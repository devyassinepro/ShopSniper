<?php

namespace App\Http\Livewire\Admin;
use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;
use App\Models\Storeuser;
use App\Models\stores;
use Illuminate\Support\Facades\Auth;
use App\Models\Niche;

class AdminStoreSearch extends Component
{
    use WithPagination;

    
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

    

    protected $paginationTheme = 'bootstrap';

    public function updateNiche($nicheId)
    {
        $this->filtreNiche = $nicheId;
    }

    public function updateOrderBy($orderBy)
    {
        $this->filtreorderby = $orderBy;
    }
    public function save(){
      
        //   dd($this->title,$this->description,$this->url,$this->pricemin,$this->pricemax,$this->pricemin,$this->storemin,$this->storemax,$this->country);

    }

    public function updateCurrency($currency)
    {
        $this->filtreCurrency = $currency;
    }

    public function updatePagination($perPage)
    {
        $this->filtrePagination = $perPage;
    }
    public function render()
    {
            $stores = stores::query();
    

        // filters
        if($this->title != ""){
            // $this->resetPage();
            $stores->where("name", "LIKE",  "%". $this->title ."%");
        }
        if($this->url != ""){
            $stores->where('url', 'LIKE', "%{$this->url}%");
        }

        if (!empty($this->storemin)) {
            $stores->where('allproducts', '<=', $this->storemin);
            
        }
        if (!empty($this->storemax)) {
            $stores->where('allproducts', '>=', $this->storemax);

        }
        if (!empty($this->country)) {
            $stores->where('country', '=', $this->country);

        }
        if (!empty($this->currency)) {
            $stores->where('currency', '=', $this->currency);
        }
    

        $stores = $stores->paginate(25);
    
        // return view('livewire.admin-store-search', [
        //     "stores" => $stores
        // ])->with('totalstores',stores::all()->count());

        return view('livewire.admin.admin-store-search', [
            "stores" => $stores]);
    }

    public function updated($property)
    {
        if ($property === 'search') {
            $this->resetPage();
        }
    }
}
