<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Facilities;
use App\Models\FacilitiesPage;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WebFacilitiesController extends Controller
{
    public function show()
    {
        $setting = Setting::first();
        $list = Facilities::all();
        $facilities = FacilitiesPage::first();
        return view('website.facilities', compact('setting', 'list','facilities'));
    }
    public function index()
    {
        $setting = Setting::first();
        $list = Facilities::all();
        $facilities = FacilitiesPage::first();
        return view('admin.facilities', compact('setting', 'list','facilities'));
    }
    function update_hero(Request $request) {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $about = FacilitiesPage::first();
        $about->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);
        return redirect()->route('facilities')->with('success', 'Data berhasil diperbarui');
    }
    function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'icon' => 'required|string|max:30',
            'description' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        Facilities::create([
            'name' => $request->name,
            'icon' => $request->icon,
            'description' => $request->description,
        ]);
        return redirect()->route('facilities')->with('success', 'Data berhasil ditambahkan');
    }

    function update(Request $request, $id) {
        $facilities = Facilities::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'icon' => 'required|string|max:30',
            'description' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $facilities->update([
            'name' => $request->name,
            'icon' => $request->icon,
            'description' => $request->description,
        ]);
        return redirect()->route('facilities')->with('success', 'Data berhasil diperbarui');
    }
    function destroy($id) {
        $facilities = Facilities::findOrFail($id);
        $facilities->delete();
        return redirect()->route('facilities')->with('success', 'Data berhasil dihapus');
    }
}
