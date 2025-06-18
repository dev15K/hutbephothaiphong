<?php

namespace App\Http\Controllers\restapi;

use App\Http\Controllers\Controller;

class MainApi extends Controller
{
    public function returnMessage($message)
    {
        return ['message' => $message];
    }
}
