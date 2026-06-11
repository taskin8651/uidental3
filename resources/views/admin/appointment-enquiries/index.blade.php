@extends('layouts.admin')

@section('page-title', 'Appointment Enquiries')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Appointment Enquiries</h2>
        <p class="admin-page-subtitle">Appointment form submissions from the frontend</p>
    </div>
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Enquiries</p>
        <p class="stat-value">{{ $appointmentEnquiries->count() }}</p>
    </div>
    <div class="stat-card">
        <p class="stat-label">Today</p>
        <p class="stat-value">{{ $appointmentEnquiries->where('created_at', '>=', now()->startOfDay())->count() }}</p>
    </div>
    <div class="stat-card">
        <p class="stat-label">With Date</p>
        <p class="stat-value">{{ $appointmentEnquiries->whereNotNull('preferred_date')->count() }}</p>
    </div>
    <div class="stat-card">
        <p class="stat-label">With Service</p>
        <p class="stat-value">{{ $appointmentEnquiries->whereNotNull('service_id')->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Appointment Enquiries</p>
        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Linked service appears when selected from frontend service list
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-AppointmentEnquiry">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Service</th>
                    <th>Preferred Date</th>
                    <th>Preferred Time</th>
                    <th>Submitted</th>
                    <th style="text-align:right;">{{ trans('global.actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($appointmentEnquiries as $enquiry)
                    <tr data-entry-id="{{ $enquiry->id }}">
                        <td></td>
                        <td><span class="id-text">#{{ $enquiry->id }}</span></td>
                        <td>
                            <p class="table-main-text">{{ $enquiry->full_name }}</p>
                            <p class="table-sub-text">{{ $enquiry->email ?? 'No email' }}</p>
                        </td>
                        <td><a href="tel:{{ $enquiry->phone }}">{{ $enquiry->phone }}</a></td>
                        <td>
                            <span class="role-tag">{{ optional($enquiry->service)->title ?? $enquiry->service_required ?? '-' }}</span>
                        </td>
                        <td>{{ optional($enquiry->preferred_date)->format('d M Y') ?? '-' }}</td>
                        <td>{{ $enquiry->preferred_time ?? '-' }}</td>
                        <td>{{ optional($enquiry->created_at)->format('d M Y, H:i') }}</td>
                        <td>
                            <div class="action-row">
                                @can('appointment_enquiry_show')
                                    <a href="{{ route('admin.appointment-enquiries.show', $enquiry->id) }}" class="btn-outline btn-outline-edit">
                                        <i class="fas fa-eye"></i>
                                        View
                                    </a>
                                @endcan
                                @can('appointment_enquiry_delete')
                                    <form action="{{ route('admin.appointment-enquiries.destroy', $enquiry->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn-outline btn-outline-danger">
                                            <i class="fas fa-trash-alt"></i>
                                            Delete
                                        </button>
                                    </form>
                                @endcan
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

@section('scripts')
@parent
<script>
$(function () {
    initAdminDataTable('.datatable-AppointmentEnquiry', {
        canDelete: @can('appointment_enquiry_delete') true @else false @endcan,
        massDeleteUrl: "{{ route('admin.appointment-enquiries.massDestroy') }}",
        deleteText: "{{ trans('global.datatables.delete') }}",
        zeroSelectedText: "{{ trans('global.datatables.zero_selected') }}",
        confirmText: "{{ trans('global.areYouSure') }}",
        searchPlaceholder: 'Search appointment enquiries...',
        infoText: 'Showing _START_-_END_ of _TOTAL_ appointment enquiries'
    });
});
</script>
@endsection
