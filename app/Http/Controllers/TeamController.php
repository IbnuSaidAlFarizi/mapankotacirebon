<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Team;
use App\Models\TeamPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TeamController extends Controller
{
    public function index()
    {
        $data = Team::orderBy('name')->get();
        $pageTeam = TeamPage::first();
        $setting = Setting::first();
        return view('admin.team', compact('setting', 'data', 'pageTeam'));
    }
    function update_hero(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $about = TeamPage::first();
        $about->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);
        return redirect()->route('team')->with('success', 'Data berhasil diperbarui');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'facebook' => 'nullable|string|max:255',
            'twitter' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'linkedin' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $image = $request->file('image');
        $imageName = $image->hashName();
        $image->move(public_path('assets/template/assets/img/team/'), $imageName);

        Team::create([
            'name' => $request->name,
            'position' => $request->position,
            'image' => $imageName,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'instagram' => $request->instagram,
            'linkedin' => $request->linkedin,
        ]);

        return redirect()->route('team')->with('success', 'Data berhasil disimpan');
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'facebook' => 'nullable|string|max:255',
            'twitter' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'linkedin' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $team = Team::findOrFail($id);

        if ($request->hasFile('image')) {
            if ($team->image) {
                $oldImagePath = public_path('assets/template/assets/img/team/' . $team->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $image = $request->file('image');
            $imageName = $image->hashName();
            $image->move(public_path('assets/template/assets/img/team/'), $imageName);
            $team->image = $imageName;
        }
        $team->name = $request->name;
        $team->position = $request->position;
        $team->facebook = $request->facebook ? $request->facebook : '';
        $team->twitter = $request->twitter ? $request->twitter : '';
        $team->instagram = $request->instagram ? $request->instagram : '';
        $team->linkedin = $request->linkedin ? $request->linkedin : '';
        $team->save();
        return redirect()->route('team')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        $team = Team::findOrFail($id);
        if ($team->image) {
            $oldImagePath = public_path('assets/template/assets/img/team/' . $team->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }

        $team->delete();
        return redirect()->route('team')->with('success', 'Data berhasil dihapus');
    }
}
