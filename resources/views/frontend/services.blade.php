@extends('frontend.master')
@section('title', 'Services - ' . $clinicFullName)
@section('content')

  <!-- ================= ULTRA PREMIUM SERVICES BREADCRUMB HERO ================= -->
  <section class="services-breadcrumb-hero" id="servicesHero">
    <div class="breadcrumb-pattern"></div>
    <div class="breadcrumb-shine"></div>

    <div class="breadcrumb-orb orb-one"></div>
    <div class="breadcrumb-orb orb-two"></div>
    <div class="breadcrumb-orb orb-three"></div>

    <div class="container">
      <div class="breadcrumb-center-box reveal">

        <span class="hero-mini-badge">
          <i class="bi bi-stars"></i>
          Complete Dental Treatments
        </span>

        <nav class="premium-breadcrumb" aria-label="breadcrumb">
          <a href="{{ route('home') }}">
            <i class="bi bi-house-door-fill"></i>
            Home
          </a>

          <span>
            <i class="bi bi-chevron-right"></i>
          </span>

          <a href="{{ route('services.index') }}" class="active">
            Services
          </a>
        </nav>

        <h1>
          Dental Services <span>For Every Smile</span>
        </h1>

        <p>
          Explore complete dental care at {{ $clinicFullName }} — from consultation,
          cleaning and root canal to crowns, implants, braces, smile designing and emergency care.
        </p>

        <div class="breadcrumb-trust-row">
          <div>
            <i class="bi bi-grid-1x2-fill"></i>
            <strong>14+ Services</strong>
          </div>

          <div>
            <i class="bi bi-shield-check"></i>
            <strong>Hygiene First Care</strong>
          </div>

          <div>
            <i class="bi bi-calendar2-check-fill"></i>
            <strong>Easy Appointment</strong>
          </div>
        </div>

        <div class="hero-actions">
          <a href="#servicesList" class="service-btn-primary">
            <i class="bi bi-grid-fill"></i>
            View Treatments
          </a>

          <a href="tel:{{ $phoneLink }}" class="service-btn-light">
            <i class="bi bi-telephone-fill"></i>
            Call Clinic
          </a>
        </div>

      </div>
    </div>
  </section>



  <!-- ================= SERVICES INTRO ================= -->
  <section class="services-intro section-padding">
    <div class="container">
      <div class="services-intro-grid">

        <div class="services-intro-content reveal">
          <span class="section-badge">
            <i class="bi bi-heart-pulse-fill"></i>
            Dental Care Menu
          </span>

          <h2>Complete Dental Treatments With Comfort & Clear Guidance</h2>

          <p>
            {{ $clinicFullName }} offers professional dental services for routine care, pain relief,
            smile improvement, replacement teeth and emergency support. Every service card below is
            designed to help patients quickly understand treatment options and take action.
          </p>
        </div>

        <div class="services-intro-card reveal">
          <div class="intro-card-icon">
            <i class="bi bi-clipboard2-pulse-fill"></i>
          </div>

          <div>
            <span>Service Support</span>
            <strong>Consultation to Treatment</strong>
            <p>
              Choose your treatment, call clinic or send appointment enquiry for better guidance.
            </p>
          </div>
        </div>

      </div>
    </div>
  </section>



  <!-- ================= SERVICES GRID ================= -->
 @php
    $services = $services ?? \App\Models\Service::where('status', 1)
        ->orderBy('sort_order', 'asc')
        ->orderBy('id', 'desc')
        ->get();
@endphp

