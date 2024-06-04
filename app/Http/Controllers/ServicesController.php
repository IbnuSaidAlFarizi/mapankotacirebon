<?php

namespace App\Http\Controllers;

use App\Models\Hero_service;
use App\Models\Meta;
use App\Models\Service;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ServicesController extends Controller
{
    public function index()
    {
        $meta = Meta::where('key', 'service')->first();
        $services = Hero_service::first();
        $data = Service::all();
        $setting = Setting::first();
        return view('admin.services', compact('setting', 'meta', 'services', 'data'));
    }
    function meta(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'keyword' => 'required|string',
            'description' => 'required|string',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        Meta::where('key', 'service')->update([
            'keyword' => $request->keyword,
            'description' => $request->description,
        ]);

        // Redirect ke halaman yang sesuai
        return redirect()->route('services')->with('success', 'Meta berhasil diperbarui');
    }
    function update_hero(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'h1' => 'required|string|max:255',
            'p' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $about = Hero_service::first();
        $about->update([
            'h1' => $request->h1,
            'p' => $request->p,
        ]);
        return redirect()->route('services')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy(Request $request)
    {
        $service = Service::findOrFail($request->id);
        if ($service->photo) {
            $oldImagePath = public_path('assets/images/service/' . $service->photo);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }
        $service->delete();
        return redirect()->route('services')->with('success', 'Data berhasil dihapus');
    }
    public function update(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'icon' => 'required|string', // Ubah sesuai kebutuhan
            'keyword' => 'required|string', // Ubah sesuai kebutuhan
            'description' => 'required|string', // Ubah sesuai kebutuhan
            'photo' => 'required|image|mimes:jpg,jpeg|max:2048', // Ubah sesuai kebutuhan
            'content' => 'required|string', // Ubah sesuai kebutuhan
        ]);

        // Jika validasi gagal, kembali ke halaman sebelumnya dengan error
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Mengambil data service berdasarkan ID
        $service = Service::findOrFail($request->id);

        // Jika ada file foto yang diunggah
        if ($request->hasFile('photo')) {
            // Hapus gambar lama jika ada
            if ($service->photo) {
                $oldImagePath = public_path('assets/images/service/' . $service->photo);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            // Simpan file yang diunggah ke dalam direktori public
            $image = $request->photo;
            $imageName = $image->hashName(); // Mendapatkan nama asli file
            $image->move(public_path('assets/images/service'), $imageName);

            // Update data service dengan foto baru
            $service->photo = $imageName;
        }

        // Update data service dengan input lainnya
        $service->name = $request->name;
        $service->icon = $request->icon;
        $service->keyword = $request->keyword;
        $service->description = $request->description;
        $service->slug = Str::slug($request->name);
        $service->content = $request->content;

        // Simpan perubahan
        $service->save();

        // Redirect kembali dengan pesan sukses
        return redirect()->route('services')->with('success', 'Data berhasil diperbarui');
    }
    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'icon' => 'required|string', // Ubah sesuai kebutuhan
            'keyword' => 'required|string', // Ubah sesuai kebutuhan
            'description' => 'required|string', // Ubah sesuai kebutuhan
            'photo' => 'required|image|mimes:jpg,jpeg|max:2048', // Ubah sesuai kebutuhan
            'content' => 'required|string', // Ubah sesuai kebutuhan
        ]);

        // Jika validasi gagal, kembali ke halaman sebelumnya dengan error
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Simpan file foto yang diunggah ke dalam direktori public
        $image = $request->photo;
        $imageName = $image->hashName(); // Mendapatkan nama asli file
        $image->move(public_path('assets/images/service'), $imageName);

        // Membuat dan menyimpan data service baru
        $service = new Service();
        $service->name = $request->name;
        $service->slug = Str::slug($request->name);
        $service->icon = $request->icon;
        $service->keyword = $request->keyword;
        $service->description = $request->description;
        $service->photo = $imageName;
        $service->content = $request->content;
        $service->save();

        // Redirect kembali dengan pesan sukses
        return redirect()->route('services')->with('success', 'Data berhasil disimpan');
    }
}
