<?php

namespace App\Http\Controllers\HomePortal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        return view('home_board.index');
    }
}
