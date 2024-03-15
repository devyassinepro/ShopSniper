<?php

use App\Models\Plan;
use GuzzleHttp\Middleware;
use Laravel\Cashier\Cashier;
use Illuminate\Support\Facades\Route;
use App\Livewire\MaintenanceMode;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Ticket\TicketsController;
use App\Http\Controllers\Account\AccountController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NicheController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\StoresController;
use App\Http\Controllers\Admin\DnsController;
use App\Http\Controllers\Team\TeamMemberController;
use App\Http\Controllers\Ticket\CommentsController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Subscriptions\PlanController;
use App\Http\Controllers\Admin\StripeBalanceController;
use App\Http\Controllers\Admin\DownloadBackupController;
use App\Http\Controllers\Admin\PlanController as StripePlan;
use JoelButcher\Socialstream\Http\Controllers\OAuthController;
use App\Http\Controllers\Account\Subscriptions\SubscriptionController;
use App\Http\Controllers\Account\NicheController as AccountNicheController;
use App\Http\Controllers\Account\ProductController as AccountProductController;
use App\Http\Controllers\Account\TutoController as AccountTutoController;
use App\Http\Controllers\Account\TopstoresController as AccountopstoresController;
use App\Http\Controllers\Account\StoresController as AccountStoresController;
use App\Http\Controllers\Account\ProductResearchController as AccountResearchController;
use App\Http\Controllers\Account\TrendsController as AccountTrendsController;
use App\Http\Controllers\Account\DashboardController as AccountDashboardController;
use JoelButcher\Socialstream\Http\Controllers\Inertia\PasswordController;
use App\Http\Controllers\Account\Subscriptions\SubscriptionCardController;
use App\Http\Controllers\Account\Subscriptions\SubscriptionSwapController;
use App\Http\Controllers\Account\Subscriptions\SubscriptionCancelController;
use App\Http\Controllers\Account\Subscriptions\SubscriptionCouponController;
use App\Http\Controllers\Account\Subscriptions\SubscriptionResumeController;
use App\Http\Controllers\Account\Subscriptions\SubscriptionInvoiceController;
use Carbon\Carbon;
use App\Livewire\Account\research\ProductResearch;
use App\Livewire\Account\trends\CurrentTrends;
use App\Livewire\Account\products\ProductSearch;
use App\Livewire\Account\stores\StoreSearch;
use App\Livewire\Account\Dashboard;
use App\Livewire\Account\Niches\Niches;
use App\Livewire\Account\Niches\NicheAdd;
use App\Livewire\Account\stores\AddStore;
use App\Livewire\Account\stores\ShowStore;
use App\Livewire\Account\stores\ListStore;
use App\Livewire\Account\products\ShowProduct;
use App\Livewire\Account\trends\ShowTrends;
use App\Livewire\Account\research\ShowResearch;
use App\Livewire\Account\Tuto\Tuto;
use App\Livewire\Account\research\ListProductResearch;
use App\Livewire\Account\trends\Compcurrenttrends;
use App\Livewire\Account\research\Listproducts;
use App\Livewire\Account\products\ListProductSearch;
use App\Livewire\Account\stores\Homestores;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('resetdb', function () {
    // php artisan migrate:refresh --seed
    \Artisan::call('migrate:refresh --seed');
    dd("Data base has been reset");
});


Route::fallback(function() {
        return view('welcome');
 });

