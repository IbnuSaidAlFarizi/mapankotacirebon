<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class WebContactController extends Controller
{
    public function show()
    {
        $setting = Setting::first();
        return view('website.contact', compact('setting'));
    }
}
