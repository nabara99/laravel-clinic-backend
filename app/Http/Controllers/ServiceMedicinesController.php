<?php

namespace App\Http\Controllers;

use App\Models\ServiceMedicines;
use Illuminate\Http\Request;

class ServiceMedicinesController extends Controller
{
    public function index(Request $request)
    {
        $service_medicines = ServiceMedicines::when($request->input('name'), function($query, $name) {
            return $query->where('name', 'like', '%' . $name . '%');
        })
        ->orderBy('id', 'desc')
        ->paginate(10);

        return view('pages.service-medicines.index', compact('service_medicines'));
    }

    public function create()
    {
        return view('pages.service-medicines.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'price' => 'required',
            'quantity' => 'required',
        ]);

        ServiceMedicines::create($request->all());

        return redirect()->route('service-medicines.index')->with('success', 'Data berhasil disimpan ');
    }

    public function edit($id)
    {
        $service = ServiceMedicines::findOrFail($id);
        return view('pages.service-medicines.edit', compact('service'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'price' => 'required',
            'quantity' => 'required',
        ]);

        $service_medicines = ServiceMedicines::find($id);
        $service_medicines->update($request->all());

        return redirect()->route('service-medicines.index')->with('success', 'Data berhasil diubah ');
    }

    public function destroy($id)
    {
        $service_medicines = ServiceMedicines::find($id);
        $service_medicines->delete();
        return redirect()->route('service-medicines.index')->with('success', 'Data berhasil di hapus');
    }
}
