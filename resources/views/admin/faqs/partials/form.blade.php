<div class="admin-form-grid">
    <div class="form-card">
        <div class="form-card-header">
            <div class="form-card-icon">
                <i class="fas fa-question-circle"></i>
            </div>
            <div>
                <p class="form-card-title">FAQ Content</p>
                <p class="form-card-subtitle">Question and answer shown on homepage</p>
            </div>
        </div>

        <div class="form-card-body">
            <div class="field-group">
                <label class="field-label" for="question">Question <span class="req">*</span></label>
                <input type="text" name="question" id="question" required
                       value="{{ old('question', $faq->question ?? '') }}"
                       class="field-input {{ $errors->has('question') ? 'error' : '' }}">
            </div>

            <div class="field-group">
                <label class="field-label" for="answer">Answer</label>
                <textarea name="answer" id="answer" rows="6"
                          class="field-input {{ $errors->has('answer') ? 'error' : '' }}">{{ old('answer', $faq->answer ?? '') }}</textarea>
                <p class="field-hint">Available placeholders: {working_hours}, {sunday_hours}, {phone}, {clinic_name}</p>
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
                <p class="form-card-subtitle">Icon, order and active status</p>
            </div>
        </div>

        <div class="form-card-body">
            <div class="field-group">
                <label class="field-label" for="icon_class">Icon Class</label>
                <input type="text" name="icon_class" id="icon_class"
                       value="{{ old('icon_class', $faq->icon_class ?? 'bi bi-question-circle') }}"
                       class="field-input {{ $errors->has('icon_class') ? 'error' : '' }}">
                <p class="field-hint">Example: bi bi-clock-history</p>
            </div>

            <div class="field-group">
                <label class="field-label" for="sort_order">Sort Order</label>
                <input type="number" name="sort_order" id="sort_order"
                       value="{{ old('sort_order', $faq->sort_order ?? 0) }}"
                       class="field-input {{ $errors->has('sort_order') ? 'error' : '' }}">
            </div>

            <div class="field-group">
                <label class="field-label">Status</label>
                <label class="role-checkbox-item {{ old('status', $faq->status ?? 1) ? 'checked' : '' }}" style="max-width: 190px;">
                    <input type="checkbox" name="status" value="1" class="role-checkbox" {{ old('status', $faq->status ?? 1) ? 'checked' : '' }}>
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
        Save FAQ
    </button>
    <a href="{{ route('admin.faqs.index') }}" class="btn-ghost">
        {{ trans('global.cancel') }}
    </a>
</div>

<style>
    textarea.field-input {
        min-height: 130px;
        resize: vertical;
        padding-top: 14px;
    }
</style>
