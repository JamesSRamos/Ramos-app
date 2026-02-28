<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

use App\Services\UserService;
use App\Services\ProductService;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/


// Home Route
Route::get('/', function (Request $request) {

    // get name from query string (?name=David)
    $name = $request->input('name', 'Greed Island');

    return view('welcome', compact('name'));

});


// Show users using controller
Route::get('/show-users', [UserController::class, 'show']);


// Service Container example
Route::get('/test-container', function (Request $request) {

    $input = $request->input('key');

    return $input;

});


// Service Provider example
Route::get('/test-provider', function (UserService $userService) {

    return $userService->listUsers();

});


// Controller route
Route::get('/test-users', [UserController::class, 'index']);


// Facade example
Route::get('/test-facade', function (UserService $userService) {

    return Response::json($userService->listUsers());

});


// Route parameters
Route::get('/post/{post}/comment/{comment}', function ($post, $comment) {

    return "Post ID: " . $post . " - Comment: " . $comment;

});


// Route with number only constraint
Route::get('/post/{id}', function ($id) {

    return $id;

})->where('id', '[0-9]+');


// Route accept any search string
Route::get('/search/{search}', function ($search) {

    return $search;

})->where('search', '.*');


// Named route
Route::get('/test/route/sample', function () {

    return route('test-route');

})->name('test-route');


// Middleware group
Route::middleware(['user-middleware'])->group(function () {

    Route::get('route-middleware-group/first', function () {

        return 'first';

    });

    Route::get('route-middleware-group/second', function () {

        return 'second';

    });

});


// Controller group
Route::controller(UserController::class)->group(function () {

    Route::get('/users', 'index');

    Route::get('/users/first', 'first');

    Route::get('/users/{id}', 'get');

});


// CSRF form
Route::get('/token', function () {

    return view('token');

});


Route::post('/token', function (Request $request) {

    return $request->all();

});


// Resource Controller
Route::resource('products', ProductController::class);


// View with data from service
Route::get('/product-list', function (ProductService $productService) {

    $products = $productService->listProducts();

    return view('product-list', compact('products'));

});