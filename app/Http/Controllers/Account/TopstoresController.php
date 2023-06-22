<?php

namespace App\Http\Controllers\Account;
use App\Http\Controllers\Controller;
use App\Models\stores;
use App\Models\Storeuser;
use App\Models\Niche;
use App\Models\Nichestore;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TopstoresController extends Controller
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
            redirect()->route('account.tuto.index')->with('error','You can not access this page.');
        }
        $stores = stores::orderBy('revenue','desc')
        ->with('products');
        $stores = $stores->take(50)->get();
        return view('account.topstores.index', compact('stores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        if(check_user_type() != 'user')
        {
            return redirect()->route('dashboard')->with('error','You can not access this page.');
        }

        $user_id = Auth::user()->id;
        $storeuser = Storeuser::where('user_id', $user_id)->count();

        if(check_store_limit() <= $storeuser)
        {
            return redirect()->route('subscription.plans');
        }
         $storedata = DB::table('stores')->where('id', $id)->first();
         $stores = stores::where('url', $storedata->url)->first();

            if($stores)
            {
                $storeuser = Storeuser::where('user_id', $user_id)->where('store_id', $stores->id)->count();
                if($storeuser > 0)
                {
                    redirect()->route('account.stores.create');
                }
                else
                {
                    Storeuser::create([
                        "store_id" => $stores->id,
                        "user_id" => $user_id,
                        "created_at" => now(),
                        "updated_at" => now()
                    ]);
                }

            }
            return redirect()->route('account.stores.index');


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

    }
}
