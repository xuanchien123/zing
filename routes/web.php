<?php

Route::get('/',['as'=>'index','uses'=>'HomeController@index']);
Route::get('/danh-muc/{slug}',['as'=>'list_product','uses'=>'HomeController@list_product']);
Route::get('/san-pham/{slug}',['as'=>'product','uses'=>'HomeController@product']);
Route::get('/loai-tin/{slug}',['as'=>'list_news','uses'=>'HomeController@list_news']);
Route::get('/chi-tiet/{slug}',['as'=>'news','uses'=>'HomeController@news']);
Route::get('/gio-hang',['as'=>'cart','uses'=>'HomeController@cart']);
Route::get('/checkout', 'HomeController@checkout');
Route::get('/giaohang', 'HomeController@giaohang');
Route::get('/user',['as'=>'pay','uses'=>'HomeController@user']);
Route::get('/error_404',['as'=>'error_404','uses'=>'HomeController@error_404']);
Route::get('/ok', 'HomeController@ok');
Route::get('/register', 'HomeController@register');
Route::get('/login', 'HomeController@login');
Route::get('/logout', 'CustomerController@logout');
Route::get('/contact', 'HomeController@contact');
Route::get('/pay', 'HomeController@pay');
Route::get('/thanhtoan', 'HomeController@thanhtoan');
// loadmore
Route::get('loadmoremod', ['as' => 'loadmoremod', 'uses' => 'HomeController@loadmore_news_in_mod']);
Route::get('loadmorelist', ['as' => 'loadmorelist', 'uses' => 'HomeController@loadmore_news_in_list']);
// search  + tag 
Route::get('search', ['as' => 'search', 'uses' => 'HomeController@search']);
Route::get('tags/{tag}', ['as' => 'tags', 'uses' => 'HomeController@tags']);






//Social Login
//config redirect trong config/services.php
// http://localhost/longtrico/login/redirect/google
// http://localhost/longtrico/login/redirect/facebook
Route::get('/login_social/{provider?}/{page_return?}', 'CustomerController@login_social');
Route::get('/login/redirect/{provider?}', 'CustomerController@login_redirect');
Route::get('/login/callback/{provider?}', 'CustomerController@login_callback');
 

 
Route::get('addcart_ajax/{id}',['as'=>'addcart_ajax', 'uses'=>'HomeController@addcart_ajax']);
Route::get('updatecart_ajax',['as'=>'updatecart_ajax', 'uses'=>'HomeController@updatecart_ajax']);
Route::get('removecart/{id}',['as'=>'removecart', 'uses'=>'HomeController@removecart']);

Route::get('select_distict_ajax',['as'=>'select_distict_ajax', 'uses'=>'HomeController@select_distict_ajax']);
Route::get('select_ward_ajax',['as'=>'select_ward_ajax', 'uses'=>'HomeController@select_ward_ajax']);

Route::get('login_ajax',['as'=>'login_ajax', 'uses'=>'HomeController@login_ajax']);
Route::get('register_ajax',['as'=>'register_ajax', 'uses'=>'CustomerController@register_ajax']);
Route::get('store_address_shipping',['as'=>'store_address_shipping', 'uses'=>'HomeController@store_address_shipping']);
Route::get('store_address_pay',['as'=>'store_address_pay', 'uses'=>'HomeController@store_address_pay']);
Route::get('order_not_account',['as'=>'order_not_account', 'uses'=>'HomeController@order_not_account']);
Route::get('get_shipping_fee',['as'=>'get_shipping_fee', 'uses'=>'HomeController@get_shipping_fee']);
Route::get('check_payment_creaditcart',['as'=>'check_payment_creaditcart', 'uses'=>'HomeController@check_payment_creaditcart']);
Route::get('submit_order',['as'=>'submit_order', 'uses'=>'HomeController@submit_order']);
Route::get('save_custommer_info',['as'=>'save_custommer_info', 'uses'=>'CustomerController@save_custommer_info']);
Route::get('save_custommer_address',['as'=>'save_custommer_address', 'uses'=>'CustomerController@save_custommer_address']);
Route::get('save_custommer_pass',['as'=>'save_custommer_pass', 'uses'=>'CustomerController@save_custommer_pass']);
Route::get('save_contact',['as'=>'save_contact', 'uses'=>'HomeController@save_contact']);
Route::get('get_price_range',['as'=>'get_price_range', 'uses'=>'HomeController@get_price_range']);
Route::get('get_post_ajax',['as'=>'get_post_ajax', 'uses'=>'HomeController@get_post_ajax']);

// ==============*********************++++++++++++++++++++***********************

Route::get('mail', 'Controller@mail');
Route::get('setlocale/{locale}','Controller@Setlocale');

Route::get('auth/login','UserController@GetLoginAdmin');
Route::post('auth/login','UserController@PostLoginAdmin');

