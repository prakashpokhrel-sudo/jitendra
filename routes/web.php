<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
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
//clientsite route

Route::get('/',[ClientController::class,'index'] )->name('shop.home');

Route::get('/blog',[ClientController::class,'blog'] )->name('blog.post');

Route::get('language/english',[ClientController::class,'english'] )->name('language.english');

Route::get('language/nepali',[ClientController::class,'nepali'] )->name('language.nepali');

Route::get('single{id}',[ClientController::class,'blogsingle'] )->name('blog.single');

Route::get('/aboutus',[ClientController::class,'aboutus'] )->name('aboutus');

Route::get('/gallery',[ClientController::class,'gallery'] )->name('gallery');

//contact
Route::get('/contactus',[ClientController::class,'contactus'] )->name('contact.us');
Route::post('/contactus/form',[ClientController::class,'contactusform'] )->name('contact.us.form');

//end clientsite route
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
	Route::get('table-list', function () {
		return view('pages.table_list');
	})->name('table');

	Route::get('typography', function () {
		return view('pages.typography');
	})->name('typography');

	Route::get('icons', function () {
		return view('pages.icons');
	})->name('icons');

	Route::get('map', function () {
		return view('pages.map');
	})->name('map');

	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');

	Route::get('rtl-support', function () {
		return view('pages.language');
	})->name('language');

	Route::get('upgrade', function () {
		return view('pages.upgrade');
	})->name('upgrade');
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});


// AdminController

// for category
Route::get('admin/manage/category', [DashboardController::class,'index'])->name('getManageCategory')->middleware('auth');
Route::post('admin/store/categories',[DashboardController::class,'store'])->name('store.category')->middleware('auth');
Route::get('admin/delete/categories{id}',[DashboardController::class,'deletecategory'])->name('delete.category')->middleware('auth');
Route::post('admin/edit/categortis/{category}',[DashboardController::class,'editcategory'])->name('edit.category')->middleware('auth');


//for product
Route::get('admin/Manage/Product', [DashboardController::class,'productindex'])->name('getManageProduct')->middleware('auth');

Route::post('admin/Store/Product', [DashboardController::class,'addproduct'])->name('PostAddProduct')->middleware('auth');

Route::get('admin/Product/Delete{product}', [DashboardController::class,'productdelete'])->name('ProductDelete')->middleware('auth');

Route::post('admin/Product/Edit{product}', [DashboardController::class,'productedit'])->name('PostEditProduct')->middleware('auth');


//product active and inactive

Route::get('admin/Product/inactive{status}', [DashboardController::class,'productinactive'])->name('product.inactive')->middleware('auth');

Route::get('admin/Product/active{status}', [DashboardController::class,'productactive'])->name('product.active')->middleware('auth');

//shop-setting

Route::get('admin/shopsetting/store_information', [DashboardController::class,'storeinformation'])->name('store.information')->middleware('auth');


Route::post('admin/shopsetting', [DashboardController::class,'updatestoreinformation'])->name('update.store.information')->middleware('auth');


//content Part

//Blog_category
Route::get('admin/content/blog/category', [DashboardController::class,'blog_category'])->name('blog.category')->middleware('auth');

Route::post('admin/content/blog/category/add',[DashboardController::class,'storeblog'])->name('store.blog')->middleware('auth');

Route::post('admin/content/blog/category/edit{id}',[DashboardController::class,'editblog'])->name('edit.blog')->middleware('auth');

Route::get('admin/content/blog/category/delete{id}', [DashboardController::class,'deleteblog'])->name('blog.delete')->middleware('auth');


//addblog
Route::get('admin/content/blog/add', [DashboardController::class,'addblogmanage'])->name('addblogmanage')->middleware('auth');

Route::post('admin/content/blog/store', [DashboardController::class,'storeaddblog'])->name('store.addblog')->middleware('auth');

//PostList
Route::get('admin/content/blog/postlist', [DashboardController::class,'postlist'])->name('post.list')->middleware('auth');

Route::get('admin/content/blog/postlist/delete{id}', [DashboardController::class,'deletepostlist'])->name('delete.post.list')->middleware('auth');

Route::get('admin/content/blog/postlist/edit{id}', [DashboardController::class,'editpostlist'])->name('edit.post.list')->middleware('auth');

Route::post('admin/content/blog/postlist/update{id}', [DashboardController::class,'updatepostlist'])->name('update.post.list')->middleware('auth');


//Banner 

//slider add
Route::get('admin/content/banner/slider', [DashboardController::class,'ManageSlider'])->name('manage.slider')->middleware('auth');


Route::post('admin/content/banner/slider/add', [DashboardController::class,'storebanner'])->name('store.banner')->middleware('auth');




//slider list

Route::get('admin/content/banner/bannerlist', [DashboardController::class,'bannerlist'])->name('banner.list')->middleware('auth');


Route::get('admin/content/banner/bannerlist/delete{id}', [DashboardController::class,'deletebannerlist'])->name('delete.banner.list')->middleware('auth');

Route::get('admin/content/banner/bannerlist/edit{id}', [DashboardController::class,'editbannerlist'])->name('edit.banner.list')->middleware('auth');

