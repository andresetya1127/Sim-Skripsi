<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SkripsiController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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

Session::put('showBy', 'list');

Route::get('/shwoBy/{show}', function ($show) {
    if (!$show == null) {
        Session::put('showBy', $show);
        Session::save();
        return redirect()->back();
    }
})->name('showBy.index');


Route::controller(DashboardController::class)->group(function () {
    Route::get('/', 'home')->name('root');
    Route::get('/chartColumn', 'chartColumn')->name('chartColumn');
});

Route::get('/contact', function () {
    return view('pages.contact', [
        'page_title' => 'Contact'
    ]);
})->name('contact');

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'index')->name('auth.index')->middleware('guest');
    Route::post('/authenticate', 'authenticate')->name('auth.authenticate')->middleware('guest');
    Route::post('/register', 'register')->name('auth.register')->middleware('guest');
    Route::post('/generateUser', 'generateUser')->name('auth.generate')->middleware('guest');
    Route::get('/sign_out', 'log_out')->name('auth.logOut')->middleware('auth');
});

Route::controller(BukuController::class)->group(function () {
    Route::get('/manageBuku', 'manageBuku')->name('buku.manage')->middleware('auth');
    Route::get('/addBuku', 'addBuku')->name('buku.add')->middleware('auth');
});

Route::controller(SkripsiController::class)->group(function () {
    Route::get('/all_Skripsi', 'index')->name('skripsi.index');
    Route::get('/loadMore', 'index')->name('load.index');
    Route::get('/SkripsiByKeyword/{keyword}', 'SkripsiByKeyword')->name('skripsi.key');
    Route::get('/detail_skripsi/{id}', 'detailSkripsi')->name('skripsi.detail');
    Route::get('/manageSkripsi', 'manageSkripsi')->name('skripsi.manage')->middleware(['auth', 'akademik']);
    Route::get('/tableSkripsi', 'tableSkripsi')->name('skripsi.table')->middleware('auth');
    Route::get('/addSkripsi', 'addSkripsi')->name('add.skripsi')->middleware('auth');
    Route::get('/editSkripsi/{id}', 'editSkripsi')->name('edit.skripsi')->middleware(['auth', 'akademik']);
    Route::post('/updateSkripsi/{id}', 'updateSkripsi')->name('update.skripsi')->middleware(['auth', 'akademik']);
    Route::get('/deleteSkripsi/{id}', 'deleteSkripsi')->name('delete.skripsi')->middleware(['auth', 'akademik']);
    Route::post('/saveSkripsi', 'saveSkripsi')->name('save.skripsi')->middleware('auth');
    Route::get('/search', 'search_skripsi')->name('search.skripsi');
    Route::get('/search_tema', 'search_tema')->name('search.tema');
    Route::get('/downloadFile/{file}', 'downloadFile')->name('download.skripsi')->middleware('auth');
});