Route::group(['prefix'=>'admin','middleware'=>'controller'],function(){
    Route::get('/','OrderController@HomeAdmin');

    Route::group(['prefix'=>'auth'],function(){
        Route::get('logout','UserController@GetLogoutAdmin');
        Route::post('changepass','UserController@ChangePassAdmin');

    });
    Route::group(['prefix'=>'order'],function(){
        Route::get('list','OrderController@GetOrder');
        Route::post('add','OrderController@PostADOrder');
        Route::get('chart','OrderController@ChartOrder');
        // view ==================================
        Route::get('view/{id}','OrderController@ViewOrder');
        Route::get('print/{id}','OrderController@PrinterOrder');
        Route::post('changestt','OrderController@ChangesttOrder');
        Route::post('editadd','OrderController@EditAddOrder');
        Route::post('deladd','OrderController@DelAddOrder');
        // shipping ========================
        Route::get('shipping','OrderController@ListShipping');
        Route::post('shipping','OrderController@AddShipping');
        Route::post('shipping/edit','OrderController@EditShipping'); 
        Route::post('shipping/delete','OrderController@DeleteShipping');
        // payment =======================  
        Route::get('payment','OrderController@ListPayment');
        Route::post('payment','OrderController@AddPayment');
        Route::post('payment/edit','OrderController@EditPayment'); 
        Route::post('payment/delete','OrderController@DeletePayment');  
    });
    Route::group(['prefix'=>'contact'],function(){
        Route::get('/','LanguageController@getContactEdit');
        Route::post('/','LanguageController@postContactEdit'); 
    });
    Route::group(['prefix'=>'maketing'],function(){
        Route::get('list','MakettingController@ListMaketting');
        Route::post('list','MakettingController@AddMaketting');
        Route::post('list/edit','MakettingController@EditMaketting');
        Route::post('sendmail','MakettingController@sendmail'); 
    });
    Route::group(['prefix'=>'user'],function(){
        Route::get('listuser','UserController@ListUser');
        Route::post('listuser','UserController@AddUserAdmin');
        Route::post('listuser/edit','UserController@EditUserAdmin'); 
        Route::post('listuser/delete','UserController@DeleteAdmin'); 
    });
    Route::group(['prefix'=>'lang'],function(){
        Route::get('list','LanguageController@ListLang');
        Route::post('list','LanguageController@AddLang');
        Route::post('list/edit','LanguageController@EditLang'); 
    });
    Route::group(['prefix'=>'advert'],function(){
        Route::get('list','AdvertController@ListAdvert');
        Route::post('list','AdvertController@AddAdvert');
        Route::post('list/edit','AdvertController@EditAdvert'); 
        Route::post('list/delete','AdvertController@DeleteAdvert'); 
    });
    Route::group(['prefix'=>'slide'],function(){
        Route::get('list','SlideController@ListSlide');
        Route::post('list','SlideController@AddSlide');
        Route::post('list/edit','SlideController@EditSlide'); 
        Route::post('list/delete','SlideController@DleteSlide'); 
    });
    Route::group(['prefix'=>'specialgroup'],function(){
        Route::get('list','SpecialGroupController@ListGroup'); 
        Route::get('list/edit','SpecialGroupController@EditGroup');
    });
    Route::group(['prefix'=>'socical'],function(){
        Route::get('list','SocicalController@ListSocical');
        Route::post('list','SocicalController@AddSocical');
        Route::post('list/edit','SocicalController@EditSocical'); 
        Route::post('list/delete','SocicalController@DeleteSocical'); 
    });
    // Product
    Route::group(['prefix'=>'modproduct'],function(){
        Route::get('list','ModProductController@ListModPro');
        Route::post('list','ModProductController@AddModPro');
        Route::post('list/edit','ModProductController@EditModPro'); 
        Route::post('list/delete','ModProductController@DeleteModPro'); 
    });
    Route::group(['prefix'=>'listproduct'],function(){
        Route::get('list','ListProductController@List2Pro');
        Route::post('list','ListProductController@AddListPro');
        Route::post('list/edit','ListProductController@EditListPro'); 
        Route::post('list/delete','ListProductController@DeleteListPro'); 
        Route::get('liststt','ListProductController@ListSTT');
        Route::post('liststt','ListProductController@AddSTT');
        Route::post('liststt/edit','ListProductController@EditSTT'); 
        Route::post('liststt/delete','ListProductController@DeleteSTT');
    });
    //news
    Route::group(['prefix'=>'modnews'],function(){
        Route::get('list','ModNewsController@ListModNews');
        Route::post('list','ModNewsController@AddModNews');
        Route::post('list/edit','ModNewsController@EditModNews'); 
        Route::post('list/delete','ModNewsController@DeleteModNews'); 
    });
    Route::group(['prefix'=>'listnews'],function(){
        Route::get('list','ListNewController@List2News');
        Route::post('list','ListNewController@AddListNews');
        Route::post('list/edit','ListNewController@EditListNews'); 
        Route::post('list/delete','ListNewController@DeleteListNews'); 
    });
    Route::group(['prefix'=>'news'],function(){
        Route::get('listnews/{idmod}','NewsController@GetListNews');
        Route::get('list','NewsController@ListNews');
        Route::post('list','NewsController@AddNews');
        Route::post('list/edit','NewsController@EditNews'); 
        Route::post('list/delete','NewsController@DeleteNews'); 
    });
    Route::group(['prefix'=>'customers'],function(){
        Route::get('listgr','CustomerController@ListgrNews');
        Route::post('listgr','CustomerController@AddgrNews');
        Route::post('listgr/edit','CustomerController@EditgrNews'); 
        Route::post('listgr/delete','CustomerController@DeletegrNews'); 
        Route::get('list','CustomerController@ListCus');
        Route::get('supports','CustomerController@Listsp');
        Route::post('list','CustomerController@AddCus');
        Route::post('list/edit','CustomerController@EditCus'); 
        Route::post('list/delete','CustomerController@DeleteCus'); 
        Route::get('profile/{id}','CustomerController@ProfileCus');
                
        Route::get('feedback','CustomerController@Feedback');
        Route::post('feedback/delete','CustomerController@DelFeedback');
    });
});


Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});