Route::post('admin/content/banner/bannerlist/update{id}', [DashboardController::class,'updatebannerlist'])->name('update.banner.list')->middleware('auth');



//Banner active and inactive

Route::get('admin/content/banner/inactive{status}', [DashboardController::class,'bannerinactive'])->name('banner.inactive')->middleware('auth');

Route::get('admin/content/banner/active{status}', [DashboardController::class,'banneractive'])->name('banner.active')->middleware('auth');


//pages

Route::get('admin/content/pages', [DashboardController::class,'ManagePage'])->name('manage.page')->middleware('auth');


Route::post('admin/content/pages/add', [DashboardController::class,'storepage'])->name('store.page')->middleware('auth');

//page list

Route::get('admin/content/pages/list', [DashboardController::class,'pagelist'])->name('page.list')->middleware('auth');

Route::get('admin/content/pages/list/delete{id}', [DashboardController::class,'deletepagelist'])->name('delete.page.list')->middleware('auth');

Route::get('admin/content/pages/list/edit{id}', [DashboardController::class,'editpagelist'])->name('edit.page.list')->middleware('auth');

Route::post('admin/content/pages/list/update{id}', [DashboardController::class,'updatepagelist'])->name('update.page.list')->middleware('auth');



//pages active and inactive

Route::get('admin/content/pages/inactive{status}', [DashboardController::class,'pageinactive'])->name('page.inactive')->middleware('auth');

Route::get('admin/content/pages/active{status}', [DashboardController::class,'pageactive'])->name('page.active')->middleware('auth');



//Team

Route::get('admin/content/team/create', [DashboardController::class,'ManageTeam'])->name('Manage.Team')->middleware('auth');

Route::post('admin/content/team/store', [DashboardController::class,'storeteamimage'])->name('store.team')->middleware('auth');


//Team list

Route::get('admin/content/team/list', [DashboardController::class,'teamlist'])->name('team.list')->middleware('auth');
Route::get('admin/content/team/list/delete{id}', [DashboardController::class,'deleteteamlist'])->name('delete.team.list')->middleware('auth');
Route::get('admin/content/team/list/edit{id}', [DashboardController::class,'editteamlist'])->name('edit.team.list')->middleware('auth');

Route::post('admin/content/team/list/update{id}', [DashboardController::class,'updateteamlist'])->name('update.team.list')->middleware('auth');

//team status 
Route::get('admin/content/team/inactive{status}', [DashboardController::class,'teaminactive'])->name('team.inactive')->middleware('auth');

Route::get('admin/content/team/active{status}', [DashboardController::class,'teamactive'])->name('team.active')->middleware('auth');


//review

Route::get('admin/content/review/create', [DashboardController::class,'ManageReview'])->name('Manage.Review')->middleware('auth');

Route::post('admin/content/review/store', [DashboardController::class,'storereview'])->name('store.review')->middleware('auth');

//review-list

Route::get('admin/content/review/list', [DashboardController::class,'reviewlist'])->name('review.list')->middleware('auth');
Route::get('admin/content/review/list/delete{id}', [DashboardController::class,'deletereviewlist'])->name('delete.review.list')->middleware('auth');
Route::get('admin/content/review/list/edit{id}', [DashboardController::class,'editreviewlist'])->name('edit.review.list')->middleware('auth');

Route::post('admin/content/review/list/update{id}', [DashboardController::class,'updatereviewlist'])->name('update.review.list')->middleware('auth');

//status 

Route::get('admin/content/review/inactive{status}', [DashboardController::class,'reviewinactive'])->name('review.inactive')->middleware('auth');

Route::get('admin/content/review/active{status}', [DashboardController::class,'reviewactive'])->name('review.active')->middleware('auth');


//contactus

Route::get('admin/content/contactus/list', [DashboardController::class,'contactindex'])->name('contact.index')->middleware('auth');
Route::get('admin/content/contactus/list/view{id}', [DashboardController::class,'viewdetails'])->name('view.details')->middleware('auth');
Route::get('admin/content/contactus/list/delete{id}', [DashboardController::class,'contactdelete'])->name('contact.delete')->middleware('auth');



//gallery
Route::get('admin/content/gallery/list', [DashboardController::class,'gallerymanage'])->name('gallerymanage')->middleware('auth');

Route::post('admin/content/gallery/add/images', [DashboardController::class,'addgalleryimage'])->name('addgalleryimage')->middleware('auth');

Route::get('admin/content/gallery/delete{id}', [DashboardController::class,'galleryimagedelete'])->name('gallery.image.delete')->middleware('auth');

Route::post('admin/content/gallery/update{id}', [DashboardController::class,'galleryupdate'])->name('gallery.update')->middleware('auth');


//gallery active and inactive

Route::get('admin/content/gallery/inactive{status}', [DashboardController::class,'galleryinactive'])->name('gallery.inactive')->middleware('auth');

Route::get('admin/content/gallery/active{status}', [DashboardController::class,'galleryactive'])->name('gallery.active')->middleware('auth');
