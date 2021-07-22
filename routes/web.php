<?php

use App\Models\Publisher;
use App\Models\Resource;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Spatie\Searchable\Search;

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
    $results = DB::table('resources')

    ->get();
    return view('home');
})->name('home');
