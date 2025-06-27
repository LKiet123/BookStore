<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CrudUserController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\VoucherController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudBookController;
use App\Http\Controllers\CrudPublisherController;
use App\Http\Controllers\CrudCategoriesController;
use App\Http\Controllers\CrudRepoController;
use App\Http\Controllers\CrudCouponController;
use App\Http\Controllers\CrudAuthorController;
use App\Http\Controllers\CrudOrdersController;
use App\Http\Controllers\CrudOrdersDetailsController;
use App\Http\Controllers\CrudReviewController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PayController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\WishlistsController;
use App\Http\Controllers\ReviewController;





/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Route::get('create', [CrudRepoController::class, 'createUser'])->name('user.createUser');
// Route::post('create', [CrudRepoController::class, 'postUser'])->name('user.postUser');



Route::get('/', function () {
    return redirect()->route('index');
})->name('home');

Route::middleware(['checkrole:admin'])->group(function () {
    Route::get('dashboard', action: [IndexController::class, 'dashboard'])->name('dashboard');

    // book routes
    Route::get('createBook', [CrudBookController::class, 'createBook'])->name('book.createBook');
    Route::post('createBook', [CrudBookController::class, 'postBook'])->name('book.postBook');
    Route::get('readBook', [CrudBookController::class, 'readBook'])->name('book.readBook');
    Route::delete('deleteBook', [CrudBookController::class, 'deleteBook'])->name('book.deleteBook');
    Route::get('updateBook', [CrudBookController::class, 'updateBook'])->name('book.updateBook');
    Route::post('updateBook', [CrudBookController::class, 'postUpdateBook'])->name('book.postUpdateBook');
    Route::get('listBook', [CrudBookController::class, 'listBook'])->name('book.list');

    // publisher routes
    Route::get('createPublisher', [CrudPublisherController::class, 'createPublisher'])->name('publisher.createPublisher');
    Route::post('createPublisher', [CrudPublisherController::class, 'postPublisher'])->name('publisher.postPublisher');
    Route::get('readPublisher', [CrudPublisherController::class, 'readPublisher'])->name('publisher.readPublisher');
    Route::delete('deletePublisher', [CrudPublisherController::class, 'deletePublisher'])->name('publisher.deletePublisher');
    Route::get('updatePublisher', [CrudPublisherController::class, 'updatePublisher'])->name('publisher.updatePublisher');
    Route::post('updatePublisher', [CrudPublisherController::class, 'postUpdatePublisher'])->name('publisher.postUpdatePublisher');
    Route::get('listPublisher', [CrudPublisherController::class, 'listPublisher'])->name('publisher.list');
    Route::get('signout', [CrudPublisherController::class, 'signOut'])->name('signout');


    // categories routes
    Route::get('createCate', [CrudCategoriesController::class, 'createCategory'])->name('categories.createCategory');
    Route::post('createCate', [CrudCategoriesController::class, 'postCategory'])->name('categories.postCategory');
    // Route::get('read', [CrudRepoController::class, 'readUser'])->name('user.readUser');
    Route::get('readCate', [CrudCategoriesController::class, 'readCategory'])->name('categories.readCategory');
    // Route::get('delete', [CrudRepoController::class, 'deleteUser'])->name('user.deleteUser');
    Route::get('deleteCate', [CrudCategoriesController::class, 'deleteCategory'])->name('categories.deleteCategory');
    // Route::post('update', [CrudRepoController::class, 'postUpdateUser'])->name('user.postUpdateUser');
    // Route::get('update', [CrudRepoController::class, 'updateUser'])->name('user.updateUser');
    Route::get('updateCate', [CrudCategoriesController::class, 'updateCategory'])->name('categories.updateCategory');
    Route::post('updateCate', [CrudCategoriesController::class, 'postUpdateCategory'])->name('categories.postUpdateCategory');
    // Route::get('list', [CrudRepoController::class, 'listUser'])->name('user.list');
    Route::get('listCate', [CrudCategoriesController::class, 'listCategories'])->name('categories.list');

    // repo routes
    Route::get('createRepo', [CrudRepoController::class, 'createRepo'])->name('repo.createRepo');
    Route::post('createRepo', [CrudRepoController::class, 'postRepo'])->name('repo.postRepo');
    Route::get('readRepo', [CrudRepoController::class, 'readRepo'])->name('repo.readRepo');
    Route::get('deleteRepo', [CrudRepoController::class, 'deleteRepo'])->name('repo.deleteRepo');
    Route::get('updateRepo', [CrudRepoController::class, 'updateRepo'])->name('repo.updateRepo');
    Route::post('updateRepo', [CrudRepoController::class, 'postUpdateRepo'])->name('repo.postUpdateRepo');
    Route::get('listRepo', [CrudRepoController::class, 'listRepo'])->name('repo.list');

    // coupon routes
    Route::get('/couponscreate', [CrudCouponController::class, 'createCoupon'])->name('coupon.create');
    Route::post('/couponscreate', [CrudCouponController::class, 'postCoupon'])->name('coupon.store');
    Route::get('/couponslist', [CrudCouponController::class, 'listCoupon'])->name('coupon.list');
    Route::get('/coupons/{id}/edit', [CrudCouponController::class, 'editCoupon'])->name('coupon.edit');
    Route::put('/coupons/{id}', [CrudCouponController::class, 'updateCoupon'])->name('coupon.update');
    Route::delete('/coupons/{id}', [CrudCouponController::class, 'deleteCoupon'])->name('coupon.delete');
    Route::get('/coupons/{id}', [CrudCouponController::class, 'readCoupon'])->name('coupon.read');

    // Author Routes
    Route::get('/authorslist', [CrudAuthorController::class, 'listAuthor'])->name('authors.list');
    Route::get('/authorscreate', [CrudAuthorController::class, 'createAuthor'])->name('authors.create');
    Route::post('/authors', [CrudAuthorController::class, 'postAuthor'])->name('authors.store');
    Route::get('/authors/{id}/edit', [CrudAuthorController::class, 'editAuthor'])->name('authors.edit');
    Route::put('/authors/{id}', [CrudAuthorController::class, 'updateAuthor'])->name('authors.update');
    Route::delete('/authors/{id}', [CrudAuthorController::class, 'deleteAuthor'])->name('authors.delete');
    Route::get('/authors/{id}', [CrudAuthorController::class, 'readAuthor'])->name('authors.read');

    // Orders
    Route::get('createOrder', [CrudOrdersController::class, 'createOrder'])->name('orders.createOrder');
    Route::post('createOrder', [CrudOrdersController::class, 'postOrder'])->name('orders.postOrder');
    Route::get('readOrder', [CrudOrdersController::class, 'readOrder'])->name('orders.readOrder');
    Route::get('deleteOrder', [CrudOrdersController::class, 'deleteOrder'])->name('orders.deleteOrder');
    Route::get('updateOrder', [CrudOrdersController::class, 'updateOrder'])->name('orders.updateOrder');
    Route::post('updateOrder', [CrudOrdersController::class, 'postUpdateOrder'])->name('orders.postUpdateOrder');
    Route::get('listOrder', [CrudOrdersController::class, 'listOrders'])->name('orders.list');

    // Orders Details
    Route::get('createOrderDetails', [CrudOrdersDetailsController::class, 'createOrderDetails'])->name('orders.createOrderDetails');
    Route::post('createOrderDetails', [CrudOrdersDetailsController::class, 'postOrderDetails'])->name('orders.postOrderDetails');
    Route::get('readOrderDetails', [CrudOrdersDetailsController::class, 'readOrderDetails'])->name('orders.readOrderDetails');
    Route::get('deleteOrderDetails', [CrudOrdersDetailsController::class, 'deleteOrderDetails'])->name('orders.deleteOrderDetails');
    Route::get('updateOrderDetails', [CrudOrdersDetailsController::class, 'updateOrderDetails'])->name('orders.updateOrderDetails');
    Route::post('updateOrderDetails', [CrudOrdersDetailsController::class, 'postUpdateOrderDetails'])->name('orders.postUpdateOrderDetails');
    Route::get('listOrderDetailsByOrderId', [CrudOrdersDetailsController::class, 'listOrderDetailsByOrderId'])->name('orders.listOrderDetailsByOrderId');

    //user routes
    Route::prefix('users')->controller(CrudUserController::class)->group(function () {
        Route::get('/', 'listUser')->name('user.list');
        Route::get('read', 'readUser')->name('user.readUser');
        Route::get('update', 'updateUser')->name('user.updateUser');
        Route::post('update', 'postUpdateUser')->name('user.postUpdateUser');
        Route::patch('{id}/toggle-status', 'toggleStatus')->name('user.toggleStatus');
        Route::delete('/user/{id}', [CrudUserController::class, 'destroy'])->name('user.destroy');
    });

    //reviews routes
    Route::prefix('reviews')->group(function () {
        Route::get('/', [CrudReviewController::class, 'index'])->name('reviews.list');
        Route::get('/create', [CrudReviewController::class, 'create'])->name('reviews.create');
        Route::post('/store', [CrudReviewController::class, 'store'])->name('reviews.store');
        Route::get('/{id}', [CrudReviewController::class, 'show'])->name('reviews.show');
        Route::get('/{id}/edit', [CrudReviewController::class, 'edit'])->name('reviews.edit');
        Route::put('/{id}', [CrudReviewController::class, 'update'])->name('reviews.update');
        Route::delete('/{id}', [CrudReviewController::class, 'destroy'])->name('reviews.destroy');
    });
});
Route::get('users/create', [CrudUserController::class, 'createUser'])->name('user.createUser');
Route::post('createUser', [CrudUserController::class, 'postUser'])->name('user.postUser');
// login routes
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('user.authUser');