Route::group(['middleware' => 'language'], function () {
    Route::get('oauth/{provider}', [OAuthController::class, 'redirectToProvider'])->name('oauth.redirect');
    Route::get('auth/{provider}/callback',[OAuthController::class, 'handleProviderCallback'])->name('oauth.callback');
   
    Route::get('/', function () {
        return view('welcome');
    })->name('home');

    Route::get('/contact', function () {
        return view('pages.contact');
    })->name('contact');

    Route::get('/privacypolicy', function () {
        return view('pages.privacypolicy');
    })->name('privacypolicy');

    Route::get('/RefundPolicy', function () {
        return view('pages.RefundPolicy');
    })->name('RefundPolicy');

    Route::get('/TermsandConditions', function () {
        return view('pages.TermsandConditions');
    })->name('TermsandConditions');

// redirect link
    Route::get('/shopify', function () {
        return redirect('https://shopify.pxf.io/MmW3NY');
    });

    Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
        return view('dashboard');})->name('dashboard');

    Route::group(['prefix' => '', 'as' => 'account.', 'middleware' => ['auth:sanctum', 'verified']], function () {
       
        Route::view('security', 'account.security')->name('security');
        Route::view('password', 'account.password')->name('password');
        Route::view('social', 'profile.social')->name('social');
        Route::get('plan', function () {
            $team = Auth::user()->personalTeam();
            return view('account.plan', ['team' => $team]);
        })->name('plan');


        // controllers
        Route::resource('/product', AccountProductController::class);
        Route::resource('/stores', AccountStoresController::class);
        Route::resource('/niches', AccountNicheController::class);
        Route::resource('/tuto', AccountTutoController::class);
        Route::resource('/topstores', AccountopstoresController::class);
        Route::resource('/researchproduct', AccountResearchController::class);
        Route::resource('/trends', AccountTrendsController::class);

        // Livewires 3
        Route::get('/Dashboard', Dashboard::class)->name('Dashboard.index');
        //
        Route::get('/StoresTracker', Homestores::class)->name('storesearch.index');
        Route::get('/skeletonpStores', StoreSearch::class)->name('skeletonpstore.index');

        Route::get('/Add-Store', AddStore::class)->name('AddStore.index');
        Route::get('/liststore/{id}', ListStore::class)->name('liststore.show');
        Route::get('/showstore/{id}', ShowStore::class)->name('storedata.show');
        //
        Route::get('/ProductsTracker', ProductSearch::class)->name('productsearch.index');
        Route::get('/showproduct/{id}', ShowProduct::class)->name('productdata.show');
        Route::get('/skeletonproducts', ListProductSearch::class)->name('skeletondirect.index');

        //
        Route::get('/Niches', Niches::class)->name('nichesaffiche.index');
        Route::get('/Add-Niches', NicheAdd::class)->name('AddNiches.index');
        //
        Route::get('/Trending', CurrentTrends::class)->name('currenttrends.index');
        Route::get('/trendshow/{id}', ShowTrends::class)->name('trenddata.show');
        Route::get('/skeletontrends', Compcurrenttrends::class)->name('skeletonrends.index');

        //
        Route::get('/Research', ProductResearch::class)->name('researchproduct.index');
        Route::get('/skeletonResearch', Listproducts::class)->name('researchdirect.index');
        Route::get('/researchshow/{id}', ShowResearch::class)->name('researchdata.show');

        //
        Route::get('/Tutorial', Tuto::class)->name('tutorial.index');


        // Route::get('proresearch', ProductResearch::class)->name('proresearch');

        // export product in csv
        // Route::get('/product/importproduct/{url}', [AccountProductController::class, 'importproduct'])->name('product.importproduct');

        // Route::get('/stores/importstore/{url}', [AccountStoresController::class, 'importstore'])->name('stores.importstore');


        // track store from product research

        Route::post('/stores/trackstore/{id}', [AccountStoresController::class, 'trackstore'])->name('stores.trackstore');

        // Route::get('/stores/storeproducts/{id}', [AccountStoresController::class, 'storeproducts'])->name('stores.storeproducts');

    });

    Route::group(['namespace' => 'Subscriptions', 'middleware' => 'auth'], function () {
        Route::get('plans', [PlanController::class, 'index'])->name('subscription.plans')->middleware('not.subscribed');
        Route::get('/subscriptions', ['App\Http\Controllers\Subscriptions\SubscriptionController', 'index'])->name('subscriptions');
        Route::post('/subscriptions', ['App\Http\Controllers\Subscriptions\SubscriptionController', 'store'])->name('subscriptions.store');

    });


    Route::get('/test', function () {
        $beautymail = app()->make(Snowfire\Beautymail\Beautymail::class);
        $beautymail->send('emails.welcome', [], function ($message) {
            $message
                ->from('info@fastmesaj.com')
                ->to('dukenst2006@gmail.com', 'John Smith')
                ->subject('Welcome!');
        });
    });

    // Route::get('accept/{token}', [TeamMemberController::class, 'acceptInvite'])->name('teams.accept_invite');

    Route::group(['middleware' => 'verified', 'namespace' => 'Account', 'prefix' => 'account'], function () {
        Route::get('/', [AccountController::class, 'index'])->name('account');
        Route::get('/preference', [AccountController::class, 'preference'])->name('account.preference');
        Route::get('/activity', [AccountController::class, 'activity'])->name('account.activity');

        Route::group(['namespace' => 'Subscriptions',['middleware' => 'subscribed'], 'prefix' => 'subscriptions'], function () {
            Route::get('/', [SubscriptionController::class, 'index'])->name('account.subscriptions');
            Route::get('/endtrial', [SubscriptionController::class, 'updatetrial'])->name('account.subscriptions.updatetrial');

            Route::get('/cancel', [SubscriptionCancelController::class, 'index'])->name('account.subscriptions.cancel');
            Route::post('/cancel', [SubscriptionCancelController::class, 'store']);

            Route::get('/resume', [SubscriptionResumeController::class, 'index'])->name('account.subscriptions.resume');
            Route::post('/resume', [SubscriptionResumeController::class, 'store']);

            Route::get('/swap', [SubscriptionSwapController::class, 'index'])->name('account.subscriptions.swap');
            Route::post('/swap', [SubscriptionSwapController::class, 'store']);

            Route::get('/card', [SubscriptionCardController::class, 'index'])->name('account.subscriptions.card');
            Route::post('/card', [SubscriptionCardController::class, 'store']);
            Route::post('/newcard', [SubscriptionCardController::class, 'newPaymentMethod'])->name('account.subscriptions.newcard');

            Route::get('/coupon', [SubscriptionCouponController::class, 'index'])->name('account.subscriptions.coupon');
            Route::post('/coupon', [SubscriptionCouponController::class, 'store']);

            Route::get('/invoices', [SubscriptionInvoiceController::class, 'index'])->name('account.subscriptions.invoices');
            Route::get('/invoices/{id}', [SubscriptionInvoiceController::class, 'show'])->name('account.subscriptions.invoice');
            // Route::get('/subscriptions/trial', ['App\Http\Controllers\Subscriptions\SubscriptionController', 'updatetrial'])->name('subscriptions.updatetrial');

        });
    });
    Route::group(['middleware' => ['auth:sanctum', 'verified'], 'prefix' => 'account', 'as' => 'ticket.'], function () {
        /* Ticket Routes */
        Route::get('new-ticket', [TicketsController::class, 'create'])->name('create');

        Route::post('new-ticket', [TicketsController::class, 'store']);

        Route::get('my_tickets', [TicketsController::class, 'userTickets'])->name('index');

        Route::get('tickets/{ticket_id}', [TicketsController::class, 'show'])->name('show');

        Route::post('comment', [CommentsController::class, 'postComment'])->name('comment');
        Route::post('close_ticket', [TicketsController::class, 'close_by_user'])->name('close_by_user');
    });

    Route::impersonate();

    Route::group(['prefix' => 'adminwennify23', 'as' => 'admin.', 'middleware' => ['auth:sanctum', 'role:admin']], function () {
        Route::get('/', [DashboardController::class, 'index'])->name('index');
        Route::resource('/users', UserController::class);
        Route::get('activity', [UserController::class, 'activity'])->name('activity');

        Route::resource('/permissions', PermissionController::class);

        Route::resource('/roles', RoleController::class);

        /* Plans Resource Routes */
        Route::resource('/plans', StripePlan::class);
        Route::resource('/coupons', CouponController::class);

        // Admin Ticket system
        Route::get('tickets', [TicketsController::class, 'index'])->name('tickets');

        Route::post('close_ticket/{ticket_id}', [TicketsController::class, 'close']);
        Route::get('tickets/{ticket_id}', [TicketsController::class, 'adminshow']);

        Route::view('backups', 'admin.backup.index')->name('backup.index');
        Route::get('download-backup', DownloadBackupController::class);
        Route::get('maintenance', MaintenanceMode::class)->name('maintenance');
        Route::get('subscriptions-cancel', ['App\Http\Controllers\Admin\SubscriptionController', 'cancelSubscription'])->name('subscription.cancel');
        Route::get('subscriptions', ['App\Http\Controllers\Admin\SubscriptionController', 'subscription'])->name('subscriptions');

        Route::get('/stripe/charges', [StripeBalanceController::class , 'index']);
        Route::get('/stripe/charges/{id}', [StripeBalanceController::class , 'show']);
        Route::get('/stripe/balance', [StripeBalanceController::class , 'index']);

        Route::view('notifications', 'admin.notifications')->name('notifications');

        Route::resource('/product', ProductController::class);
        Route::resource('/stores', StoresController::class);
        Route::resource('/dns', DnsController::class);
        Route::resource('/niches', NicheController::class);
        Route::get('/stores/storeproducts/{id}', [StoresController::class, 'storeproducts'])->name('stores.storeproducts');

    });

});


//export storesXcel
// Route::get('/exportstores', function () {
//     return Excel::download(new StoresExport, 'stores.xlsx');

// });
