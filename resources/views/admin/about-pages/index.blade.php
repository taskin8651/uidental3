@extends('layouts.admin')

@section('page-title', 'About Page')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">
            About Page
        </h2>

        <p class="admin-page-subtitle">
            Manage about intro content, trust counters, image and highlight points
        </p>
    </div>
</div>

<form method="POST"
      action="{{ route('admin.about-pages.update') }}"
      enctype="multipart/form-data">
    @csrf

    <div class="admin-form-grid">

        {{-- ABOUT CONTENT CARD --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-info-circle"></i>
                </div>

                <div>
                    <p class="form-card-title">About Introduction</p>
                    <p class="form-card-subtitle">Main about section content</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="badge_text">
                        Badge Text
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-tag icon"></i>

                        <input type="text"
                               name="badge_text"
                               id="badge_text"
                               value="{{ old('badge_text', $aboutPage->badge_text ?? '') }}"
                               placeholder="Clinic Introduction"
                               class="field-input {{ $errors->has('badge_text') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('badge_text'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('badge_text') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="title">
                        Main Heading
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>

                        <input type="text"
                               name="title"
                               id="title"
                               value="{{ old('title', $aboutPage->title ?? '') }}"
                               placeholder="Gentle Dental Care With Hygiene, Comfort & Confidence"
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
                    <label class="field-label" for="description_one">
                        Description One
                    </label>

                    <textarea name="description_one"
                              id="description_one"
                              rows="5"
                              placeholder="Enter first about paragraph"
                              class="field-input {{ $errors->has('description_one') ? 'error' : '' }}">{{ old('description_one', $aboutPage->description_one ?? '') }}</textarea>

                    @if($errors->has('description_one'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('description_one') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="description_two">
                        Description Two
                    </label>

                    <textarea name="description_two"
                              id="description_two"
                              rows="5"
                              placeholder="Enter second about paragraph"
                              class="field-input {{ $errors->has('description_two') ? 'error' : '' }}">{{ old('description_two', $aboutPage->description_two ?? '') }}</textarea>

                    @if($errors->has('description_two'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('description_two') }}
                        </p>
                    @endif
                </div>

            </div>
        </div>

        {{-- IMAGE + FLOATING CARD --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-image"></i>
                </div>

                <div>
                    <p class="form-card-title">Image & Floating Card</p>
                    <p class="form-card-subtitle">About image and image card content</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="about_image">
                        About Image
                    </label>

                    <input type="file"
                           name="about_image"
                           id="about_image"
                           accept="image/*"
                           class="field-input {{ $errors->has('about_image') ? 'error' : '' }}">

                    @if(!empty($aboutPage) && $aboutPage->image)
                        <div class="image-preview-box" style="margin-top: 14px;">
                            <img src="{{ $aboutPage->image }}"
                                 alt="About Image"
                                 style="width: 180px; height: 125px; object-fit: cover; border-radius: 14px; border: 1px solid #e5e7eb;">
                        </div>
                    @endif

                    @if($errors->has('about_image'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('about_image') }}
                        </p>
                    @else
                        <p class="field-hint">
                            <i class="fas fa-info-circle"></i>
                            Recommended image type: jpg, jpeg, png, webp
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="image_alt">
                        Image Alt Text
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-closed-captioning icon"></i>

                        <input type="text"
                               name="image_alt"
                               id="image_alt"
                               value="{{ old('image_alt', $aboutPage->image_alt ?? '') }}"
                               placeholder="Dental care at Sinha Dental Clinic"
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
                    <label class="field-label" for="card_title">
                        Floating Card Title
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-award icon"></i>

                        <input type="text"
                               name="card_title"
                               id="card_title"
                               value="{{ old('card_title', $aboutPage->card_title ?? '') }}"
                               placeholder="Trusted"
                               class="field-input {{ $errors->has('card_title') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('card_title'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('card_title') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="card_subtitle">
                        Floating Card Subtitle
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-heart icon"></i>

                        <input type="text"
                               name="card_subtitle"
                               id="card_subtitle"
                               value="{{ old('card_subtitle', $aboutPage->card_subtitle ?? '') }}"
                               placeholder="Dental Care"
                               class="field-input {{ $errors->has('card_subtitle') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('card_subtitle'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('card_subtitle') }}
                        </p>
                    @endif
                </div>

            </div>
        </div>

        {{-- TRUST COUNTERS --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-chart-line"></i>
                </div>

                <div>
                    <p class="form-card-title">Trust Counter Values</p>
                    <p class="form-card-subtitle">Only count/value will be updated from admin</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="google_rating">
                        Google Rating
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-star icon"></i>

                        <input type="text"
                               name="google_rating"
                               id="google_rating"
                               value="{{ old('google_rating', $aboutPage->google_rating ?? '') }}"
                               placeholder="4.5"
                               class="field-input {{ $errors->has('google_rating') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('google_rating'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('google_rating') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="patient_reviews">
                        Patient Reviews
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-comments icon"></i>

                        <input type="text"
                               name="patient_reviews"
                               id="patient_reviews"
                               value="{{ old('patient_reviews', $aboutPage->patient_reviews ?? '') }}"
                               placeholder="62"
                               class="field-input {{ $errors->has('patient_reviews') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('patient_reviews'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('patient_reviews') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="clinic_availability">
                        Clinic Availability
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-calendar-alt icon"></i>

                        <input type="text"
                               name="clinic_availability"
                               id="clinic_availability"
                               value="{{ old('clinic_availability', $aboutPage->clinic_availability ?? '') }}"
                               placeholder="7 Days"
                               class="field-input {{ $errors->has('clinic_availability') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('clinic_availability'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('clinic_availability') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="clinic_location">
                        Clinic Location
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-map-marker-alt icon"></i>

                        <input type="text"
                               name="clinic_location"
                               id="clinic_location"
                               value="{{ old('clinic_location', $aboutPage->clinic_location ?? '') }}"
                               placeholder="Patna"
                               class="field-input {{ $errors->has('clinic_location') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('clinic_location'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('clinic_location') }}
                        </p>
                    @endif
                </div>

                <div class="form-info-box">
                    <p>
                        <i class="fas fa-info-circle"></i>
                        Frontend labels and icons will remain fixed. Admin can update only values/counts.
                    </p>
                </div>

            </div>
        </div>

        {{-- ABOUT POINTS --}}
        <div class="form-card">
            <div class="form-card-header between">
                <div class="form-card-head-left">
                    <div class="form-card-icon">
                        <i class="fas fa-list-check"></i>
                    </div>

                    <div>
                        <p class="form-card-title">About Points</p>
                        <p class="form-card-subtitle">Add, remove and active/inactive highlight points</p>
                    </div>
                </div>

                <div class="form-mini-actions">
                    <button type="button" class="btn-mini-primary" id="addPointBtn">
                        Add Point
                    </button>
                </div>
            </div>

            <div class="form-card-body">

                @php
                    $points = old('points', $aboutPage->points ?? []);
                @endphp

                <div id="pointsWrapper">
                    @if(!empty($points))
                        @foreach($points as $index => $point)
                            <div class="point-row">
                                <div class="field-group mb-0">
                                    <label class="field-label">
                                        Point Text
                                    </label>

                                    <div class="input-icon-wrap">
                                        <i class="fas fa-check-circle icon"></i>

                                        <input type="text"
                                               name="points[{{ $index }}][text]"
                                               value="{{ $point['text'] ?? '' }}"
                                               placeholder="Enter point text"
                                               class="field-input">
                                    </div>
                                </div>

                                <label class="point-status">
                                    <input type="checkbox"
                                           name="points[{{ $index }}][status]"
                                           {{ !empty($point['status']) ? 'checked' : '' }}>
                                    <span>Active</span>
                                </label>

                                <button type="button" class="btn-point-remove removePointBtn">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        @endforeach
                    @else
                        <div class="point-row">
                            <div class="field-group mb-0">
                                <label class="field-label">
                                    Point Text
                                </label>

                                <div class="input-icon-wrap">
                                    <i class="fas fa-check-circle icon"></i>

                                    <input type="text"
                                           name="points[0][text]"
                                           placeholder="Enter point text"
                                           class="field-input">
                                </div>
                            </div>

                            <label class="point-status">
                                <input type="checkbox" name="points[0][status]" checked>
                                <span>Active</span>
                            </label>

                            <button type="button" class="btn-point-remove removePointBtn">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    @endif
                </div>

                @if($errors->has('points'))
                    <p class="field-error mt-2">
                        <i class="fas fa-exclamation-circle"></i>
                        {{ $errors->first('points') }}
                    </p>
                @endif

                <div class="form-info-box">
                    <p>
                        <i class="fas fa-info-circle"></i>
                        Points will be saved in same about page table as JSON data.
                    </p>
                </div>

            </div>
        </div>

    </div>

    <div class="form-actions">
        <button type="submit" class="btn-primary">
            <i class="fas fa-check"></i>
            Save About Page
        </button>

        <a href="{{ url()->previous() }}" class="btn-ghost">
            Cancel
        </a>
    </div>

</form>

<style>
    .point-row {
        display: grid;
        grid-template-columns: 1fr 120px 48px;
        gap: 12px;
        align-items: end;
        padding: 14px;
        border: 1px solid var(--border-color, #e5e7eb);
        border-radius: 16px;
        background: #f9fafb;
        margin-bottom: 12px;
    }

    .point-status {
        min-height: 48px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 7px;
        border: 1px solid var(--border-color, #e5e7eb);
        border-radius: 12px;
        background: #fff;
        font-size: 13px;
        font-weight: 700;
        color: #374151;
        cursor: pointer;
        margin: 0;
    }

    .point-status input {
        width: 15px;
        height: 15px;
    }

    .btn-point-remove {
        width: 48px;
        height: 48px;
        border: 0;
        border-radius: 12px;
        background: #fee2e2;
        color: #dc2626;
        cursor: pointer;
        transition: .25s ease;
    }

    .btn-point-remove:hover {
        background: #dc2626;
        color: #fff;
    }

    .mb-0 {
        margin-bottom: 0 !important;
    }

    textarea.field-input {
        min-height: 120px;
        resize: vertical;
        padding-top: 14px;
    }

    @media (max-width: 768px) {
        .point-row {
            grid-template-columns: 1fr;
            align-items: stretch;
        }

        .btn-point-remove {
            width: 100%;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const pointsWrapper = document.getElementById('pointsWrapper');
        const addPointBtn = document.getElementById('addPointBtn');

        function getNextIndex() {
            return pointsWrapper.querySelectorAll('.point-row').length;
        }

        addPointBtn.addEventListener('click', function () {
            const index = getNextIndex();

            const html = `
                <div class="point-row">
                    <div class="field-group mb-0">
                        <label class="field-label">
                            Point Text
                        </label>

                        <div class="input-icon-wrap">
                            <i class="fas fa-check-circle icon"></i>

                            <input type="text"
                                   name="points[${index}][text]"
                                   placeholder="Enter point text"
                                   class="field-input">
                        </div>
                    </div>

                    <label class="point-status">
                        <input type="checkbox" name="points[${index}][status]" checked>
                        <span>Active</span>
                    </label>

                    <button type="button" class="btn-point-remove removePointBtn">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            `;

            pointsWrapper.insertAdjacentHTML('beforeend', html);
        });

        document.addEventListener('click', function (e) {
            const removeBtn = e.target.closest('.removePointBtn');

            if (removeBtn) {
                removeBtn.closest('.point-row').remove();
            }
        });
    });
</script>

@endsection