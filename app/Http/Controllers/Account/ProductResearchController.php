<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\Niche;
use App\Models\Nichestore;
use App\Models\stores;
use App\Models\Product;
use App\Models\Storeuser;
use Carbon\Carbon;
use DB;
use Illuminate\Contracts\Cache\Store;
use Ramsey\Uuid\Type\Integer;
use Illuminate\Support\Facades\Auth;


class ProductResearchController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        if(check_user_type() != 'user')
        {
            redirect()->route('dashboard')->with('error','You can not access this page.');
        }
         return view('account.productresearch.index');
    }

}
