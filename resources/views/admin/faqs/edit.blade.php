@extends('layouts.admin')

@section('page-title', 'Edit FAQ')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.faqs.index') }}" class="admin-back-link">&larr; {{ trans('global.back_to_list') }}</a>
        <h2 class="admin-page-title">Edit FAQ</h2>
        <p class="admin-page-subtitle">Update homepage FAQ item</p>
    </div>
</div>

<form method="POST" action="{{ route('admin.faqs.update', $faq->id) }}">
    @csrf
    @method('PUT')
    @include('admin.faqs.partials.form', ['faq' => $faq])
</form>

@endsection
