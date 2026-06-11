@extends('layouts.admin')

@section('page-title', 'Website Settings')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Website Settings</h2>
        <p class="admin-page-subtitle">Manage basic SEO, contact details, social links, logo, favicon and footer text</p>
    </div>
</div>

<form method="POST"
      action="{{ route('admin.website-settings.update') }}"
      enctype="multipart/form-data">
    @csrf

    <div class="admin-form-grid">

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon"><i class="fas fa-search"></i></div>
                <div>
                    <p class="form-card-title">Basic / SEO</p>
                    <p class="form-card-subtitle">Default browser title and meta content</p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label" for="site_title">Site Title</label>
                    <input type="text" name="site_title" id="site_title"
                           value="{{ old('site_title', $websiteSetting->value('site_title')) }}"
                           class="field-input {{ $errors->has('site_title') ? 'error' : '' }}">
                </div>

                <div class="field-group">
                    <label class="field-label" for="meta_description">Meta Description</label>
                    <textarea name="meta_description" id="meta_description" rows="4"
                              class="field-input {{ $errors->has('meta_description') ? 'error' : '' }}">{{ old('meta_description', $websiteSetting->value('meta_description')) }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label" for="meta_keywords">Meta Keywords</label>
                    <textarea name="meta_keywords" id="meta_keywords" rows="3"
                              class="field-input {{ $errors->has('meta_keywords') ? 'error' : '' }}">{{ old('meta_keywords', $websiteSetting->value('meta_keywords')) }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label" for="clinic_name">Clinic / Brand Name</label>
                    <input type="text" name="clinic_name" id="clinic_name"
                           value="{{ old('clinic_name', $websiteSetting->value('clinic_name')) }}"
                           class="field-input {{ $errors->has('clinic_name') ? 'error' : '' }}">
                </div>

                <div class="field-group">
                    <label class="field-label" for="clinic_subtitle">Clinic Subtitle</label>
                    <input type="text" name="clinic_subtitle" id="clinic_subtitle"
                           value="{{ old('clinic_subtitle', $websiteSetting->value('clinic_subtitle')) }}"
                           class="field-input {{ $errors->has('clinic_subtitle') ? 'error' : '' }}">
                </div>
            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon"><i class="fas fa-address-book"></i></div>
                <div>
                    <p class="form-card-title">Contact Info</p>
                    <p class="form-card-subtitle">Phone, WhatsApp, email, rating and timings</p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label" for="phone">Phone Number</label>
                    <input type="text" name="phone" id="phone"
                           value="{{ old('phone', $websiteSetting->value('phone')) }}"
                           class="field-input {{ $errors->has('phone') ? 'error' : '' }}">
                </div>

                <div class="field-group">
                    <label class="field-label" for="whatsapp_number">WhatsApp Number</label>
                    <input type="text" name="whatsapp_number" id="whatsapp_number"
                           value="{{ old('whatsapp_number', $websiteSetting->value('whatsapp_number')) }}"
                           class="field-input {{ $errors->has('whatsapp_number') ? 'error' : '' }}">
                </div>

                <div class="field-group">
                    <label class="field-label" for="email">Email</label>
                    <input type="email" name="email" id="email"
                           value="{{ old('email', $websiteSetting->email) }}"
                           class="field-input {{ $errors->has('email') ? 'error' : '' }}">
                </div>

                <div class="field-group">
                    <label class="field-label" for="google_rating">Google Rating</label>
                    <input type="text" name="google_rating" id="google_rating"
                           value="{{ old('google_rating', $websiteSetting->value('google_rating')) }}"
                           class="field-input {{ $errors->has('google_rating') ? 'error' : '' }}">
                </div>

                <div class="field-group">
                    <label class="field-label" for="patient_reviews">Patient Reviews</label>
                    <input type="text" name="patient_reviews" id="patient_reviews"
                           value="{{ old('patient_reviews', $websiteSetting->value('patient_reviews')) }}"
                           class="field-input {{ $errors->has('patient_reviews') ? 'error' : '' }}">
                </div>

                <div class="field-group">
                    <label class="field-label" for="working_hours">Working Hours</label>
                    <input type="text" name="working_hours" id="working_hours"
                           value="{{ old('working_hours', $websiteSetting->value('working_hours')) }}"
                           class="field-input {{ $errors->has('working_hours') ? 'error' : '' }}">
                </div>

                <div class="field-group">
                    <label class="field-label" for="sunday_hours">Sunday Hours</label>
                    <input type="text" name="sunday_hours" id="sunday_hours"
                           value="{{ old('sunday_hours', $websiteSetting->value('sunday_hours')) }}"
                           class="field-input {{ $errors->has('sunday_hours') ? 'error' : '' }}">
                </div>
            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon"><i class="fas fa-map-marker-alt"></i></div>
                <div>
                    <p class="form-card-title">Address</p>
                    <p class="form-card-subtitle">Short and full clinic address</p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label" for="short_address">Short Address</label>
                    <input type="text" name="short_address" id="short_address"
                           value="{{ old('short_address', $websiteSetting->value('short_address')) }}"
                           class="field-input {{ $errors->has('short_address') ? 'error' : '' }}">
                </div>

                <div class="field-group">
                    <label class="field-label" for="address">Full Address</label>
                    <textarea name="address" id="address" rows="5"
                              class="field-input {{ $errors->has('address') ? 'error' : '' }}">{{ old('address', $websiteSetting->value('address')) }}</textarea>
                </div>
            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon"><i class="fas fa-share-alt"></i></div>
                <div>
                    <p class="form-card-title">Social Links</p>
                    <p class="form-card-subtitle">Facebook and Instagram profile URLs</p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label" for="facebook_url">Facebook URL</label>
                    <input type="text" name="facebook_url" id="facebook_url"
                           value="{{ old('facebook_url', $websiteSetting->value('facebook_url')) }}"
                           class="field-input {{ $errors->has('facebook_url') ? 'error' : '' }}">
                </div>

                <div class="field-group">
                    <label class="field-label" for="instagram_url">Instagram URL</label>
                    <input type="text" name="instagram_url" id="instagram_url"
                           value="{{ old('instagram_url', $websiteSetting->value('instagram_url')) }}"
                           class="field-input {{ $errors->has('instagram_url') ? 'error' : '' }}">
                </div>
            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon"><i class="fas fa-image"></i></div>
                <div>
                    <p class="form-card-title">Logo & Favicon</p>
                    <p class="form-card-subtitle">Upload brand logo and browser icon</p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label" for="logo">Logo</label>
                    <input type="file" name="logo" id="logo" accept="image/*"
                           class="field-input {{ $errors->has('logo') ? 'error' : '' }}">
                    @if($websiteSetting->logo)
                        <img src="{{ $websiteSetting->logo }}" alt="Logo" style="margin-top:12px;max-width:180px;max-height:90px;border:1px solid #e5e7eb;border-radius:12px;padding:8px;">
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="favicon">Favicon</label>
                    <input type="file" name="favicon" id="favicon" accept="image/*,.ico"
                           class="field-input {{ $errors->has('favicon') ? 'error' : '' }}">
                    @if($websiteSetting->favicon)
                        <img src="{{ $websiteSetting->favicon }}" alt="Favicon" style="margin-top:12px;width:48px;height:48px;object-fit:contain;border:1px solid #e5e7eb;border-radius:10px;padding:6px;">
                    @endif
                </div>
            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon"><i class="fas fa-align-left"></i></div>
                <div>
                    <p class="form-card-title">Footer</p>
                    <p class="form-card-subtitle">Footer text shown at bottom of website</p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label" for="footer_text">Footer Text</label>
                    <textarea name="footer_text" id="footer_text" rows="4"
                              class="field-input {{ $errors->has('footer_text') ? 'error' : '' }}">{{ old('footer_text', $websiteSetting->value('footer_text')) }}</textarea>
                </div>
            </div>
        </div>
    </div>

    <div class="form-actions">
        <button type="submit" class="btn-primary">
            <i class="fas fa-check"></i>
            Save Website Settings
        </button>
    </div>
</form>

<style>
    textarea.field-input {
        min-height: 110px;
        resize: vertical;
        padding-top: 14px;
    }
</style>

@endsection
