@extends('layouts.admin')

@section('page-title', 'Edit Patient Review')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.patient-reviews.index') }}" class="admin-back-link">&larr; {{ trans('global.back_to_list') }}</a>
        <h2 class="admin-page-title">Edit Patient Review</h2>
        <p class="admin-page-subtitle">Update frontend review card details</p>
    </div>
</div>

<form method="POST" action="{{ route('admin.patient-reviews.update', $patientReview->id) }}">
    @csrf
    @method('PUT')
    @include('admin.patient-reviews.partials.form', ['patientReview' => $patientReview])
</form>

@endsection
