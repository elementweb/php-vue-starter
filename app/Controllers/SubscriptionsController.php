<?php

namespace App\Controllers;

use App\Models\Subscription;

class SubscriptionsController extends Controller
{
    public function listSubscriptions()
    {
        header('Content-Type: application/json');

        return Subscription::all();
    }

    public function subscriptionDetails($arg)
    {
        $data = Subscription::find($arg['subscription_id']);

        return json_encode($data);
    }
}