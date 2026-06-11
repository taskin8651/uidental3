@extends('layouts.admin')

@section('page-title', 'FAQs')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">FAQs</h2>
        <p class="admin-page-subtitle">Manage homepage FAQ accordion questions</p>
    </div>

    @can('faq_create')
        <a href="{{ route('admin.faqs.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Add FAQ
        </a>
    @endcan
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total FAQs</p>
        <p class="stat-value">{{ $faqs->count() }}</p>
    </div>
    <div class="stat-card">
        <p class="stat-label">Active</p>
        <p class="stat-value">{{ $faqs->where('status', 1)->count() }}</p>
    </div>
    <div class="stat-card">
        <p class="stat-label">Inactive</p>
        <p class="stat-value">{{ $faqs->where('status', 0)->count() }}</p>
    </div>
    <div class="stat-card">
        <p class="stat-label">Added Today</p>
        <p class="stat-value">{{ $faqs->where('created_at', '>=', now()->startOfDay())->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All FAQs</p>
        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Active FAQs display on homepage
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-Faq">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Question</th>
                    <th>Answer</th>
                    <th>Icon</th>
                    <th>Sort</th>
                    <th>Status</th>
                    <th style="text-align:right;">{{ trans('global.actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($faqs as $faq)
                    <tr data-entry-id="{{ $faq->id }}">
                        <td></td>
                        <td><span class="id-text">#{{ $faq->id }}</span></td>
                        <td><p class="table-main-text">{{ $faq->question }}</p></td>
                        <td style="color:#475569;">{{ \Illuminate\Support\Str::limit($faq->answer, 90) }}</td>
                        <td><span class="role-tag">{{ $faq->icon_class ?? '-' }}</span></td>
                        <td>{{ $faq->sort_order }}</td>
                        <td>
                            @if($faq->status)
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
                                @can('faq_edit')
                                    <a href="{{ route('admin.faqs.edit', $faq->id) }}" class="btn-outline btn-outline-edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                @endcan
                                @can('faq_delete')
                                    <form action="{{ route('admin.faqs.destroy', $faq->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
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
    initAdminDataTable('.datatable-Faq', {
        canDelete: @can('faq_delete') true @else false @endcan,
        massDeleteUrl: "{{ route('admin.faqs.massDestroy') }}",
        deleteText: "{{ trans('global.datatables.delete') }}",
        zeroSelectedText: "{{ trans('global.datatables.zero_selected') }}",
        confirmText: "{{ trans('global.areYouSure') }}",
        searchPlaceholder: 'Search FAQs...',
        infoText: 'Showing _START_-_END_ of _TOTAL_ FAQs'
    });
});
</script>
@endsection