Route::get('register', [LoginController::class, 'showRegisterForm'])->name('register');
Route::post('register', [LoginController::class, 'postUser'])->name('register.postUser');

Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/reset', [LoginController::class, 'showResetForm'])->name('reset.form');
Route::post('/reset', [LoginController::class, 'reset'])->name('reset');

Route::get('/forgot', [LoginController::class, 'showForgotForm'])->name('forgot.form');
Route::post('/forgot', [LoginController::class, 'forgot'])->name('forgot');

Route::get('reset-password/{token}', function ($token) {
    return view('login.reset-password', ['token' => $token]);
})->name('password.reset');

Route::post('reset-password', function (Illuminate\Http\Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:6|confirmed',
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) {
            $user->password = \Hash::make($password);
            $user->save();
        }
    );

    return $status === Password::PASSWORD_RESET
        ? redirect()->route('login')->with('success', 'Password reset successfully.')
        : back()->withErrors(['email' => [__($status)]]);
})->name('password.update');
//

Route::get('/author/{id}', [AuthorController::class, 'showAuthor'])->name('author.show');
Route::get('/index', [IndexController::class, 'index'])->name('index');
Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');
Route::get('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');

Route::get('/itemDetail/{book_id}', [ItemController::class, 'showItemDetail'])->name('item.detail');

