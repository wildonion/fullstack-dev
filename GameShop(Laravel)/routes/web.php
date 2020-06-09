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

Route::get('/', 'Welcome\WelcomeController@index');
Route::get('portfolio', 'Welcome\WelcomeController@portfolio');
//---------------------------------------------------------------------------------
Route::post('game/update/{id}', 'Admin\VideoGameManagmentController@update')->middleware('auth');
Route::delete('games/deleteall','Admin\VideoGameManagmentController@deleteall')->middleware('auth');
Route::group(['middleware' =>['auth']], function(){
	Route::resource('games', 'Admin\VideoGameManagmentController');
});
//---------------------------------------------------------------------------------
Route::get('download/video-game/{id}', 'Welcome\GameShopController@download')->middleware('web');
Route::get('download/video-blog/{id}', 'Welcome\GameShopController@downloadblog')->middleware('web');
Route::get('contact-me', 'Welcome\GameShopController@contactshow')->middleware('web');
Route::get('best-of-games', 'Welcome\GameShopController@bestOfgames')->middleware('web');
Route::get('best-of-blogs', 'Welcome\GameShopController@bestOfblogs')->middleware('web');
// Route::get('shop', 'Welcome\GameShopController@shop')->middleware('web');
Route::get('/livesearch','Welcome\GameShopController@livesearch')->middleware('web');
Route::get('/live-search','Welcome\GameShopController@livesearchshow')->middleware('web');  
Route::get('blogs', 'Welcome\GameShopController@newsshow')->middleware('web');
Route::get('blog/{id}/{title}', 'Welcome\GameShopController@showonenews')->middleware('web');
Route::get('game/{id}/{title}', 'Welcome\GameShopController@showonegame')->middleware('web');
Route::post('/like', 'Welcome\GameShopController@like')->middleware('web');
Route::post('comment/post', 'Welcome\GameShopController@store')->middleware('web');
Route::post('search-result', 'Welcome\GameShopController@searchresult')->middleware('web');
Route::group(['middleware' =>['web']], function(){
	Route::resource('game', 'Welcome\GameShopController');
});
//---------------------------------------------------------------------------------
Route::post('password/updatepswd/{id}', 'Admin\ProfileController@updatepswdset')->middleware('auth');
Route::post('profile/update/{id}', 'Admin\ProfileController@update')->middleware('auth');
Route::get('profile/password', 'Admin\ProfileController@updatepswdshow')->middleware('auth');
Route::get('profile/{id}/edit', 'Admin\ProfileController@edit')->middleware('auth');
//---------------------------------------------------------------------------------
Route::post('comments/update/{id}', 'Admin\CommentsManagmentController@update')->middleware('auth');
Route::post('comments/updatestatus/{id}', 'Admin\CommentsManagmentController@updatestatus')->middleware('auth');
Route::delete('comments/truncate', 'Admin\CommentsManagmentController@truncate')->middleware('auth');
Route::group(['middleware' =>['auth']], function(){
	Route::resource('comments', 'Admin\CommentsManagmentController');
});
//---------------------------------------------------------------------------------
Route::post('contact-info/update/{id}', 'Admin\Contact_info_Controller@update')->middleware('auth');
Route::group(['middleware' =>['auth']], function(){
	Route::resource('contact-info', 'Admin\Contact_info_Controller');
});
//---------------------------------------------------------------------------------
Route::get('welcome-page-settings/header', 'Admin\WelcomePageSettingsController@headershow')->middleware('auth');
Route::get('welcome-page-settings/footer/{id}', 'Admin\WelcomePageSettingsController@footershow')->middleware('auth');
Route::get('welcome-page-settings/tags/{id}', 'Admin\WelcomePageSettingsController@tagsshow')->middleware('auth');
Route::post('welcome-page-settings/tags/update/{id}', 'Admin\WelcomePageSettingsController@tagupdate')->middleware('auth');
Route::post('welcome-page-settings/tags/updateall/{id}', 'Admin\WelcomePageSettingsController@updateall')->middleware('auth');
Route::post('welcome-page-settings/footer/update/{id}', 'Admin\WelcomePageSettingsController@updatefooter')->middleware('auth');
Route::get('welcome-page-settings/header/blog/create', 'Admin\WelcomePageSettingsController@create')->middleware('auth');
Route::get('welcome-page-settings/blogs/show', 'Admin\WelcomePageSettingsController@latestnewsshow')->middleware('auth');
Route::get('welcome-page-settings/body-setting/{id}', 'Admin\WelcomePageSettingsController@bodysettingshow')->middleware('auth');
Route::get('welcome-page-settings/brand/{id}', 'Admin\WelcomePageSettingsController@updatebrandshow')->middleware('auth');
Route::post('welcome-page-settings/updatebrand/{id}', 'Admin\WelcomePageSettingsController@updatebrand')->middleware('auth');
Route::get('welcome-page-settings/blog/{id}/edit', 'Admin\WelcomePageSettingsController@edit')->middleware('auth');
Route::post('welcome-page-settings/latest-news/update/{id}', 'Admin\WelcomePageSettingsController@update')->middleware('auth');
Route::delete('welcome-page-settings/deleteall', 'Admin\WelcomePageSettingsController@deleteall')->middleware('auth');
Route::post('welcome-page-settings/body-setting/update/disablesite/{id}', 'Admin\WelcomePageSettingsController@disablebody')->middleware('auth');
Route::post('welcome-page-settings/body-setting/update/enablesite/{id}', 'Admin\WelcomePageSettingsController@enablebody')->middleware('auth');
Route::get('welcome-page-settings/blog/show/{id}', 'Admin\WelcomePageSettingsController@showoneblog')->middleware('auth');
Route::group(['middleware' =>['auth']], function(){
	Route::resource('welcome-page-settings', 'Admin\WelcomePageSettingsController');
});
//---------------------------------------------------------------------------------
Route::get('shop-store/settings/{id}', 'Admin\ShopStoreController@shopstoresettingsshow')->middleware('auth');
Route::post('shop-store/setting/update/disableshop/{id}', 'Admin\ShopStoreController@disableshop')->middleware('auth');
Route::post('shop-store/setting/update/enableshop/{id}', 'Admin\ShopStoreController@enableshop')->middleware('auth');
Route::group(['middleware' =>['auth']], function(){
	Route::resource('shop-store', 'Admin\ShopStoreController');
});
//---------------------------------------------------------------------------------
Auth::routes();
Route::get('/home', 'HomeController@index');
//---------------------------------------------------------------------------------
Route::get('/access-denied', function(){
	return view('access_denied');
});

