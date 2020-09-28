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

Route::get('/', 'PagesController@home');

Route::get('/home', 'PagesController@home')->name('home');
Route::get('/category/{id}/{name}', 'PagesController@category')->name('categories');
Route::get('/best-product', 'PagesController@bestproduct');
Route::get('/products', 'PagesController@products')->name('product');

Route::get('/mail','PagesController@mail')->name('mail');

Route::get('/product/{id}/{name}','PagesController@chitietsanpham')->name('productdetail');
Route::get('/gioithieu','PagesController@gioithieu')->name('gioithieu');
Route::get('/dichvu','PagesController@dichvu')->name('dichvu');
 Route::get('/checkout','PagesController@checkout')->name('checkout');
 Route::post('/checkout','PagesController@checkoutSave')->name('checkoutSave');
 Route::get('/addcart/{id}','PagesController@addcart')->name('addcart');
Route::post('update-cart', 'PagesController@update');
Route::delete('remove-from-cart', 'PagesController@remove');


 Route::get('/search', 'SearchController@Search');




 Route::group(['prefix'=>'admin','middleware'=>'Admin'],function () {
     Route::get('/dashboard', 'AdminController@dashboard');

     Route::get('/categories', 'CategoriesController@categories');
     Route::get('/categories/addCategory', 'CategoriesController@getAddCategory');
     Route::post('/categories/addCategory', 'CategoriesController@postAddCategory');
     Route::get('/categories/editCategory/{id}', 'CategoriesController@getEditCategory');
     Route::post('/categories/editCategory/{id}', 'CategoriesController@postEditCategory');
     Route::get('/categories/deleteCategory/{id}', 'CategoriesController@getDelCategory');



     Route::get('/products', 'ProductsController@products');
     Route::get('/products/addProduct', 'ProductsController@getAddProduct');
     Route::post('/products/addProduct', 'ProductsController@postAddProduct');
     Route::get('/products/editProduct/{id}', 'ProductsController@getEditProduct');
     Route::post('/products/editProduct/{id}', 'ProductsController@postEditProduct');
     Route::get('/products/deleteProduct/{id}', 'ProductsController@getDelProduct');

     Route::get('/slides', 'SlidesController@slides');
     Route::get('slides/addSlide', 'SlidesController@getAddSlide');
     Route::post('/slides/addSlide', 'SlidesController@postAddSlide');
     Route::get('/slides/editSlide/{id}', 'SlidesController@getEditSlide');
     Route::post('/slides/editSlide/{id}', 'SlidesController@postEditSlide');
     Route::get('/slides/deleteSlide/{id}', 'SlidesController@getDelSlide');

     Route::get('/customers', 'CustomersController@customer');
     Route::get('/customers/history/{id}', 'CustomersController@historyCus');
     Route::get('/customers/history/detail_bill/{id}/{id_customer}', 'CustomersController@detail_bill');

     Route::get('/bills', 'BillDetailsController@getListBill');
     Route::get('/billdetails/{id}/{id_customer}', 'BillDetailsController@listproduct');
     Route::post('/status_bill/{id}', 'BillDetailsController@status_bill');

     Route::get('/products', 'AdminController@products');

     Route::get('/account', 'AccountController@account');
     Route::get('/account/editAccount/{id}', 'AccountController@getEditAccount');
     Route::post('/account/editAccount/{id}', 'AccountController@postEditAccount');
     Route::get('/account/deleteAccount/{id}', 'AccountController@getDeleteAccount');
 });


Auth::routes();


