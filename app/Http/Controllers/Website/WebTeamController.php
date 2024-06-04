<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\Team;
use App\Models\TeamPage;
use Illuminate\Http\Request;

class WebTeamController extends Controller
{
    public function show()
    {
        $setting = Setting::first();
        $list = Team::all();
        $team = TeamPage::first();
        return view('website.team', compact('setting', 'list','team'));
    }
}
