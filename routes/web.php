<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhoneController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/{name}', function () {
    return redirect('/');
})->where('name', '[A-Za-z]+');

Route::resource('phone', PhoneController::class)->except(['index']);
Route::get('get-all-phone',[PhoneController::class,'getAllPhoneBook'])->name('get-all-phone');