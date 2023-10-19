<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class MailchimpController extends Controller
{
    public function subscribe(Request $request)
    {
        $email = $request->input('email');
        $status = $request->input('status');

        $client = new \MailchimpMarketing\ApiClient();
        $client->setConfig([
            'apiKey' => config('services.mailchimp.api_key'),
            'server' => config('services.mailchimp.server'),
        ]);

        $response = $client->lists->addListMember("850bacf7f2", [
            "email_address" => $email,
            "status" => $status,
        ]);
        print_r($response);

        return response()->json(['message' => 'Subscribed to Mailchimp']);
    }

    public function pingMailchimp()
    {
        $mailchimp = new \MailchimpMarketing\ApiClient();
        $mailchimp->setConfig([
            'apiKey' => config('services.mailchimp.api_key'),
            'server' => config('services.mailchimp.server'),
        ]);

        $response = $mailchimp->ping->get();
        print_r($response);
        ddd($response);

        return response()->json(['message' => "Mailchimp is healthy"]);
    }
}
