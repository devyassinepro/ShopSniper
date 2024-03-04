<?php

namespace App\Livewire\Account\trends;


use Livewire\Component;


class CurrentTrends extends Component
{

    public function placeholder()
    {
        return view('skeleton');
    }
       
    public function render()
    {
        return view('livewire.account.trends.current-trends');
    }

}
