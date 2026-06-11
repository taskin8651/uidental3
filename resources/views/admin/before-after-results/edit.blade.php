@extends('layouts.admin')

@section('page-title', 'Edit Before / After Result')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.before-after-results.index') }}" class="admin-back-link">
            ← {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Edit Before / After Result</h2>

        <p class="admin-page-subtitle">
            Update treatment result details
        </p>
    </div>
</div>

<form method="POST"
      action="{{ route('admin.before-after-results.update', $beforeAfterResult->id) }}"
      enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="admin-form-grid">

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-exchange-alt"></i>
                </div>

                <div>
                    <p class="form-card-title">Result Information</p>
                    <p class="form-card-subtitle">Treatment result title and description</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="tag">Tag</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-tag icon"></i>

                        <input type="text"
                               name="tag"
                               id="tag"
                               value="{{ old('tag', $beforeAfterResult->tag) }}"
                               placeholder="Smile Result"
                               class="field-input {{ $errors->has('tag') ? 'error' : '' }}">
                    </div>
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
                               value="{{ old('title', $beforeAfterResult->title) }}"
                               required
                               placeholder="Smile Designing Result"
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
                              placeholder="Placeholder for smile designing, cleaning or cosmetic dental treatment results."
                              class="field-input {{ $errors->has('description') ? 'error' : '' }}">{{ old('description', $beforeAfterResult->description) }}</textarea>
                </div>

            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-images"></i>
                </div>

                <div>
                    <p class="form-card-title">Before / After Images</p>
                    <p class="form-card-subtitle">Replace result images if needed</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="before_image">Before Image</label>

                    <input type="file"
                           name="before_image"
                           id="before_image"
                           accept="image/*"
                           class="field-input {{ $errors->has('before_image') ? 'error' : '' }}">

                    @if($beforeAfterResult->before_image)
                        <div style="margin-top:14px;">
                            <img src="{{ $beforeAfterResult->before_image }}"
                                 alt="{{ $beforeAfterResult->before_image_alt ?? 'Before image' }}"
                                 style="width:180px;height:125px;object-fit:cover;border-radius:14px;border:1px solid #e5e7eb;">
                        </div>
                    @endif

                    @if($errors->has('before_image'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('before_image') }}
                        </p>
                    @else
                        <p class="field-hint">
                            <i class="fas fa-info-circle"></i>
                            Upload only if you want to replace before image
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="before_image_alt">Before Image Alt</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-closed-captioning icon"></i>

                        <input type="text"
                               name="before_image_alt"
                               id="before_image_alt"
                               value="{{ old('before_image_alt', $beforeAfterResult->before_image_alt) }}"
                               placeholder="Before treatment placeholder"
                               class="field-input {{ $errors->has('before_image_alt') ? 'error' : '' }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="after_image">After Image</label>

                    <input type="file"
                           name="after_image"
                           id="after_image"
                           accept="image/*"
                           class="field-input {{ $errors->has('after_image') ? 'error' : '' }}">

                    @if($beforeAfterResult->after_image)
                        <div style="margin-top:14px;">
                            <img src="{{ $beforeAfterResult->after_image }}"
                                 alt="{{ $beforeAfterResult->after_image_alt ?? 'After image' }}"
                                 style="width:180px;height:125px;object-fit:cover;border-radius:14px;border:1px solid #e5e7eb;">
                        </div>
                    @endif

                    @if($errors->has('after_image'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('after_image') }}
                        </p>
                    @else
                        <p class="field-hint">
                            <i class="fas fa-info-circle"></i>
                            Upload only if you want to replace after image
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="after_image_alt">After Image Alt</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-closed-captioning icon"></i>

                        <input type="text"
                               name="after_image_alt"
                               id="after_image_alt"
                               value="{{ old('after_image_alt', $beforeAfterResult->after_image_alt) }}"
                               placeholder="After treatment placeholder"
                               class="field-input {{ $errors->has('after_image_alt') ? 'error' : '' }}">
                    </div>
                </div>

            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-sliders-h"></i>
                </div>

                <div>
                    <p class="form-card-title">Settings</p>
                    <p class="form-card-subtitle">Sort order and frontend visibility</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="sort_order">Sort Order</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-sort icon"></i>

                        <input type="number"
                               name="sort_order"
                               id="sort_order"
                               value="{{ old('sort_order', $beforeAfterResult->sort_order) }}"
                               class="field-input {{ $errors->has('sort_order') ? 'error' : '' }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Status</label>

                    <label class="role-checkbox-item {{ old('status', $beforeAfterResult->status) ? 'checked' : '' }}" style="max-width:190px;">
                        <input type="checkbox"
                               name="status"
                               value="1"
                               class="role-checkbox"
                               {{ old('status', $beforeAfterResult->status) ? 'checked' : '' }}>

                        <div class="check-icon"></div>

                        <span class="checkbox-text">Active</span>
                    </label>
                </div>

                <div class="form-info-box">
                    <p>
                        <i class="fas fa-info-circle"></i>
                        Active results frontend before-after section me show honge.
                    </p>
                </div>

            </div>
        </div>

    </div>

    <div class="form-actions">
        <button type="submit" class="btn-primary">
            <i class="fas fa-check"></i>
            Update
        </button>

        <a href="{{ route('admin.before-after-results.index') }}" class="btn-ghost">
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