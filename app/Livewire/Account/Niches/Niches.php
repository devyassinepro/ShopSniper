<?php

namespace App\Livewire\Account\Niches;

use Livewire\Component;
use App\Models\Niche;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Niches extends Component
{
    public $deleteId = '';

    public function render()
    {

        if(check_user_type() != 'user')
        {
            redirect()->route('livewire.account.niches.index')->with('error','You can not access this page.');
        }

        $user_id = Auth::user()->id;
        

        $nicheall = Niche::where('user_id', $user_id)->orderBy('id','desc')->get();

        if ($nicheall->isEmpty()) {

            DB::table('niches')->insert([
                "name" => 'All',
                "user_id" => $user_id,
            ]);

        }
        return view('livewire.account.niches.niches', compact('nicheall'));
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function Remove($id)
    {
        $this->deleteId = $id;
    }
   
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function delete()
    {
     
        Niche::find($this->deleteId)->delete();
        session()->flash('message', 'Niche has been Deleted successfully.'); 
        return redirect()->to('/Niches');
    }

 

}
