<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Setting;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TestimonialsController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        $testimonials = Testimonial::all();
        $clients = Client::all();
        return view('admin.testimonials', compact('clients', 'testimonials', 'setting'));
    }
    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'clients_id' => 'required|exists:clients,id',
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'photo' => 'required|image|mimes:jpg,jpeg|max:2048', // Ubah sesuai kebutuhan
            'text' => 'required|string',
        ]);

        // Jika validasi gagal, kembali ke halaman sebelumnya dengan error
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Simpan foto ke dalam folder
        $image = $request->photo;
        $imageName = $image->hashName();
        $image->move(public_path('assets/images/testimonial'), $imageName);

        // Buat instance model Testimonial
        $testimonial = new Testimonial();
        $testimonial->clients_id = $request->clients_id;
        $testimonial->name = $request->name;
        $testimonial->position = $request->position;
        $testimonial->photo = $imageName; // Simpan nama foto
        $testimonial->text = $request->text;
        $testimonial->save();

        // Redirect kembali dengan pesan sukses
        return redirect()->route('testimonials')->with('success', 'Testimonial berhasil disimpan');
    }
    
    public function destroy(Request $request)
    {
        $data = Testimonial::findOrFail($request->id);
        if ($data->photo) {
            $oldImagePath = public_path('assets/images/testimonial/' . $data->photo);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }
        $data->delete();
        return redirect()->route('testimonials')->with('success', 'Data berhasil dihapus');
    }
    public function update(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'clients_id' => 'required|exists:clients,id',
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'photo' => 'image|mimes:jpg,jpeg|max:2048', // Ubah sesuai kebutuhan
            'text' => 'required|string',
        ]);

        // Jika validasi gagal, kembali ke halaman sebelumnya dengan error
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $data = Testimonial::findOrFail($request->id);
        if ($request->hasFile('photo')) {
            $oldImagePath = public_path('assets/images/testimonial/' . $data->photo);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
            $image = $request->photo;
            $imageName = $image->hashName(); // Mendapatkan nama asli file
            $image->move(public_path('assets/images/testimonial/'), $imageName);
            $data->photo = $imageName;
        }
        // Buat instance model Testimonial
        $data->clients_id = $request->clients_id;
        $data->name = $request->name;
        $data->position = $request->position; 
        $data->text = $request->text;
        $data->save();

        // Redirect kembali dengan pesan sukses
        return redirect()->route('testimonials')->with('success', 'Testimonial berhasil disimpan');
    }
}
