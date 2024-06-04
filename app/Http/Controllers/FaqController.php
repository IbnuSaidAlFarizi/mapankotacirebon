<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Meta;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FaqController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        $meta = Meta::where('key', 'faq')->first();
        $faq = Faq::all();
        return view('admin.faq',compact('faq','setting','meta'));
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
        Meta::where('key', 'faq')->update([
            'keyword' => $request->keyword,
            'description' => $request->description,
        ]);

        // Redirect ke halaman yang sesuai
        return redirect()->route('faq')->with('success', 'Meta berhasil diperbarui');
    }
    public function destroy(Request $request)
    {
        $service = Faq::findOrFail($request->id);
        $service->delete();
        return redirect()->route('faq')->with('success', 'Data berhasil dihapus');
    }
    function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'question' => 'required|string',
            'answer' => 'required|string',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = new Faq();
        $data->question = $request->question;
        $data->answer = $request->answer;
        $data->save();
        return redirect()->route('faq')->with('success', 'Meta berhasil diperbarui');
    }
    function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'question' => 'required|string',
            'answer' => 'required|string', // PDF file, maksimal 2MB
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $data = Faq::findOrFail($request->id);
        $data->question = $request->question;
        $data->answer = $request->answer;
        $data->save();
        return redirect()->route('faq')->with('success', 'Meta berhasil diperbarui');
    }
}
