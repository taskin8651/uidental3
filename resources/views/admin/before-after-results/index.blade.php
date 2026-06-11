@extends('layouts.admin')

@section('page-title', 'Before / After Results')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Before / After Results</h2>
        <p class="admin-page-subtitle">
            Manage treatment result before-after images and frontend visibility
        </p>
    </div>

    @can('before_after_result_create')
        <a href="{{ route('admin.before-after-results.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Add Result
        </a>
    @endcan
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Results</p>
        <p class="stat-value">{{ $beforeAfterResults->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Active</p>
        <p class="stat-value">{{ $beforeAfterResults->where('status', 1)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Inactive</p>
        <p class="stat-value">{{ $beforeAfterResults->where('status', 0)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Added Today</p>
        <p class="stat-value">{{ $beforeAfterResults->where('created_at', '>=', now()->startOfDay())->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Results</p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Select rows to use bulk actions
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-BeforeAfterResult">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Before</th>
                    <th>After</th>
                    <th>Title</th>
                    <th>Tag</th>
                    <th>Order</th>
                    <th>Status</th>
                    <th style="text-align:right;">{{ trans('global.actions') }}</th>
                </tr>
            </thead>

            <tbody>
                @foreach($beforeAfterResults as $result)
                    <tr data-entry-id="{{ $result->id }}">
                        <td></td>

                        <td>
                            <span class="id-text">#{{ $result->id }}</span>
                        </td>

                        <td>
                            <img src="{{ $result->before_image }}"
                                 alt="{{ $result->before_image_alt ?? 'Before image' }}"
                                 style="width:58px;height:58px;object-fit:cover;border-radius:14px;border:1px solid #e5e7eb;">
                        </td>

                        <td>
                            <img src="{{ $result->after_image }}"
                                 alt="{{ $result->after_image_alt ?? 'After image' }}"
                                 style="width:58px;height:58px;object-fit:cover;border-radius:14px;border:1px solid #e5e7eb;">
                        </td>

                        <td>
                            <p class="table-main-text">{{ $result->title }}</p>
                            <p class="table-sub-text">{{ \Illuminate\Support\Str::limit($result->description, 55) }}</p>
                        </td>

                        <td>
                            <span class="role-tag">{{ $result->tag ?? '—' }}</span>
                        </td>

                        <td>
                            <span class="id-text">{{ $result->sort_order }}</span>
                        </td>

                        <td>
                            @if($result->status)
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
                                @can('before_after_result_edit')
                                    <a href="{{ route('admin.before-after-results.edit', $result->id) }}"
                                       class="btn-outline btn-outline-edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                @endcan

                                @can('before_after_result_delete')
                                    <form action="{{ route('admin.before-after-results.destroy', $result->id) }}"
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
    initAdminDataTable('.datatable-BeforeAfterResult', {
        canDelete: @can('before_after_result_delete') true @else false @endcan,
        massDeleteUrl: "{{ route('admin.before-after-results.massDestroy') }}",
        deleteText: "{{ trans('global.datatables.delete') }}",
        zeroSelectedText: "{{ trans('global.datatables.zero_selected') }}",
        confirmText: "{{ trans('global.areYouSure') }}",
        searchPlaceholder: 'Search results...',
        infoText: 'Showing _START_–_END_ of _TOTAL_ results'
    });
});
</script>
@endsection