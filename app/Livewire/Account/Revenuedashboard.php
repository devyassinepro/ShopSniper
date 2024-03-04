<?php

namespace App\Livewire\Account;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Stripe;
use App\Models\stores;
use App\Models\Storeuser;
use App\Models\Product;
use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class Revenuedashboard extends Component
{

    public function placeholder()
    {
        return view('skeleton');
    }
    public function render()
    {


        $user_id = Auth::user()->id;
        $storelimit = check_store_limit();
        // get user's stores
        $totalstores = Storeuser::where('user_id', $user_id)->pluck('store_id');

        $totalproducts = 0;
        $totalsales = 0;
        $totalRevenue = 0;
        

        if($totalstores)
        {
            $totalproducts = Product::whereIn('stores_id', $totalstores)->count();
            $totalsales = Product::whereIn('stores_id', $totalstores)->sum('totalsales');
            $totalRevenue = Product::whereIn('stores_id', $totalstores)->sum('revenue');
           

        }
        $totalstores = count($totalstores);
        return view('livewire.account.revenuedashboard', compact('totalproducts' , 'totalstores' , 'totalsales' , 'totalRevenue','storelimit'));
    }
}
