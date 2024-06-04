<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        return view('admin.dashboard',compact('setting'));
    }
}
