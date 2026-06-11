@extends('layouts.admin')

@section('page-title', 'Add Patient Review')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.patient-reviews.index') }}" class="admin-back-link">&larr; {{ trans('global.back_to_list') }}</a>
        <h2 class="admin-page-title">Add Patient Review</h2>
        <p class="admin-page-subtitle">Create a new frontend review card</p>
    </div>
</div>

<form method="POST" action="{{ route('admin.patient-reviews.store') }}">
    @csrf
    @include('admin.patient-reviews.partials.form', ['patientReview' => null])
</form>

@endsection
