<?php

namespace App\Livewire\Account\stores;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;
use App\Models\Storeuser;
use App\Models\stores;
use Illuminate\Support\Facades\Auth;
use App\Models\Niche;
use DB;
class StoreSearch extends Component
{

    use WithPagination;
    public $name;
    public $search = "";
    public $storeid = '';

    public $filtreCurrency = "", $filtreNiche = "", $filtrePagination = "", $filtreorderby = "";


    protected $paginationTheme = 'bootstrap';
    public $page = 1;


   
    public function trackstore($id)
    {
        $this->storeid = $id;
    }

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
            $stores = $stores->orderBy('revenue','desc');
        }

        if($this->page > 1){
            $stores = $stores->paginate(10, ['*'], 'page', $this->page);
        }else {
            $stores =  $stores->paginate(10);
        }


         $niches = Niche::where('user_id', $user_id)->orderBy('id','asc')->get();
        // return view('livewire.store-search', compact('stores','niches'));
        return view('livewire.account.stores.store-search', [
            "stores" => $stores,
            "niches"=> $niches
        ]);

    }


    public function gotoPage($page)
    {
        $this->page = $page; // Set the selected page
    }

    public function updated($property)
    {
        if ($property === 'search') {
            $this->resetPage();
        }
    }

    public function untrackstore(){


        $store = stores::findorFail($this->storeid); //searching for object in database using ID

        if(check_user_type() != 'user')
        {
            return redirect()->route('dashboard')->with('error','You can not access this page.');
        }

        $user_id = Auth::user()->id;
        $storeuser = Storeuser::where('user_id', $user_id)->where('store_id', $this->storeid)->count();
        if($storeuser > 0)
        {
            // if store added by admin
            if(empty($store->user_id))
            {
                Storeuser::where('user_id', $user_id)->where('store_id', $this->storeid)->delete();
                return redirect()->route('account.storesearch.index')->with('success','deleted successfully');
            }
            else
            {
                $store_added_by_total_users = Storeuser::where('store_id', $this->storeid)->count();
                if($store_added_by_total_users > 1)
                {

                    Storeuser::where('user_id', $user_id)->where('store_id', $this->storeid)->delete();
                    return redirect()->route('account.storesearch.index')->with('success','deleted successfully');

                }
                else
                {
                    Storeuser::where('user_id', $user_id)->where('store_id', $this->storeid)->delete();
                    DB::table('stores')->where('id', $this->storeid)->update(array('status' => 0));
                    return redirect()->route('account.storesearch.index')->with('success','deleted successfully');
                }
            }
        }
        else
        {
            return redirect()->route('account.storesearch.index')->with('error','Something went wrong');
        }

    }
}
