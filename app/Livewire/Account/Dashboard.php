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

class Dashboard extends Component
{

    public function placeholder()
    {
        return view('skeleton');
    }
    public function render()
    {


        // if not subscribed or not on trial redirect to choose plan 
        if (!(currentTeam()->Subscribed('default') || currentTeam()->onTrial())) {
            return redirect()->route('subscription.plans');
        }

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
            $products = Product::whereIn('stores_id', $totalstores)
            ->select('products.*', DB::raw('COALESCE(todaysales, 0) AS calculated_todaysales'))
            ->orderBy('calculated_todaysales', 'desc')
            ->take(5)->get();

        }
        $totalstores = count($totalstores);

        return view('livewire.account.dashboard', compact('products','totalproducts' , 'totalstores' , 'totalsales' , 'totalRevenue','storelimit'));
    }
}
