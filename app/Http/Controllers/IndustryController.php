<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Industries;
use App\Models\Meta;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class IndustryController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        $data = Industries::all();
        return view('admin.industry', compact('data', 'setting'));
    }

    function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $data = new Industries();
        $data->name = $request->title;
        $data->save();
        return redirect()->route('industry')->with('success', 'Meta berhasil diperbarui');
    }
    public function destroy(Request $request)
    {
        $news = Industries::findOrFail($request->id);
        $news->delete();
        return redirect()->route('industry')->with('success', 'Data berhasil dihapus');
    }
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:industries,id',
            'name' => 'required|string|max:255'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $tag = Industries::findOrFail($request->id);
        $tag->name = $request->name;
        $tag->save();
        return redirect()->route('industry')->with('success', 'Tag News berhasil diperbarui');
    }
}
