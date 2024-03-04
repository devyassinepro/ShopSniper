<?php

namespace App\Livewire\Account\products;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Storeuser;
use App\Models\stores;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductExport;
// use App\Http\Livewire\ProductExport;


class ProductSearch extends Component
{    
    public function placeholder()
    {
        return view('skeleton');
    }
    public function render()
    {
        return view('livewire.account.products.product-search');
    }


}
