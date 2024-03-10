<?php

namespace App\Livewire\Account\research;

use Livewire\Component;



class ProductResearch extends Component
{

    public function placeholder()
    {
        return view('skeleton');
    }

    public function render()
    {
           return view('livewire.account.research.product-research');
    }


}
