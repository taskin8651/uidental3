@extends('layouts.admin')

@section('page-title', 'Add Doctor')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.doctors.index') }}" class="admin-back-link">
            ← {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Add Doctor</h2>

        <p class="admin-page-subtitle">
            Fill in the details to create a new doctor profile
        </p>
    </div>
</div>

<form method="POST"
      action="{{ route('admin.doctors.store') }}"
      enctype="multipart/form-data">
    @csrf

    <div class="admin-form-grid">

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-user-md"></i>
                </div>

                <div>
                    <p class="form-card-title">Doctor Profile Content</p>
                    <p class="form-card-subtitle">Main heading, description and doctor identity</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="badge_text">Badge Text</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-tag icon"></i>
                        <input type="text" name="badge_text" id="badge_text"
                               value="{{ old('badge_text', 'Doctor Profile') }}"
                               placeholder="Doctor Profile"
                               class="field-input {{ $errors->has('badge_text') ? 'error' : '' }}">
                    </div>
                    @if($errors->has('badge_text'))
                        <p class="field-error"><i class="fas fa-exclamation-circle"></i> {{ $errors->first('badge_text') }}</p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="heading">Main Heading</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>
                        <input type="text" name="heading" id="heading"
                               value="{{ old('heading', 'Professional Dental Care Profile') }}"
                               placeholder="Professional Dental Care Profile"
                               class="field-input {{ $errors->has('heading') ? 'error' : '' }}">
                    </div>
                    @if($errors->has('heading'))
                        <p class="field-error"><i class="fas fa-exclamation-circle"></i> {{ $errors->first('heading') }}</p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="description">Description</label>
                    <textarea name="description" id="description" rows="5"
                              placeholder="Enter doctor profile description"
                              class="field-input {{ $errors->has('description') ? 'error' : '' }}">{{ old('description') }}</textarea>
                    @if($errors->has('description'))
                        <p class="field-error"><i class="fas fa-exclamation-circle"></i> {{ $errors->first('description') }}</p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="doctor_name">Doctor Name</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-user icon"></i>
                        <input type="text" name="doctor_name" id="doctor_name"
                               value="{{ old('doctor_name') }}"
                               placeholder="Doctor Name"
                               class="field-input {{ $errors->has('doctor_name') ? 'error' : '' }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="doctor_title">Doctor Title</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-briefcase-medical icon"></i>
                        <input type="text" name="doctor_title" id="doctor_title"
                               value="{{ old('doctor_title') }}"
                               placeholder="Dental Care Specialist"
                               class="field-input {{ $errors->has('doctor_title') ? 'error' : '' }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="doctor_subtitle">Doctor Subtitle</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-graduation-cap icon"></i>
                        <input type="text" name="doctor_subtitle" id="doctor_subtitle"
                               value="{{ old('doctor_subtitle') }}"
                               placeholder="Qualification / Specialization placeholder area"
                               class="field-input {{ $errors->has('doctor_subtitle') ? 'error' : '' }}">
                    </div>
                </div>

            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-image"></i>
                </div>

                <div>
                    <p class="form-card-title">Image, Rating & Timing</p>
                    <p class="form-card-subtitle">Doctor image and floating card values</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="doctor_image">Doctor Image</label>
                    <input type="file" name="doctor_image" id="doctor_image" accept="image/*"
                           class="field-input {{ $errors->has('doctor_image') ? 'error' : '' }}">

                    @if($errors->has('doctor_image'))
                        <p class="field-error"><i class="fas fa-exclamation-circle"></i> {{ $errors->first('doctor_image') }}</p>
                    @else
                        <p class="field-hint"><i class="fas fa-info-circle"></i> Image Media Library se save hogi</p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="image_alt">Image Alt Text</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-closed-captioning icon"></i>
                        <input type="text" name="image_alt" id="image_alt"
                               value="{{ old('image_alt') }}"
                               placeholder="Sinha Dental Clinic doctor profile"
                               class="field-input {{ $errors->has('image_alt') ? 'error' : '' }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="rating_text">Rating Text</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-star icon"></i>
                        <input type="text" name="rating_text" id="rating_text"
                               value="{{ old('rating_text', '4.5 Rating') }}"
                               placeholder="4.5 Rating"
                               class="field-input {{ $errors->has('rating_text') ? 'error' : '' }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="review_text">Review Text</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-comments icon"></i>
                        <input type="text" name="review_text" id="review_text"
                               value="{{ old('review_text', '62 Patient Reviews') }}"
                               placeholder="62 Patient Reviews"
                               class="field-input {{ $errors->has('review_text') ? 'error' : '' }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="timing_days">Timing Days</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-calendar-alt icon"></i>
                        <input type="text" name="timing_days" id="timing_days"
                               value="{{ old('timing_days', 'Mon-Sat') }}"
                               placeholder="Mon-Sat"
                               class="field-input {{ $errors->has('timing_days') ? 'error' : '' }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="timing_hours">Timing Hours</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-clock icon"></i>
                        <input type="text" name="timing_hours" id="timing_hours"
                               value="{{ old('timing_hours', '9 AM - 7 PM') }}"
                               placeholder="9 AM - 7 PM"
                               class="field-input {{ $errors->has('timing_hours') ? 'error' : '' }}">
                    </div>
                </div>

            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-id-card"></i>
                </div>

                <div>
                    <p class="form-card-title">Doctor Info Cards</p>
                    <p class="form-card-subtitle">Only text values are dynamic, frontend icons are static</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="qualification_label">Qualification Label</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-award icon"></i>
                        <input type="text" name="qualification_label" id="qualification_label"
                               value="{{ old('qualification_label', 'Qualification') }}"
                               placeholder="Qualification"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="qualification_value">Qualification Value</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-graduation-cap icon"></i>
                        <input type="text" name="qualification_value" id="qualification_value"
                               value="{{ old('qualification_value') }}"
                               placeholder="Add qualification here"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="specialization_label">Specialization Label</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-heartbeat icon"></i>
                        <input type="text" name="specialization_label" id="specialization_label"
                               value="{{ old('specialization_label', 'Specialization') }}"
                               placeholder="Specialization"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="specialization_value">Specialization Value</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-notes-medical icon"></i>
                        <input type="text" name="specialization_value" id="specialization_value"
                               value="{{ old('specialization_value') }}"
                               placeholder="Dental care specialization"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="consultation_label">Consultation Label</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-calendar-check icon"></i>
                        <input type="text" name="consultation_label" id="consultation_label"
                               value="{{ old('consultation_label', 'Consultation') }}"
                               placeholder="Consultation"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="consultation_value">Consultation Value</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-calendar-day icon"></i>
                        <input type="text" name="consultation_value" id="consultation_value"
                               value="{{ old('consultation_value', 'Appointment based visit') }}"
                               placeholder="Appointment based visit"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="care_focus_label">Care Focus Label</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-shield-alt icon"></i>
                        <input type="text" name="care_focus_label" id="care_focus_label"
                               value="{{ old('care_focus_label', 'Care Focus') }}"
                               placeholder="Care Focus"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="care_focus_value">Care Focus Value</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-hand-holding-heart icon"></i>
                        <input type="text" name="care_focus_value" id="care_focus_value"
                               value="{{ old('care_focus_value', 'Comfort & hygiene') }}"
                               placeholder="Comfort & hygiene"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="sort_order">Sort Order</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-sort icon"></i>
                        <input type="number" name="sort_order" id="sort_order"
                               value="{{ old('sort_order', 0) }}"
                               placeholder="0"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Status</label>
                    <label class="role-checkbox-item {{ old('status', 1) ? 'checked' : '' }}" style="max-width:190px;">
                        <input type="checkbox" name="status" value="1" class="role-checkbox"
                               {{ old('status', 1) ? 'checked' : '' }}>
                        <div class="check-icon"></div>
                        <span class="checkbox-text">Active</span>
                    </label>
                </div>

                <div class="form-info-box">
                    <p>
                        <i class="fas fa-info-circle"></i>
                        Doctor buttons and frontend icons static rahenge.
                    </p>
                </div>

            </div>
        </div>

    </div>

    <div class="form-actions">
        <button type="submit" class="btn-primary">
            <i class="fas fa-check"></i>
            {{ trans('global.save') }}
        </button>

        <a href="{{ route('admin.doctors.index') }}" class="btn-ghost">
            {{ trans('global.cancel') }}
        </a>
    </div>

</form>

<style>
    textarea.field-input {
        min-height: 120px;
        resize: vertical;
        padding-top: 14px;
    }
</style>

@endsection