<?php

namespace App\Http\Controllers;
 
use App\Models\WhyUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WhyUsController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = new WhyUs();
        $data->title = $request->title;
        $data->description = $request->description;
        $data->save();

        return redirect()->route('about')->with('success', 'Data berhasil disimpan');
    }
    public function destroy(Request $request)
    {
        $whyus = WhyUs::findOrFail($request->id);
        $whyus->delete();
        return redirect()->route('about')->with('success', 'Data berhasil dihapus');
    }
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:why_uses,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = WhyUs::findOrFail($request->id);
        $data->title = $request->title;
        $data->description = $request->description;
        $data->save();

        return redirect()->route('about')->with('success', 'Data berhasil disimpan');
    }
}
