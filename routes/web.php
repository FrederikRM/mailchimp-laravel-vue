<?php

use App\Http\Controllers\MailchimpController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;



// // API route for adding members (POST requests)
// Route::post('lists/850bacf7f2/members', function (Request $request) {
//     $client = new \MailchimpMarketing\ApiClient();

//     $email = $request->input('email-address');
//     $status = $request->input('status');

//     $client->setConfig([
//         'apiKey' => config('services.mailchimp.api_key'),
//         'server' => config('services.mailchimp.server'),
//     ]);

//     $response = $client->lists->addListMember('850bacf7f2', [
//         'email_address' => $email,
//         'status' => $status
//     ]);

//     ddd($response);
//     print_r($response);
// });

// // Browser testing route (GET request)
// Route::get('lists/850bacf7f2/members', function () {
//     $client = new \MailchimpMarketing\ApiClient();

//     $client->setConfig([
//         'apiKey' => config('services.mailchimp.api_key'),
//         'server' => config('services.mailchimp.server'),
//     ]);

//     $response = $client->lists->addListMember('850bacf7f2', [
//         'email_address' => 'john@doe.dk',
//         'status' => 'subscribed'
//     ]);

//     ddd($response);
// });


// // TEST API RESPONSE
// Route::get('ping', function () {

//     $mailchimp = new \MailchimpMarketing\ApiClient();

//     $mailchimp->setConfig([
//         'apiKey' => config('services.mailchimp.api_key'),
//         'server' => config('services.mailchimp.server'),
//     ]);


//     $response = $mailchimp->ping->get();


//     ddd($response);
// });

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
