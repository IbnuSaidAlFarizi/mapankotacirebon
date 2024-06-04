<?php

namespace App\Http\Controllers;

use App\Models\HomePage;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Home extends Controller
{
    public function index()
    {
        $home = HomePage::first();
        $setting = Setting::first();
        return view('admin.home', compact('setting', 'home'));
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // Section 1
            'section1_title' => 'required|string|max:255',
            'section1_subtitle' => 'required|string|max:255',
            'section1_photo' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'section1_url' => 'required|string|max:255',

            // Section 2
            'section2_list1' => 'required|string|max:255',
            'section2_list1_val' => 'required|string|max:255',
            'section2_list2' => 'required|string|max:255',
            'section2_list2_val' => 'required|string|max:255',
            'section2_list3' => 'required|string|max:255',
            'section2_list3_val' => 'required|string|max:255',
            'section2_photo' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',

            // Section 3
            'section3_title' => 'required|string|max:255',
            'section3_subtitle' => 'required|string|max:255',
            'section3_vid1' => 'nullable|file|mimes:mp4|max:20480',
            'section3_vid2' => 'nullable|file|mimes:mp4|max:20480',
            'section3_photo' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $home = HomePage::first();

        $dataToUpdate = $request->only([
            'section1_title', 'section1_subtitle', 'section1_url',
            'section2_list1', 'section2_list1_val', 'section2_list2', 'section2_list2_val', 'section2_list3', 'section2_list3_val',
            'section3_title', 'section3_subtitle'
        ]);

        // Handling file uploads
        if ($request->hasFile('section1_photo')) {
            $dataToUpdate['section1_photo'] = $this->handleFileUpload($request->file('section1_photo'), 'assets/template/assets/img/', $home->section1_photo);
        }

        if ($request->hasFile('section2_photo')) {
            $dataToUpdate['section2_photo'] = $this->handleFileUpload($request->file('section2_photo'), 'assets/template/assets/img/', $home->section2_photo);
        }

        if ($request->hasFile('section3_photo')) {
            $dataToUpdate['section3_photo'] = $this->handleFileUpload($request->file('section3_photo'), 'assets/template/assets/img/', $home->section3_photo);
        }

        if ($request->hasFile('section3_vid1')) {
            $dataToUpdate['section3_vid1'] = $this->handleFileUpload($request->file('section3_vid1'), 'assets/template/assets/img/', $home->section3_vid1);
        }

        if ($request->hasFile('section3_vid2')) {
            $dataToUpdate['section3_vid2'] = $this->handleFileUpload($request->file('section3_vid2'), 'assets/template/assets/img/', $home->section3_vid2);
        }

        $home->update($dataToUpdate);

        return redirect()->route('home')->with('success', 'Data berhasil diperbarui');
    }

    private function handleFileUpload($file, $directory, $oldFilePath = null)
    {
        if ($oldFilePath) {
            $oldFileFullPath = public_path($directory . '/' . $oldFilePath);
            if (file_exists($oldFileFullPath)) {
                unlink($oldFileFullPath);
            }
        }

        $fileName = $file->hashName();
        $file->move(public_path($directory), $fileName);

        return $fileName;
    }
}