<section class="services-page-section section-padding" id="servicesList">
    <div class="service-bg-pattern"></div>

    <div class="container">
        <div class="section-heading reveal">
            <span class="section-badge">
                <i class="bi bi-grid-1x2-fill"></i>
                Our Treatments
            </span>

            <h2>Dental Services Available At {{ $clinicFullName }}</h2>

            <p>
                Clean service grid with quick information, treatment category and appointment CTA buttons.
            </p>
        </div>

        <div class="services-filter reveal">
            <button class="filter-btn active" data-filter="all">All Services</button>
            <button class="filter-btn" data-filter="routine">Routine Care</button>
            <button class="filter-btn" data-filter="restorative">Restorative</button>
            <button class="filter-btn" data-filter="cosmetic">Cosmetic</button>
            <button class="filter-btn" data-filter="special">Special Care</button>
        </div>

        <div class="services-grid">
            @foreach($services as $service)
                <article class="service-card {{ $service->card_style != 'normal' ? $service->card_style : '' }} reveal"
                         data-category="{{ $service->category }}">

                    <span class="service-number">
                        {{ $service->number ?? str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                    </span>

                    <div class="service-icon">
                        <i class="{{ $service->icon_class ?? 'bi bi-heart-pulse-fill' }}"></i>
                    </div>

                    <span class="service-tag">
                        {{ $service->tag ?? ucfirst($service->category) }}
                    </span>

                    <h3>{{ $service->title }}</h3>

                    <p>{{ $service->short_description }}</p>

                    <ul>
                        @if($service->point_one)
                            <li><i class="bi bi-check2"></i> {{ $service->point_one }}</li>
                        @endif

                        @if($service->point_two)
                            <li><i class="bi bi-check2"></i> {{ $service->point_two }}</li>
                        @endif
                    </ul>

                    <div class="service-actions">
                        <a href="{{ route('services.show', $service->slug) }}" class="service-link">
                            View Details
                        </a>

                        @if($service->card_style === 'urgent')
                            <a href="tel:{{ $phoneLink }}" class="service-book">
                                Call
                            </a>
                        @else
                            <a href="" class="service-book">
                                Book
                            </a>
                        @endif
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const filterBtns = document.querySelectorAll(".filter-btn");
    const serviceCards = document.querySelectorAll(".service-card");

    filterBtns.forEach(btn => {
        btn.addEventListener("click", function () {
            filterBtns.forEach(item => item.classList.remove("active"));
            this.classList.add("active");

            const filter = this.getAttribute("data-filter");

            serviceCards.forEach(card => {
                const category = card.getAttribute("data-category");

                if (filter === "all" || category === filter) {
                    card.style.display = "";
                } else {
                    card.style.display = "none";
                }
            });
        });
    });
});
</script>



  <!-- ================= PROCESS STRIP ================= -->
  <section class="service-process-section section-padding">
    <div class="container">
      <div class="section-heading reveal">
        <span class="section-badge">
          <i class="bi bi-diagram-3-fill"></i>
          Treatment Journey
        </span>

        <h2>Simple Visit Process For Better Dental Care</h2>

        <p>
          Clear consultation and appointment flow helps patients understand what happens next.
        </p>
      </div>

      <div class="process-grid">
        <div class="process-card reveal">
          <span>01</span>
          <i class="bi bi-chat-heart-fill"></i>
          <h3>Share Concern</h3>
          <p>Tell us about pain, smile concern or dental care need.</p>
        </div>

        <div class="process-card reveal">
          <span>02</span>
          <i class="bi bi-clipboard2-pulse-fill"></i>
          <h3>Consultation</h3>
          <p>Get professional checkup and treatment guidance.</p>
        </div>

        <div class="process-card reveal">
          <span>03</span>
          <i class="bi bi-shield-check"></i>
          <h3>Treatment Care</h3>
          <p>Receive hygiene-focused and comfort-first dental treatment.</p>
        </div>

        <div class="process-card reveal">
          <span>04</span>
          <i class="bi bi-emoji-smile-fill"></i>
          <h3>Smile Support</h3>
          <p>Get aftercare guidance for better oral health confidence.</p>
        </div>
      </div>
    </div>
  </section>



  <!-- ================= APPOINTMENT CTA ================= -->
  <section class="appointment-cta" id="appointment">
    <div class="container">
      <div class="appointment-box reveal">
        <div class="cta-glow glow-one"></div>
        <div class="cta-glow glow-two"></div>

        <div class="appointment-content">
          <span>
            <i class="bi bi-calendar2-check-fill"></i>
            Book Your Service
          </span>

          <h2>Need Help Choosing The Right Dental Treatment?</h2>

          <p>
            Call {{ $clinicFullName }} or send an appointment enquiry for consultation, cleaning,
            root canal, crowns, implants, braces, smile designing and emergency dental care.
          </p>

          <div class="appointment-actions">
            <a href="tel:{{ $phoneLink }}" class="btn-white">
              <i class="bi bi-telephone-fill"></i>
              Call Clinic
            </a>

            <a href="{{ route('contact') }}" class="btn-outline-white">
              <i class="bi bi-calendar-heart-fill"></i>
              Appointment Enquiry
            </a>

            <a href="{{ route('contact') }}#map" class="btn-outline-white">
              <i class="bi bi-geo-alt-fill"></i>
              Get Direction
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>



  <!-- ================= ULTRA UNIQUE PREMIUM FOOTER ================= -->
  <footer class="site-footer">
    <div class="footer-bg-pattern"></div>
    <div class="footer-glow footer-glow-1"></div>
    <div class="footer-glow footer-glow-2"></div>

    <div class="container">

      <!-- FOOTER TOP CTA -->
      <div class="footer-top-card" data-aos="fade-up">
        <div class="footer-top-content">
          <span>
            <i class="bi bi-heart-pulse-fill"></i>
            {{ $clinicFullName }}
          </span>

          <h3>Need dental care guidance?</h3>

          <p>
            Book consultation, call clinic or get direction to our {{ $shortAddress }} location.
          </p>
        </div>

        <div class="footer-top-actions">
          <a href="{{ route('book-appointment') }}" class="footer-white-btn">
            <i class="bi bi-calendar2-check"></i>
            Appointment
          </a>

          <a href="tel:{{ $phoneLink }}" class="footer-outline-btn">
            <i class="bi bi-telephone-fill"></i>
            Call Clinic
          </a>
        </div>
      </div>


@endsection
