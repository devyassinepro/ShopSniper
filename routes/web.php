<?php

use App\Models\Plan;
use GuzzleHttp\Middleware;
use Laravel\Cashier\Cashier;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\MaintenanceMode;
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
use App\Http\Controllers\Account\StoresController as AccountStoresController;
use App\Http\Controllers\Account\DashboardController as AccountDashboardController;
use JoelButcher\Socialstream\Http\Controllers\Inertia\PasswordController;
use App\Http\Controllers\Account\Subscriptions\SubscriptionCardController;
use App\Http\Controllers\Account\Subscriptions\SubscriptionSwapController;
use App\Http\Controllers\Account\Subscriptions\SubscriptionCancelController;
use App\Http\Controllers\Account\Subscriptions\SubscriptionCouponController;
use App\Http\Controllers\Account\Subscriptions\SubscriptionResumeController;
use App\Http\Controllers\Account\Subscriptions\SubscriptionInvoiceController;
use Carbon\Carbon;

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



    Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [AccountDashboardController::class, 'index'])->name('dashboard');

    Route::group(['prefix' => 'account', 'as' => 'account.', 'middleware' => ['auth:sanctum', 'verified']], function () {
        Route::view('security', 'account.security')->name('security');
        Route::view('password', 'account.password')->name('password');
        Route::view('social', 'profile.social')->name('social');
        Route::get('plan', function () {
            $team = Auth::user()->personalTeam();
            return view('account.plan', ['team' => $team]);
        })->name('plan');

        Route::resource('/product', AccountProductController::class);
        Route::resource('/stores', AccountStoresController::class);
        Route::resource('/niches', AccountNicheController::class);
        Route::get('/stores/storeproducts/{id}', [AccountStoresController::class, 'storeproducts'])->name('stores.storeproducts');

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

// less than 150 products update easy One Server 
// Route::get('/update-pro', function () {

//     $stores = DB::table('stores')->get();
//     collect($stores)->map(function ($store) {

//         try {
//             if($store->allproducts<=250 ){
                            
//                         $opts = array('http'=>array('header' => "User-Agent:MyAgent/1.0\r\n")); 
//                         $context = stream_context_create($opts);
//                         $html = file_get_contents($store->url.'products.json?page=1&limit=250',false,$context);
                        
//                         DB::table('apistatuses')->insert([
//                             "store" => $store->url,
//                             "status" => $http_response_header[0],
//                             'created_at' => Carbon::now()->format('Y-m-d'),
//                             'updated_at' => Carbon::now()->format('Y-m-d')
//                         ]);

//                         // echo $responsecode;
//                         $products = json_decode($html)->products;
//                         collect($products)->map(function ($product) {

//                             echo time().'<br />';
//                             $productbd = DB::table('products')->where('id', $product->id)->where('timesparam', '!=', strtotime($product->updated_at))->first();
//                             if($productbd) {
                    
//                                 $sales = $productbd->totalsales;
//                                 $revenuenow = $productbd->revenue + $productbd->prix;
//                                 $sales ++ ; 
//                                 //echo $sales;
//                                 $timestt = strtotime($product->updated_at); 
//                                 $productreq = array(
//                                     'title' => $productbd->title,
//                                     'timesparam' => $timestt,
//                                     'prix' => $productbd->prix,
//                                     'revenue' => $revenuenow,
//                                     'stores_id' => $productbd->stores_id,
//                                     'imageproduct' => $productbd->imageproduct,
//                                     'favoris' => $productbd->favoris,
//                                     'totalsales' => $sales,
//                                 );
                    
//                                 DB::table('products')->where('id', $productbd->id)->update($productreq);

//                                 DB::table('sales')->insert([
//                                     "product_id" => $productbd->id,
//                                     'created_at' => Carbon::now()->format('Y-m-d'),
//                                     'updated_at' => Carbon::now()->format('Y-m-d')
//                                 ]);
//                             }
//                         });

//             }else if($store->allproducts<=500){

//                 for ($i = 1; $i <= 2; $i++) {
     
//                     $opts = array('http'=>array('header' => "User-Agent:MyAgent/1.0\r\n")); 
//                     $context = stream_context_create($opts);
//                     $html = file_get_contents($store->url.'products.json?page='.$i.'&limit=250',false,$context);
                    
//                     DB::table('apistatuses')->insert([
//                         "store" => $store->url,
//                         "status" => $http_response_header[0],
//                         'created_at' => Carbon::now()->format('Y-m-d'),
//                         'updated_at' => Carbon::now()->format('Y-m-d')
//                     ]);

//                     // echo $responsecode;
//                     $products = json_decode($html)->products;
//                     collect($products)->map(function ($product) {

//                         echo time().'<br />';
//                         $productbd = DB::table('products')->where('id', $product->id)->where('timesparam', '!=', strtotime($product->updated_at))->first();
//                         if($productbd) {
                
//                             $sales = $productbd->totalsales;
//                             $revenuenow = $productbd->revenue + $productbd->prix;
//                             $sales ++ ; 
//                             //echo $sales;
//                             $timestt = strtotime($product->updated_at); 
//                             $productreq = array(
//                                 'title' => $productbd->title,
//                                 'timesparam' => $timestt,
//                                 'prix' => $productbd->prix,
//                                 'revenue' => $revenuenow,
//                                 'stores_id' => $productbd->stores_id,
//                                 'imageproduct' => $productbd->imageproduct,
//                                 'favoris' => $productbd->favoris,
//                                 'totalsales' => $sales,
//                             );
                
//                             DB::table('products')->where('id', $productbd->id)->update($productreq);

//                             DB::table('sales')->insert([
//                                 "product_id" => $productbd->id,
//                                 'created_at' => Carbon::now()->format('Y-m-d'),
//                                 'updated_at' => Carbon::now()->format('Y-m-d')
//                             ]);
//                         }
//                     });

//                 }
//             }else if($store->allproducts<=750){
//                 for ($i = 1; $i <= 3; $i++) {

//                     $opts = array('http'=>array('header' => "User-Agent:MyAgent/1.0\r\n")); 
//                     $context = stream_context_create($opts);
//                     $html = file_get_contents($store->url.'products.json?page='.$i.'&limit=250',false,$context);
                    
//                     DB::table('apistatuses')->insert([
//                         "store" => $store->url,
//                         "status" => $http_response_header[0],
//                         'created_at' => Carbon::now()->format('Y-m-d'),
//                         'updated_at' => Carbon::now()->format('Y-m-d')
//                     ]);

//                     // echo $responsecode;
//                     $products = json_decode($html)->products;
//                     collect($products)->map(function ($product) {

//                         echo time().'<br />';
//                         $productbd = DB::table('products')->where('id', $product->id)->where('timesparam', '!=', strtotime($product->updated_at))->first();
//                         if($productbd) {
                
//                             $sales = $productbd->totalsales;
//                             $revenuenow = $productbd->revenue + $productbd->prix;
//                             $sales ++ ; 
//                             //echo $sales;
//                             $timestt = strtotime($product->updated_at); 
//                             $productreq = array(
//                                 'title' => $productbd->title,
//                                 'timesparam' => $timestt,
//                                 'prix' => $productbd->prix,
//                                 'revenue' => $revenuenow,
//                                 'stores_id' => $productbd->stores_id,
//                                 'imageproduct' => $productbd->imageproduct,
//                                 'favoris' => $productbd->favoris,
//                                 'totalsales' => $sales,
//                             );
                
//                             DB::table('products')->where('id', $productbd->id)->update($productreq);

//                             DB::table('sales')->insert([
//                                 "product_id" => $productbd->id,
//                                 "stores_id" => $productbd->stores_id,
//                                 "prix" => $productbd->prix,
//                                 'created_at' => Carbon::now()->format('Y-m-d'),
//                                 'updated_at' => Carbon::now()->format('Y-m-d')
//                             ]);
//                         }
//                     });

//                 }
//             }

//             else if($store->allproducts<=1000){
//                 for ($i = 1; $i <= 4; $i++) {
//                     $opts = array('http'=>array('header' => "User-Agent:MyAgent/1.0\r\n")); 
//                     $context = stream_context_create($opts);
//                     $html = file_get_contents($store->url.'products.json?page='.$i.'&limit=250',false,$context);
                    
//                     DB::table('apistatuses')->insert([
//                         "store" => $store->url,
//                         "status" => $http_response_header[0],
//                         'created_at' => Carbon::now()->format('Y-m-d'),
//                         'updated_at' => Carbon::now()->format('Y-m-d')
//                     ]);

//                     // echo $responsecode;
//                     $products = json_decode($html)->products;
//                     collect($products)->map(function ($product) {

//                         echo time().'<br />';
//                         $productbd = DB::table('products')->where('id', $product->id)->where('timesparam', '!=', strtotime($product->updated_at))->first();
//                         if($productbd) {
                
//                             $sales = $productbd->totalsales;
//                             $revenuenow = $productbd->revenue + $productbd->prix;
//                             $sales ++ ; 
//                             //echo $sales;
//                             $timestt = strtotime($product->updated_at); 
//                             $productreq = array(
//                                 'title' => $productbd->title,
//                                 'timesparam' => $timestt,
//                                 'prix' => $productbd->prix,
//                                 'revenue' => $revenuenow,
//                                 'stores_id' => $productbd->stores_id,
//                                 'imageproduct' => $productbd->imageproduct,
//                                 'favoris' => $productbd->favoris,
//                                 'totalsales' => $sales,
//                             );
                
//                             DB::table('products')->where('id', $productbd->id)->update($productreq);

//                             DB::table('sales')->insert([
//                                 "product_id" => $productbd->id,
//                                 'created_at' => Carbon::now()->format('Y-m-d'),
//                                 'updated_at' => Carbon::now()->format('Y-m-d')
//                             ]);
//                         }
//                     });

//                 }
//             }

//           //  sleep(1);//sleep 1 second
//         } catch(\Exception $exception) {

//             echo "Error:".$exception->getMessage().'<br />';
//         }
//     });
// });



// less than 150 products update easy One Server 
Route::get('/update-pro', function () {

    // $stores = DB::table('stores')->get();
    $stores = DB::table('stores')->where('status', '1')->get();

    collect($stores)->map(function ($store) {

        try {
            if($store->allproducts<=250 ){
                            
                updatesales($store->url, 1);

            }else if($store->allproducts<=500){

                for ($i = 1; $i <= 2; $i++) {
     
                    updatesales($store->url , $i);
                }
            }else if($store->allproducts<=750){
                for ($i = 1; $i <= 3; $i++) {
                    updatesales($store->url , $i);
                }
            }

            else if($store->allproducts<=1000){
                for ($i = 1; $i <= 4; $i++) {
                    updatesales($store->url , $i);
                }
            }

          //  sleep(1);//sleep 1 second
        } catch(\Exception $exception) {

            echo "Error:".$exception->getMessage().'<br />';
        }
    });
});
// more than 150 Stores
Route::get('/postnoeud',function (){
    //all DNS
    $dnsall = DB::table('dns')->get();      
    $storeslength = DB::table('stores')->count();
    $offset = 0;
    foreach($dnsall as $dns){

        $stores = Stores::select("*")
            ->offset($offset)
            ->limit(100)
            ->get();
            echo $dns->url.'/api/data'; echo '<br />';
            echo $stores; echo '<br />';
            Http::post($dns->url.'/api/data', [
                'stores' => $stores
            ]);
        $offset +=100;

    }
 
});


function updatesales ($store , $i){
         
    $opts = array('http'=>array('header' => "User-Agent:MyAgent/1.0\r\n")); 
    $context = stream_context_create($opts);
    $html = file_get_contents($store.'products.json?page='.$i.'&limit=250',false,$context);
    
    DB::table('apistatuses')->insert([
        "store" => $store,
        "status" => $http_response_header[0],
        'created_at' => Carbon::now()->format('Y-m-d'),
        'updated_at' => Carbon::now()->format('Y-m-d')
    ]);

    // echo $responsecode;
    $products = json_decode($html)->products;
    collect($products)->map(function ($product) {

        echo time().'<br />';
        $productbd = DB::table('products')->where('id', $product->id)->where('timesparam', '!=', strtotime($product->updated_at))->first();
        if($productbd) {

            $sales = $productbd->totalsales;
            $revenuenow = $productbd->revenue + $productbd->prix;
            $sales ++ ; 
            //echo $sales;
            $timestt = strtotime($product->updated_at); 
            $productreq = array(
                'title' => $productbd->title,
                'timesparam' => $timestt,
                'prix' => $productbd->prix,
                'revenue' => $revenuenow,
                'stores_id' => $productbd->stores_id,
                'imageproduct' => $productbd->imageproduct,
                'favoris' => $productbd->favoris,
                'totalsales' => $sales,
            );

            DB::table('products')->where('id', $productbd->id)->update($productreq);

            DB::table('sales')->insert([
                "product_id" => $productbd->id,
                "stores_id" => $productbd->stores_id,
                "prix" => $productbd->prix,
                'created_at' => Carbon::now()->format('Y-m-d'),
                'updated_at' => Carbon::now()->format('Y-m-d')
            ]);
        }
    });

}