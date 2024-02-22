<?php

namespace App\Livewire\Account\Stores;

use Livewire\Component;
use App\Models\stores;
use App\Models\Product;
use Carbon\Carbon;
use DB;

class ListStore extends Component
{

    public $storeId;

    public function mount($id)
    {
        $this->storeId = $id;
    }

    public function render()
    {

        if(check_user_type() != 'user')
        {
            return redirect()->route('dashboard')->with('error','You can not access this page.');
        }
        $storedata = DB::table('stores')->where('id', $this->storeId)->get();

        $totalsalesmin = 0;
         $pagination = 50;
        $products = Product::where('stores_id',$this->storeId)
                        ->where('totalsales', '>=', $totalsalesmin)
                        ->orderBy('totalsales','desc')->get();

    return view('livewire.account.stores.list-store', compact('products','storedata'))
    ->with('totalproducts',Product::where('stores_id',$this->storeId)->count());
    }
}
