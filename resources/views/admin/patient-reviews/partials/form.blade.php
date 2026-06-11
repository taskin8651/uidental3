<div class="admin-form-grid">
    <div class="form-card">
        <div class="form-card-header">
            <div class="form-card-icon">
                <i class="fas fa-star"></i>
            </div>
            <div>
                <p class="form-card-title">Review Content</p>
                <p class="form-card-subtitle">Patient card title, service and message</p>
            </div>
        </div>

        <div class="form-card-body">
            <div class="field-group">
                <label class="field-label" for="avatar_letter">Avatar Letter</label>
                <input type="text" name="avatar_letter" id="avatar_letter" maxlength="5"
                       value="{{ old('avatar_letter', $patientReview->avatar_letter ?? '') }}"
                       placeholder="A"
                       class="field-input {{ $errors->has('avatar_letter') ? 'error' : '' }}">
            </div>

            <div class="field-group">
                <label class="field-label" for="title">Title <span class="req">*</span></label>
                <input type="text" name="title" id="title" required
                       value="{{ old('title', $patientReview->title ?? 'Patient Review') }}"
                       placeholder="Patient Review"
                       class="field-input {{ $errors->has('title') ? 'error' : '' }}">
            </div>

            <div class="field-group">
                <label class="field-label" for="service_name">Service Name</label>
                <input type="text" name="service_name" id="service_name"
                       value="{{ old('service_name', $patientReview->service_name ?? '') }}"
                       placeholder="Teeth Cleaning"
                       class="field-input {{ $errors->has('service_name') ? 'error' : '' }}">
            </div>

            <div class="field-group">
                <label class="field-label" for="review_text">Review Text</label>
                <textarea name="review_text" id="review_text" rows="5"
                          placeholder="Write review message"
                          class="field-input {{ $errors->has('review_text') ? 'error' : '' }}">{{ old('review_text', $patientReview->review_text ?? '') }}</textarea>
            </div>
        </div>
    </div>

    <div class="form-card">
        <div class="form-card-header">
            <div class="form-card-icon">
                <i class="fas fa-sliders-h"></i>
            </div>
            <div>
                <p class="form-card-title">Display Settings</p>
                <p class="form-card-subtitle">Rating, badge, order and active status</p>
            </div>
        </div>

        <div class="form-card-body">
            <div class="field-group">
                <label class="field-label" for="rating">Rating <span class="req">*</span></label>
                <input type="number" name="rating" id="rating" min="1" max="5" step="0.5" required
                       value="{{ old('rating', $patientReview->rating ?? 5) }}"
                       class="field-input {{ $errors->has('rating') ? 'error' : '' }}">
            </div>

            <div class="field-group">
                <label class="field-label" for="badge_text">Badge Text</label>
                <input type="text" name="badge_text" id="badge_text"
                       value="{{ old('badge_text', $patientReview->badge_text ?? '') }}"
                       placeholder="Hygiene Focus"
                       class="field-input {{ $errors->has('badge_text') ? 'error' : '' }}">
            </div>

            <div class="field-group">
                <label class="field-label" for="badge_icon">Badge Icon Class</label>
                <input type="text" name="badge_icon" id="badge_icon"
                       value="{{ old('badge_icon', $patientReview->badge_icon ?? 'bi bi-shield-check') }}"
                       placeholder="bi bi-shield-check"
                       class="field-input {{ $errors->has('badge_icon') ? 'error' : '' }}">
                <p class="field-hint">Use Bootstrap Icons class, example: bi bi-heart-pulse-fill</p>
            </div>

            <div class="field-group">
                <label class="field-label" for="sort_order">Sort Order</label>
                <input type="number" name="sort_order" id="sort_order"
                       value="{{ old('sort_order', $patientReview->sort_order ?? 0) }}"
                       class="field-input {{ $errors->has('sort_order') ? 'error' : '' }}">
            </div>

            <div class="field-group">
                <label class="field-label">Status</label>
                <label class="role-checkbox-item {{ old('status', $patientReview->status ?? 1) ? 'checked' : '' }}" style="max-width: 190px;">
                    <input type="checkbox" name="status" value="1" class="role-checkbox" {{ old('status', $patientReview->status ?? 1) ? 'checked' : '' }}>
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
        Save Review
    </button>
    <a href="{{ route('admin.patient-reviews.index') }}" class="btn-ghost">
        {{ trans('global.cancel') }}
    </a>
</div>

<style>
    textarea.field-input {
        min-height: 120px;
        resize: vertical;
        padding-top: 14px;
    }
</style>
