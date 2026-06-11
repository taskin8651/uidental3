@extends('layouts.admin')

@section('page-title', 'Gallery')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Gallery</h2>
        <p class="admin-page-subtitle">
            Manage clinic gallery images, categories and frontend visibility
        </p>
    </div>

    @can('gallery_create')
        <a href="{{ route('admin.galleries.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Add Gallery
        </a>
    @endcan
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Images</p>
        <p class="stat-value">{{ $galleries->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Active</p>
        <p class="stat-value">{{ $galleries->where('status', 1)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Inactive</p>
        <p class="stat-value">{{ $galleries->where('status', 0)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Added Today</p>
        <p class="stat-value">{{ $galleries->where('created_at', '>=', now()->startOfDay())->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Gallery Items</p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Select rows to use bulk actions
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-Gallery">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Tag</th>
                    <th>Order</th>
                    <th>Status</th>
                    <th style="text-align:right;">{{ trans('global.actions') }}</th>
                </tr>
            </thead>

            <tbody>
                @foreach($galleries as $gallery)
                    <tr data-entry-id="{{ $gallery->id }}">
                        <td></td>

                        <td>
                            <span class="id-text">#{{ $gallery->id }}</span>
                        </td>

                        <td>
                            <img src="{{ $gallery->image }}"
                                 alt="{{ $gallery->image_alt ?? $gallery->title }}"
                                 style="width:58px;height:58px;object-fit:cover;border-radius:14px;border:1px solid #e5e7eb;">
                        </td>

                        <td>
                            <p class="table-main-text">{{ $gallery->title }}</p>
                            <p class="table-sub-text">{{ \Illuminate\Support\Str::limit($gallery->description, 50) }}</p>
                        </td>

                        <td>
                            <span class="role-tag">{{ ucfirst($gallery->category) }}</span>
                        </td>

                        <td>
                            <span class="role-tag">{{ $gallery->tag ?? '—' }}</span>
                        </td>

                        <td>
                            <span class="id-text">{{ $gallery->sort_order }}</span>
                        </td>

                        <td>
                            @if($gallery->status)
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
                                @can('gallery_edit')
                                    <a href="{{ route('admin.galleries.edit', $gallery->id) }}"
                                       class="btn-outline btn-outline-edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                @endcan

                                @can('gallery_delete')
                                    <form action="{{ route('admin.galleries.destroy', $gallery->id) }}"
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
    initAdminDataTable('.datatable-Gallery', {
        canDelete: @can('gallery_delete') true @else false @endcan,
        massDeleteUrl: "{{ route('admin.galleries.massDestroy') }}",
        deleteText: "{{ trans('global.datatables.delete') }}",
        zeroSelectedText: "{{ trans('global.datatables.zero_selected') }}",
        confirmText: "{{ trans('global.areYouSure') }}",
        searchPlaceholder: 'Search gallery...',
        infoText: 'Showing _START_–_END_ of _TOTAL_ gallery items'
    });
});
</script>
@endsection