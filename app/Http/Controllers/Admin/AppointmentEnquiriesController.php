<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AppointmentEnquiry;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AppointmentEnquiriesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('appointment_enquiry_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $appointmentEnquiries = AppointmentEnquiry::with('service')
            ->latest()
            ->get();

        return view('admin.appointment-enquiries.index', compact('appointmentEnquiries'));
    }

    public function show(AppointmentEnquiry $appointmentEnquiry)
    {
        abort_if(Gate::denies('appointment_enquiry_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $appointmentEnquiry->load('service');

        return view('admin.appointment-enquiries.show', compact('appointmentEnquiry'));
    }

    public function destroy(AppointmentEnquiry $appointmentEnquiry)
    {
        abort_if(Gate::denies('appointment_enquiry_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $appointmentEnquiry->delete();

        return redirect()->route('admin.appointment-enquiries.index')->with('success', 'Appointment enquiry deleted successfully.');
    }

    public function massDestroy(Request $request)
    {
        abort_if(Gate::denies('appointment_enquiry_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        AppointmentEnquiry::whereIn('id', $request->input('ids', []))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
