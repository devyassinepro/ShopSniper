<?php

namespace App\Http\Controllers\Account\Subscriptions;
use Laravel\Cashier\Exceptions\PaymentActionRequired;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','subscribed']);
    }

    public function index(Request $request)
    {
        /**

         * @get('/account/subscriptions')
         * @name('account.subscriptions')
         * @middlewares(web, verified, auth)
         */
        return view('account.overview', [
            'subscription' => currentTeam()->presentSubscription(),
            'invoice' => currentTeam()->presentUpcomingInvoice(),
            'customer' => currentTeam()->presentCustomer(),

        ]);
    }

    public function updatetrial(Request $request)
    {
        try {   
            currentTeam()->skiptrialnow('default');
            redirect()->route('account.subscriptions');
        } catch (PaymentActionRequired $e) {
            return redirect()->route(
                'cashier.payment',
                [
                    $e->payment->id,
                    'redirect' => route('account.subscriptions'),
                ]
            );
        }
        return back();
    }
}
