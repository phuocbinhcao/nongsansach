<?php

use App\Http\Controllers\Auth\NewPasswordController;

//Namespace FrontEnd
use App\Http\Controllers\FrontEnd\CheckoutController;
use App\Http\Controllers\FrontEnd\ProductController as FrontEndProductController;
use App\Http\Controllers\FrontEnd\CommentController as FrontEndCommentController;
use App\Http\Controllers\FrontEnd\ContactController;

//Namespace Panel Admin
use App\Http\Controllers\Panel\AccountBlockedController;
use App\Http\Controllers\Panel\ConsignmentDeleteController;
use App\Http\Controllers\Panel\CustomerController;
use App\Http\Controllers\Panel\EmployeeController;
use App\Http\Controllers\Panel\GroupGoodsController;
use App\Http\Controllers\Panel\OrderController;
use App\Http\Controllers\Panel\ProductController;
use App\Http\Controllers\Panel\ProductsDeletedController;
use App\Http\Controllers\Panel\ProductTypeController;
use App\Http\Controllers\Panel\SinglePageController;
use App\Http\Controllers\Panel\SuppliersController;
use App\Http\Controllers\Panel\UserController;
use App\Http\Controllers\Panel\WareHousesController;
use App\Http\Controllers\Panel\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Panel\CustomerDeletedController;

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
    return view('auth.login');
});
// Authentication Login and logout
Route::get('/', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'create'])
    ->middleware('guest')
    ->name('login.admin');

Route::post('/', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'store'])
    ->middleware('guest');

