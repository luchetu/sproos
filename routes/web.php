<?php

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


#humphrey
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('testing', 'CheckoutController@test');
#account routes
Route::get('/register', 'Auth\BuyerRegisterController@showRegistrationForm')->name('register');
Route::post('/register', 'Auth\BuyerRegisterController@register');
Route::get('/login', 'Auth\BuyerLoginController@showLoginForm')->name('login');
Route::get('/logout', 'Auth\BuyerLoginController@buyerLogout')->name('buyer.logout');
Route::post('/login', 'Auth\BuyerLoginController@login');
Route::get('/account-profile', 'HomeController@accountProfile')->middleware('auth:buyer')->name('account');
Route::get('/account-orders','HomeController@accountOrders')->middleware('auth:buyer')->name('orders');
Route::get('/account-address','HomeController@accountAddress')->middleware('auth:buyer');
Route::get('/faq','HomeController@faq')->name('faqs');
Route::get('/terms','HomeController@terms');
Route::get('/refund','HomeController@refund');
Route::get('/home', 'HomeController@index')->name('home');



Route::get('login/{provider}', 'SocialAuthController@auth')->where(['provider' => 'facebook|google|twitter']);
Route::get('login/{provider}/callback', 'SocialAuthController@login')->where(['provider' => 'facebook|google|twitter']);

#shop routes
Route::get('/shop-list','HomeController@shopList');
Route::get('/shop-grid','HomeController@shopGrid');
Route::get('/cart','CartController@cart');
Route::get('/categories', 'HomeController@allCategories');
Route::get('/types', 'HomeController@allTypes');
Route::get('/add-to-cart/{id}', 'HomeController@add_cart');
Route::get('/shop-add-to-cart/', 'CartController@shop_add_cart');
Route::get('/delete_cart/{id}', 'HomeController@destroy');
Route::get('/shop/{id}/category','HomeController@showCategory');
Route::get('/shop/{id}/type','HomeController@showType');

#checkout routes

Route::get('/checkout-address','CheckoutController@checkoutAddress')->middleware('auth:buyer');
Route::post('/checkout-sendy','CheckoutController@sendy')->middleware('auth:buyer');
Route::get('/checkout-shipping','CheckoutController@checkoutShipping')->middleware('auth:buyer');
Route::get('/checkout-askSendy','CheckoutController@askSendy')->middleware('auth:buyer');

//Route::get('/checkout-payment','CheckoutController@checkoutPayment')->middleware('auth:buyer');
Route::get('/checkout-complete','PaymentsController@checkoutComplete')->name('checkout-complete')->middleware('auth:buyer');
Route::get('/chelsea','CheckoutController@test');

Route::get('/checkout-payment','PaymentsController@payment')->name('checkout-payment')->middleware('auth:buyer');
Route::get('/checkout-final','CheckoutController@final')->name('final')->middleware('auth:buyer');

Route::get('/checkout-review','CheckoutController@checkoutReview')->name('checkout-review')->middleware('auth:buyer');
Route::get('/paymentconfirmation','PaymentsController@paymentconfirmation')->name('paymentconfirmation')->middleware('auth:buyer');
//paypal
   Route::get('/paypalconfirmation','paypalController@getCheckout')->name('getCheckout')->middleware('auth:buyer');
   
  Route::get('/getDone','paypalController@getDone');
  Route::get('/getCancel','paypalController@getCancel');



Route::get('/shop-single/{id}','HomeController@shopSingle');
Route::get('/shop-seller/{id}','HomeController@shopSeller');

#sitepages
Route::get('/about','HomeController@about');
Route::get('/terms','HomeController@terms');

#no available content
Route::get('/soon','HomeController@soon');

Route::get('sproos/admin', 'Admin\Auth\LoginController@showLoginForm');

