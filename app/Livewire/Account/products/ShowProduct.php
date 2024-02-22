<?php

namespace App\Livewire\Account\Products;

use Livewire\Component;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ShowProduct extends Component
{

    public $productId;

    public function mount($id)
    {
        $this->productId = $id;
    }
    public function render()
    {

        if(check_user_type() != 'user')
        {
            redirect()->route('dashboard')->with('error','You can not access this page.');
        }

    $dates = [];
    for ($i = 6; $i >= 0; $i--) {
        $dates[] = Carbon::now()->subDays($i)->format('Y-m-d');
    }
    $totalsalesmin = 0;
    $pagination = 50;

   $products = Product::orderBy('revenue','desc')
   ->where('id', $this->productId);


   $products = $products->get();

    return view('livewire.account.products.show-product', compact('products','dates'));

    }
}
