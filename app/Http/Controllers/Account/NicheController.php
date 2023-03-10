<?php

namespace App\Http\Controllers\Account;
use App\Http\Controllers\Controller;

use App\Models\Niche;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NicheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(check_user_type() != 'user')
        {
            redirect()->route('account.niches.index')->with('error','You can not access this page.');
        }

        $user_id = Auth::user()->id;

        $nicheall = Niche::where('user_id', $user_id)->orderBy('id','desc')->paginate(10);
        return view('account.niches.index', compact('nicheall'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('account.niches.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(check_user_type() != 'user')
        {
            redirect()->route('account.niches.index')->with('error','You can not access this page.');
        }

        $user_id = Auth::user()->id;

        $request->validate([
            'name' => 'required',
        ]);

        $nichesId = DB::table('niches')->insertGetId(
            ['name' => $request->name,
            'created_at' => now(),
            'updated_at' => now(),
            'user_id' => Auth::user()->id
             ]
        );

        return redirect()->route('account.niches.index')->with('success','Niche has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nichesall = Niche::find($id);
        $stores=$nichesall->stores()->withSum('products', 'totalsales')->withSum('products', 'revenue')
        ->orderBy('products_sum_revenue','desc')
        ->paginate(50);
        return view('account.stores.index', compact('stores'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $nichess = Niche::findorFail($id); //searching for object in database using ID
        if($nichess->delete()){ //deletes the object
            return redirect()->route('account.niches.index')->with('deleted successfully');

        }
    }
}
