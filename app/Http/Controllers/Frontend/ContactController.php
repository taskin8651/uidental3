<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ContactEnquiry;
use App\Models\Service;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $services = Service::where('status', 1)
            ->orderBy('sort_order', 'asc')
            ->orderBy('title', 'asc')
            ->get();
            

        return view('frontend.contact', compact('services'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'full_name'        => 'required|string|max:255',
            'phone'            => 'required|string|max:30',
            'email'            => 'nullable|email|max:255',
            'preferred_date'   => 'nullable|date',
            'preferred_time'   => 'nullable|string|max:50',
            'service_id'       => 'nullable|exists:services,id',
            'service_required' => 'nullable|string|max:255',
            'message'          => 'nullable|string|max:5000',
        ]);

        if (! empty($data['service_id'])) {
            $data['service_required'] = Service::whereKey($data['service_id'])->value('title');
        }

        ContactEnquiry::create($data);

        return back()->with('contact_success', 'Your enquiry has been submitted successfully.');
    }
}
