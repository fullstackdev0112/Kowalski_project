<?php

use App\Facades\Customer;
use Illuminate\Support\Facades\Route;

/**
 * Frontend routes
 */
Route::get('/locale/{p}',function($lang){
    session(['locale'=>$lang]);
    return redirect()->back();
})->name('lang');

Route::namespace('Front')->group(function () {

    Route::get('/', 'WelcomeController')->name('welcome');

    // Vue route will resume later(experimental)
    Route::view('/vue/{any}', 'front.layouts.vue')->where('any', '.*');

    Route::get('category', 'CatalogController@category')->name('category');

    Route::resource('search', 'SearchController')->only(['index','show']);

    Route::post('product/variants', 'CatalogController@getVariant')->name('product.variant');

    Route::get('checkout/cart', 'CartController@cart')->name('cart');
    Route::post('checkout/cart', 'CartController@addToCart')->name('add.to.cart');
    Route::get('checkout/mini-cart', 'CartController@miniCartInfo')->name('mini.cart.info');
    Route::get('checkout', 'CartController@checkout')->name('checkout');
    Route::get('checkout/success', 'CheckoutController@success')->name('checkout.success');

    Route::post('cart/remove-item', 'CartController@removeItem')->name('cart.remove.item');
    Route::post('cart/update-item', 'CartController@updateItem')->name('cart.update.item');

    Route::get('contact', 'CmsController@contact')->name('contact');
    Route::get('faq', 'CmsController@faq')->name('faq');
    Route::get('shipping-and-returns', 'CmsController@shippingReturns')->name('shipping-and-returns');
    Route::get('about-us', 'CmsController@aboutUs')->name('about.us');
    Route::get('career', 'CmsController@career')->name('career');
    Route::get('terms', 'CmsController@terms')->name('terms');
    Route::get('privacy-policy', 'CmsController@privacy')->name('privacy');
    Route::get('discount', 'CatalogController@discount')->name('discount');

    Route::resource('blog', 'BlogController')->only(['index','show']);


    /**
     * Customer routes
     */
    Route::namespace('Customer')->group(function () {

        Route::get('/customer/login', 'LoginController@index')->name('customer.login');
        Route::post('/customer/login', 'LoginController@login')->name('customer.login.post');
        Route::get('/customer/create', 'RegisterController@index')->name('customer.create');
        Route::post('/customer/create', 'RegisterController@createPost')->name('customer.create.post');
        Route::get('/customer/logout', 'LoginController@logout')->name('customer.logout');

        Route::get('/customer/forgotpassword', 'PasswordController@forgotPassword')->name('forgot.password');
        Route::post('/customer/forgotpasswordpost', 'PasswordController@forgotPasswordPost')->name('forgot.password.post');
        Route::get('/customer/{customer_id}/password/resetLinkToken/{token}', 'PasswordController@createPassword')->name('create.password');
        Route::post('/customer/createpasswordpost', 'PasswordController@createPasswordPost')->name('create.password.post');

        Route::middleware('customer')->group(function () {
            Route::get('/customer/dashboard', 'HomeController@index')->name('customer.dashboard');
            Route::get('/customer/wishlist', 'WishlistController@index')->name('customer.wishlist');
            Route::get('/customer/info', 'HomeController@info')->name('customer.info');
            Route::get('/customer/order', 'OrderController@index')->name('customer.order');
            Route::get('/customer/review', 'ReviewController@index')->name('customer.review');
        });

    });

});


/**
 * Backend Routes
 */
Route::prefix('adminportal')->namespace('Admin')->group(function () {

    Route::get('forgot-password', 'AuthController@forgotPassword')->name('admin.forgot.password');
    Route::get('login', 'AuthController@login')->name('admin.login');
    Route::post('login', 'AuthController@loginPost')->name('admin.login.post');
    Route::get('logout', 'AuthController@logout')->name('admin.logout');

    Route::middleware('backend.auth')->group(function () {

        Route::redirect('/', '/adminportal/dashboard');

        Route::get('dashboard', 'DashboardController')->name('admin.dashboard');

        Route::get('data', 'ProductController@data')->name('admin.product.data');
        Route::resource('product', 'ProductController', ['as' => 'admin']);

        Route::resource('media', 'MediaController', ['as' => 'admin']);

        Route::get('data', 'CategoryController@data')->name('admin.category.data');
        Route::resource('category', 'CategoryController', ['as' => 'admin']);

        Route::post('brand/media', 'BrandController@storeMedia')->name('admin.brand.media');
        Route::resource('brand', 'BrandController', ['as' => 'admin']);

        Route::resource('cms-page', 'CmsPageController', ['as' => 'admin']);

        Route::resource('cms-block', 'CmsBlockController', ['as' => 'admin']);

        Route::resource('customer/group', 'CustomerGroupController', ['as' => 'admin']);

        Route::resource('customer', 'CustomerController', ['as' => 'admin']);

        Route::resource('blog', 'BlogController', ['as' => 'admin']);

        Route::resource('vendor', 'VendorController', ['as' => 'admin']);

        Route::resource('vendor-product', 'VendorProductController', ['as' => 'admin']);

        Route::resource('vendor-order', 'VendorOrderController', ['as' => 'admin']);

        Route::resource('vendor-settlement', 'VendorSettlementController', ['as' => 'admin']);

        Route::resource('user', 'UserController', ['as' => 'admin']);

        Route::resource('role', 'RoleController', ['as' => 'admin']);

        Route::resource('permission', 'PermissionController', ['as' => 'admin']);

        Route::resource('catalog-price-rule', 'Marketing\CatalogPriceRuleController', ['as' => 'admin']);

        Route::resource('cart-price-rule', 'Marketing\CartPriceRuleController', ['as' => 'admin']);

        Route::resource('abandon-cart', 'Marketing\AbandonCartController', ['as' => 'admin']);

        Route::resource('email-template', 'Marketing\EmailTemplateController', ['as' => 'admin']);

        Route::resource('url-rewrite', 'Marketing\UrlRewriteController', ['as' => 'admin']);

        Route::resource('order', 'OrderController', ['as' => 'admin']);

        Route::resource('invoice', 'InvoiceController', ['as' => 'admin']);

        Route::resource('shipment', 'ShipmentController', ['as' => 'admin']);

        Route::resource('refund', 'RefundController', ['as' => 'admin']);

        Route::resource('export/export', 'ExportImport\ExportController', ['as' => 'admin']);

        Route::resource('import/import', 'ExportImport\ImportController', ['as' => 'admin']);

        Route::resource('configuration', 'ConfigurationController', ['as' => 'admin']);

    });

});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::get('/{url}/{suburl?}/{producturl?}', 'Front\UrlResolverController')->name('resolve');