<?php
use App\Http\Controllers\SslCommerzPaymentController;
use Illuminate\Support\Facades\Route;

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

/*   ========== category route ============*/

Route::resource('category', 'App\Http\Controllers\CategoryController')->middleware('auth:sanctum','verified');

/*   ========== Product route ============*/

Route::resource('product', 'App\Http\Controllers\ProductController')->middleware('auth:sanctum','verified');

/*   ========== brand route ============*/

Route::resource('brand', 'App\Http\Controllers\BrandController')->middleware('auth:sanctum','verified');

/*   ========== siteseating route ============*/


 

Route::get('/show-apparance', [

    'uses'   =>  'App\Http\Controllers\ApparenceController@apparancecareate',
    'as'     =>  'show-apparance',
    'middleware'     =>  ['auth:sanctum', 'verified']
]);

Route::post('/store-apparance', [

    'uses'   =>  'App\Http\Controllers\ApparenceController@apparance',
    'as'     =>  'store-apparance',
    'middleware'     =>  ['auth:sanctum', 'verified']
]);
/*   ========== siteseating route ============*/
Route::get('/dashboard', [

    'uses'   =>  'App\Http\Controllers\Manageorder@dashboard',
    'as'     =>  'dashboard',
    'middleware'     =>  ['auth:sanctum', 'verified']
]);


Route::get('/manageorder', [

    'uses'   =>  'App\Http\Controllers\Manageorder@manageorder',
    'as'     =>  'manageorder',
    'middleware'     =>  ['auth:sanctum', 'verified']
]);

Route::get('/delete-order/{id}', [

    'uses'   =>  'App\Http\Controllers\Manageorder@deleteorder',
    'as'     =>  'delete-order',
    'middleware'     =>  ['auth:sanctum', 'verified']
]);
Route::get('/view-order/{id}', [

    'uses'   =>  'App\Http\Controllers\Manageorder@vieworder',
    'as'     =>  'view-order',
    'middleware'     =>  ['auth:sanctum', 'verified']
]);

Route::get('/invoice/{id}', [

    'uses'   =>  'App\Http\Controllers\Manageorder@invoice',
    'as'     =>  'invoice',
    'middleware'     =>  ['auth:sanctum', 'verified']
]);

Route::get('/dwonlod-invoice/{id}', [

    'uses'   =>  'App\Http\Controllers\Manageorder@printinvoice',
    'as'     =>  'dwonlod-invoice',
    'middleware'     =>  ['auth:sanctum', 'verified']
]);

/* frontend route  */



Route::get('/', [

    'uses'   =>  'App\Http\Controllers\Fontendcontroller@index',
    'as'     =>  '/',
    
]);

/* search */

Route::get('/get-product', 'App\Http\Controllers\Fontendcontroller@searchproductget')->name('get.product');
Route::post('/search-product', [

    'uses'   =>  'App\Http\Controllers\Fontendcontroller@searchproduct',
    'as'     =>  'search-product',
    
]);



Route::get('/about-us', [

    'uses'   =>  'App\Http\Controllers\Fontendcontroller@about',
    'as'     =>  'about-us',
    
]);

Route::get('/privacy', [

    'uses'   =>  'App\Http\Controllers\Fontendcontroller@privacy',
    'as'     =>  'privacy',
    
]);

Route::get('/contact-us', [

    'uses'   =>  'App\Http\Controllers\Fontendcontroller@contact',
    'as'     =>  'contact',
    
]);


Route::get('/category-page/{slug}', [

    'uses'   =>  'App\Http\Controllers\Fontendcontroller@category',
    'as'     =>  'category-page',
    
]);
Route::get('/brand-page/{slug}', [

    'uses'   =>  'App\Http\Controllers\Fontendcontroller@brand',
    'as'     =>  'brand-page',
    
]);

Route::get('/product-details/{slug}', [

    'uses'   =>  'App\Http\Controllers\Fontendcontroller@details',
    'as'     =>  'product-details',
    
]);

