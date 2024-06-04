<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        return view('admin.settings', compact('setting'));
    }
    public function setting_umum(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'app_name' => 'required|string|max:255',
            'app_name2' => 'required|string|max:255',
            'app_name3' => 'required|string|max:255',
            'open_weekday' => 'required|string|max:255',
            'open_weekend' => 'required|string|max:255',
            'address' => 'required|string',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $data = Setting::first();
        if ($request->hasFile('logo')) {
            $oldImagePath = public_path('assets/template/assets/img/' . $data->logo);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
            $image = $request->logo;
            $imageName = $image->hashName();
            $image->move(public_path('assets/template/assets/img/'), $imageName);
            $data->logo = $imageName;
        }

        $data->app_name = $request->app_name;
        $data->app_name2 = $request->app_name2;
        $data->app_name3 = $request->app_name3;
        $data->open_weekday = $request->open_weekday;
        $data->open_weekend = $request->open_weekend;
        $data->address = $request->address;
        $data->save();

        return redirect()->route('settings')->with('success', 'Pengaturan umum berhasil diperbarui.');
    }
    public function setting_contact(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'facebook' => 'nullable|string',
            'instagram' => 'nullable|string',
            'youtube' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $data = Setting::first();
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->facebook = $request->facebook;
        $data->instagram = $request->instagram;
        $data->youtube = $request->youtube;
        $data->save();

        return redirect()->route('settings')->with('success', 'Pengaturan contact berhasil diperbarui.');
    }
    public function setting_account(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'firstName' => 'required|string|max:255',
            'middleName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|string',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $data = User::first();
        if ($request->hasFile('photo')) {
            $oldImagePath = public_path('assets/template/assets/img/' . $data->photo);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
            $image = $request->photo;
            $imageName = $image->hashName();
            $image->move(public_path('assets/template/assets/img/'), $imageName);
            $data->photo = $imageName;
        }

        $data->firstName = $request->firstName;
        $data->middleName = $request->middleName;
        $data->lastName = $request->lastName;
        $data->email = $request->email;
        $data->save();

        return redirect()->route('settings')->with('success', 'Pengaturan umum berhasil diperbarui.');
    }
    public function setting_pass(Request $request)
    {
        // Validate the request data
        $request->validate([
            'password' => 'required|string|min:6', // Validate the old password
            'passwordnew' => 'required|string|min:6', // Validate the new password
        ]);

        $user = User::find(Auth::id());
        if (!Hash::check($request->password, $user->password)) {
            return redirect()->back()->with('error', 'Password lama tidak cocok.');
        }
        $user->password = Hash::make($request->passwordnew);
        $user->save();
        return redirect()->back()->with('success', 'Password berhasil diperbarui.');
    }
}
