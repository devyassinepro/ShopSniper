<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Models\UserLoginActivity;
use App\Http\Controllers\Controller;
use Browser;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(Request $request)
    {
        /**

         * @get('/account')
         * @name('account')
         * @middlewares(web, verified, auth)
         */
        return view('account.index');
    }

    public function preference()
    {
        /**

         * @get('/account/preference')
         * @name('account.preference')
         * @middlewares(web, verified, auth)
         */
        return view('account.preference');
    }

    public function activity()
    {
        $loginActivities = UserLoginActivity::whereUserId(auth()->user()->id)->first();//latest()->paginate(10)
        
        return view('account.activity', compact('loginActivities'));
    }
}
