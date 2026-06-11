@extends('layouts.admin')

@section('page-title', 'Add FAQ')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.faqs.index') }}" class="admin-back-link">&larr; {{ trans('global.back_to_list') }}</a>
        <h2 class="admin-page-title">Add FAQ</h2>
        <p class="admin-page-subtitle">Create a homepage FAQ item</p>
    </div>
</div>

<form method="POST" action="{{ route('admin.faqs.store') }}">
    @csrf
    @include('admin.faqs.partials.form', ['faq' => null])
</form>

@endsection
