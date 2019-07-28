<?php

Route::get('/', 'FrontpageController@index')->name('home');



Route::get('/search', 'FrontpageController@search')->name('search');
Route::get('/autocomplete', 'FrontpageController@autocomplete')->name('search.autocomplete');

Route::get('/property', 'PagesController@properties')->name('property');
Route::get('/property/{id}', 'PagesController@propertieshow')->name('property.show');
Route::get('/property/city/{cityslug}', 'PagesController@propertyCities')->name('property.city');
Route::post('/property', 'PagesController@propertyBooking')->name('property.booking');


Route::get('/blog', 'PagesController@blog')->name('blog');
Route::get('/blog/{id}', 'PagesController@blogshow')->name('blog.show');

Route::get('/about', 'PagesController@about')->name('about');
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


Auth::routes(['verify' => true]);
Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');

Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>['auth','admin'],'as'=>'admin.'], function(){
    Route::get('dashboard','DashboardController@index')->name('dashboard');
    Route::resource('categories','CategoryController');
    Route::resource('amenities','AmenitiesController');
    Route::resource('sliders','SliderController');
    Route::resource('post_category','PostCategoryController');
    Route::resource('posts','PostController');

    Route::resource('properties','PropertiesController');
    Route::post('properties/changeStatus', 'PropertiesController@changeStatus');
    Route::resource('transaction', 'TransactionController');
    Route::get('transaction/{transaction}', 'TransactionController@acceptPayments')->name('transaction.accept');
    Route::get('transaction/invoice/{invoice}', 'TransactionController@invoice')->name('transaction.invoice');

    Route::resource('users','UserController');
    Route::post('users/changeStatus', array('as' => 'userChangeStatus', 'uses' => 'UserController@changeStatus'));

    Route::get('setting','DashboardController@setting')->name('setting');
    Route::post('setting','DashboardController@settingStore')->name('setting.store');
    Route::get('profile','DashboardController@profile')->name('profile');
    Route::post('profile','DashboardController@profileUpdate')->name('profile.update');
    Route::post('changepassword','DashboardController@changePasswordUpdate')->name('changepassword.update');
});

Route::group(['prefix'=>'owner','namespace'=>'Owner','middleware'=>['auth','owner'],'as'=>'owner.'], function(){
    Route::get('dashboard','DashboardController@index')->name('dashboard');
    Route::resource('properties','PropertiesController');
    Route::post('properties/changeStatus', 'PropertiesController@changeStatus')->name('changeStatus');
    Route::get('properties/get_regencies/{province_id}',array('as'=>'properties.get_regencies','uses'=>'PropertiesController@provinceForRegencies'));
    Route::get('properties/get_district/{regencies_id}',array('as'=>'properties.get_district','uses'=>'PropertiesController@regenciesForDistrict'));
    Route::post('properties/gallery/delete','PropertiesController@galleryImageDelete')->name('gallery-delete');
    Route::resource('transaction', 'TransactionController');
    Route::get('transaction/{transaction}', 'TransactionController@acceptPayments')->name('transaction.accept');
    Route::get('transaction/invoice/{invoice}', 'TransactionController@invoice')->name('transaction.invoice');
    Route::get('profile','DashboardController@profile')->name('profile');
    Route::post('profile','DashboardController@profileUpdate')->name('profile.update');
    Route::post('changepassword','DashboardController@changePasswordUpdate')->name('changepassword.update');


});

Route::group(['prefix'=>'users','namespace'=>'Users','middleware'=>['auth','users'],'as'=>'users.'], function(){

    Route::get('dashboard','DashboardController@index')->name('dashboard');
    Route::resource('favorited-properties', 'FavoritedPropertiesControllers');
    Route::resource('transaction', 'TransactionController');
    Route::get('transaction/invoice/{invoice}', 'TransactionController@invoice')->name('transaction.invoice');
    Route::get('profile','DashboardController@profile')->name('profile');
    Route::post('profile','DashboardController@profileUpdate')->name('profile.update');
    Route::post('changepassword','DashboardController@changePasswordUpdate')->name('changepassword.update');
});
