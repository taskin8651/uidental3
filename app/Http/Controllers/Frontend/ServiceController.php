<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::where('status', 1)
            ->orderBy('sort_order', 'asc')
            ->orderBy('id', 'desc')
            ->get();

        return view('frontend.services', compact('services'));
    }

    public function show($slug)
    {
        $service = Service::where('status', 1)
            ->where('slug', $slug)
            ->firstOrFail();

        $relatedServices = Service::where('status', 1)
            ->where('id', '!=', $service->id)
            ->where('category', $service->category)
            ->orderBy('sort_order', 'asc')
            ->limit(3)
            ->get();

        return view('frontend.service-details', compact('service', 'relatedServices'));
    }
}