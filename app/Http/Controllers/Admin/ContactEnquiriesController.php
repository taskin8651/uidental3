<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactEnquiry;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ContactEnquiriesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('contact_enquiry_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contactEnquiries = ContactEnquiry::with('service')
            ->latest()
            ->get();

        return view('admin.contact-enquiries.index', compact('contactEnquiries'));
    }

    public function show(ContactEnquiry $contactEnquiry)
    {
        abort_if(Gate::denies('contact_enquiry_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contactEnquiry->load('service');

        return view('admin.contact-enquiries.show', compact('contactEnquiry'));
    }

    public function destroy(ContactEnquiry $contactEnquiry)
    {
        abort_if(Gate::denies('contact_enquiry_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contactEnquiry->delete();

        return redirect()->route('admin.contact-enquiries.index')->with('success', 'Contact enquiry deleted successfully.');
    }

    public function massDestroy(Request $request)
    {
        abort_if(Gate::denies('contact_enquiry_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        ContactEnquiry::whereIn('id', $request->input('ids', []))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
