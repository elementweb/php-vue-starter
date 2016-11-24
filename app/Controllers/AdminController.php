<?php

namespace App\Controllers;

use App\Models\User;
use App\Models\Quote;
use App\Helpers\View;
use App\Models\Subscription;
use App\Models\Service;
use App\Models\Good;

class AdminController extends Controller
{
    public function displayDashboard()
    {
        $data = [
            "new_quotes" => Quote::all()->count(),
            "new_users" => User::all()->count()
        ];

        return View::make('admin', 'admin.dashboard', $data);
    }
    
    public function displayQuotes()
    {
        $quotes = Quote::all()->toArray();

        $data = [
            "quotes" => $quotes
        ];


        return View::make('admin', 'admin.quotes', $data);
    }
    
    public function displayProducts()
    {
        $subscriptions = Subscription::all()->toArray();
        $services = Service::all()->toArray();
        $goods = Good::all()->toArray();

        $data = [
            "subscriptions" => $subscriptions,
            "services" => $services,
            "goods" => $goods
        ];

        return View::make('admin', 'admin.products', $data);
    }

    public function displayUsers()
    {
        $users = User::all()->toArray();

        $data = [
            "users" => $users
        ];

        return View::make('admin', 'admin.users', $data);
    }
}