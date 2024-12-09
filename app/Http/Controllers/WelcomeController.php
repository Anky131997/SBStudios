<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function welcome(){
        $services = Service::all();
        return view("welcome", ["services" => $services]);
    }
}
