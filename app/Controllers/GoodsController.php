<?php

namespace App\Controllers;

use App\Models\Good;

class GoodsController extends Controller
{
    public function listGoods()
    {
        header('Content-Type: application/json');

        return Good::all();
    }
}