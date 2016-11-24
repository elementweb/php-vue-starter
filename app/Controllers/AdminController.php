<?php

namespace App\Controllers;

use App\Models\User;
use App\Models\Quote;
use App\Helpers\View;

class AdminController extends Controller
{
    public function displayDashboard()
    {
        $data = [
        ];

        return View::make('admin', 'admin.dashboard', $data);
    }
    
    public function displayQuotes()
    {
        $data = [
        ];

        return View::make('admin', 'admin.quotes', $data);
    }
    
    public function displayProducts()
    {
        $data = [
        ];

        return View::make('admin', 'admin.products', $data);
    }

    public function displayUsers()
    {
        $data = [
        ];

        return View::make('admin', 'admin.users', $data);
    }
}