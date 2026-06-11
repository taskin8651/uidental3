@extends('layouts.admin')

@section('page-title', 'Services')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Services</h2>
        <p class="admin-page-subtitle">
            Manage dental services, service details and frontend visibility
        </p>
    </div>

    @can('service_create')
        <a href="{{ route('admin.services.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Add Service
        </a>
    @endcan
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Services</p>
        <p class="stat-value">{{ $services->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Active</p>
        <p class="stat-value">{{ $services->where('status', 1)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Inactive</p>
        <p class="stat-value">{{ $services->where('status', 0)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Featured</p>
        <p class="stat-value">{{ $services->where('card_style', 'featured')->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Services</p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Select rows to use bulk actions
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-Service">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>No.</th>
                    <th>Service</th>
                    <th>Category</th>
                    <th>Style</th>
                    <th>Order</th>
                    <th>Status</th>
                    <th style="text-align:right;">{{ trans('global.actions') }}</th>
                </tr>
            </thead>

            <tbody>
                @foreach($services as $service)
                    <tr data-entry-id="{{ $service->id }}">
                        <td></td>

                        <td>
                            <span class="id-text">#{{ $service->id }}</span>
                        </td>

                        <td>
                            <span class="role-tag">
                                {{ $service->number }}
                            </span>
                        </td>

                        <td>
                            <div class="inline-flex-center">
                                <div class="avatar-circle" style="background:#0EA5E9;">
                                    <i class="{{ $service->icon_class ?: 'fas fa-tooth' }}"></i>
                                </div>

                                <div>
                                    <p class="table-main-text">{{ $service->title }}</p>
                                    <p class="table-sub-text">{{ $service->slug }}</p>
                                </div>
                            </div>
                        </td>

                        <td>
                            <span class="role-tag">{{ ucfirst($service->category) }}</span>
                        </td>

                        <td>
                            <span class="role-tag">{{ ucfirst($service->card_style) }}</span>
                        </td>

                        <td>
                            <span class="id-text">{{ $service->sort_order }}</span>
                        </td>

                        <td>
                            @if($service->status)
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
                                <a href="{{ route('services.show', $service->slug) }}"
                                   target="_blank"
                                   class="btn-outline">
                                    <i class="fas fa-eye"></i>
                                    View
                                </a>

                                @can('service_edit')
                                    <a href="{{ route('admin.services.edit', $service->id) }}"
                                       class="btn-outline btn-outline-edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                @endcan

                                @can('service_delete')
                                    <form action="{{ route('admin.services.destroy', $service->id) }}"
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
    initAdminDataTable('.datatable-Service', {
        canDelete: @can('service_delete') true @else false @endcan,
        massDeleteUrl: "{{ route('admin.services.massDestroy') }}",
        deleteText: "{{ trans('global.datatables.delete') }}",
        zeroSelectedText: "{{ trans('global.datatables.zero_selected') }}",
        confirmText: "{{ trans('global.areYouSure') }}",
        searchPlaceholder: 'Search services...',
        infoText: 'Showing _START_–_END_ of _TOTAL_ services'
    });
});
</script>
@endsection