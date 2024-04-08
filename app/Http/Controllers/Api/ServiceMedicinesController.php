<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ServiceMedicines;
use Illuminate\Http\Request;

class ServiceMedicinesController extends Controller
{
    public function index(Request $request)
    {
        $service_medicines = ServiceMedicines::when($request->input('name'), function($query, $name) {
            return $query->where('name', 'like', '%'. $name .'%');
        })
            ->orderBy('id', 'desc')
            ->get();

        return response([
            'data' => $service_medicines,
            'message' => 'success',
            'status' => 'OK'
        ], 200);

    }
}
