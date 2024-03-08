<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class unauthorizedAccessController extends Controller
{
    public function unauthorized () {
        return view('unauthorized');
    }
}
