@extends('frontend.master')
@section('content')


  <!-- ================= GALLERY HERO ================= -->
  <section class="gallery-breadcrumb-hero" id="galleryHero">
    <div class="breadcrumb-pattern"></div>
    <div class="breadcrumb-shine"></div>

    <div class="breadcrumb-orb orb-one"></div>
    <div class="breadcrumb-orb orb-two"></div>
    <div class="breadcrumb-orb orb-three"></div>

    <div class="container">
      <div class="breadcrumb-center-box" data-aos="fade-up">

        <span class="hero-mini-badge">
          <i class="bi bi-images"></i>
          Clinic Gallery
        </span>

        <nav class="premium-breadcrumb" aria-label="breadcrumb">
          <a href="index.html">
            <i class="bi bi-house-door-fill"></i>
            Home
          </a>

          <span>
            <i class="bi bi-chevron-right"></i>
          </span>

          <a href="gallery.html" class="active">
            Gallery
          </a>
        </nav>

        <h1>
          Clinic Gallery <span>& Care Moments</span>
        </h1>

        <p>
          Explore Sinha Dental Clinic visual placeholders for reception, dental chair,
          equipment, sterilization area, team moments and before-after treatment results.
        </p>

        <div class="breadcrumb-trust-row">
          <div>
            <i class="bi bi-building-fill-check"></i>
            <strong>Clinic Areas</strong>
          </div>

          <div>
            <i class="bi bi-hospital-fill"></i>
            <strong>Dental Setup</strong>
          </div>

          <div>
            <i class="bi bi-shield-check"></i>
            <strong>Hygiene Focus</strong>
          </div>
        </div>

        <div class="gallery-hero-actions">
          <a href="#galleryGrid" class="gallery-btn-primary">
            <i class="bi bi-images"></i>
            View Gallery
          </a>

          <a href="tel:08235147460" class="gallery-btn-light">
            <i class="bi bi-telephone-fill"></i>
            Call Clinic
          </a>
        </div>

      </div>
    </div>
  </section>



  <!-- ================= GALLERY INTRO ================= -->
  <section class="gallery-intro-section section-padding">
    <div class="container">
      <div class="gallery-intro-grid">

        <div class="gallery-intro-content" data-aos="fade-right">
          <span class="section-badge">
            <i class="bi bi-camera-fill"></i>
            Gallery Overview
          </span>

          <h2>Visual Trust For Clinic, Treatment Setup & Patient Care</h2>

          <p>
            The gallery page is designed to show the clinic environment and treatment support areas
            in a clean, premium and patient-friendly layout.
          </p>
        </div>

        <div class="gallery-intro-card" data-aos="fade-left">
          <div class="intro-card-icon">
            <i class="bi bi-images"></i>
          </div>

          <div>
            <span>Gallery Sections</span>
            <strong>Clinic, Equipment, Team & Results</strong>
            <p>
              Use this page for real clinic photos once final client-approved images are available.
            </p>
          </div>
        </div>

      </div>
    </div>
  </section>



  <!-- ================= GALLERY GRID ================= -->
  <section class="gallery-page-section section-padding" id="galleryGrid">
    <div class="gallery-bg-pattern"></div>

    <div class="container">

      <div class="section-heading" data-aos="fade-up">
        <span class="section-badge">
          <i class="bi bi-grid-3x3-gap-fill"></i>
          Photo Gallery
        </span>

        <h2>Clinic, Equipment, Sterilization & Care Gallery</h2>

        <p>
          Explore our clean clinic environment, dental chair setup, equipment area,
          sterilization support and patient care placeholders.
        </p>
      </div>

     @php
    $galleries = $galleries ?? \App\Models\Gallery::where('status', 1)
        ->orderBy('sort_order', 'asc')
        ->orderBy('id', 'desc')
        ->get();
@endphp

