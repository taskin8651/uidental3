<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutPage;
use App\Models\Facility;

class AboutController extends Controller
{
    public function index()
    {
        $aboutPage = AboutPage::first();

        $facilities = Facility::where('status', 1)
        ->orderBy('sort_order', 'asc')
        ->orderBy('id', 'desc')
        ->get();

        return view('frontend.about', compact('aboutPage', 'facilities'));
    }
}