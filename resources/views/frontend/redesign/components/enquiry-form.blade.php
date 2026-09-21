@php
    $formId = $formId ?? 'redesign-counselling-form';
@endphp
<form
    class="tgc-enquiry-form"
    id="{{ $formId }}"
    method="POST"
    action="{{ url('/indexAbout') }}"
    data-recaptcha-form
    data-recaptcha-site-key="{{ config('services.nocaptcha.sitekey') }}"
>
    @csrf
    <input type="hidden" name="recaptcha_token" value="" data-recaptcha-token>
    <input type="hidden" name="form_type" value="Homepage Counselling Enquiry - Redesign">
    <input type="hidden" name="form_start" value="{{ now()->timestamp }}">
    <input type="hidden" name="page_url" value="{{ url()->current() }}">

    <div class="tgc-honeypot" aria-hidden="true">
        <label for="{{ $formId }}-website">Website</label>
        <input id="{{ $formId }}-website" type="text" name="website" value="" tabindex="-1" autocomplete="off">
    </div>

    @if ($errors->any())
        <div class="tgc-form-alert" role="alert" tabindex="-1">
            <p>Please check the marked fields and try again.</p>
            @if ($errors->has('captcha'))
                <p>{{ $errors->first('captcha') }}</p>
            @endif
        </div>
    @endif

    <div class="tgc-form-grid">
        <div class="tgc-field">
            <label for="{{ $formId }}-name">Full name</label>
            <input id="{{ $formId }}-name" name="name_aboutenquiry" type="text" value="{{ old('name_aboutenquiry') }}" autocomplete="name" required aria-describedby="{{ $errors->has('name_aboutenquiry') ? $formId.'-name-error' : '' }}">
            @error('name_aboutenquiry')<p class="tgc-field-error" id="{{ $formId }}-name-error">{{ $message }}</p>@enderror
        </div>

        <div class="tgc-field">
            <label for="{{ $formId }}-email">Email</label>
            <input id="{{ $formId }}-email" name="email_aboutenquiry" type="email" value="{{ old('email_aboutenquiry') }}" autocomplete="email" required aria-describedby="{{ $errors->has('email_aboutenquiry') ? $formId.'-email-error' : '' }}">
            @error('email_aboutenquiry')<p class="tgc-field-error" id="{{ $formId }}-email-error">{{ $message }}</p>@enderror
        </div>

        <div class="tgc-field">
            <label for="{{ $formId }}-phone">Phone</label>
            <input id="{{ $formId }}-phone" name="phone_aboutenquiry" type="tel" value="{{ old('phone_aboutenquiry') }}" autocomplete="tel" inputmode="tel" required aria-describedby="{{ $errors->has('phone_aboutenquiry') ? $formId.'-phone-error' : '' }}">
            @error('phone_aboutenquiry')<p class="tgc-field-error" id="{{ $formId }}-phone-error">{{ $message }}</p>@enderror
        </div>

        <div class="tgc-field">
            <label for="{{ $formId }}-subject">I need help with</label>
            <select id="{{ $formId }}-subject" name="subject_aboutenquiry" required aria-describedby="{{ $errors->has('subject_aboutenquiry') ? $formId.'-subject-error' : '' }}">
                <option value="">Select one</option>
                @foreach (['Career counselling', 'Course selection', 'Fees and batches', 'Centre visit'] as $subject)
                    <option value="{{ $subject }}" {{ old('subject_aboutenquiry') === $subject ? 'selected' : '' }}>{{ $subject }}</option>
                @endforeach
            </select>
            @error('subject_aboutenquiry')<p class="tgc-field-error" id="{{ $formId }}-subject-error">{{ $message }}</p>@enderror
        </div>

        <div class="tgc-field tgc-field--full">
            <label for="{{ $formId }}-message">What would you like to learn?</label>
            <textarea id="{{ $formId }}-message" name="message_aboutenquiry" rows="4" required aria-describedby="{{ $errors->has('message_aboutenquiry') ? $formId.'-message-error' : '' }}">{{ old('message_aboutenquiry') }}</textarea>
            @error('message_aboutenquiry')<p class="tgc-field-error" id="{{ $formId }}-message-error">{{ $message }}</p>@enderror
        </div>
    </div>

    <div class="tgc-form-footer">
        <button class="tgc-button tgc-button--primary" type="submit" data-submit-button>Request counselling</button>
        <p>By submitting, you agree that TGC India may contact you about courses and counselling.</p>
    </div>
    <p class="tgc-form-status" aria-live="polite" data-form-status></p>
</form>