<div class="gallery-filter" data-aos="fade-up">
    <button class="filter-btn active" data-filter="all">All</button>
    <button class="filter-btn" data-filter="clinic">Clinic</button>
    <button class="filter-btn" data-filter="equipment">Equipment</button>
    <button class="filter-btn" data-filter="team">Team</button>
    <button class="filter-btn" data-filter="result">Before / After</button>
</div>

@if($galleries->count())
    <div class="gallery-grid">

        @foreach($galleries as $gallery)
            <div class="gallery-card"
                 data-category="{{ $gallery->category }}"
                 data-aos="fade-up"
                 data-aos-delay="{{ ($loop->index % 3) * 80 }}">

                <div class="gallery-img">
                    <img src="{{ $gallery->image }}"
                         alt="{{ $gallery->image_alt ?? $gallery->title }}">
                </div>

                <button class="gallery-view-btn"
                        type="button"
                        data-img="{{ $gallery->image }}">
                    <i class="bi bi-arrows-fullscreen"></i>
                </button>

                <div class="gallery-overlay">
                    <span>{{ $gallery->tag ?? ucfirst($gallery->category) }}</span>
                    <h3>{{ $gallery->title }}</h3>
                    <p>{{ $gallery->description }}</p>
                </div>
            </div>
        @endforeach

    </div>
@endif

    </div>
  </section>



  <!-- ================= BEFORE AFTER PLACEHOLDER ================= -->
  @php
    $beforeAfterResults = $beforeAfterResults ?? \App\Models\BeforeAfterResult::where('status', 1)
        ->orderBy('sort_order', 'asc')
        ->orderBy('id', 'desc')
        ->get();
@endphp

@if($beforeAfterResults->count())
<section class="before-after-section section-padding">
    <div class="container">
        <div class="section-heading" data-aos="fade-up">
            <span class="section-badge">
                <i class="bi bi-arrow-left-right"></i>
                Before / After
            </span>

            <h2>Treatment Result Placeholder Area</h2>

            <p>
                Use this section for patient-approved before-after visuals once final assets are available.
            </p>
        </div>

        <div class="before-after-grid">
            @foreach($beforeAfterResults as $result)
                <div class="result-card"
                     data-aos="fade-up"
                     data-aos-delay="{{ ($loop->index % 3) * 120 }}">

                    <div class="result-images">
                        <div>
                            <img src="{{ $result->before_image }}"
                                 alt="{{ $result->before_image_alt ?? 'Before treatment placeholder' }}">
                            <span>Before</span>
                        </div>

                        <div>
                            <img src="{{ $result->after_image }}"
                                 alt="{{ $result->after_image_alt ?? 'After treatment placeholder' }}">
                            <span>After</span>
                        </div>
                    </div>

                    <div class="result-content">
                        <span>{{ $result->tag ?? 'Smile Result' }}</span>
                        <h3>{{ $result->title }}</h3>
                        <p>{{ $result->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif


  <!-- ================= APPOINTMENT CTA ================= -->
  <section class="appointment-cta" id="appointment">
    <div class="container">
      <div class="appointment-box" data-aos="zoom-in">
        <div class="cta-glow glow-one"></div>
        <div class="cta-glow glow-two"></div>

        <div class="appointment-content">
          <span>
            <i class="bi bi-calendar2-check-fill"></i>
            Book Your Visit
          </span>

          <h2>Like The Clinic Setup? Book Your Dental Visit</h2>

          <p>
            Visit Sinha Dental Clinic for consultation, cleaning, root canal, crowns,
            implants, braces, smile designing and complete oral care.
          </p>

          <div class="appointment-actions">
            <a href="tel:08235147460" class="btn-white">
              <i class="bi bi-telephone-fill"></i>
              Call Clinic
            </a>

            <a href="contact.html" class="btn-outline-white">
              <i class="bi bi-calendar-heart-fill"></i>
              Appointment Enquiry
            </a>

            <a href="contact.html#map" class="btn-outline-white">
              <i class="bi bi-geo-alt-fill"></i>
              Get Direction
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>


@endsection