<?php

use App\Http\Controllers\NewsAPIcontroller;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\LoginController;
use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Client\Events\RequestSending;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Request as HttpFoundationRequest;
use Illuminate\Support\Facades\Http;

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

Route::get('/', [NewsAPIcontroller::class, 'mainPageNews']);

Route::get('/about', function () {
    return view('about');
});

Route::get('/news', function () {
    return view('news');
});

Route::post('/news', [NewsAPIcontroller::class, 'search']);

Route::get('/reg', function () {
    return view('reg');
});

Route::post('/reg/submit', [RegistrationController::class, 'submit']);

Route::get('/login', function () {
    return view('login');
});

Route::post('/login', [LoginController::class, 'login']);

Route::get('/logout', [LoginController::class, 'logout']);
