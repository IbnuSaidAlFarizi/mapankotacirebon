<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Ekskul;
use App\Models\EkskulPage;
use App\Models\HomePage;
use App\Models\Program;
use App\Models\ProgramPhoto;
use App\Models\Setting;
use App\Models\VisionMission;
use App\Models\VisionPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WebHomeController extends Controller
{
    public function show()
    {
        $home = HomePage::first();
        $setting = Setting::first();
        $client = Client::all();
        return view('website.index', compact('home', 'setting', 'client'));
    }
    public function ekskul()
    {
        $setting = Setting::first();
        $ekskul = Ekskul::all();
        $ekskulPage = EkskulPage::first();
        return view('website.ekskul', compact('setting', 'ekskul', 'ekskulPage'));
    }
    function visi_misi()
    {
        $setting = Setting::first();
        $visi = VisionPage::first();
        $visiMisi = VisionMission::first();
        return view('website.visi_misi', compact('setting', 'visi', 'visiMisi'));
    }
    function program_unggulan()
    {
        $setting = Setting::first();
        $program = Program::first();
        $photo = ProgramPhoto::all();
        return view('website.program', compact('setting', 'program', 'photo'));
    }
    function ppdb_online()
    {
        $setting = Setting::first();
        $program = Program::first();
        return view('website.ppdb', compact('setting', 'program'));
    }

    // EKSKUL
    public function ekskul_index()
    {
        $setting = Setting::first();
        $list = Ekskul::all();
        $ekskul = EkskulPage::first();
        return view('admin.ekskul', compact('setting', 'list', 'ekskul'));
    }
    function ekskul_update_hero(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $about = EkskulPage::first();
        $about->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);
        return redirect()->route('ekskul')->with('success', 'Data berhasil diperbarui');
    }
    function ekskul_store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpg,jpeg|max:2048',
            'description' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $image = $request->file('image');
        $imageName = $image->hashName();
        $image->move(public_path('assets/template/assets/img/'), $imageName);

        Ekskul::create([
            'name' => $request->name,
            'image' => $imageName,
            'description' => $request->description,
        ]);
        return redirect()->route('ekskul')->with('success', 'Data berhasil ditambahkan');
    }

    function ekskul_update(Request $request, $id)
    {
        $ekskul = Ekskul::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg|max:2048',
            'description' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if ($request->hasFile('image')) {
            if ($ekskul->image) {
                $oldImagePath = public_path('assets/template/assets/img/' . $ekskul->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $image = $request->file('image');
            $imageName = $image->hashName();
            $image->move(public_path('assets/template/assets/img/'), $imageName);
            $ekskul->image = $imageName;
        }

        $ekskul->name = $request->name;
        $ekskul->description = $request->description;
        $ekskul->save();
        return redirect()->route('ekskul')->with('success', 'Data berhasil diperbarui');
    }
    function ekskul_destroy($id)
    {
        $ekskul = Ekskul::findOrFail($id);
        if ($ekskul->image) {
            $oldImagePath = public_path('assets/template/assets/img/team/' . $ekskul->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }
        $ekskul->delete();
        return redirect()->route('ekskul')->with('success', 'Data berhasil dihapus');
    }

    // PROGRAM UNGGULAN
    public function program_index()
    {
        $setting = Setting::first();
        $program = Program::first();
        $photo = ProgramPhoto::all();
        return view('admin.program', compact('setting', 'photo', 'program'));
    }
    function program_update_hero(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'info_beasiswa' => 'required|string',
            'link_pendaftaran' => 'nullable|string',
            'quote' => 'required|string',
            'admin_name' => 'required|string|max:255',
            'admin_position' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $program = Program::first(); // Asumsikan data pertama yang diambil

        $program->title = $request->title;
        $program->description = $request->description;
        $program->info_beasiswa = $request->info_beasiswa;
        $program->link_pendaftaran = $request->link_pendaftaran ? $request->link_pendaftaran : '';
        $program->quote = $request->quote;
        $program->admin_name = $request->admin_name;
        $program->admin_position = $request->admin_position;

        // Jika ada file yang diunggah, proses file tersebut
        if ($request->hasFile('image')) {
            // Hapus foto lama jika ada
            if ($program->admin_photo) {
                $oldImagePath = public_path('assets/template/assets/img/' . $program->admin_photo);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            // Simpan foto baru
            $image = $request->file('image');
            $imageName = $image->hashName();
            $image->move(public_path('assets/template/assets/img/'), $imageName);
            $program->admin_photo = $imageName;
        }

        $program->save();

        return redirect()->route('program')->with('success', 'Data berhasil diperbarui');
    }
    function program_store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'photo' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $image = $request->file('photo');
        $imageName = $image->hashName();
        $image->move(public_path('assets/template/assets/img/portfolio/'), $imageName);

        ProgramPhoto::create([
            'photo' => $imageName,
        ]);
        return redirect()->route('program')->with('success', 'Foto berhasil ditambahkan');
    }

    function program_update(Request $request, $id)
    {
        $program = ProgramPhoto::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'photo' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if ($request->hasFile('photo')) {
            if ($program->image) {
                $oldImagePath = public_path('assets/template/assets/img/portfolio/' . $program->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $image = $request->file('photo');
            $imageName = $image->hashName();
            $image->move(public_path('assets/template/assets/img/portfolio/'), $imageName);
            $program->photo = $imageName;
        }
        $program->save();
        return redirect()->route('program')->with('success', 'Data berhasil diperbarui');
    }
    function program_destroy($id)
    {
        $program = ProgramPhoto::findOrFail($id);
        if ($program->image) {
            $oldImagePath = public_path('assets/template/assets/img/portfolio/' . $program->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }
        $program->delete();
        return redirect()->route('program')->with('success', 'Data berhasil dihapus');
    }
}
