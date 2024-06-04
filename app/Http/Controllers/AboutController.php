<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Meta;
use App\Models\Setting;
use App\Models\WhyUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::first();
        $setting = Setting::first();
        $why_us = WhyUs::all();
        return view('admin.about', compact('setting', 'about','why_us'));
    }

    public function update(Request $request)
    { 
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'section1_image' => 'nullable|image|mimes:jpeg,jpg|max:2048',
            'section1_description' => 'required|string',
            'section2_description' => 'required|string',
            'section2_image' => 'nullable|image|mimes:jpeg,jpg|max:2048',
            'section2_video' => 'nullable|mimes:mp4|max:20480', // Max 20MB
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $about = About::first();

        // Handle section1_image
        if ($request->hasFile('section1_image')) {
            if ($about->section1_image) {
                $oldImagePath = public_path('assets/template/assets/img/' . $about->section1_image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            $section1Image = $request->file('section1_image');
            $section1ImageName = $section1Image->hashName();
            $section1Image->move(public_path('assets/template/assets/img/'), $section1ImageName);
            $about->section1_image = $section1ImageName;
        }

        // Handle section2_image
        if ($request->hasFile('section2_image')) {
            if ($about->section2_image) {
                $oldImagePath = public_path('assets/template/assets/img/' . $about->section2_image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            $section2Image = $request->file('section2_image');
            $section2ImageName = $section2Image->hashName();
            $section2Image->move(public_path('assets/template/assets/img/'), $section2ImageName);
            $about->section2_image = $section2ImageName;
        }

        // Handle section2_video
        if ($request->hasFile('section2_video')) {
            if ($about->section2_video) {
                $oldVideoPath = public_path('assets/template/assets/img/' . $about->section2_video);
                if (file_exists($oldVideoPath)) {
                    unlink($oldVideoPath);
                }
            }
            $section2Video = $request->file('section2_video');
            $section2VideoName = $section2Video->hashName();
            $section2Video->move(public_path('assets/template/assets/img/'), $section2VideoName);
            $about->section2_video = $section2VideoName;
        }

        $about->update([
            'title' => $request->title,
            'description' => $request->description,
            'section1_description' => $request->section1_description,
            'section2_description' => $request->section2_description,
            'section1_image' => isset($section1ImageName) ? $section1ImageName : $about->section1_image,
            'section2_image' => isset($section2ImageName) ? $section2ImageName : $about->section2_image,
            'section2_video' => isset($section2VideoName) ? $section2VideoName : $about->section2_video,
        ]);
        return redirect()->route('about')->with('success', 'Data berhasil diperbarui');
    }
}
