<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\DoctorSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DoctorScheduleController extends Controller
{
    public function index(Request $request)
    {
        $doctorSchedules = DB::table('doctor_schedules')
        ->join('doctors', 'doctor_schedules.doctor_id', '=', 'doctors.id')
        ->when($request->input('doctor_name'), function($query, $name) {
            return $query->where('doctors.doctor_name', 'like', '%' . $name . '%');
        })
        ->orderBy('doctor_id', 'asc')
        ->paginate(5);
        return view('pages.doctor-schedules.index', compact('doctorSchedules'));
    }

    public function create()
    {
        $doctors = Doctor::all();
        return view('pages.doctor-schedules.create', compact('doctors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required',
        ]);

        if($request->senin) {
            $doctorSchedule = new DoctorSchedule();
            $doctorSchedule->doctor_id = $request->doctor_id;
            $doctorSchedule->day = 'Senin';
            $doctorSchedule->time = $request->senin;
            $doctorSchedule->save();
        }

        if($request->selasa) {
            $doctorSchedule = new DoctorSchedule();
            $doctorSchedule->doctor_id = $request->doctor_id;
            $doctorSchedule->day = 'Selasa';
            $doctorSchedule->time = $request->selasa;
            $doctorSchedule->save();
        }

        if($request->rabu) {
            $doctorSchedule = new DoctorSchedule();
            $doctorSchedule->doctor_id = $request->doctor_id;
            $doctorSchedule->day = 'Rabu';
            $doctorSchedule->time = $request->rabu;
            $doctorSchedule->save();
        }

        if($request->kamis) {
            $doctorSchedule = new DoctorSchedule();
            $doctorSchedule->doctor_id = $request->doctor_id;
            $doctorSchedule->day = 'Kamis';
            $doctorSchedule->time = $request->kamis;
            $doctorSchedule->save();
        }

        if($request->jumat) {
            $doctorSchedule = new DoctorSchedule();
            $doctorSchedule->doctor_id = $request->doctor_id;
            $doctorSchedule->day = 'Jumat';
            $doctorSchedule->time = $request->jumat;
            $doctorSchedule->save();
        }

        if($request->sabtu) {
            $doctorSchedule = new DoctorSchedule();
            $doctorSchedule->doctor_id = $request->doctor_id;
            $doctorSchedule->day = 'Sabtu';
            $doctorSchedule->time = $request->sabtu;
            $doctorSchedule->save();
        }

        if($request->ahad) {
            $doctorSchedule = new DoctorSchedule();
            $doctorSchedule->doctor_id = $request->doctor_id;
            $doctorSchedule->day = 'Ahad';
            $doctorSchedule->time = $request->ahad;
            $doctorSchedule->save();
        }

        return redirect()->route('schedule.index');
    }

    public function destroy(DoctorSchedule $schedule)
    {
        $schedule->delete();
        return redirect()->route('schedule.index')->with('success', 'Data berhasil dihapus');
    }
}