Route::get('/logout', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout.admin');

Route::post('change-password', [NewPasswordController::class,'store'])->name('change-password.store');
// Group panel: users, employee, customers, products, suppliers, categories
Route::group(['prefix' => 'panel', 'middleware' => 'auth'], function () {
    // page home when you access admin management page
    Route::get('/', [SinglePageController::class, 'index'])->name('panel.index');

    //Routes Users
    Route::get('profile', function () {
        return response()->view('panel.users.profile-details');
    })->name('users.profile');

    Route::resource('users', UserController::class);

    //Routes show blocked accounts
    Route::resource('accounts-locked', AccountBlockedController::class);

    //Routes show consignment delete
    Route::resource('consignment-delete', ConsignmentDeleteController::class);

    //Routes Employees
    Route::resource('employees', EmployeeController::class);

    //Routes customers
    Route::resource('customers', CustomerController::class);

    //Routes  deleted customers
    Route::get('customer-delete', [CustomerDeletedController::class, 'listCustomer'])->name('customer.deleted');
    Route::post('customer-restore/{id}', [CustomerDeletedController::class , 'restoreCustomer'])->name('customer.restore');

    //Routes Group Goods
    Route::resource('groupgoods', GroupGoodsController::class);

    //Routes Product Types
    Route::resource('product-type', ProductTypeController::class);

    //Routes products
    Route::resource('products', ProductController::class);
    Route::get('/product/product-deleted', [ProductsDeletedController::class, 'index'])->name('product.listDeleted');
    Route::get('/product/product-deleted-detail/{id}', [ProductsDeletedController::class, 'show'])->name('product.detailDeleted');
    Route::post('/product/product-deleted-restore/{id}', [ProductsDeletedController::class, 'restore'])->name('product.restoreProduct');

    //Routes Warehouse
    Route::resource('warehouses', WareHousesController::class);

    //Routes Suppliers
    Route::resource('suppliers', SuppliersController::class);

    //Routes Orders
    Route::get('/orders/index', [OrderController::class, 'index'])->name('order.index');
    Route::get('/orders/create', [OrderController::class, 'create'])->name('order.create');
    Route::post('/orders/getCustomer', [OrderController::class, 'getCustomer'])->name('getCustomers');
    Route::get('orders/create/add-cart/{id}', [OrderController::class, 'addToCart'])->name('addToCart');
    Route::get('orders/create/show-cart', [OrderController::class, 'showCart'])->name('showCart');
    Route::get('orders/create/update-cart', [OrderController::class, 'updateCart'])->name('updateCart');
    Route::post('/orders/create', [OrderController::class, 'store'])->name('order.store');
    Route::get('/orders/edit/{id}', [OrderController::class, 'edit'])->name('order.edit');
    Route::get('/orders/edit-cart/{id}', [OrderController::class, 'editCart'])->name('order.editCart');
    Route::post('/orders/edit/{id}', [OrderController::class, 'update'])->name('order.update');
    Route::get('/orders/show/{id}', [OrderController::class, 'show'])->name('order.show');
    Route::post('/orders/delete/{id}', [OrderController::class, 'destroy'])->name('order.delete');
    Route::get('/orders/table-delete', [OrderController::class, 'tableOrderDelete'])->name('order.tableDelete');
    Route::post('orders/table-delete/{id}', [OrderController::class, 'getBack'])->name('order.getBack');

    //Comments
    Route::get('comment', [CommentController::class , 'index'])->name('comment.index');
    Route::post('comment/delete/{id}', [CommentController::class , 'delete'])->name('comment.delete');
});

//Routes FrontEnd
Route::group(['prefix' => 'organic'], function () {
    Route::get('/register', [App\Http\Controllers\FrontEnd\Auth\RegisteredUserController::class, 'create'])
        ->middleware('guest')
        ->name('register');

    Route::post('/register', [App\Http\Controllers\FrontEnd\Auth\RegisteredUserController::class, 'store'])
        ->middleware('guest');

    Route::get('/login', [App\Http\Controllers\FrontEnd\Auth\AuthenticatedSessionController::class, 'create'])
        ->middleware('guest')
        ->name('login');

    Route::post('/login', [App\Http\Controllers\FrontEnd\Auth\AuthenticatedSessionController::class, 'store'])
        ->middleware('guest');
    Route::get('/logout', [App\Http\Controllers\FrontEnd\Auth\AuthenticatedSessionController::class, 'destroy'])
        ->middleware('auth')
        ->name('logout');
    Route::get('my-account', [\App\Http\Controllers\FrontEnd\MyAccountController::class, 'get'])->name('my-account');
    Route::post('my-account', [\App\Http\Controllers\FrontEnd\MyAccountController::class, 'post']);


    Route::get('/index', [FrontEndProductController::class, 'index'])->name('organic.index');
    Route::get('/shop', [FrontEndProductController::class, 'shop'])->name('shop.index');
    Route::get('/search', [FrontEndProductController::class, 'getSearch'])->name('search.index');
    Route::get('shop/{product_type_name}/{id}', [FrontEndProductController::class, 'showCategory'])->name('showCategory.index');
    Route::get('/product-detail/{id}', [FrontEndProductController::class, 'detailsProduct'])->name('details.product');
    Route::get('/cart/show', [FrontEndProductController::class, 'showCart'])->name('show.cart');
    Route::get('/add-to-cart/{id}', [FrontEndProductController::class, 'addToCart1'])->name('add.to.cart');
    Route::get('/update-cart', [FrontEndProductController::class, 'update'])->name('update.cart');
    Route::get('/remove-from-cart', [FrontEndProductController::class, 'remove'])->name('remove.from.cart');
    Route::get('/check-out', [FrontEndProductController::class, 'checkout'])->name('checkout.cart');
    Route::post('/check-out', [CheckoutController::class, 'payment'])->name('paybycash.cart');
    Route::get('/check-out-online', [CheckoutController::class, 'payOnline'])->name('payonline.cart');
    Route::get('/credit-card', [CheckoutController::class, 'viewCreditCard'])->name('creditcard.cart');
    Route::get('/pay-credit-card', [CheckoutController::class, 'payCreditCard'])->name('payCreditCard.cart');
    Route::get('about-us', [ContactController::class , 'aboutUs'])->name('about.us');
    Route::get('contact', [ContactController::class, 'contact'])->name('contact.us');
    Route::post('comment', [FrontEndCommentController::class, 'comment'])->name('comment');
});
