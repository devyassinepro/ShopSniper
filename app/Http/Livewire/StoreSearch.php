<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;
use App\Models\Storeuser;
use App\Models\stores;
use Illuminate\Support\Facades\Auth;
use App\Models\Niche;
class StoreSearch extends Component
{

    use WithPagination;
    public $name;
    public $search = "";
    public $filtreCurrency = "", $filtreNiche = "", $filtrePagination = "", $filtreorderby = "";

    protected $paginationTheme = 'bootstrap';


    public function updateNiche($nicheId)
    {
        $this->filtreNiche = $nicheId;
    }

    public function updateOrderBy($orderBy)
    {
        $this->filtreorderby = $orderBy;
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

        if(check_user_type() != 'user')
        {
            redirect()->route('dashboard')->with('error','You can not access this page.');
        }

        $user_id = Auth::user()->id;
        // get stores of this user
        $storeuser = Storeuser::where('user_id', $user_id)->pluck('store_id');
        $stores = stores::whereIn('id', $storeuser);

        if($this->search != ""){
            $this->resetPage();
            $stores->where("name", "LIKE",  "%". $this->search ."%")
                         ->orWhere("url","LIKE",  "%". $this->search ."%");
        }

        //by niche & by Currency

        if($this->filtreCurrency != ""){
            $stores->where('currency', $this->filtreCurrency);
            // dd($this->filtreCurrency);
        }


        if($this->filtreNiche != ""){
            $this->resetPage();
            $stores->where("name", "LIKE",  "%". $this->filtreNiche ."%")
                         ->orWhere("url","LIKE",  "%". $this->filtreNiche ."%");
        }

        if($this->filtreorderby != ""){
            $stores = $stores->orderBy($this->filtreorderby,'desc');
            }else{
                $stores = $stores->orderBy('revenue','desc');
            }

        if($this->filtrePagination != ""){
        $stores = $stores->orderBy('revenue','desc')
            ->paginate($this->filtrePagination);
        }else{
            $stores = $stores->orderBy('revenue','desc')
            ->paginate(10);
        }

         $niches = Niche::where('user_id', $user_id)->orderBy('id','asc')->get();
        // return view('livewire.store-search', compact('stores','niches'));
        return view('livewire.store-search', [
            "stores" => $stores,
            "niches"=> $niches
        ]);

    }

    public function updated($property)
    {
        if ($property === 'search') {
            $this->resetPage();
        }
    }


    public function draft(){
                // if($this->filtrePagination != ""){
        // $stores = $stores->withSum('products', 'totalsales')
        //     ->withSum('products', 'revenue')
        //     ->orderBy('products_sum_revenue','desc')
        //     ->paginate($this->filtrePagination);
        // }else{
        //     $stores = $stores->withSum('products', 'totalsales')
        //     ->withSum('products', 'revenue')
        //     ->orderBy('products_sum_revenue','desc')
        //     ->paginate(10);
        // }

    }

}
