@extends('layouts.admin')

@section('page-title', 'Facilities')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Facilities</h2>
        <p class="admin-page-subtitle">
            Manage clinic facility cards shown on frontend
        </p>
    </div>

    @can('facility_create')
        <a href="{{ route('admin.facilities.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Add Facility
        </a>
    @endcan
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Facilities</p>
        <p class="stat-value">{{ $facilities->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Active</p>
        <p class="stat-value">{{ $facilities->where('status', 1)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Inactive</p>
        <p class="stat-value">{{ $facilities->where('status', 0)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Added Today</p>
        <p class="stat-value">{{ $facilities->where('created_at', '>=', now()->startOfDay())->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Facilities</p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Select rows to use bulk actions
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-Facility">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Number</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Sort Order</th>
                    <th>Status</th>
                    <th style="text-align:right;">{{ trans('global.actions') }}</th>
                </tr>
            </thead>

            <tbody>
                @foreach($facilities as $facility)
                    <tr data-entry-id="{{ $facility->id }}">
                        <td></td>

                        <td>
                            <span class="id-text">#{{ $facility->id }}</span>
                        </td>

                        <td>
                            <img src="{{ $facility->image }}"
                                 alt="{{ $facility->image_alt ?? $facility->title }}"
                                 style="width:58px;height:58px;object-fit:cover;border-radius:14px;border:1px solid #e5e7eb;">
                        </td>

                        <td>
                            <span class="role-tag">
                                {{ $facility->number ?? str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                            </span>
                        </td>

                        <td>
                            <div>
                                <p class="table-main-text">{{ $facility->title }}</p>
                                <p class="table-sub-text">{{ $facility->image_alt ?? 'Facility Image' }}</p>
                            </div>
                        </td>

                        <td style="color:#475569;">
                            {{ \Illuminate\Support\Str::limit($facility->description, 80) }}
                        </td>

                        <td>
                            <span class="id-text">{{ $facility->sort_order }}</span>
                        </td>

                        <td>
                            @if($facility->status)
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
                                @can('facility_edit')
                                    <a href="{{ route('admin.facilities.edit', $facility->id) }}"
                                       class="btn-outline btn-outline-edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                @endcan

                                @can('facility_delete')
                                    <form action="{{ route('admin.facilities.destroy', $facility->id) }}"
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
    initAdminDataTable('.datatable-Facility', {
        canDelete: @can('facility_delete') true @else false @endcan,
        massDeleteUrl: "{{ route('admin.facilities.massDestroy') }}",
        deleteText: "{{ trans('global.datatables.delete') }}",
        zeroSelectedText: "{{ trans('global.datatables.zero_selected') }}",
        confirmText: "{{ trans('global.areYouSure') }}",
        searchPlaceholder: 'Search facilities...',
        infoText: 'Showing _START_–_END_ of _TOTAL_ facilities'
    });
});
</script>
@endsection