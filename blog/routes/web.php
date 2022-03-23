<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\UserController;
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
    return view('home');
})
    ->middleware(['membership'])
    ->name('home');

//Route::get('home', 'HomeController@index')->middleware('login', 'membership');
Route::get('demo-collection', 'HomeController@demoCollection')->middleware('role:editor');

//Route::resource('photos', 'PhotoController');
Route::resources([
    'photos' => 'PhotoController',
    'posts' => 'PostController',
]);

//Route::middleware('check-login')->group(function () {
    Route::prefix('user')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('listUser');
        Route::get('create', [UserController::class, 'create'])->name('createUser');
        Route::post('store', [UserController::class, 'store'])->name('storeUser');
        Route::get('edit/{id}', [UserController::class, 'edit'])->name('editUser');
        Route::post('update/{id}', [UserController::class, 'update'])->name('updateUser');
        Route::get('detail/{id}', [UserController::class, 'show'])->name('showUser');
        Route::get('delete/{id}', [UserController::class, 'delete'])->name('deleteUser');
        Route::get('send-mail/{id}', [UserController::class, 'sendMail'])->name('sendMailUser');
    });
//});

Route::group(['middleware' => 'auth'], function () {
    Route::prefix('posts')->group(function () {
        Route::get('/', [PostsController::class, 'index'])->name('listPosts');
        Route::get('create', [PostsController::class, 'create'])->name('createPosts');
        Route::get('edit/{id}', [PostsController::class, 'edit'])
            ->name('editPosts');
        Route::get('delete/{id}', [PostsController::class, 'destroy'])->name('destroyPosts');
        Route::get('detail/{id}', [PostsController::class, 'show'])->name('detailPosts');
    });
});

//Route::middleware('check-login', 'throttle:60,1')->group(function () {
Route::middleware('auth')->group(function () {
    Route::prefix('category')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('listCategory');
        Route::get('create', [CategoryController::class, 'create'])->name('createCategory');
    });
});

Route::get('foo', function () {
    return 'Hello World';
});

Route::redirect('/foo', '/user', 301);
//Route::redirect('/here', '/user', 301);
Route::view('/welcome', 'welcome');

Route::get('posts/{post}/comments/{comment}', function ($postId, $commentId) {
    dd($postId, $commentId);
});

//Route::get('test-route/{name?}', function ($name = null) {
//    return $name;
//});

Route::get('test-route/{name}', function ($name) {
    return $name;
})->where('name', '[A-Za-z]+');

Route::get('search/{search}', function ($search) {
    return $search;
})->where('search', '.*');

Route::namespace('Admin')->group(function () {
    Route::get('hello', function () {
        return 'Hello World';
    });
});

Route::domain('{account}.myapp.com')->group(function () {
    Route::get('user/{id}', function ($account, $id) {
        //
    });
});

Route::prefix('admin')->group(function () {
    Route::get('users', function () {
        return 'admin/users';
    });
});

Route::name('admin.')->group(function () {
    Route::get('users', function () {
        return 'admin.users';
    })->name('users');
});

Route::get('api/users/{user}', function (App\User $user) {
    return $user->email;
});

Route::get('api/posts/{post}', function (App\Posts $post) {
    return $post;
})->middleware('can:update-post,post');

Route::get('profile/{user}', function () {

});

Route::fallback(function () {
    //
});

Auth::routes();
