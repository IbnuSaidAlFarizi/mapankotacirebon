<?php

namespace App\Http\Controllers;

use App\Models\About;

class Download extends Controller
{
    function comprof(){ 
        $file = About::first()->company_profile;
        $pathToFile = public_path('assets/pdf/'.$file);
        return response()->download($pathToFile);
    }
}
