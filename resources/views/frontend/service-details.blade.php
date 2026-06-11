@extends('frontend.master')

@section('title', $service->seo_title ?: $service->title . ' - Sinha Dental Clinic, Patna')
@section('meta_description', $service->seo_description ?: ($service->short_description ?: 'Dental treatment details at Sinha Dental Clinic, Patna.'))

@section('content')
@php
    $overviewPoints = collect($service->overview_points ?: [])
        ->filter()
        ->values();

    if ($overviewPoints->isEmpty()) {
        $overviewPoints = collect([
            $service->point_one,
            $service->point_two,
            'Comfort-first consultation and clear treatment guidance',
        ])->filter()->values();
    }

    $symptoms = collect($service->symptoms ?: [])
        ->filter()
        ->values();

    if ($symptoms->isEmpty()) {
        $symptoms = collect([
            'Dental discomfort or sensitivity',
            'Difficulty chewing comfortably',
            'Visible smile or tooth concern',
            'Need for professional dental guidance',
        ]);
    }

    $processSteps = collect($service->process_steps ?: [])
        ->filter()
        ->values();

    if ($processSteps->isEmpty()) {
        $processSteps = collect([
            'Share your dental concern with the clinic team.',
            'Get checkup, diagnosis and treatment guidance.',
            'Receive hygiene-focused dental treatment.',
            'Follow aftercare advice for better oral health.',
        ]);
    }

    $benefits = collect($service->benefits ?: [])
        ->filter()
        ->values();

    if ($benefits->isEmpty()) {
        $benefits = collect([
            'Personalized treatment planning',
            'Improved comfort and oral health confidence',
            'Clear guidance before and after treatment',
        ]);
    }

    $aftercarePoints = collect($service->aftercare_points ?: [])
        ->filter()
        ->values();

    if ($aftercarePoints->isEmpty()) {
        $aftercarePoints = collect([
            'Follow dentist instructions after your visit',
            'Maintain brushing, flossing and regular dental checkups',
            'Call the clinic if pain or discomfort continues',
        ]);
    }

    $faqs = collect($service->faqs ?: [])
        ->filter(function ($faq) {
            return !empty($faq['question']) || !empty($faq['answer']);
        })
        ->values();
@endphp

<section class="service-details-hero" id="serviceDetailsHero">
    <div class="breadcrumb-pattern"></div>
    <div class="breadcrumb-shine"></div>
    <div class="breadcrumb-orb orb-one"></div>
    <div class="breadcrumb-orb orb-two"></div>
    <div class="breadcrumb-orb orb-three"></div>

    <div class="container">
        <div class="service-hero-grid">
            <div class="service-hero-content reveal">
                <span class="hero-mini-badge">
                    <i class="{{ $service->icon_class ?: 'bi bi-heart-pulse-fill' }}"></i>
                    {{ $service->tag ?: ucfirst($service->category ?: 'Dental Service') }}
                </span>

                <nav class="premium-breadcrumb" aria-label="breadcrumb">
                    <a href="{{ url('/') }}">
                        <i class="bi bi-house-door-fill"></i>
                        Home
                    </a>

                    <span>
                        <i class="bi bi-chevron-right"></i>
                    </span>

                    <a href="{{ route('services.index') }}">
                        Services
                    </a>

                    <span>
                        <i class="bi bi-chevron-right"></i>
                    </span>

                    <a href="{{ route('services.show', $service->slug) }}" class="active">
                        {{ $service->title }}
                    </a>
                </nav>

                <h1>{{ $service->title }} <span>In Patna</span></h1>

                <p>
                    {{ $service->short_description ?: 'Get professional dental care with clear consultation, hygiene-focused treatment and patient-friendly guidance at Sinha Dental Clinic, Patna.' }}
                </p>

                <div class="service-hero-actions">
                    <a href="tel:08235147460" class="service-btn-primary">
                        <i class="bi bi-telephone-fill"></i>
                        Call Clinic
                    </a>

                    <a href="#appointment" class="service-btn-light">
                        <i class="bi bi-calendar2-check-fill"></i>
                        Book Appointment
                    </a>
                </div>
            </div>

            <aside class="service-hero-card reveal">
                <div class="hero-card-icon">
                    <i class="{{ $service->icon_class ?: 'bi bi-heart-pulse-fill' }}"></i>
                </div>

                <h3>{{ $service->overview_card_title ?: 'Treatment Support' }}</h3>

                <p>
                    {{ $service->overview_card_subtitle ?: 'Consultation, treatment planning and aftercare guidance for confident dental care.' }}
                </p>

                <div class="hero-card-points">
                    @foreach($overviewPoints->take(3) as $point)
                        <div>
                            <i class="bi bi-check2-circle"></i>
                            {{ $point }}
                        </div>
                    @endforeach
                </div>
            </aside>
        </div>
    </div>
