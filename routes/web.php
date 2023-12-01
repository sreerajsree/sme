<?php

use App\Http\Controllers\Frontend\PostController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\CommentController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\LikeController;
use App\Http\Controllers\Frontend\SearchController;
use App\Http\Controllers\Frontend\SubscriptionController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\CommentController as DashboardCommentController;
use App\Http\Controllers\Dashboard\ExportController;
use App\Http\Controllers\Dashboard\PermissionController;
use App\Http\Controllers\Dashboard\PhotoController;
use App\Http\Controllers\Dashboard\PostController as DashboardPostController;
use App\Http\Controllers\Dashboard\RoleController;
use App\Http\Controllers\Dashboard\SearchController as DashboardSearchController;
use App\Http\Controllers\Dashboard\SubscriptionController as DashboardSubscriptionController;
use App\Http\Controllers\Dashboard\TagController;
use App\Http\Controllers\Dashboard\TrashController;
use App\Http\Controllers\Dashboard\MagazineController;
use App\Http\Controllers\Dashboard\ClientController;
use App\Http\Controllers\Dashboard\FeaturedController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;

//Auth
Route::post('register', [RegisterController::class, 'register']);
Route::get('register', [RegisterController::class, 'redirect'])->name('register');
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');

//Laravel Socialite Facebook Google Github
Route::get('login/{provider}', [LoginController::class, 'redirectToProvider']);
Route::get('login/{provider}/callback', [LoginController::class, 'handleProviderCallback']);
//Contact
Route::get('contact', [ContactController::class, 'create'])->name('contact');
Route::post('contact', [ContactController::class, 'store']);
//About
Route::get('about', AboutController::class)->name('about');
//Magazine
Route::get('magazines', [PostController::class, 'magazines'])->name('magazines');
//News
Route::get('news', [PostController::class, 'postByNews'])->name('posts.by.news');
//Legal
Route::view('privacy-policy', 'frontend.legal.privacy-policy')->name('privacy-policy');
Route::view('terms-and-conditions', 'frontend.legal.terms-and-conditions')->name('terms-and-conditions');
Route::view('disclaimer', 'frontend.legal.disclaimer')->name('disclaimer');
Route::view('cookie-policy', 'frontend.legal.cookie-policy')->name('cookie-policy');
Route::view('advertise', 'frontend.legal.advertise')->name('advertise');
Route::view('newsletter', 'frontend.legal.newsletter')->name('newsletter');
//Search
Route::get('search', [SearchController::class, 'search'])->name('search.index');
//Post
Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('{category}', [PostController::class, 'postByCategory'])->name('posts.by.category');
Route::get('tag/{tag}', [PostController::class, 'postByTag'])->name('posts.by.tag');
Route::get('users/{user}', [PostController::class, 'postByUser'])->name('posts.by.user');
Route::get('category/{category}', [PostController::class, 'postByMain'])->name('posts.by.main');
Route::get('{category}/{post}', [PostController::class, 'show'])->name('post.show');

Route::get('profiles/{type}/{url}', [PostController::class, 'magazineProfile'])->name('magazine.profile');
Route::get('magazine/{year}/{url}', [PostController::class, 'magazineCover'])->name('magazine.cover');

//Comments
Route::get('posts/{post}/comments', [CommentController::class, 'index']);
Route::get('comments/{comment}/replies', [CommentController::class, 'showReplies']);
Route::post('comments/{post}', [CommentController::class, 'store'])->middleware(['auth']);
//Likes
Route::post('likes/{entityId}/{type}', [LikeController::class, 'like'])->middleware(['auth']);


//Subscription
Route::group(['prefix' => 'subscription'], function () {
    //Redirect to subscribed page by clicking confirm link in subscription-confirmation mail
    Route::get('subscribed', [SubscriptionController::class, 'subscribed'])->name('subscribed');
    //Redirect to unsubscribed page by clicking unsubscribe link
    Route::get('unsubscribed', [SubscriptionController::class, 'unsubscribed'])->name('unsubscribed');
    //Update subscribed status by clicking confirm link in subscription confirmation mail
    Route::get('subscribe', [SubscriptionController::class, 'update'])->name('subscription.update');
    //Delete email from subscription list via link in the newsletter mail
    Route::get('unsubscribe', [SubscriptionController::class, 'destroy'])->name('subscription.destroy');
});