/*
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
BEFORE UPLOAD:
export database.sql from my localhost(mysqldump -u root -p GameShop > ShayanBlog.sql)
import sql file in database(mysql -u username -p database_name < file.sql)
shopstore view and its route, GameShopController(index function)
delete all uploaded file in uploads folder
php artisan make:migration add_column_to_table --table="table_name" => adding new column
*encode and minify all css and js files
*max size of uploaded video and file in server, also see lfm config file
*upload and download paths in host(lfm configuration) => remove public folder
*permisions for laravel file manager(update lfm for paths, and change mode for upload folder)
*unzipper.php for unzip projects
*hide css and javascript file in server or see ISSUE 1 in BACK-END section just right below!
_-_-__-_-__-_-__-_-__-_-__-_-__-_-__-_-__-_-__-_-__-_-__-_-__-_-__-_-__-_-__-_-__-_-__-_-__-_-
FRONT-END ISSUES:
1- wild onion logo(footer)
____________________________________________________________________________________
BACK-END ISSUES:
1- bundle all script and css files into one file using Compiling Assets (Laravel Mix) => see webpack.mix.js
2- hide all script and css files in server
3- google-site-verification, SEO and backlinks
4- lfm bug, doesn't show pictures and icons in its window (try to clear browser cache first)
5- live-search section issue
6- add color for blog and video title 
7- add token for blog and game url (see below to how it works?)
8- ip settings (see below):
@if(IpDetails::ip_details(Request::ip()) != 'IR')
  fetch english content with ltr dir
@else
  fetch persian content with rtl dir
@endif 
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
*/