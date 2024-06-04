<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Industries;
use App\Models\Order_service;
use App\Models\Setting;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClientsController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        $data = Client::all();
        return view('admin.clients', compact('data', 'setting'));
    }

    function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'logo' => 'required|image|mimes:jpg,jpeg|max:2048',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $image = $request->logo;
        $imageName = $image->hashName();
        $image->move(public_path('assets/template/assets/img/clients/'), $imageName);

        $data = new Client();
        $data->logo = $imageName;
        $data->save();
        return redirect()->route('clients')->with('success', 'Meta berhasil diperbarui');
    }
    public function destroy(Request $request)
    {
        $data = Client::findOrFail($request->id);
        if ($data->logo) {
            $oldImagePath = public_path('assets/template/assets/img/clients/' . $data->logo);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }
        $data->delete();
        return redirect()->route('clients')->with('success', 'Data berhasil dihapus');
    }
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'logo' => 'required|image|mimes:jpg,jpeg|max:2048',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = Client::findOrFail($request->id);

        // Jika ada file foto yang diunggah
        if ($request->hasFile('logo')) {
            $oldImagePath = public_path('assets/template/assets/img/clients/' . $data->logo);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
            $image = $request->logo;
            $imageName = $image->hashName(); // Mendapatkan nama asli file
            $image->move(public_path('assets/template/assets/img/clients/'), $imageName);
            $data->logo = $imageName;
        }
 
        $data->save();
        return redirect()->route('clients')->with('success', 'Data klien berhasil diperbarui');
    }
}
