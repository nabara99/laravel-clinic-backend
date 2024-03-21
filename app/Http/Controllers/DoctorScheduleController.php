<?php

namespace App\Http\Controllers;

use App\Models\DoctorSchedule;
use Illuminate\Http\Request;

class DoctorScheduleController extends Controller
{
    public function index(Request $request)
    {
        $doctorSchedules = DoctorSchedule::with('doctor')
        ->when($request->input('doctor_name'), function($query, $doctor_name) {
            return $query->where('doctor_name', $doctor_name);
        })
        ->orderBy('doctor_id', 'asc')
        ->paginate(5);
        return view('pages.doctor-schedules.index', compact('doctorSchedules'));
    }
}
