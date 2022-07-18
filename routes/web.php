<?php

use App\Http\Controllers\PasienController;
use Illuminate\Support\Facades\Route;
use Carbon\Carbon;


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
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/show', 'App\Http\Controllers\PasienController@show');

Route::get('/file-import',[pasienController::class,'importView'])->name('import-view');
Route::post('/import',[pasienController::class,'import'])->name('import');
Route::get('/export-users',[PasienController::class,'exportUsers'])->name('export-users');

Route::get('/', function () {
    if (request()->start_date || request()->end_date) {
        $start_date = Carbon::parse(request()->start_date)->toDateTimeString();
        $end_date = Carbon::parse(request()->end_date)->toDateTimeString();
        $pasiens = App\Models\Pasien::whereBetween('created_at',[$start_date,$end_date])->get();
    } else {
        $pasiens = App\Models\Pasien::latest()->get();
    }
    
    return view('pasien.index', compact('pasiens'));
});

Route::resource('pasien', PasienController::class)->middleware('auth:sanctum');