<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AppointmentEnquiry;
use App\Models\Service;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function create()
    {
        $services = Service::where('status', 1)
            ->orderBy('sort_order', 'asc')
            ->orderBy('title', 'asc')
            ->get();

        return view('frontend.book-appointment', compact('services'));
    }

    public function store(Request $request)
    {
        $data = $this->validatedData($request);
        $data['service_required'] = $this->serviceRequiredText($data);

        AppointmentEnquiry::create($data);

        return back()->with('appointment_success', 'Your appointment enquiry has been submitted successfully.');
    }

    private function validatedData(Request $request)
    {
        return $request->validate([
            'full_name'        => 'required|string|max:255',
            'phone'            => 'required|string|max:30',
            'email'            => 'nullable|email|max:255',
            'preferred_date'   => 'nullable|date',
            'preferred_time'   => 'nullable|string|max:50',
            'service_id'       => 'nullable|exists:services,id',
            'service_required' => 'nullable|string|max:255',
            'message'          => 'nullable|string|max:5000',
        ]);
    }

    private function serviceRequiredText(array $data)
    {
        if (! empty($data['service_id'])) {
            return Service::whereKey($data['service_id'])->value('title');
        }

        return $data['service_required'] ?? null;
    }
}
