@extends('layouts.admin')

@section('page-title', 'Edit Service')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.services.index') }}" class="admin-back-link">
            ← {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">
            Edit Service
        </h2>

        <p class="admin-page-subtitle">
            Update dental service details
        </p>
    </div>
</div>

<form method="POST"
      action="{{ route('admin.services.update', $service->id) }}"
      enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="admin-form-grid">

        {{-- SERVICE CARD CONTENT --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-tooth"></i>
                </div>

                <div>
                    <p class="form-card-title">Service Card Content</p>
                    <p class="form-card-subtitle">Frontend service grid card details</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="number">Service Number</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-sort-numeric-up icon"></i>

                        <input type="text"
                               name="number"
                               id="number"
                               value="{{ old('number', $service->number) }}"
                               placeholder="01"
                               class="field-input {{ $errors->has('number') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('number'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('number') }}
                        </p>
                    @else
                        <p class="field-hint">Example: 01, 02, 03</p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="icon_class">Icon Class</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-icons icon"></i>

                        <input type="text"
                               name="icon_class"
                               id="icon_class"
                               value="{{ old('icon_class', $service->icon_class) }}"
                               placeholder="bi bi-person-heart"
                               class="field-input {{ $errors->has('icon_class') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('icon_class'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('icon_class') }}
                        </p>
                    @else
                        <p class="field-hint">Example: bi bi-heart-pulse-fill</p>
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
                               value="{{ old('title', $service->title) }}"
                               required
                               placeholder="Root Canal Treatment"
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
                    <label class="field-label" for="slug">Slug</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-link icon"></i>

                        <input type="text"
                               name="slug"
                               id="slug"
                               value="{{ old('slug', $service->slug) }}"
                               placeholder="root-canal-treatment"
                               class="field-input {{ $errors->has('slug') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('slug'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('slug') }}
                        </p>
                    @else
                        <p class="field-hint">Blank chhodne par title se auto generate hoga</p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="short_description">
                        Short Description
                    </label>

                    <textarea name="short_description"
                              id="short_description"
                              rows="4"
                              placeholder="Comfort-focused care to save infected or painful natural teeth safely."
                              class="field-input {{ $errors->has('short_description') ? 'error' : '' }}">{{ old('short_description', $service->short_description) }}</textarea>

                    @if($errors->has('short_description'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('short_description') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="point_one">Card Point One</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-check icon"></i>

                        <input type="text"
                               name="point_one"
                               id="point_one"
                               value="{{ old('point_one', $service->point_one) }}"
                               placeholder="Tooth pain relief"
                               class="field-input {{ $errors->has('point_one') ? 'error' : '' }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="point_two">Card Point Two</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-check icon"></i>

                        <input type="text"
                               name="point_two"
                               id="point_two"
                               value="{{ old('point_two', $service->point_two) }}"
                               placeholder="Natural tooth saving"
                               class="field-input {{ $errors->has('point_two') ? 'error' : '' }}">
                    </div>
                </div>

            </div>
        </div>

        {{-- CATEGORY SETTINGS --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-sliders-h"></i>
                </div>

                <div>
                    <p class="form-card-title">Category & Settings</p>
                    <p class="form-card-subtitle">Filter, style, order and visibility</p>
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
                        <option value="routine" {{ old('category', $service->category) == 'routine' ? 'selected' : '' }}>Routine Care</option>
                        <option value="restorative" {{ old('category', $service->category) == 'restorative' ? 'selected' : '' }}>Restorative</option>
                        <option value="cosmetic" {{ old('category', $service->category) == 'cosmetic' ? 'selected' : '' }}>Cosmetic</option>
                        <option value="special" {{ old('category', $service->category) == 'special' ? 'selected' : '' }}>Special Care</option>
                    </select>

                    @if($errors->has('category'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('category') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="tag">Service Tag</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-tag icon"></i>

                        <input type="text"
                               name="tag"
                               id="tag"
                               value="{{ old('tag', $service->tag) }}"
                               placeholder="Pain Relief"
                               class="field-input {{ $errors->has('tag') ? 'error' : '' }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="card_style">Card Style</label>

                    <select name="card_style"
                            id="card_style"
                            class="field-input {{ $errors->has('card_style') ? 'error' : '' }}">
                        <option value="normal" {{ old('card_style', $service->card_style) == 'normal' ? 'selected' : '' }}>Normal</option>
                        <option value="featured" {{ old('card_style', $service->card_style) == 'featured' ? 'selected' : '' }}>Featured</option>
                        <option value="urgent" {{ old('card_style', $service->card_style) == 'urgent' ? 'selected' : '' }}>Urgent</option>
                    </select>

                    @if($errors->has('card_style'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('card_style') }}
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
                               value="{{ old('sort_order', $service->sort_order) }}"
                               placeholder="0"
                               class="field-input {{ $errors->has('sort_order') ? 'error' : '' }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">
                        Status
                    </label>

                    <label class="role-checkbox-item {{ old('status', $service->status) ? 'checked' : '' }}" style="max-width:190px;">
                        <input type="checkbox"
                               name="status"
                               value="1"
                               class="role-checkbox"
                               {{ old('status', $service->status) ? 'checked' : '' }}>

                        <div class="check-icon"></div>

                        <span class="checkbox-text">Active</span>
                    </label>
                </div>

                <div class="form-info-box">
                    <p>
                        <i class="fas fa-info-circle"></i>
                        Buttons static rahenge. View Details slug se chalega aur Book appointment page par jayega.
                    </p>
                </div>

            </div>
        </div>

        {{-- OVERVIEW CONTENT --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-clipboard-list"></i>
                </div>

                <div>
                    <p class="form-card-title">Overview Detail Content</p>
                    <p class="form-card-subtitle">Service detail page top overview section</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="overview_image">Overview Image</label>

                    <input type="file"
                           name="overview_image"
                           id="overview_image"
                           accept="image/*"
                           class="field-input {{ $errors->has('overview_image') ? 'error' : '' }}">

                    @if($service->overview_image)
                        <div style="margin-top: 14px;">
                            <img src="{{ $service->overview_image }}"
                                 alt="{{ $service->overview_image_alt ?? $service->title }}"
                                 style="width:180px;height:125px;object-fit:cover;border-radius:14px;border:1px solid #e5e7eb;">
                        </div>
                    @endif

                    @if($errors->has('overview_image'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('overview_image') }}
                        </p>
                    @else
                        <p class="field-hint">
                            <i class="fas fa-info-circle"></i>
                            Upload only if you want to replace current image
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="overview_image_alt">Overview Image Alt</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-closed-captioning icon"></i>

                        <input type="text"
                               name="overview_image_alt"
                               id="overview_image_alt"
                               value="{{ old('overview_image_alt', $service->overview_image_alt) }}"
                               placeholder="Root canal treatment at Sinha Dental Clinic"
                               class="field-input {{ $errors->has('overview_image_alt') ? 'error' : '' }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="overview_badge_text">Overview Badge Text</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-tag icon"></i>

                        <input type="text"
                               name="overview_badge_text"
                               id="overview_badge_text"
                               value="{{ old('overview_badge_text', $service->overview_badge_text) }}"
                               placeholder="Treatment Overview"
                               class="field-input {{ $errors->has('overview_badge_text') ? 'error' : '' }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="overview_heading">Overview Heading</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>

                        <input type="text"
                               name="overview_heading"
                               id="overview_heading"
                               value="{{ old('overview_heading', $service->overview_heading) }}"
                               placeholder="Save Your Natural Tooth With Comfortable Treatment Guidance"
                               class="field-input {{ $errors->has('overview_heading') ? 'error' : '' }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="overview_description_one">Overview Description One</label>

                    <textarea name="overview_description_one"
                              id="overview_description_one"
                              rows="5"
                              class="field-input {{ $errors->has('overview_description_one') ? 'error' : '' }}">{{ old('overview_description_one', $service->overview_description_one) }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label" for="overview_description_two">Overview Description Two</label>

                    <textarea name="overview_description_two"
                              id="overview_description_two"
                              rows="5"
                              class="field-input {{ $errors->has('overview_description_two') ? 'error' : '' }}">{{ old('overview_description_two', $service->overview_description_two) }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label" for="overview_card_title">Floating Card Title</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-hospital icon"></i>

                        <input type="text"
                               name="overview_card_title"
                               id="overview_card_title"
                               value="{{ old('overview_card_title', $service->overview_card_title) }}"
                               placeholder="Dental Service"
                               class="field-input {{ $errors->has('overview_card_title') ? 'error' : '' }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="overview_card_subtitle">Floating Card Subtitle</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-notes-medical icon"></i>

                        <input type="text"
                               name="overview_card_subtitle"
                               id="overview_card_subtitle"
                               value="{{ old('overview_card_subtitle', $service->overview_card_subtitle) }}"
                               placeholder="Reusable Detail Layout"
                               class="field-input {{ $errors->has('overview_card_subtitle') ? 'error' : '' }}">
                    </div>
                </div>

            </div>
        </div>

        {{-- DETAIL PAGE POINTS --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-list-check"></i>
                </div>

                <div>
                    <p class="form-card-title">Detail Page Points</p>
                    <p class="form-card-subtitle">Overview, symptoms, process, benefits and aftercare points</p>
                </div>
            </div>

            <div class="form-card-body">

                {{-- OVERVIEW POINTS --}}
                <div class="repeat-wrapper" data-repeat="overview_points">
                    <label class="field-label">Overview Points</label>

                    @php $overviewPoints = old('overview_points', $service->overview_points ?? ['']); @endphp

                    @forelse($overviewPoints as $index => $item)
                        <div class="repeat-item">
                            <input type="text"
                                   name="overview_points[{{ $index }}]"
                                   value="{{ $item }}"
                                   placeholder="Enter overview point"
                                   class="field-input">

                            <button type="button" class="btn-point-remove removeRepeatBtn">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    @empty
                        <div class="repeat-item">
                            <input type="text"
                                   name="overview_points[0]"
                                   placeholder="Enter overview point"
                                   class="field-input">

                            <button type="button" class="btn-point-remove removeRepeatBtn">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    @endforelse

                    <button type="button" class="btn-mini-primary addRepeatBtn">
                        + Add
                    </button>
                </div>

                {{-- SYMPTOMS --}}
                <div class="repeat-wrapper" data-repeat="symptoms">
                    <label class="field-label">Symptoms</label>

                    @php $symptoms = old('symptoms', $service->symptoms ?? ['']); @endphp

                    @forelse($symptoms as $index => $item)
                        <div class="repeat-item">
                            <input type="text"
                                   name="symptoms[{{ $index }}]"
                                   value="{{ $item }}"
                                   placeholder="Enter symptom"
                                   class="field-input">

                            <button type="button" class="btn-point-remove removeRepeatBtn">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    @empty
                        <div class="repeat-item">
                            <input type="text"
                                   name="symptoms[0]"
                                   placeholder="Enter symptom"
                                   class="field-input">

                            <button type="button" class="btn-point-remove removeRepeatBtn">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    @endforelse

                    <button type="button" class="btn-mini-primary addRepeatBtn">
                        + Add
                    </button>
                </div>

                {{-- PROCESS --}}
                <div class="repeat-wrapper" data-repeat="process_steps">
                    <label class="field-label">Treatment Process Steps</label>

                    @php $processSteps = old('process_steps', $service->process_steps ?? ['']); @endphp

                    @forelse($processSteps as $index => $item)
                        <div class="repeat-item">
                            <input type="text"
                                   name="process_steps[{{ $index }}]"
                                   value="{{ $item }}"
                                   placeholder="Enter process step"
                                   class="field-input">

                            <button type="button" class="btn-point-remove removeRepeatBtn">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    @empty
                        <div class="repeat-item">
                            <input type="text"
                                   name="process_steps[0]"
                                   placeholder="Enter process step"
                                   class="field-input">

                            <button type="button" class="btn-point-remove removeRepeatBtn">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    @endforelse

                    <button type="button" class="btn-mini-primary addRepeatBtn">
                        + Add
                    </button>
                </div>

                {{-- BENEFITS --}}
                <div class="repeat-wrapper" data-repeat="benefits">
                    <label class="field-label">Benefits</label>

                    @php $benefits = old('benefits', $service->benefits ?? ['']); @endphp

                    @forelse($benefits as $index => $item)
                        <div class="repeat-item">
                            <input type="text"
                                   name="benefits[{{ $index }}]"
                                   value="{{ $item }}"
                                   placeholder="Enter benefit"
                                   class="field-input">

                            <button type="button" class="btn-point-remove removeRepeatBtn">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    @empty
                        <div class="repeat-item">
                            <input type="text"
                                   name="benefits[0]"
                                   placeholder="Enter benefit"
                                   class="field-input">

                            <button type="button" class="btn-point-remove removeRepeatBtn">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    @endforelse

                    <button type="button" class="btn-mini-primary addRepeatBtn">
                        + Add
                    </button>
                </div>

                {{-- AFTERCARE --}}
                <div class="repeat-wrapper" data-repeat="aftercare_points">
                    <label class="field-label">Aftercare Points</label>

                    @php $aftercarePoints = old('aftercare_points', $service->aftercare_points ?? ['']); @endphp

                    @forelse($aftercarePoints as $index => $item)
                        <div class="repeat-item">
                            <input type="text"
                                   name="aftercare_points[{{ $index }}]"
                                   value="{{ $item }}"
                                   placeholder="Enter aftercare point"
                                   class="field-input">

                            <button type="button" class="btn-point-remove removeRepeatBtn">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    @empty
                        <div class="repeat-item">
                            <input type="text"
                                   name="aftercare_points[0]"
                                   placeholder="Enter aftercare point"
                                   class="field-input">

                            <button type="button" class="btn-point-remove removeRepeatBtn">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    @endforelse

                    <button type="button" class="btn-mini-primary addRepeatBtn">
                        + Add
                    </button>
                </div>

            </div>
        </div>

        {{-- FAQ & SEO --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-question-circle"></i>
                </div>

                <div>
                    <p class="form-card-title">FAQs & SEO</p>
                    <p class="form-card-subtitle">Service detail page FAQs and SEO data</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="repeat-wrapper faq-wrapper">
                    <label class="field-label">FAQs</label>

                    @php $faqs = old('faqs', $service->faqs ?? [['question' => '', 'answer' => '']]); @endphp

                    @forelse($faqs as $index => $faq)
                        <div class="repeat-item faq-item">
                            <input type="text"
                                   name="faqs[{{ $index }}][question]"
                                   value="{{ $faq['question'] ?? '' }}"
                                   placeholder="Question"
                                   class="field-input">

                            <textarea name="faqs[{{ $index }}][answer]"
                                      placeholder="Answer"
                                      class="field-input">{{ $faq['answer'] ?? '' }}</textarea>

                            <button type="button" class="btn-point-remove removeRepeatBtn">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    @empty
                        <div class="repeat-item faq-item">
                            <input type="text"
                                   name="faqs[0][question]"
                                   placeholder="Question"
                                   class="field-input">

                            <textarea name="faqs[0][answer]"
                                      placeholder="Answer"
                                      class="field-input"></textarea>

                            <button type="button" class="btn-point-remove removeRepeatBtn">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    @endforelse

                    <button type="button" class="btn-mini-primary addFaqBtn">
                        + Add FAQ
                    </button>
                </div>

                <div class="field-group">
                    <label class="field-label" for="seo_title">SEO Title</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-search icon"></i>

                        <input type="text"
                               name="seo_title"
                               id="seo_title"
                               value="{{ old('seo_title', $service->seo_title) }}"
                               placeholder="Root Canal Treatment in Patna"
                               class="field-input {{ $errors->has('seo_title') ? 'error' : '' }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="seo_description">SEO Description</label>

                    <textarea name="seo_description"
                              id="seo_description"
                              rows="4"
                              placeholder="Enter SEO description"
                              class="field-input {{ $errors->has('seo_description') ? 'error' : '' }}">{{ old('seo_description', $service->seo_description) }}</textarea>
                </div>

            </div>
        </div>

    </div>

    <div class="form-actions">
        <button type="submit" class="btn-primary">
            <i class="fas fa-check"></i>
            Update
        </button>

        <a href="{{ route('admin.services.index') }}" class="btn-ghost">
            {{ trans('global.cancel') }}
        </a>
    </div>

</form>

<style>
    textarea.field-input {
        min-height: 110px;
        resize: vertical;
        padding-top: 14px;
    }

    .repeat-wrapper {
        margin-bottom: 22px;
        padding: 14px;
        border: 1px solid #e5e7eb;
        border-radius: 16px;
        background: #f9fafb;
    }

    .repeat-item {
        display: grid;
        grid-template-columns: 1fr 48px;
        gap: 10px;
        margin-bottom: 10px;
        align-items: start;
    }

    .faq-item {
        grid-template-columns: 1fr 1fr 48px;
    }

    .btn-point-remove {
        width: 48px;
        height: 48px;
        border: 0;
        border-radius: 12px;
        background: #fee2e2;
        color: #dc2626;
        cursor: pointer;
    }

    .btn-point-remove:hover {
        background: #dc2626;
        color: #fff;
    }

    @media(max-width: 768px) {
        .repeat-item,
        .faq-item {
            grid-template-columns: 1fr;
        }

        .btn-point-remove {
            width: 100%;
        }
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.addRepeatBtn').forEach(function (btn) {
        btn.addEventListener('click', function () {
            const wrapper = btn.closest('.repeat-wrapper');
            const name = wrapper.dataset.repeat;
            const count = wrapper.querySelectorAll('.repeat-item').length;

            const html = `
                <div class="repeat-item">
                    <input type="text" name="${name}[${count}]" placeholder="Enter point" class="field-input">

                    <button type="button" class="btn-point-remove removeRepeatBtn">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            `;

            btn.insertAdjacentHTML('beforebegin', html);
        });
    });

    document.querySelectorAll('.addFaqBtn').forEach(function (btn) {
        btn.addEventListener('click', function () {
            const wrapper = btn.closest('.faq-wrapper');
            const count = wrapper.querySelectorAll('.faq-item').length;

            const html = `
                <div class="repeat-item faq-item">
                    <input type="text" name="faqs[${count}][question]" placeholder="Question" class="field-input">

                    <textarea name="faqs[${count}][answer]" placeholder="Answer" class="field-input"></textarea>

                    <button type="button" class="btn-point-remove removeRepeatBtn">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            `;

            btn.insertAdjacentHTML('beforebegin', html);
        });
    });

    document.addEventListener('click', function (e) {
        const removeBtn = e.target.closest('.removeRepeatBtn');

        if (removeBtn) {
            removeBtn.closest('.repeat-item').remove();
        }
    });
});
</script>

@endsection