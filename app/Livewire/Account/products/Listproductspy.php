<?php

namespace App\Livewire\Account\Products;

use Livewire\Component;

class Listproductspy extends Component
{
    public function placeholder()
    {
        return view('skeleton');
    }
    public function render()
    {
        return view('livewire.account.products.listproductspy');
    }
}
