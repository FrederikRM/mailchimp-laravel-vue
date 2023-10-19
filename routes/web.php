<?php

use App\Http\Controllers\MailchimpController;
use Illuminate\Support\Facades\Route;

$audienceId = getenv('VITE_MAILCHIMP_AUDIENCE_ID');

Route::post("/lists/{$audienceId}/members", [MailchimpController::class, 'subscribe']);
Route::get("/lists/{$audienceId}/members", [MailchimpController::class, 'subscribe']);
Route::get('ping', [MailchimpController::class, 'pingMailchimp']);
Route::get('test', function () {
    return response()->json(['message' => 'Test route is working']);
});

Route::get('/', function () {
    return view('app');
})
    ->name('application');
