<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Doctor;

class DoctorController extends Controller
{
    public function index()
    {
        $doctorProfile = Doctor::first();

        return view('frontend.doctor', compact('doctorProfile'));
    }
}