//Dashboard
Route::group(['prefix' => 'dashboard/sme', 'middleware' => 'auth'], function () {
    //Resource
    Route::resource('posts', DashboardPostController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('tags', TagController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    //Expunge Photo
    Route::get('delete/{id}', [PhotoController::class, 'delete'])->name('photo.delete');
    //User
    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::patch('users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    //Clients
    Route::get('clients', [ClientController::class, 'index'])->name('clients.index');
    Route::get('clients/create', [ClientController::class, 'create'])->name('clients.create');
    Route::post('clients/store', [ClientController::class, 'store'])->name('clients.store');
    Route::get('clients/edit/{id}', [ClientController::class, 'edit'])->name('clients.edit');
    Route::patch('clients/update/{id}', [ClientController::class, 'update'])->name('clients.update');
    Route::delete('clients/destroy/{id}', [ClientController::class, 'destroy'])->name('clients.destroy');
    //Featured
    Route::get('featured', [FeaturedController::class, 'index'])->name('featured.index');
    Route::get('featured/create', [FeaturedController::class, 'create'])->name('featured.create');
    Route::post('featured/store', [FeaturedController::class, 'store'])->name('featured.store');
    Route::get('featured/edit/{id}', [FeaturedController::class, 'edit'])->name('featured.edit');
    Route::patch('featured/update/{id}', [FeaturedController::class, 'update'])->name('featured.update');
    Route::delete('featured/destroy/{id}', [FeaturedController::class, 'destroy'])->name('featured.destroy');
    //Magazine
    Route::get('magazine', [MagazineController::class, 'index'])->name('magazine.index');
    Route::get('magazine/create', [MagazineController::class, 'create'])->name('magazine.create');
    Route::post('magazine/store', [MagazineController::class, 'store'])->name('magazine.store');
    Route::get('magazine/edit/{id}', [MagazineController::class, 'edit'])->name('magazine.edit');
    Route::patch('magazine/update/{id}', [MagazineController::class, 'update'])->name('magazine.update');
    Route::delete('magazine/destroy/{id}', [MagazineController::class, 'destroy'])->name('magazine.destroy');
    Route::get('magazine/{id}/profile', [MagazineController::class, 'profile'])->name('magazine.profile');
    Route::get('magazine/{id}/profile/create', [MagazineController::class, 'createProfile'])->name('magazine.createProfile');
    Route::post('magazine/profile/store', [MagazineController::class, 'storeProfile'])->name('magazine.storeProfile');
    Route::get('magazine/profile/edit/{id}', [MagazineController::class, 'editProfile'])->name('magazine.editProfile');
    Route::patch('magazine/profile/update/{id}', [MagazineController::class, 'updateProfile'])->name('magazine.updateProfile');
    Route::delete('magazine/profile/destroy/{id}', [MagazineController::class, 'destroyProfile'])->name('magazine.destroyProfile');
    //Contacts
    Route::get('contacts', [ContactController::class, 'index'])->name('contacts.index');
    Route::delete('contacts/{id}', [ContactController::class, 'destroy'])->name('contacts.destroy');
    //Trash
    Route::get('trash', [TrashController::class, 'index'])->name('trash.index');
    Route::delete('delete/{id}', [TrashController::class, 'destroy'])->name('trash.destroy');
    Route::post('restore/{id}', [TrashController::class, 'restore'])->name('trash.restore');
    //Subscription
    Route::get('subscriptions', [DashboardSubscriptionController::class, 'index'])->name('subscriptions.index');
    Route::delete('subscriptions/{subscription}', [DashboardSubscriptionController::class, 'destroy'])->name('subscriptions.destroy');
    //Excel and Csv export
    Route::get('exportExcel', [ExportController::class, 'exportExcel'])->name('export.excel');
    Route::get('exportCsv', [ExportController::class, 'exportCsv'])->name('export.csv');
    //Comments list
    Route::get('comments', [DashboardCommentController::class, 'index'])->name('comments.index');
    Route::delete('comments/{comment}', [DashboardCommentController::class, 'destroy'])->name('comments.destroy');
    //Search
    Route::get('search', [DashboardSearchController::class, 'search'])->name('search');
});

/*For error page debug purpose
Route::fallback(function () {
    return view('errors.503');
});*/
