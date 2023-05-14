<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;
use App\Models\Storeuser;
use App\Models\stores;
use Illuminate\Support\Facades\Auth;

class StoreSearch extends Component
{

    use WithPagination;
    public $name;
    public $price;
    public $selectedProductId;
    public $search = "";
    public $filter = '';
  
    protected $paginationTheme = 'bootstrap';

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
        $stores = $stores->withSum('products', 'totalsales')
            ->withSum('products', 'revenue')
            ->orderBy('products_sum_revenue','desc')
            ->paginate(10);
        return view('livewire.store-search',compact('stores'));
    }

    public function updated($property)
    {
        if ($property === 'search') {
            $this->resetPage();
        }
    }

}
