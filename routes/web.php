<?php

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

Route::get('/', function () {
    return view('layout');
});
Route::get('index','FrontController@home')->name('index');
Route::resource('posts','PostsController');
Route::get('categories','FrontController@categories')->name('categories');
Route::get('show_post\{id}','FrontController@post_show')->name('post_show');
Route::resource('comments','CommentController');
Route::get('category_posts\{id}','FrontController@category_posts')->name('category_posts');
Route::get('blog',function(){return view('front/blog');})->name('blog');
Route::get('blog-details',function(){return view('front/blog-details');})->name('blog_details');
Route::get('checkout',function(){return view('front/check-out');})->name('checkout');
Route::get('contact','Front\ContactsController@create_contact')->name('create_contact');
Route::post('store_contact','Front\ContactsController@store_contact')->name('store_contact');

Route::get('faq',function(){return view('front/faq');})->name('faq');
Route::get('loggedin',function(){return view('front/login');})->name('loggedin');
Route::get('product',function(){return view('front/product');})->name('product');
Route::get('registered',function(){return view('front/register');})->name('registered');
Route::get('shop','Front\ShopController@index')->name('shop');
Route::get('shopping-cart',function(){return view('front/shopping-cart');})->name('shopping_cart');

Route::resource('products','ProductsController');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
