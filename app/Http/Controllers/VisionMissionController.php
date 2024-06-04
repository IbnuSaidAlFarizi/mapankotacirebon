<?php

namespace App\Http\Controllers;

use App\Models\Meta;
use App\Models\Setting;
use App\Models\VisionMission;
use App\Models\VisionPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VisionMissionController extends Controller
{
    public function index()
    {
        $data = VisionMission::first();
        $page = VisionPage::first();
        $setting = Setting::first();
        return view('admin.visionmission', compact('setting', 'data','page'));
    }
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'vision' => 'required|string',
            'mission' => 'required|string',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $data = VisionMission::first();
        $data->vision = $request->vision;
        $data->title = $request->title;
        $data->mission = $request->mission;
        $data->save();
        return redirect()->route('vision-mission')->with('success', 'Data berhasil diperbarui');
    }
    function update_hero(Request $request) {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $about = VisionPage::first();
        $about->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);
        return redirect()->route('vision-mission')->with('success', 'Data berhasil diperbarui');
    }
}