Route::post('/api/wishlist/toggle', [WishlistsController::class, 'toggle'])->name('wishlist.toggle');
Route::get('/voucher', [VoucherController::class, 'index'])->name('voucher.index');
Route::get('/api/cart', [App\Http\Controllers\CartController::class, 'cartApi'])->name('cart.api');
Route::delete('/api/cart/{cart}', [App\Http\Controllers\CartController::class, 'deleteApi'])->name('cart.api.delete');
Route::patch('/api/cart/{cart}', [App\Http\Controllers\CartController::class, 'updateQuantity'])->name('cart.api.update');
Route::get('/pay', [PayController::class, 'ShowPay'])->name('pay.show');
Route::post('/vnpay_payment', [PaymentController::class, 'vnpay_payment']);
Route::post('/momo_payment', [PaymentController::class, 'momo_payment']);

Route::post('/api/reviews', [ReviewController::class, 'storeReview'])->name('reviews.storeReview');
Route::post('/api/reviews.update', [ReviewController::class, 'updateReview'])->name('reviews.updateReview');
Route::post('/api/reviews.delete', [ReviewController::class, 'deleteReview'])->name('reviews.deleteReview');
 Route::get('/voucher', [VoucherController::class, 'index'])->name('voucher.index');
Route::get('/api/cart', [App\Http\Controllers\CartController::class, 'cartApi'])->name('cart.api');
Route::delete('/api/cart/{cart}', [App\Http\Controllers\CartController::class, 'deleteApi'])->name('cart.api.delete');
Route::patch('/api/cart/{cart}', [App\Http\Controllers\CartController::class, 'updateQuantity'])->name('cart.api.update');
Route::get('/pay', [PayController::class, 'ShowPay'])->name('pay.show');
Route::post('/vnpay_payment', [PaymentController::class, 'vnpay_payment']);


Route::post('/api/reviews', [ReviewController::class, 'storeReview'])->name('reviews.storeReview');
Route::post('/api/reviews.update', [ReviewController::class, 'updateReview'])->name('reviews.updateReview');
Route::post('/api/reviews.delete', [ReviewController::class, 'deleteReview'])->name('reviews.deleteReview');
 
Route::get('/profile', [CrudUserController::class, 'myProfile'])->name('user.profile');
Route::get('/profile/edit', [CrudUserController::class, 'editProfile'])->name('user.profile.edit');
Route::put('/profile/update', [CrudUserController::class, 'updateProfile'])->name('user.updateProfile');

Route::get('/profile/change-password', [CrudUserController::class, 'showChangePasswordForm'])->name('user.showChangePasswordForm');
Route::put('/profile/change-password', [CrudUserController::class, 'changePassword'])->name('user.changePassword');

  
Route::delete('/profile', [CrudUserController::class, 'deleteAccount'])->name('user.deleteAccount');