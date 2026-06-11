@extends('layouts.admin')

@section('page-title', 'Contact Enquiry')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.contact-enquiries.index') }}" class="admin-back-link">
            &larr; {{ trans('global.back_to_list') }}
        </a>
        <h2 class="admin-page-title">Contact Enquiry #{{ $contactEnquiry->id }}</h2>
        <p class="admin-page-subtitle">Full frontend contact form submission details</p>
    </div>
</div>

<div class="detail-card">
    <div class="detail-section-head">
        <div class="detail-section-icon">
            <i class="fas fa-envelope-open-text"></i>
        </div>
        <p class="detail-section-title">Patient Details</p>
    </div>

    <div class="detail-section-body">
        <div class="detail-row"><span class="detail-label">Full Name</span><span class="detail-value">{{ $contactEnquiry->full_name }}</span></div>
        <div class="detail-row"><span class="detail-label">Phone</span><span class="detail-value"><a href="tel:{{ $contactEnquiry->phone }}">{{ $contactEnquiry->phone }}</a></span></div>
        <div class="detail-row"><span class="detail-label">Email</span><span class="detail-value">{{ $contactEnquiry->email ?? '-' }}</span></div>
        <div class="detail-row"><span class="detail-label">Service</span><span class="detail-value">{{ optional($contactEnquiry->service)->title ?? $contactEnquiry->service_required ?? '-' }}</span></div>
        <div class="detail-row"><span class="detail-label">Preferred Date</span><span class="detail-value">{{ optional($contactEnquiry->preferred_date)->format('d M Y') ?? '-' }}</span></div>
        <div class="detail-row"><span class="detail-label">Preferred Time</span><span class="detail-value">{{ $contactEnquiry->preferred_time ?? '-' }}</span></div>
        <div class="detail-row"><span class="detail-label">Submitted At</span><span class="detail-value">{{ optional($contactEnquiry->created_at)->format('d M Y, H:i') }}</span></div>
        <div class="detail-row"><span class="detail-label">Message</span><span class="detail-value">{{ $contactEnquiry->message ?? '-' }}</span></div>
    </div>
</div>

@endsection
