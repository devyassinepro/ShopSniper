<?php

namespace App\Livewire\Account\Stores;

use Livewire\Component;
use App\Models\Product;
use Carbon\Carbon;
use DB;

class Top10products extends Component
{

    public $filtreorderby = '';
    public $storeId;
    public function updateOrderBy($orderBy)
    {
        $this->filtreorderby = $orderBy;
    }

    public function render()
    {
        $totalsalesmin = 0;
        $storedata = DB::table('stores')->where('id', $this->storeId)->get();
        // $pagination = 50;
        $products = Product::where('stores_id',$this->storeId)
                        ->where('totalsales', '>=', $totalsalesmin)
                        ->select('products.*', DB::raw('COALESCE(todaysales, 0) AS calculated_todaysales'), DB::raw('COALESCE(yesterdaysales, 0) AS calculated_yesterdaysales'));

        if ($this->filtreorderby != "") {

            if($this->filtreorderby == "todaysales") {
                $products = $products->orderBy('calculated_todaysales', 'desc')->take(10)->get();
            }

            if($this->filtreorderby == "yesterdaysales") {
                $products = $products->orderBy('calculated_yesterdaysales', 'desc')->take(10)->get();
            }

            if($this->filtreorderby == 'totalsales') {
                $products =$products->orderBy($this->filtreorderby,'desc')->take(10)->get();
            }

        } else {
            $products = $products->orderBy('totalsales', 'desc')->take(10)->get();
        }
        return view('livewire.account.stores.top10products', compact('products','storedata'));
    }
}
