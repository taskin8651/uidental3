@extends('layouts.admin')

@section('page-title', 'Add Facility')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.facilities.index') }}" class="admin-back-link">
            ← Back to list
        </a>

        <h2 class="admin-page-title">Add Facility</h2>

        <p class="admin-page-subtitle">
            Fill in the details to create a facility card
        </p>
    </div>
</div>

<form method="POST"
      action="{{ route('admin.facilities.store') }}"
      enctype="multipart/form-data">
    @csrf

    <div class="admin-form-grid">

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-hospital"></i>
                </div>

                <div>
                    <p class="form-card-title">Facility Information</p>
                    <p class="form-card-subtitle">Basic facility card content</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="number">Number</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-sort-numeric-up icon"></i>

                        <input type="text"
                               name="number"
                               id="number"
                               value="{{ old('number') }}"
                               placeholder="01"
                               class="field-input {{ $errors->has('number') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('number'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('number') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="title">
                        Title <span class="req">*</span>
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>

                        <input type="text"
                               name="title"
                               id="title"
                               value="{{ old('title') }}"
                               required
                               placeholder="Clean Reception Area"
                               class="field-input {{ $errors->has('title') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('title'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('title') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="description">Description</label>

                    <textarea name="description"
                              id="description"
                              rows="5"
                              placeholder="Welcoming front-desk layout for smooth patient visits."
                              class="field-input {{ $errors->has('description') ? 'error' : '' }}">{{ old('description') }}</textarea>

                    @if($errors->has('description'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('description') }}
                        </p>
                    @endif
                </div>

            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-image"></i>
                </div>

                <div>
                    <p class="form-card-title">Image & Settings</p>
                    <p class="form-card-subtitle">Upload image and control frontend visibility</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="facility_image">Facility Image</label>

                    <input type="file"
                           name="facility_image"
                           id="facility_image"
                           accept="image/*"
                           class="field-input {{ $errors->has('facility_image') ? 'error' : '' }}">

                    @if($errors->has('facility_image'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('facility_image') }}
                        </p>
                    @else
                        <p class="field-hint">
                            <i class="fas fa-info-circle"></i>
                            Recommended image type: jpg, jpeg, png, webp
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="image_alt">Image Alt Text</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-closed-captioning icon"></i>

                        <input type="text"
                               name="image_alt"
                               id="image_alt"
                               value="{{ old('image_alt') }}"
                               placeholder="Clinic reception"
                               class="field-input {{ $errors->has('image_alt') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('image_alt'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('image_alt') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="sort_order">Sort Order</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-sort icon"></i>

                        <input type="number"
                               name="sort_order"
                               id="sort_order"
                               value="{{ old('sort_order', 0) }}"
                               class="field-input {{ $errors->has('sort_order') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('sort_order'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('sort_order') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="role-checkbox-item checked" style="max-width:180px;">
                        <input type="checkbox"
                               name="status"
                               value="1"
                               class="role-checkbox"
                               checked>

                        <div class="check-icon"></div>

                        <span class="checkbox-text">Active</span>
                    </label>
                </div>

            </div>
        </div>

    </div>

    <div class="form-actions">
        <button type="submit" class="btn-primary">
            <i class="fas fa-check"></i>
            Save
        </button>

        <a href="{{ route('admin.facilities.index') }}" class="btn-ghost">
            Cancel
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