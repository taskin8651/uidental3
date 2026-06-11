<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\PatientReview;

class TestimonialController extends Controller
{
    public function index()
    {
        $patientReviews = PatientReview::where('status', 1)
            ->orderBy('sort_order', 'asc')
            ->orderBy('id', 'desc')
            ->get();

        return view('frontend.testimonials', compact('patientReviews'));
    }
}
