<?php

use App\Http\Controllers\MailchimpController;
use Illuminate\Support\Facades\Route;



Route::post('/lists/850bacf7f2/members', [MailchimpController::class, 'subscribe']);
Route::get('/lists/850bacf7f2/members', [MailchimpController::class, 'subscribe']);
Route::get('ping', [MailchimpController::class, 'pingMailchimp']);
Route::get('test', function () {
    return response()->json(['message' => 'Test route is working']);
});

Route::get('/', function () {
    return view('app');
})
    ->name('application');
