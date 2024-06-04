<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Meta;
use App\Models\Order_service;
use App\Models\Service;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProjectsController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        $meta = Meta::where('key', 'faq')->first();
        $projects = Order_service::with('clients')->with('services')->get();
        $services = Service::all();
        $clients = Client::all();
        return view('admin.projects', compact('projects', 'setting', 'meta', 'services', 'clients'));
    }
    function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'clients_id' => 'required|exists:clients,id',
            'services_id' => 'required|exists:services,id',
            'accuracy' => 'required|integer|min:1|max:100',
            'status' => 'required|in:finish,onprogress,cancel',
            'satisfied' => 'required|in:puas,cukup puas,tidak puas',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = new Order_service();
        $data->clients_id = $request->clients_id;
        $data->services_id = $request->services_id;
        $data->accuracy = $request->accuracy;
        $data->status = $request->status;
        $data->satisfied = $request->satisfied;
        $data->save();
        return redirect()->route('projects')->with('success', 'Data berhasil ditambahkan');
    }
    function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'clients_id' => 'required|exists:clients,id',
            'services_id' => 'required|exists:services,id',
            'accuracy' => 'required|integer|min:1|max:100',
            'status' => 'required|in:finish,onprogress,cancel',
            'satisfied' => 'required|in:puas,cukup puas,tidak puas',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $data = Order_service::findOrFail($request->id);
        $data->clients_id = $request->clients_id;
        $data->services_id = $request->services_id;
        $data->accuracy = $request->accuracy;
        $data->status = $request->status;
        $data->satisfied = $request->satisfied;
        $data->save();
        return redirect()->route('projects')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy(Request $request)
    {
        $data = Order_service::findOrFail($request->id);
        $data->delete();
        return redirect()->route('projects')->with('success', 'Data berhasil dihapus');
    }
}
