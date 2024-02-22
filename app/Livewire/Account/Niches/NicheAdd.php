<?php

namespace App\Livewire\Account\Niches;

use Livewire\Component;
use App\Models\Niche;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NicheAdd extends Component
{

    public $name = '';

    public function render()
    {

        if(check_user_type() != 'user')
        {
            redirect()->route('livewire.account.AddNiches.index')->with('error','You can not access this page.');
        }

        return view('livewire.account.niches.niche-add');

    }


    //add store function

    public function save()
    {
        $validated = $this->validate([ 
            'name' => 'required',
        ]);

        $nichesId = DB::table('niches')->insertGetId(
            ['name' => $this->name,
            'created_at' => now(),
            'updated_at' => now(),
            'user_id' => Auth::user()->id
             ]
        );
        return redirect()->to('/Niches')->with('success','Niche has been created successfully.');

    }

}
