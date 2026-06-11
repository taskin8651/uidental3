@extends('layouts.admin')

@section('page-title', 'Patient Reviews')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Patient Reviews</h2>
        <p class="admin-page-subtitle">Manage testimonial cards shown on frontend reviews page</p>
    </div>

    @can('patient_review_create')
        <a href="{{ route('admin.patient-reviews.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Add Review
        </a>
    @endcan
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Reviews</p>
        <p class="stat-value">{{ $patientReviews->count() }}</p>
    </div>
    <div class="stat-card">
        <p class="stat-label">Active</p>
        <p class="stat-value">{{ $patientReviews->where('status', 1)->count() }}</p>
    </div>
    <div class="stat-card">
        <p class="stat-label">Inactive</p>
        <p class="stat-value">{{ $patientReviews->where('status', 0)->count() }}</p>
    </div>
    <div class="stat-card">
        <p class="stat-label">Average Rating</p>
        <p class="stat-value">{{ number_format($patientReviews->avg('rating') ?: 0, 1) }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Patient Reviews</p>
        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Active reviews appear on the reviews page
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-PatientReview">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Patient</th>
                    <th>Service</th>
                    <th>Rating</th>
                    <th>Badge</th>
                    <th>Sort</th>
                    <th>Status</th>
                    <th style="text-align:right;">{{ trans('global.actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($patientReviews as $review)
                    <tr data-entry-id="{{ $review->id }}">
                        <td></td>
                        <td><span class="id-text">#{{ $review->id }}</span></td>
                        <td>
                            <p class="table-main-text">{{ $review->title }}</p>
                            <p class="table-sub-text">{{ \Illuminate\Support\Str::limit($review->review_text, 70) }}</p>
                        </td>
                        <td>{{ $review->service_name ?? '-' }}</td>
                        <td><span class="role-tag">{{ $review->rating }}</span></td>
                        <td>
                            @if($review->badge_text)
                                <span class="role-tag">{{ $review->badge_text }}</span>
                            @else
                                -
                            @endif
                        </td>
                        <td>{{ $review->sort_order }}</td>
                        <td>
                            @if($review->status)
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
                                @can('patient_review_edit')
                                    <a href="{{ route('admin.patient-reviews.edit', $review->id) }}" class="btn-outline btn-outline-edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                @endcan

                                @can('patient_review_delete')
                                    <form action="{{ route('admin.patient-reviews.destroy', $review->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
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
    initAdminDataTable('.datatable-PatientReview', {
        canDelete: @can('patient_review_delete') true @else false @endcan,
        massDeleteUrl: "{{ route('admin.patient-reviews.massDestroy') }}",
        deleteText: "{{ trans('global.datatables.delete') }}",
        zeroSelectedText: "{{ trans('global.datatables.zero_selected') }}",
        confirmText: "{{ trans('global.areYouSure') }}",
        searchPlaceholder: 'Search patient reviews...',
        infoText: 'Showing _START_-_END_ of _TOTAL_ patient reviews'
    });
});
</script>
@endsection