Route::get('/accessories', [

    'uses'   =>  'App\Http\Controllers\Fontendcontroller@accessories',
    'as'     =>  'accessories',
    
]);
Route::get('/404', function () {
    return view('fontend.404');
})->name('404');


/*  ============ cardroute ========== */
/*  ============ cardroute ========== */
Route::post('/addcart', [

    'uses'   =>  'App\Http\Controllers\cardcontroller@addcart1',
    'as'     =>  'addcart',
    
]);

Route::get('/add-to-cart/{id}/{price}', [

    'uses'   =>  'App\Http\Controllers\cardcontroller@addcart',
    'as'     =>  'add-to-cart',
    
]);

Route::get('/show-cart', [

    'uses'   =>  'App\Http\Controllers\cardcontroller@show',
    'as'     =>  'show-cart',
   
]);

Route::get('/remove-cart/{rowId}', [

    'uses'   =>  'App\Http\Controllers\cardcontroller@remove',
    'as'     =>  'remove-cart',
   
]);


Route::post('/update', [

    'uses'   =>  'App\Http\Controllers\cardcontroller@update',
    'as'     =>  'update',
    
]);

/*  ============ cardroute end ========== */
/*  ============ cardroute end ========== */


// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END


/* --------- customar resistration login ----------- */

Route::post('/resistration', [

    'uses'   =>  'App\Http\Controllers\CustomarController@resistration',
    'as'     =>  'resistration',
    
]);

Route::get('/login-resistration', [

    'uses'   =>  'App\Http\Controllers\CustomarController@resistrationpage',
    'as'     =>  'login-resistration',
    
]);


Route::post('/update-pasward', [

    'uses'   =>  'App\Http\Controllers\CustomarController@update',
    'as'     =>  'update-pasward',
    
]);

Route::get('/Forgotten-pasward', [

    'uses'   =>  'App\Http\Controllers\CustomarController@Forgottenpasward',
    'as'     =>  'Forgotten-pasward',
    
]);

Route::post('/customar-login', [

    'uses'   =>  'App\Http\Controllers\CustomarController@logincustomar',
    'as'     =>  'logincustomar',
    
]);
Route::post('/customar-logout', [

    'uses'   =>  'App\Http\Controllers\CustomarController@logoutcustomar',
    'as'     =>  'customar-logout',
    
]);
Route::post('/billinginfo', [

    'uses'   =>  'App\Http\Controllers\CustomarController@billinginfo',
    'as'     =>  'billinginfo',
    
]);
Route::post('/shipinginfo', [

    'uses'   =>  'App\Http\Controllers\Ordercontroller@shipinginfo',
    'as'     =>  'shipinginfo',
    
]);
Route::post('/update-status', [

    'uses'   =>  'App\Http\Controllers\Ordercontroller@updatestatus',
    'as'     =>  'update-status',
    
]);
Route::get('/billing', [

    'uses'   =>  'App\Http\Controllers\Ordercontroller@billing',
    'as'     =>  'billing',
    
]);
Route::get('/checkout', [

    'uses'   =>  'App\Http\Controllers\Ordercontroller@checkout',
    'as'     =>  'checkout',
    
]);


/* --------- customar resistration login ----------- */
Route::get('/congratulation', [

    'uses'   =>  'App\Http\Controllers\Ordercontroller@congratulation',
    'as'     =>  'congratulation',
    
]);

/*   contuct massege */


Route::post('/store-massege', [

    'uses'   =>  'App\Http\Controllers\ContuctmassegController@storemassege',
    'as'     =>  'store-massege',
    
]);

Route::get('/delete-massege/{id}', [

    'uses'   =>  'App\Http\Controllers\ContuctmassegController@deletemassege',
    'as'     =>  'delete-massege',
    
]);

Route::get('/show-massege/{id}', [

    'uses'   =>  'App\Http\Controllers\ContuctmassegController@showmassege',
    'as'     =>  'show-massege',
    
]);
/*   contuct massege */