</section>

<section class="service-overview-section section-padding">
    <div class="container">
        <div class="overview-grid">
            <div class="overview-image reveal">
                <img src="{{ $service->overview_image }}"
                     alt="{{ $service->overview_image_alt ?: $service->title }}">

                <div class="overview-floating-card">
                    <i class="bi bi-shield-check"></i>
                    <div>
                        <strong>{{ $service->overview_badge_text ?: 'Hygiene First Care' }}</strong>
                        <span>Sinha Dental Clinic, Patna</span>
                    </div>
                </div>
            </div>

            <div class="overview-content reveal">
                <span class="section-badge">
                    <i class="bi bi-clipboard2-pulse-fill"></i>
                    Treatment Overview
                </span>

                <h2>{{ $service->overview_heading ?: 'About ' . $service->title }}</h2>

                <p>
                    {{ $service->overview_description_one ?: ($service->short_description ?: 'This dental treatment is planned after a professional consultation so patients understand the concern, treatment approach and expected care steps.') }}
                </p>

                @if($service->overview_description_two)
                    <p>{{ $service->overview_description_two }}</p>
                @endif

                <div class="overview-points">
                    @foreach($overviewPoints as $point)
                        <div>
                            <i class="bi bi-check-circle-fill"></i>
                            {{ $point }}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section class="symptoms-section section-padding">
    <div class="symptoms-pattern"></div>

    <div class="container">
        <div class="section-heading reveal">
            <span class="section-badge">
                <i class="bi bi-activity"></i>
                When To Visit
            </span>

            <h2>Common Concerns For {{ $service->title }}</h2>

            <p>Book a consultation if you notice symptoms or concerns related to this treatment.</p>
        </div>

        <div class="symptoms-grid">
            @foreach($symptoms->take(4) as $symptom)
                <article class="symptom-card reveal">
                    <i class="bi bi-exclamation-triangle"></i>
                    <h3>Concern {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</h3>
                    <p>{{ $symptom }}</p>
                </article>
            @endforeach
        </div>
    </div>
</section>

<section class="process-section section-padding">
    <div class="container">
        <div class="section-heading reveal">
            <span class="section-badge">
                <i class="bi bi-diagram-3-fill"></i>
                Treatment Process
            </span>

            <h2>Simple Care Flow</h2>

            <p>Every visit is guided with consultation, treatment explanation and aftercare support.</p>
        </div>

        <div class="process-timeline">
            @foreach($processSteps as $step)
                <article class="process-step reveal">
                    <span>{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                    <div>
                        <h3>Step {{ $loop->iteration }}</h3>
                        <p>{{ $step }}</p>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>

<section class="benefits-section section-padding">
    <div class="container">
        <div class="benefits-grid">
            <div class="benefits-content reveal">
                <span class="section-badge">
                    <i class="bi bi-stars"></i>
                    Benefits & Aftercare
                </span>

                <h2>Care That Supports Long-Term Oral Health</h2>

                <p>
                    The goal is to make your dental care clear, comfortable and easier to maintain after the visit.
                </p>
            </div>

            <div class="benefits-list">
                @foreach($benefits as $benefit)
                    <div class="benefit-item reveal">
                        <i class="bi bi-check2-circle"></i>
                        <div>
                            <strong>Benefit {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</strong>
                            <span>{{ $benefit }}</span>
                        </div>
                    </div>
                @endforeach

                @foreach($aftercarePoints as $point)
                    <div class="benefit-item reveal">
                        <i class="bi bi-heart-pulse-fill"></i>
                        <div>
                            <strong>Aftercare {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</strong>
                            <span>{{ $point }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

@if($faqs->isNotEmpty())
    <section class="service-faq-section section-padding" id="faqs">
        <div class="faq-pattern"></div>

        <div class="container">
            <div class="section-heading reveal">
                <span class="section-badge">
                    <i class="bi bi-question-circle-fill"></i>
                    FAQs
                </span>

                <h2>Questions About {{ $service->title }}</h2>

                <p>Quick answers before booking your dental consultation.</p>
            </div>

            <div class="faq-wrapper reveal">
                <div class="accordion" id="serviceFaqAccordion">
                    @foreach($faqs as $faq)
                        @php $faqId = 'serviceFaq' . $loop->iteration; @endphp

                        <div class="accordion-item">
                            <h3 class="accordion-header" id="{{ $faqId }}Heading">
                                <button class="accordion-button {{ $loop->first ? '' : 'collapsed' }}"
                                        type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#{{ $faqId }}"
                                        aria-expanded="{{ $loop->first ? 'true' : 'false' }}"
                                        aria-controls="{{ $faqId }}">
                                    {{ $faq['question'] ?: 'Service question' }}
                                </button>
                            </h3>

                            <div id="{{ $faqId }}"
                                 class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}"
                                 aria-labelledby="{{ $faqId }}Heading"
                                 data-bs-parent="#serviceFaqAccordion">
                                <div class="accordion-body">
                                    {{ $faq['answer'] ?: 'Please call Sinha Dental Clinic for more details about this service.' }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endif

@if($relatedServices->isNotEmpty())
    <section class="related-services-section section-padding">
        <div class="container">
            <div class="section-heading reveal">
                <span class="section-badge">
                    <i class="bi bi-grid-1x2-fill"></i>
                    Related Services
                </span>

                <h2>More Dental Treatments</h2>

                <p>Explore similar dental services available at Sinha Dental Clinic.</p>
            </div>

            <div class="related-services-grid">
                @foreach($relatedServices as $relatedService)
                    <a href="{{ route('services.show', $relatedService->slug) }}" class="related-service-card reveal">
                        <i class="{{ $relatedService->icon_class ?: 'bi bi-heart-pulse-fill' }}"></i>
                        <h3>{{ $relatedService->title }}</h3>
                        <p>{{ $relatedService->short_description }}</p>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
@endif

<section class="appointment-cta" id="appointment">
    <div class="container">
        <div class="appointment-box reveal">
            <div class="cta-glow glow-one"></div>
            <div class="cta-glow glow-two"></div>

            <div class="appointment-content">
                <span>
                    <i class="bi bi-calendar2-check-fill"></i>
                    Book Dental Visit
                </span>

                <h2>Need Help With {{ $service->title }}?</h2>

                <p>
                    Call Sinha Dental Clinic or book an appointment enquiry for consultation and treatment guidance.
                </p>

                <div class="appointment-actions">
                    <a href="tel:08235147460" class="btn-white">
                        <i class="bi bi-telephone-fill"></i>
                        Call Clinic
                    </a>

                    <a href="https://wa.me/918235147460" target="_blank" class="btn-outline-white">
                        <i class="bi bi-whatsapp"></i>
                        WhatsApp
                    </a>

                    <a href="{{ route('services.index') }}" class="btn-outline-white">
                        <i class="bi bi-grid-fill"></i>
                        All Services
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
