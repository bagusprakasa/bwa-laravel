<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Dashboard';
        $data = array(
            'title' => 'Dashboard',
        );
        return view('pages.dashboard.index', compact('title'));
    }
}
