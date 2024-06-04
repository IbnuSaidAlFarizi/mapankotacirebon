<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Setting;
use App\Models\WhyUs;

class WebAboutController extends Controller
{
    function show()
    {
        $setting = Setting::first();
        $about = About::first();
        $why = WhyUs::all();
        return view('website.about', compact('why', 'setting', 'about'));
    }
}
