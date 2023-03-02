<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Dns;
use Illuminate\Http\Request;
use DB;


class DnsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $dnsall = Dns::orderBy('id','desc')->paginate(25);
        return view('admin.dns.index', compact('dnsall'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.dns.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $request->validate([
            'url' => 'required',
        ]);

        $productId = DB::table('dns')->insertGetId(
            ['url' => $request->url,
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now()
             ]
        );

        return redirect()->route('admin.dns.index')->with('success','Company has been created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dns  $dns
     * @return \Illuminate\Http\Response
     */
    public function show(Dns $dns)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dns  $dns
     * @return \Illuminate\Http\Response
     */
    public function edit(Dns $dns)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dns  $dns
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dns $dns)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dns  $dns
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Dnss = Dns::findorFail($id); //searching for object in database using ID
        if($Dnss->delete()){ //deletes the object
            return redirect()->route('admin.dns.index')->with('deleted successfully');

        }

    }
}
