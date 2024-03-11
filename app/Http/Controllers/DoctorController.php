<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DoctorController extends Controller
{
    public function index(Request $request)
    {
        $doctors = DB::table('doctors')
            ->when($request->input('name'), function ($query, $name) {
                return $query->where('doctor_name', 'like', '%' . $name . '%');
            })
            ->orderBy('id', 'desc')
            ->paginate(5);
        return view('pages.doctors.index', compact('doctors'));
    }

    public function create()
    {
        return view('pages.doctors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'specialist' => 'required',
            'phone' => 'required',
            'email' => 'required|unique:doctors,doctor_email',
            'address' => 'required',
            'sip' => 'required',
        ]);

        $doctor = new Doctor();
        $doctor->doctor_name = $request->name;
        $doctor->doctor_specialist = $request->specialist;
        $doctor->doctor_phone = $request->phone;
        $doctor->doctor_email = $request->email;
        $doctor->doctor_address = $request->address;
        $doctor->sip = $request->sip;

        $doctor->save();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image->storeAs('public/doctors', $doctor->id . '.' . $image->getClientOriginalExtension());
            $doctor->doctor_photo = 'storage/doctors/' . $doctor->id . '.' . $image->getClientOriginalExtension();
            $doctor->save();
        }

        return redirect()->route('doctor.index')->with('success', 'Data berhasil disimpan');
    }

    public function edit($id)
    {
        $doctor = Doctor::findOrFail($id);
        return view('pages.doctors.edit', compact('doctor'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'specialist' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',
            'sip' => 'required',
        ]);

        $doctor = Doctor::find($id);
        $doctor->doctor_name = $request->name;
        $doctor->doctor_specialist = $request->specialist;
        $doctor->doctor_phone = $request->phone;
        $doctor->doctor_email = $request->email;
        $doctor->doctor_address = $request->address;
        $doctor->sip = $request->sip;
        $doctor->save();

        if ($request->hasFile('image')) {
            if ($doctor->image) {
                $oldImagePath = str_replace('storage', 'public', $doctor->image);
                Storage::delete($oldImagePath);
            }
            $image = $request->file('image');
            $image->storeAs('public/doctors', $doctor->id . '.' . $image->getClientOriginalExtension());
            $doctor->doctor_photo = 'storage/doctors/' . $doctor->id . '.' . $image->getClientOriginalExtension();
            $doctor->save();
        }

        return redirect()->route('doctor.index')->with('success', 'Data berhasil diubah');
    }

    public function destroy(Doctor $doctor)
    {
        $doctor->delete();
        return redirect()->route('doctor.index')->with('success', 'Data berhasil dihapus');
    }
}
