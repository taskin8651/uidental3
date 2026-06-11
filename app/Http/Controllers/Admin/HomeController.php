<?php

namespace App\Http\Controllers\Admin;

use App\Models\AppointmentEnquiry;
use App\Models\ContactEnquiry;
use App\Models\Doctor;
use App\Models\Gallery;
use App\Models\PatientReview;
use App\Models\Service;

class HomeController
{
    public function index()
    {
        $appointmentEnquiries = AppointmentEnquiry::with('service')->latest()->limit(10)->get();
        $contactEnquiries = ContactEnquiry::with('service')->latest()->limit(10)->get();

        $recentEnquiries = $appointmentEnquiries
            ->map(function ($enquiry) {
                $enquiry->source_label = 'Appointment';
                $enquiry->source_class = 'pill-blue';

                return $enquiry;
            })
            ->merge($contactEnquiries->map(function ($enquiry) {
                $enquiry->source_label = 'Contact';
                $enquiry->source_class = 'pill-yellow';

                return $enquiry;
            }))
            ->sortByDesc('created_at')
            ->take(12)
            ->values();

        $stats = [
            'total_enquiries'       => AppointmentEnquiry::count() + ContactEnquiry::count(),
            'today_enquiries'       => AppointmentEnquiry::whereDate('created_at', today())->count() + ContactEnquiry::whereDate('created_at', today())->count(),
            'appointment_enquiries' => AppointmentEnquiry::count(),
            'contact_enquiries'     => ContactEnquiry::count(),
            'services'              => Service::count(),
            'doctors'               => Doctor::count(),
            'galleries'             => Gallery::count(),
            'reviews'               => PatientReview::count(),
        ];

        return view('home', compact('appointmentEnquiries', 'contactEnquiries', 'recentEnquiries', 'stats'));
    }
}
