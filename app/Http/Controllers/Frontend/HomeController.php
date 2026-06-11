<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutPage;
use App\Models\Service;
use App\Models\Gallery;
use App\Models\PatientReview;

class HomeController extends Controller
{
    public function index()
    {
         $aboutPage = AboutPage::first();
         $homeServices = Service::where('status', 1)
            ->orderBy('sort_order', 'asc')
            ->orderBy('id', 'desc')
            ->limit(8)
            ->get();

              $homeGalleries = Gallery::where('status', 1)
            ->orderBy('sort_order', 'asc')
            ->orderBy('id', 'desc')
            ->limit(4)
            ->get();

             $patientReviews = PatientReview::where('status', 1)
            ->orderBy('sort_order', 'asc')
            ->orderBy('id', 'desc')
            ->get();

        return view('frontend.index', compact('aboutPage', 'homeServices', 'homeGalleries', 'patientReviews'));
    }
}
