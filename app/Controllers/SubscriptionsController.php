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
}