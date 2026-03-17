<?php

use App\Http\Controllers\ProductController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Http\Controllers\UserController;
use App\Services\ProductService;
use Illuminate\Support\Facades\Response;


// basic route
Route::get('/', function (Request $request) {
    // greet the user with a name passed via query string (e.g. /?name=Alice)
    $name = $request->input('name', 'Guest');
    return view('welcome', compact('name'));
});


// alternative root (kept from your code)
Route::get('/home', function () {
    return view('welcome', ['name' => 'Jco-app']);
    #return "Hello World";
});


Route::get('/show-users', [UserController::class, 'show']);


//Service Container
Route::get('/test-container', function (Request $request) {
    $input = $request->input('key');
    return $input;
});


//Service Provider
Route::get('/test-provider', function (UserService $userService) {
    return $userService->listUsers();
});


Route::get('/test-users', [UserController::class, 'index']);


//Facades
Route::get('/test-facade', function (UserService $userService) {
    return Response::json($userService->listUsers());
});


//exercise 3

//routing -> parameters
Route::get('/post/{post}/comment/{comment}', function (string $postId, string $comment) {
    return "Post ID: " . $postId . " - Comment: " . $comment;
});


// Exercise #3
Route::get('/post/{id}', function (string $id) {
    return $id;
})->where('id', '[0-9]+');


Route::get('/search/{search}', function (string $search) {
    return $search;
})->where('search', '.*');


//named route or route alias
Route::get('/test/route/sample', function () {
    return route('test-route');
})->name('test-route');


//route -> middleware group
Route::middleware(['user-middleware'])->group(function () {

    Route::get('route-middleware-group/first', function (Request $request) {
        echo 'first';
    });

    Route::get('route-middleware-group/second', function (Request $request) {
        echo 'second';
    });

});


//route -> Controller Group
Route::controller(UserController::class)->group(function () {
    Route::get('/users', 'index');
    Route::get('/users/first', 'first');
    Route::get('/users/{id}', 'get');
});


//csrf
Route::get('/token', function (Request $request) {
    return view('token');
});

Route::post('/token', function (Request $request) {
    return $request->all();
});


//middleware
Route::get('/users', [UserController::class, 'index'])->middleware('user-middleware');

// Controller
// Middleware
Route::get('/users', [UserController::class, 'index']);


//resourse
Route::resource('products', ProductController::class);


//view with data
Route::get('/product-list', function (ProductService $productService) {
    $data['products'] = $productService->listProducts();
    return view('product-list', $data);
});

//View with data
Route::get('/product-list-alt', function (ProductService $productService) {
    $data['products'] = $productService->listProducts();
    return view('products.list', $data);
});