#admin Routes
/* Routes to the admin page */
Route::group(['namespace' => 'Admin'],function(){
	Route::get('admin/home','HomeController@index')->name('admin');
	Route::resource('admin/users','UserController');
	// Roles Routes
	Route::resource('admin/roles','RoleController');
	// Permission Routes
	Route::resource('admin/permissions','PermissionController');
	// Products Routes
	#Route::resource('/products','ProductsController');
	// Invoices Routes
	Route::resource('admin/invoices','InvoicesController');
	// Orders Routes
	#Route::resource('admin/orders','OrdersController');
	// Category Routes
	Route::resource('admin/category','CategoryController');
    // Subcategory Routes
    Route::resource('admin/type','TypeController');
    // Subcategory Routes
	Route::resource('admin/subcategories','subcategoryController');
	//admin Auth request Routes
	Route::get('admin-login', 'Auth\LoginController@showLoginForm')->name('admin.login');
	Route::get('admin-logout', 'Auth\LoginController@logoutAdmin')->name('admin.logout');
	//admin Auth post Routes
	Route::post('admin-login', 'Auth\LoginController@login');

	Route::get('admin/sellers','AdminController@sellers');
	Route::get('admin/seller_products/{id}','AdminController@seller_products');
	Route::get('admin/customers','AdminController@customers');
	Route::get('admin/customers/{id}','AdminController@customerDetails');
	Route::get('admin/sellers/{id}','HomeController@sellerDetails');

	Route::get('admin/seller/{id}','HomeController@sellerDetails');

	Route::get('admin/home-page','AdminController@homePage')->name('homepage-manager');

	Route::get('admin/featured-products','AdminController@featuredProducts');
	
	Route::resource('admin/banner','BannerController');

	Route::get('admin/orders', 'OrdersController@showOrders')->name('admin.orders');
	Route::get('admin/order_details/{id}', 'OrdersController@showOrderDetails');

	Route::get('admin/reports', 'ReportsController@showReports')->name('admin.reports');
	Route::get('deactivate/{id}','AdminController@deactivate');
	Route::get('activate/{id}','AdminController@activate');
	Route::get('deactivate_user/{id}','AdminController@deactivate_user');
	Route::get('activate_user/{id}','AdminController@activate_user');
	Route::get('confirm_feature/{id}','AdminController@confirm');
	Route::get('cancel_feature/{id}','AdminController@cancel');

});



Route::post('/checkout', 'CheckoutController@store')->name('checkout');
Route::post('/shipping', 'CheckoutController@shipping')->name('shipping');


/** Seller routes**/ 
Route::group(['namespace' => 'Seller'],function(){
	Route::get('seller','SellerController@index')->name('seller');
	Route::get('seller-login', 'Auth\LoginController@showLoginForm')->name('seller.login');
	//admin Auth post Routes
	Route::post('seller-login', 'Auth\LoginController@login');
	Route::get('seller-logout', 'Auth\LoginController@logoutSeller')->name('seller.logout');
	Route::get('seller-register', 'Auth\SellerRegisterController@showRegistrationForm')->name('seller.register');
	Route::post('seller-register', 'Auth\SellerRegisterController@register');
	Route::get('seller-profile', 'SellerController@account')->name('seller.profile');
	Route::resource('products','ProductsController');
	Route::get('seller/seller-invoices','ProductsController@seller_invoices');
	Route::get('seller/seller-orders','ProductsController@seller_orders');
	Route::get('details/{id}','ProductsController@order_details');
	Route::get('apply_feature/{id}','ProductsController@apply_feature');

});

Route::any('/search','HomeController@search');

Route::get('login/{provider}', 'SocialAuthController@redirectToProvider')->where(['provider' => 'facebook|google|twitter']);

Route::get('login/{provider}/callback', 'SocialAuthController@handleProviderCallback')->where(['provider' => 'facebook|google|twitter']);


Route::get('/show', function()
{
	//$img = Image::canvas(600, 600, '#ff0000');
	
	//$exists = Storage::disk('uploads')->exists('banners/one.png');
	$img = Image::make('uploads/banners/banner.jpg');
	//$img->fit(600,360);
	//$img->fit(600);
	//$img->resize(600,null);
	//$img->fit(800,600, function($constraint){
	//	$constraint->upsize();
	//});

	$img->fit(400,null, function($constraint){
		$constraint->upsize();
	});
	
	
    return view('front.map');
});


Route::get('resizeImage','ImageController@resizeImage');
Route::post('resizeImagePost','ImageController@resizeImagePost')->name('resizeImagePost');

Route::post('/hi','HomeController@hi')->name('hi');

//Test Theme
Route::get('/theme', 'HomeController@theme');


#routes for soring
Route::post('/sort', 'HomeController@sort');
Route::get('/sort', function(){

	return redirect('/shop-grid');
});
Route::post('/sortList', 'HomeController@sortList');
Route::get('/sortList', function(){
	
		return redirect('/shop-list');
	});
Route::post('/sortSearch', 'HomeController@sortSearch');
Route::get('/sortSearch', function(){
	
		return redirect('/search');
	});
Route::get('test', 'emailController@index');

//send emails
Route::get('send', 'emailController@sendMail');

//send emails route
Route::get('contact','emailController@show_contact')->name('contact');
Route::post('contact_sproos', 'emailController@sproos')->name('contact_sproos');
Route::post('ask_sproos', 'emailController@ask')->name('ask_sproos');
Route::get('order_email', 'emailController@order')->name('orderEmail');


