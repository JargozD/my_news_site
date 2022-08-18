<?php

use App\Http\Controllers\NewsAPIcontroller;
use App\Http\Controllers\RegistrationController;
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

Route::get('/test', function () {
    return view('test');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/news', function () {
    return view('news');
});

Route::get('/reg', function () {
    return view('reg');
});

Route::post('/reg/submit', [RegistrationController::class, 'submit']);

Route::get('/news/search', [NewsAPIcontroller::class, 'search']);


Route::get('/jaja', function () {
    $response = Http::acceptJson()->get('https://newsapi.org/v2/everything?q=Кот Валлаби&apiKey=448e6a0fa3fb4c79aea5b6a8bf107705');
    var_dump(json_decode($response, true));
});