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

    public function goodDetails($arg)
    {
        $data = Good::find($arg['good_id']);

        return json_encode($data);
    }
}