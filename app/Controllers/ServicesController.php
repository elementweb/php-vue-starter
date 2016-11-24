<?php

namespace App\Controllers;

use App\Models\Service;

class ServicesController extends Controller
{
    public function listServices()
    {
        header('Content-Type: application/json');

        return Service::all();
    }

    public function listAvailableWorkdays()
    {
        header('Content-Type: application/json');

        return json_encode([
            1 => "Monday",
            2 => "Tuesday",
            3 => "Wednesday",
            4 => "Thursday",
            5 => "Friday",
            6 => "Saturday"
        ]);
    }

    public function listAvailableHours()
    {
        header('Content-Type: application/json');

        return json_encode([
            9 => "9am - 10am",
            10 => "10am - 11am",
            11 => "11am - 12pm",
            12 => "12pm - 1pm",
            13 => "1pm - 2pm",
            14 => "2pm - 3pm",
            15 => "3pm - 4pm",
            16 => "4pm - 5pm",
            17 => "5pm - 6pm",
            18 => "6pm - 7pm"
        ]);
    }
}