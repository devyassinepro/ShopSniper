<?php

namespace App\Http\Controllers\Subscriptions;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Rules\ValidCoupon;
use Illuminate\Http\Request;
use Laravel\Cashier\Exceptions\PaymentActionRequired;

class SubscriptionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'not.subscribed']);
    }

    public function index(Request $request)
    {
        /**

         * @get('/subscriptions')
         * @name('subscriptions')
         * @middlewares(web, auth, not.subscribed)
         */
        return view('subscriptions.checkout', [
            'intent' => currentTeam()->createSetupIntent(),
        ]);
    }

    public function store(Request $request)
    {
        /**

         * @post('/subscriptions')
         * @name('subscriptions.store')
         * @middlewares(web, auth, not.subscribed)
         */
        $this->validate($request, [
            'token' => 'required',
            'coupon' => [
                'nullable',
                new ValidCoupon(),
            ],
            'plan' => 'required|exists:plans,slug',
        ]);

        $plan = Plan::where('slug', $request->get('plan', 'monthly'))
                ->first();

        try {
            currentTeam()->newSubscription('default', $plan->stripe_id)
                ->withCoupon($request->coupon)
                ->create($request->token);
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
