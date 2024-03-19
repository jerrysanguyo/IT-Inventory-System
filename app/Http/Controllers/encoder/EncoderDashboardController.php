<?php

namespace App\Http\Controllers\encoder;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EncoderDashboardController extends Controller
{
    public function index() 
    {
        return view('encoder.index');
    }
}
