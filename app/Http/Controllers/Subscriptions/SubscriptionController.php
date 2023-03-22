<?php

namespace App\Http\Controllers\Subscriptions;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Rules\ValidCoupon;
use Illuminate\Http\Request;
use Laravel\Cashier\Exceptions\PaymentActionRequired;
use Laravel\Cashier\Cashier;
use Stripe\Coupon as StripeCoupon;
use Stripe\Exception\InvalidRequestException;

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
            'plan' => 'required|exists:plans,slug',
        ]);

        if(!$request->coupon == null){
            try {
                $coupon = StripeCoupon::retrieve($request->coupon, Cashier::stripeOptions());
    
                if (! $coupon->valid) {
                    redirect()->route('subscriptions')->with('error','Coupon is invalid.');

                    return false;
                }
            } catch (InvalidRequestException $e) {
                redirect()->route('subscriptions')->with('error','Coupon does not exist.');    
                return false;
            }
        }
        $plan = Plan::where('slug', $request->get('plan', 'monthly'))
                ->first();

        try {
            currentTeam()->newSubscription('default', $plan->stripe_id)
                ->withCoupon($request->coupon)
                ->trialDays(7)
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
