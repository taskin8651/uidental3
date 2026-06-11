@extends('layouts.admin')

@section('page-title', 'Doctors')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Doctors</h2>
        <p class="admin-page-subtitle">
            Manage clinic doctors, profile content, timing and frontend visibility
        </p>
    </div>

    @can('doctor_create')
        <a href="{{ route('admin.doctors.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Add Doctor
        </a>
    @endcan
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Doctors</p>
        <p class="stat-value">{{ $doctors->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Active</p>
        <p class="stat-value">{{ $doctors->where('status', 1)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Inactive</p>
        <p class="stat-value">{{ $doctors->where('status', 0)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Added Today</p>
        <p class="stat-value">{{ $doctors->where('created_at', '>=', now()->startOfDay())->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Doctors</p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Select rows to use bulk actions
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-Doctor">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Doctor</th>
                    <th>Specialization</th>
                    <th>Timing</th>
                    <th>Order</th>
                    <th>Status</th>
                    <th style="text-align:right;">{{ trans('global.actions') }}</th>
                </tr>
            </thead>

            <tbody>
                @foreach($doctors as $doctor)
                    <tr data-entry-id="{{ $doctor->id }}">
                        <td></td>

                        <td>
                            <span class="id-text">#{{ $doctor->id }}</span>
                        </td>

                        <td>
                            <div class="inline-flex-center">
                                <img src="{{ $doctor->image }}"
                                     alt="{{ $doctor->image_alt ?? $doctor->doctor_name }}"
                                     style="width:46px;height:46px;object-fit:cover;border-radius:50%;border:1px solid #e5e7eb;">

                                <div>
                                    <p class="table-main-text">{{ $doctor->doctor_name ?? 'Doctor Name' }}</p>
                                    <p class="table-sub-text">{{ $doctor->doctor_title ?? 'Dental Care Specialist' }}</p>
                                </div>
                            </div>
                        </td>

                        <td>
                            <span class="role-tag">
                                {{ $doctor->specialization_value ?? '—' }}
                            </span>
                        </td>

                        <td>
                            <p class="table-main-text">{{ $doctor->timing_days ?? '—' }}</p>
                            <p class="table-sub-text">{{ $doctor->timing_hours ?? '—' }}</p>
                        </td>

                        <td>
                            <span class="id-text">{{ $doctor->sort_order }}</span>
                        </td>

                        <td>
                            @if($doctor->status)
                                <div class="d-flex align-items-center gap-2">
                                    <span class="status-dot status-success"></span>
                                    <span style="font-size:12.5px; color:#047857;">Active</span>
                                </div>
                            @else
                                <div class="d-flex align-items-center gap-2">
                                    <span class="status-dot status-warning"></span>
                                    <span style="font-size:12.5px; color:#92400E;">Inactive</span>
                                </div>
                            @endif
                        </td>

                        <td>
                            <div class="action-row">
                                @can('doctor_edit')
                                    <a href="{{ route('admin.doctors.edit', $doctor->id) }}"
                                       class="btn-outline btn-outline-edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                @endcan

                                @can('doctor_delete')
                                    <form action="{{ route('admin.doctors.destroy', $doctor->id) }}"
                                          method="POST"
                                          style="display:inline;"
                                          onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
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
    initAdminDataTable('.datatable-Doctor', {
        canDelete: @can('doctor_delete') true @else false @endcan,
        massDeleteUrl: "{{ route('admin.doctors.massDestroy') }}",
        deleteText: "{{ trans('global.datatables.delete') }}",
        zeroSelectedText: "{{ trans('global.datatables.zero_selected') }}",
        confirmText: "{{ trans('global.areYouSure') }}",
        searchPlaceholder: 'Search doctors...',
        infoText: 'Showing _START_–_END_ of _TOTAL_ doctors'
    });
});
</script>
@endsection