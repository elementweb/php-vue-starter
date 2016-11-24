<?php

namespace App\Controllers;

use App\Helpers\View;

class HomeController extends Controller
{
    public function index()
    {
		$data = [
		];

		return View::make('public', 'public.home', $data);
    }
}