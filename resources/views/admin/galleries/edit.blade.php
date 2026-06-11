@extends('layouts.admin')

@section('page-title', 'Edit Gallery')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.galleries.index') }}" class="admin-back-link">
            ← {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Edit Gallery</h2>

        <p class="admin-page-subtitle">
            Update gallery item details
        </p>
    </div>
</div>

<form method="POST"
      action="{{ route('admin.galleries.update', $gallery->id) }}"
      enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="admin-form-grid">

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-images"></i>
                </div>

                <div>
                    <p class="form-card-title">Gallery Information</p>
                    <p class="form-card-subtitle">Image title, category and content</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="category">
                        Category <span class="req">*</span>
                    </label>

                    <select name="category"
                            id="category"
                            required
                            class="field-input {{ $errors->has('category') ? 'error' : '' }}">
                        <option value="clinic" {{ old('category', $gallery->category) == 'clinic' ? 'selected' : '' }}>Clinic</option>
                        <option value="equipment" {{ old('category', $gallery->category) == 'equipment' ? 'selected' : '' }}>Equipment</option>
                        <option value="team" {{ old('category', $gallery->category) == 'team' ? 'selected' : '' }}>Team</option>
                        <option value="result" {{ old('category', $gallery->category) == 'result' ? 'selected' : '' }}>Before / After</option>
                    </select>

                    @if($errors->has('category'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('category') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="tag">Tag</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-tag icon"></i>

                        <input type="text"
                               name="tag"
                               id="tag"
                               value="{{ old('tag', $gallery->tag) }}"
                               placeholder="Reception"
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
                               value="{{ old('title', $gallery->title) }}"
                               required
                               placeholder="Clinic Reception Area"
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
                              placeholder="Clean and welcoming patient reception placeholder."
                              class="field-input {{ $errors->has('description') ? 'error' : '' }}">{{ old('description', $gallery->description) }}</textarea>
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
                    <p class="form-card-subtitle">Replace gallery image and control visibility</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="gallery_image">Gallery Image</label>

                    <input type="file"
                           name="gallery_image"
                           id="gallery_image"
                           accept="image/*"
                           class="field-input {{ $errors->has('gallery_image') ? 'error' : '' }}">

                    @if($gallery->image)
                        <div style="margin-top:14px;">
                            <img src="{{ $gallery->image }}"
                                 alt="{{ $gallery->image_alt ?? $gallery->title }}"
                                 style="width:180px;height:125px;object-fit:cover;border-radius:14px;border:1px solid #e5e7eb;">
                        </div>
                    @endif

                    @if($errors->has('gallery_image'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('gallery_image') }}
                        </p>
                    @else
                        <p class="field-hint">
                            <i class="fas fa-info-circle"></i>
                            Upload only if you want to replace current image
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
                               value="{{ old('image_alt', $gallery->image_alt) }}"
                               placeholder="Clinic reception area"
                               class="field-input {{ $errors->has('image_alt') ? 'error' : '' }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="sort_order">Sort Order</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-sort icon"></i>

                        <input type="number"
                               name="sort_order"
                               id="sort_order"
                               value="{{ old('sort_order', $gallery->sort_order) }}"
                               class="field-input {{ $errors->has('sort_order') ? 'error' : '' }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Status</label>

                    <label class="role-checkbox-item {{ old('status', $gallery->status) ? 'checked' : '' }}" style="max-width:190px;">
                        <input type="checkbox"
                               name="status"
                               value="1"
                               class="role-checkbox"
                               {{ old('status', $gallery->status) ? 'checked' : '' }}>

                        <div class="check-icon"></div>

                        <span class="checkbox-text">Active</span>
                    </label>
                </div>

                <div class="form-info-box">
                    <p>
                        <i class="fas fa-info-circle"></i>
                        Active gallery images frontend gallery section me show hongi.
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

        <a href="{{ route('admin.galleries.index') }}" class="btn-ghost">
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