@extends('frontend.master')
@section('title', $clinicFullName . ' - Trusted Dental Care for Families')
@section('content')

  <!-- ================= ULTRA PREMIUM COMPACT HERO ================= -->
  <section class="hero-section" id="home">

    <!-- PROFESSIONAL BACKGROUND ELEMENTS -->
    <div class="hero-bg-pattern"></div>
    <div class="hero-shape hero-shape-1"></div>
    <div class="hero-shape hero-shape-2"></div>

    <div class="container">
      <div class="row align-items-center g-4">

        <!-- LEFT CONTENT -->
        <div class="col-lg-6" data-aos="fade-right">
          <div class="hero-content">

            <div class="hero-label-row">
              <span class="section-badge hero-rating-badge">
                <i class="bi bi-star-fill"></i>
                {{ $googleRating }} Google Rating
              </span>

              <span class="hero-mini-badge">
                <i class="bi bi-patch-check-fill"></i>
                {{ $patientReviewCount }} Reviews
              </span>
            </div>

            <h1>
              Healthy Smile,
              <span>Confident Life</span>
            </h1>

            <p>
              Experience trusted and professional dental care at {{ $clinicFullName }}.
              Book your visit for consultation, cleaning, root canal, crowns, implants,
              smile designing and complete oral care.
            </p>

            <div class="hero-actions">
              <a href="{{ route('book-appointment') }}" class="btn btn-premium">
                <i class="bi bi-calendar2-check"></i>
                Book Appointment
              </a>

              <a href="tel:{{ $phoneLink }}" class="btn btn-light-premium">
                <i class="bi bi-telephone-fill"></i>
                Call Clinic
              </a>
            </div>

            <div class="hero-badges">
              <div>
                <i class="bi bi-star-fill"></i>
                <strong>{{ $googleRating }}</strong>
                <span>Google Rating</span>
              </div>

              <div>
                <i class="bi bi-chat-square-heart-fill"></i>
                <strong>{{ $patientReviewCount }}</strong>
                <span>Patient Reviews</span>
              </div>

              <div>
                <i class="bi bi-calendar2-week-fill"></i>
                <strong>7 Days</strong>
                <span>Clinic Open</span>
              </div>
            </div>

            <div class="hero-trust-line">
              <span><i class="bi bi-shield-check"></i> Hygiene Focused</span>
              <span><i class="bi bi-heart-pulse"></i> Comfort Care</span>
              <span><i class="bi bi-geo-alt"></i> {{ $shortAddress }}</span>
            </div>

          </div>
        </div>

        <!-- RIGHT VISUAL -->
        <div class="col-lg-6" data-aos="fade-left">
          <div class="hero-visual">

            <div class="hero-image-card">
              <div class="hero-image-topbar">
                <span></span>
                <span></span>
                <span></span>
              </div>

              <img src="https://images.unsplash.com/photo-1629909613654-28e377c37b09?auto=format&fit=crop&w=900&q=80"
                alt="{{ $clinicFullName }} Treatment Room">

              <div class="hero-image-overlay"></div>
            </div>

            <div class="floating-card rating-card">
              <i class="bi bi-google"></i>
              <div>
                <strong>{{ $googleRating }} Rating</strong>
                <span>Trusted by patients</span>
              </div>
            </div>

          </div>
        </div>

      </div>
    </div>
  </section>
  <!-- ================= ULTRA PREMIUM HERO END================= -->



  <!-- ================= ULTRA PREMIUM QUICK APPOINTMENT STRIP ================= -->
  <section class="appointment-strip" id="appointment">
    <div class="container">

      <div class="strip-box" data-aos="fade-up">

        <!-- LEFT CONTENT -->
        <div class="strip-content">
          <div class="strip-icon">
            <i class="bi bi-calendar2-check-fill"></i>
          </div>

          <div>
            <span class="strip-subtitle">Need dental help?</span>
            <h3>Book your appointment at {{ $clinicName }} {{ $clinicSubtitle }}</h3>
            <p>
              Share your details and our clinic team will connect with you shortly.
            </p>
          </div>
        </div>

        @if(session('appointment_success'))
          <div class="alert alert-success mb-3">
            {{ session('appointment_success') }}
          </div>
        @endif

        <!-- FORM -->
        <form class="strip-form" method="POST" action="{{ route('appointment.store') }}">
          @csrf

          <div class="strip-field">
            <i class="bi bi-person"></i>
            <input type="text" name="full_name" value="{{ old('full_name') }}" placeholder="Your Name" required>
          </div>

          <div class="strip-field">
            <i class="bi bi-telephone"></i>
            <input type="tel" name="phone" value="{{ old('phone') }}" placeholder="Phone Number" required>
          </div>

          <div class="strip-field">
            <i class="bi bi-heart-pulse"></i>
            <select name="service_id" required>
              <option value="">Select Service</option>
              @foreach($appointmentServices as $service)
                <option value="{{ $service->id }}" {{ old('service_id') == $service->id ? 'selected' : '' }}>
                  {{ $service->title }}
                </option>
              @endforeach
            </select>
          </div>

          <button type="submit" class="strip-submit">
            <span>Submit</span>
            <i class="bi bi-arrow-right"></i>
          </button>

        </form>

        <!-- QUICK CTA -->
        <div class="strip-quick-actions">
          <a href="tel:{{ $phoneLink }}">
            <i class="bi bi-telephone-fill"></i>
            <span>Call Clinic</span>
          </a>

          <a href="#map">
            <i class="bi bi-geo-alt-fill"></i>
            <span>Get Direction</span>
          </a>

          <a href="https://wa.me/{{ $whatsappLink }}" target="_blank">
            <i class="bi bi-whatsapp"></i>
            <span>WhatsApp</span>
          </a>
        </div>

      </div>

    </div>
  </section>
  <!-- ================= ULTRA PREMIUM QUICK APPOINTMENT STRIP END================= -->
@php
    $aboutPage = $aboutPage ?? \App\Models\AboutPage::first();

    $aboutPoints = $aboutPage->points ?? [];

    $defaultPoints = [
        [
            'icon' => 'bi bi-shield-check',
            'title' => 'Hygiene-Focused Care',
            'description' => 'Clean, patient-safe and professional dental care environment.',
        ],
        [
            'icon' => 'bi bi-heart-pulse',
            'title' => 'Patient-Friendly Treatment',
            'description' => 'Gentle consultation and comfortable dental treatment approach.',
        ],
        [
            'icon' => 'bi bi-geo-alt',
            'title' => $shortAddress,
            'description' => 'Located near Yes Bank ATM, E Boring Canal Road.',
        ],
    ];

    if (empty($aboutPoints)) {
        $aboutPoints = $defaultPoints;
    }
@endphp

@if($aboutPage)
<section class="section-padding about-section" id="about">
    <div class="about-bg-pattern"></div>

    <div class="container">
        <div class="row align-items-center g-4">

            <!-- LEFT IMAGE -->
            <div class="col-lg-6" data-aos="fade-right">
                <div class="about-visual-wrap">

                    <div class="about-image">
                        <img src="{{ $aboutPage->image }}"
                             alt="{{ $aboutPage->image_alt ?? 'About ' . $clinicFullName }}">

                        <div class="about-image-shade"></div>

                        <div class="about-experience">
                            <strong>{{ $aboutPage->patient_reviews ?? $patientReviewCount }}</strong>
                            <span>Google Reviews</span>
                        </div>

                        <div class="about-rating-card">
                            <i class="bi bi-star-fill"></i>
                            <div>
                                <strong>{{ $aboutPage->google_rating ?? $googleRating . ' Rating' }}</strong>
                                <span>{{ $aboutPage->card_subtitle ?? 'Trusted Dental Clinic' }}</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- RIGHT CONTENT -->
            <div class="col-lg-6" data-aos="fade-left">
                <div class="about-content">

                    <span class="section-badge">
                        <i class="bi bi-patch-check-fill"></i>
                        {{ $aboutPage->badge_text ?? 'About Clinic' }}
                    </span>

                    <h2 class="section-title about-title">
                        {{ $aboutPage->title ?? 'Premium Dental Care with Comfort, Hygiene & Trust' }}
                    </h2>

                    @if($aboutPage->description_one)
                        <p class="section-text about-text">
                            {{ $aboutPage->description_one }}
                        </p>
                    @else
                        <p class="section-text about-text">
                            {{ $clinicFullName }} provides professional dental treatment in {{ $shortAddress }}.
                            The clinic focuses on patient comfort, hygiene, proper diagnosis and complete oral care.
                        </p>
                    @endif

                    @if($aboutPage->description_two)
                        <p class="section-text about-text">
                            {{ $aboutPage->description_two }}
                        </p>
                    @endif

                    <div class="about-list">

                       @php
    $points = $aboutPage->points ?? [];
@endphp

@if(!empty($points))
    <div class="about-list">

        @foreach($points as $point)
            @if(!empty($point['text']) && !empty($point['status']))
                <div class="about-list-item">
                    <span class="about-list-icon">
                        <i class="bi bi-check2-circle"></i>
                    </span>

                    <div>
                        <strong>{{ $point['text'] }}</strong>
                    </div>
                </div>
            @endif
        @endforeach

    </div>
@endif

                    </div>

                    <div class="about-actions">
                        <a href="{{ url('contact') }}" class="btn btn-premium">
                            Contact Clinic
                            <i class="bi bi-arrow-right"></i>
                        </a>

                        <a href="tel:{{ $phoneLink }}" class="about-call-link">
                            <i class="bi bi-telephone-fill"></i>
                            <span>{{ $displayPhone }}</span>
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>
@endif
  <!-- ================= ULTRA PREMIUM ABOUT SECTION END================= -->



  <!-- ================= ULTRA PREMIUM SERVICES SECTION ================= -->
  <section class="section-padding services-section" id="services">
    <div class="services-bg-pattern"></div>

    <div class="container">

      <!-- SECTION HEADING -->
      <div class="section-heading text-center" data-aos="fade-up">
        <span class="section-badge">
          <i class="bi bi-heart-pulse-fill"></i>
          Dental Services
        </span>

        <h2 class="section-title services-title">
          Complete Dental Treatments Under One Roof
        </h2>

        <p class="section-text mx-auto services-text">
          From routine consultation to advanced dental treatments, explore the major services
          available at {{ $clinicFullName }}.
        </p>
      </div>
@php
    $homeServices = $homeServices ?? \App\Models\Service::where('status', 1)
        ->orderBy('sort_order', 'asc')
        ->orderBy('id', 'desc')
        ->limit(8)
        ->get();
@endphp

@if($homeServices->count())
    <!-- SERVICES GRID -->
    <div class="services-grid">

        @foreach($homeServices as $service)
            <div class="service-card {{ $service->card_style === 'urgent' ? 'service-card-dark' : '' }}"
                 data-aos="zoom-in"
                 data-aos-delay="{{ (($loop->index % 4) + 1) * 50 }}">

                <span class="service-number">
                    {{ $service->number ?? str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                </span>

                <div class="service-icon">
                    <i class="{{ $service->icon_class ?? 'bi bi-clipboard2-pulse' }}"></i>
                </div>

                <h4>{{ $service->title }}</h4>

                <p>
                    {{ $service->short_description }}
                </p>

                @if($service->card_style === 'urgent')
                    <a href="tel:{{ $phoneLink }}">
                        Call Now
                        <i class="bi bi-telephone-fill"></i>
                    </a>
                @else
                    <a href="{{ route('services.show', $service->slug) }}">
                        Read More
                        <i class="bi bi-arrow-right"></i>
                    </a>
                @endif

            </div>
        @endforeach

    </div>
@endif
      <!-- BOTTOM CTA -->
      <div class="services-bottom-cta" data-aos="fade-up">
        <div>
          <strong>Need help choosing the right treatment?</strong>
          <span>Call {{ $clinicFullName }} for consultation and guidance.</span>
        </div>

        <a href="{{ route('book-appointment') }}" class="btn btn-premium">
          Book Consultation
          <i class="bi bi-arrow-right"></i>
        </a>
      </div>

    </div>
  </section>
  <!-- ================= ULTRA PREMIUM SERVICES SECTION END================= -->



  <!-- ================= ULTRA PREMIUM WHY CHOOSE SECTION ================= -->
  <section class="section-padding why-section" id="whyChoose">
    <div class="why-bg-pattern"></div>

    <div class="container">
      <div class="row align-items-center g-4">

        <!-- LEFT CONTENT -->
        <div class="col-lg-5" data-aos="fade-right">
          <div class="why-content">

            <span class="section-badge">
              <i class="bi bi-patch-check-fill"></i>
              Why Choose Us
            </span>

            <h2 class="section-title why-title">
              Trusted Dental Care for Families in {{ $shortAddress }}
            </h2>

            <p class="section-text why-text">
              Our approach is built around patient comfort, careful consultation,
              hygienic treatment environment and clear communication.
            </p>

            <div class="why-mini-stats">
              <div>
                <strong>{{ $googleRating }}</strong>
                <span>Google Rating</span>
              </div>

              <div>
                <strong>{{ $patientReviewCount }}</strong>
                <span>Patient Reviews</span>
              </div>
            </div>

            <a href="{{ route('book-appointment') }}" class="btn btn-premium why-btn">
              Book Appointment
              <i class="bi bi-arrow-right"></i>
            </a>

          </div>
        </div>

        <!-- RIGHT CARDS -->
        <div class="col-lg-7">
          <div class="why-grid">

            <div class="why-card" data-aos="fade-up" data-aos-delay="50">
              <span class="why-card-number">01</span>
              <div class="why-icon">
                <i class="bi bi-shield-fill-check"></i>
              </div>
              <h4>Hygiene First</h4>
              <p>Clean and patient-safe dental care environment.</p>
            </div>

            <div class="why-card" data-aos="fade-up" data-aos-delay="100">
              <span class="why-card-number">02</span>
              <div class="why-icon">
                <i class="bi bi-person-heart"></i>
              </div>
              <h4>Patient Comfort</h4>
              <p>Gentle care approach for every patient visit.</p>
            </div>

            <div class="why-card" data-aos="fade-up" data-aos-delay="150">
              <span class="why-card-number">03</span>
              <div class="why-icon">
                <i class="bi bi-award"></i>
              </div>
              <h4>Trusted Rating</h4>
              <p>{{ $googleRating }} Google rating with {{ $patientReviewCount }} patient reviews.</p>
            </div>

            <div class="why-card why-card-dark" data-aos="fade-up" data-aos-delay="200">
              <span class="why-card-number">04</span>
              <div class="why-icon">
                <i class="bi bi-clock"></i>
              </div>
              <h4>Open 7 Days</h4>
              <p>Clinic timing available from Monday to Sunday.</p>
            </div>

          </div>
        </div>

      </div>
    </div>
  </section>
  <!-- ================= ULTRA PREMIUM WHY CHOOSE SECTION END================= -->



  <!-- ================= ULTRA PREMIUM DOCTOR / CLINIC HIGHLIGHT ================= -->
  <section class="section-padding doctor-section" id="doctor">
    <div class="doctor-bg-pattern"></div>

    <div class="container">
      <div class="doctor-box" data-aos="fade-up">

        <div class="row align-items-center g-4">

          <!-- LEFT IMAGE -->
          <div class="col-lg-5" data-aos="fade-right">
            <div class="doctor-visual">

              <div class="doctor-image">
                <img src="https://images.unsplash.com/photo-1550831107-1553da8c8464?auto=format&fit=crop&w=900&q=80"
                  alt="Doctor and Clinic Care">

                <div class="doctor-image-overlay"></div>

                <div class="doctor-exp-card">
                  <strong>{{ $googleRating }}</strong>
                  <span>Google Rating</span>
                </div>

                <div class="doctor-status-card">
                  <i class="bi bi-clock-history"></i>
                  <div>
                    <strong>Consultation Time</strong>
                    <span>{{ $workingHours }}</span>
                  </div>
                </div>
              </div>

            </div>
          </div>

          <!-- RIGHT CONTENT -->
          <div class="col-lg-7" data-aos="fade-left">
            <div class="doctor-content">

              <span class="section-badge">
                <i class="bi bi-person-badge-fill"></i>
                Doctor / Clinic Care
              </span>

              <h2 class="section-title doctor-title">
                Professional Dental Care with Clear Guidance
              </h2>

              <p class="section-text doctor-text">
                Consultation, diagnosis and treatment planning are handled with a patient-first approach.
                This section can be updated with doctor profile, qualification, specialization and consultation timing.
              </p>

              <div class="doctor-points">

                <div class="doctor-point">
                  <span class="doctor-point-icon">
                    <i class="bi bi-check2-circle"></i>
                  </span>
                  <div>
                    <strong>Consultation & Planning</strong>
                    <p>Dental consultation and proper treatment planning.</p>
                  </div>
                </div>

                <div class="doctor-point">
                  <span class="doctor-point-icon">
                    <i class="bi bi-check2-circle"></i>
                  </span>
                  <div>
                    <strong>Advanced Dental Support</strong>
                    <p>Root canal, crown, implant and smile care support.</p>
                  </div>
                </div>

                <div class="doctor-point">
                  <span class="doctor-point-icon">
                    <i class="bi bi-check2-circle"></i>
                  </span>
                  <div>
                    <strong>Comfortable Experience</strong>
                    <p>Friendly patient experience with clear guidance.</p>
                  </div>
                </div>

              </div>

              <div class="doctor-actions">
                <a href="{{ route('book-appointment') }}" class="btn btn-premium">
                  Book Consultation
                  <i class="bi bi-arrow-right"></i>
                </a>

                <a href="tel:{{ $phoneLink }}" class="doctor-call-btn">
                  <i class="bi bi-telephone-fill"></i>
                  <span>Call Clinic</span>
                </a>
              </div>

            </div>
          </div>

        </div>

      </div>
    </div>
  </section>
  <!-- ================= ULTRA PREMIUM DOCTOR / CLINIC HIGHLIGHT END================= -->



  <!-- ================= ULTRA PREMIUM TREATMENT PROCESS ================= -->
  <section class="section-padding process-section" id="process">
    <div class="process-bg-pattern"></div>

    <div class="container">

      <!-- SECTION HEADING -->
      <div class="section-heading text-center" data-aos="fade-up">
        <span class="section-badge">
          <i class="bi bi-diagram-3-fill"></i>
          Treatment Process
        </span>

        <h2 class="section-title process-title">
          Simple Visit Process
        </h2>

        <p class="section-text mx-auto process-text">
          From appointment enquiry to comfortable dental care, our visit process is simple,
          clear and patient-friendly.
        </p>
      </div>

      <!-- PROCESS WRAPPER -->
      <div class="process-wrapper" data-aos="fade-up" data-aos-delay="100">

        <div class="process-line"></div>

        <div class="process-card" data-aos="fade-up" data-aos-delay="50">
          <span class="process-number">01</span>

          <div class="process-icon">
            <i class="bi bi-calendar2-check"></i>
          </div>

          <div class="process-content">
            <h4>Book Visit</h4>
            <p>Call clinic or submit appointment enquiry online.</p>
          </div>
        </div>

        <div class="process-card" data-aos="fade-up" data-aos-delay="120">
          <span class="process-number">02</span>

          <div class="process-icon">
            <i class="bi bi-clipboard2-pulse"></i>
          </div>

          <div class="process-content">
            <h4>Consultation</h4>
            <p>Dental checkup, issue discussion and guidance.</p>
          </div>
        </div>

        <div class="process-card" data-aos="fade-up" data-aos-delay="190">
          <span class="process-number">03</span>

          <div class="process-icon">
            <i class="bi bi-file-medical"></i>
          </div>

          <div class="process-content">
            <h4>Treatment Plan</h4>
            <p>Clear treatment suggestion with proper explanation.</p>
          </div>
        </div>

        <div class="process-card process-card-dark" data-aos="fade-up" data-aos-delay="260">
          <span class="process-number">04</span>

          <div class="process-icon">
            <i class="bi bi-heart-pulse"></i>
          </div>

          <div class="process-content">
            <h4>Dental Care</h4>
            <p>Comfortable treatment and follow-up advice.</p>
          </div>
        </div>

      </div>

      <!-- BOTTOM CTA -->
      <div class="process-bottom-cta" data-aos="fade-up">
        <div>
          <strong>Ready to start your dental care journey?</strong>
          <span>Book your consultation at {{ $clinicFullName }}, {{ $shortAddress }}.</span>
        </div>

        <a href="#appointment" class="btn btn-premium">
          Book Appointment
          <i class="bi bi-arrow-right"></i>
        </a>
      </div>

    </div>
  </section>
  <!-- ================= ULTRA PREMIUM TREATMENT PROCESS ================= -->



  <!-- ================= ULTRA PREMIUM GALLERY SECTION ================= -->
  <section class="section-padding gallery-section" id="gallery">
    <div class="gallery-bg-pattern"></div>

    <div class="container">

      <!-- SECTION HEADING -->
      <div class="section-heading text-center" data-aos="fade-up">
        <span class="section-badge">
          <i class="bi bi-images"></i>
          Clinic Gallery
        </span>

        <h2 class="section-title gallery-title">
          Clinic, Equipment & Care Space
        </h2>

        <p class="section-text mx-auto gallery-text">
          Explore our clean clinic environment, dental chair setup, modern equipment
          and patient-friendly care spaces.
        </p>
      </div>

      <!-- GALLERY GRID -->
     @php
    $homeGalleries = $homeGalleries ?? \App\Models\Gallery::where('status', 1)
        ->orderBy('sort_order', 'asc')
        ->orderBy('id', 'desc')
        ->limit(4)
        ->get();
@endphp

@if($homeGalleries->count())
    <div class="gallery-grid">

        @foreach($homeGalleries as $gallery)
            <div class="gallery-card gallery-slide-card"
                 data-aos="zoom-in"
                 data-aos-delay="{{ (($loop->index % 4) + 1) * 50 }}">

                <div class="gallery-slider">
                    <img class="active"
                         src="{{ $gallery->image }}"
                         alt="{{ $gallery->image_alt ?? $gallery->title }}">

                    <img src="{{ $gallery->image }}"
                         alt="{{ $gallery->image_alt ?? $gallery->title }}">

                    <img src="{{ $gallery->image }}"
                         alt="{{ $gallery->image_alt ?? $gallery->title }}">
                </div>

                <div class="gallery-overlay">
                    <span>{{ $gallery->tag ?? ucfirst($gallery->category) }}</span>
                    <h4>{{ $gallery->title }}</h4>
                    <p>{{ $gallery->description }}</p>
                </div>

                <button class="gallery-btn"
                        type="button"
                        data-img="{{ $gallery->image }}">
                    <i class="bi bi-plus-lg"></i>
                </button>
            </div>
        @endforeach

    </div>
@endif
<script>
document.addEventListener("DOMContentLoaded", function () {
    const cards = document.querySelectorAll(".gallery-slide-card");

    cards.forEach(card => {
        const images = card.querySelectorAll(".gallery-slider img");

        if (!images.length) return;

        let current = 0;

        setInterval(() => {
            images[current].classList.remove("active");

            current = (current + 1) % images.length;

            images[current].classList.add("active");
        }, 2500);
    });
});
</script>
      <!-- BOTTOM CTA -->
      <div class="gallery-bottom-cta" data-aos="fade-up">
        <div>
          <strong>Want to visit the clinic?</strong>
          <span>Book your appointment or get direction to {{ $clinicFullName }}.</span>
        </div>

        <a href="#appointment" class="btn btn-premium">
          Book Appointment
          <i class="bi bi-arrow-right"></i>
        </a>
      </div>

    </div>
  </section>
  <!-- ================= ULTRA PREMIUM GALLERY SECTION END================= -->



  <!-- ================= ULTRA PREMIUM TESTIMONIALS ================= -->
  <section class="section-padding testimonial-section" id="testimonials">
    <div class="testimonial-bg-pattern"></div>

    <div class="container">

      <div class="section-heading text-center" data-aos="fade-up">
        <span class="section-badge">
          <i class="bi bi-chat-quote-fill"></i>
          Testimonials
        </span>

        <h2 class="section-title testimonial-title">
          What Patients Say
        </h2>

        <p class="section-text mx-auto testimonial-text">
          Patient-style review cards to build trust and show clinic credibility before booking an appointment.
        </p>
      </div>

      <div class="testimonial-layout" data-aos="fade-up" data-aos-delay="100">

        <!-- LEFT RATING PANEL -->
        <div class="testimonial-rating-panel">
          <span class="rating-label">Google Rating</span>

          <div class="rating-score">
            <strong>{{ $googleRating }}</strong>
            <div>
              <div class="rating-stars">
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-half"></i>
              </div>
              <span>Based on {{ $patientReviewCount }} reviews</span>
            </div>
          </div>

          <p>
            Patients trust {{ $clinicFullName }} for professional guidance,
            clean environment and comfortable dental care.
          </p>

          <a href="#appointment" class="rating-panel-btn">
            Book Appointment
            <i class="bi bi-arrow-right"></i>
          </a>
        </div>

        <!-- RIGHT SLIDER -->
       @php
    $patientReviews = $patientReviews ?? \App\Models\PatientReview::where('status', 1)
        ->orderBy('sort_order', 'asc')
        ->orderBy('id', 'desc')
        ->get();
@endphp

@if($patientReviews->count())
    <div class="testimonial-slider-box">

        @foreach($patientReviews as $review)
            <div class="testimonial-card {{ $loop->first ? 'active-review' : '' }}">
                <div class="testimonial-quote-icon">
                    <i class="bi bi-quote"></i>
                </div>

                <div class="stars">
                    @php
                        $rating = (float) ($review->rating ?? 5);
                        $fullStars = floor($rating);
                        $hasHalfStar = ($rating - $fullStars) >= 0.5;
                        $emptyStars = 5 - $fullStars - ($hasHalfStar ? 1 : 0);
                    @endphp

                    @for($i = 1; $i <= $fullStars; $i++)
                        <i class="bi bi-star-fill"></i>
                    @endfor

                    @if($hasHalfStar)
                        <i class="bi bi-star-half"></i>
                    @endif

                    @for($i = 1; $i <= $emptyStars; $i++)
                        <i class="bi bi-star"></i>
                    @endfor
                </div>

                <p>
                    “{{ $review->review_text }}”
                </p>

                <div class="testimonial-user">
                    <div class="testimonial-avatar">
                        <span>{{ $review->avatar_letter ?? 'PR' }}</span>
                    </div>

                    <div>
                        <h5>{{ $review->title ?? 'Patient Review' }}</h5>
                        <span>{{ $review->service_name ?? 'Google Review' }}</span>
                    </div>
                </div>
            </div>
        @endforeach

        <!-- CONTROLS -->
        @if($patientReviews->count() > 1)
            <div class="testimonial-controls">
                <button class="testimonial-arrow prevReview" type="button" aria-label="Previous Review">
                    <i class="bi bi-arrow-left"></i>
                </button>

                <div class="testimonial-dots">
                    @foreach($patientReviews as $review)
                        <button class="{{ $loop->first ? 'active' : '' }}"
                                type="button"
                                aria-label="Review {{ $loop->iteration }}"></button>
                    @endforeach
                </div>

                <button class="testimonial-arrow nextReview" type="button" aria-label="Next Review">
                    <i class="bi bi-arrow-right"></i>
                </button>
            </div>
        @endif

    </div>
@endif

      </div>

    </div>
  </section>
  <!-- ================= ULTRA PREMIUM TESTIMONIALS ================= -->



  <!-- ================= ULTRA PREMIUM TIMING & CONTACT ================= -->
  <section class="section-padding timing-section" id="contact">
    <div class="timing-bg-pattern"></div>
    <div class="timing-orb timing-orb-1"></div>
    <div class="timing-orb timing-orb-2"></div>

    <div class="container">

      <div class="section-heading text-center timing-heading" data-aos="fade-up">
        <span class="section-badge">
          <i class="bi bi-calendar2-check-fill"></i>
          Contact & Appointment
        </span>

        <h2 class="section-title timing-main-title">
          Book Your Dental Visit Easily
        </h2>

        <p class="section-text mx-auto timing-main-text">
          Check clinic timing, call directly or send an appointment enquiry to {{ $clinicFullName }}.
        </p>
      </div>

      <div class="timing-contact-grid">

        <!-- LEFT TIMING CARD -->
        <div class="timing-card" data-aos="fade-right">

          <span class="section-badge">
            <i class="bi bi-clock-history"></i>
            Working Hours
          </span>

          <h3>Clinic Timing</h3>

          <p class="timing-intro">
            Visit {{ $clinicFullName }} during working hours or call us for quick appointment guidance.
          </p>

          <ul class="clinic-timing-list">
            <li>
              <span class="timing-day">
                <i class="bi bi-calendar2-week"></i>
                Monday - Saturday
              </span>
              <strong>{{ $workingHours }}</strong>
            </li>

            <li>
              <span class="timing-day">
                <i class="bi bi-sun"></i>
                Sunday
              </span>
              <strong>{{ $sundayHours }}</strong>
            </li>
          </ul>

          <div class="emergency-box">
            <span class="emergency-icon">
              <i class="bi bi-lightning-charge-fill"></i>
            </span>

            <div>
              <strong>Need urgent dental help?</strong>
              <p>Call clinic for pain, swelling or emergency dental care support.</p>
            </div>
          </div>

          <div class="clinic-contact-mini">
            <div>
              <i class="bi bi-telephone-fill"></i>
              <span>Phone</span>
              <strong>{{ $displayPhone }}</strong>
            </div>

            <div>
              <i class="bi bi-geo-alt-fill"></i>
              <span>Location</span>
              <strong>{{ $shortAddress }}</strong>
            </div>
          </div>

          <div class="timing-actions">
            <a href="tel:{{ $phoneLink }}" class="btn btn-premium">
              <i class="bi bi-telephone-fill"></i>
              Call Clinic
            </a>

            <a href="#map" class="timing-direction-btn">
              <i class="bi bi-geo-alt-fill"></i>
              Direction
            </a>
          </div>

        </div>

        <!-- RIGHT CONTACT FORM -->
        <div class="contact-card" data-aos="fade-left">

          <span class="section-badge">
            <i class="bi bi-send-fill"></i>
            Send Enquiry
          </span>

          <h3>Appointment Enquiry Form</h3>

          <p class="contact-intro">
            Fill the form and our clinic team will connect with you shortly.
          </p>

          <form class="contact-form" method="POST" action="{{ route('appointment.store') }}">
            @csrf

            <div class="form-grid">

              <div class="form-field">
                <label>Full Name</label>
                <div class="input-wrap">
                  <i class="bi bi-person"></i>
                  <input type="text" name="full_name" value="{{ old('full_name') }}" class="form-control" placeholder="Enter full name" required>
                </div>
              </div>

              <div class="form-field">
                <label>Phone Number</label>
                <div class="input-wrap">
                  <i class="bi bi-telephone"></i>
                  <input type="tel" name="phone" value="{{ old('phone') }}" class="form-control" placeholder="Enter phone number" required>
                </div>
              </div>

              <div class="form-field">
                <label>Email Optional</label>
                <div class="input-wrap">
                  <i class="bi bi-envelope"></i>
                  <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Enter email address">
                </div>
              </div>

              <div class="form-field">
                <label>Service Required</label>
                <div class="input-wrap">
                  <i class="bi bi-heart-pulse"></i>
                  <select name="service_id" class="form-select" required>
                    <option value="">Select service</option>
                    @foreach($appointmentServices as $service)
                      <option value="{{ $service->id }}" {{ old('service_id') == $service->id ? 'selected' : '' }}>
                        {{ $service->title }}
                      </option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="form-field">
                <label>Preferred Date</label>
                <div class="input-wrap">
                  <i class="bi bi-calendar2-check"></i>
                  <input type="date" name="preferred_date" value="{{ old('preferred_date') }}" class="form-control">
                </div>
              </div>

              <div class="form-field">
                <label>Quick Contact</label>
                <a href="tel:{{ $phoneLink }}" class="contact-mini-card">
                  <i class="bi bi-telephone-fill"></i>
                  <div>
                    <strong>{{ $displayPhone }}</strong>
                    <span>Call for appointment</span>
                  </div>
                </a>
              </div>

              <div class="form-field full-field">
                <label>Message</label>
                <div class="input-wrap textarea-wrap">
                  <i class="bi bi-chat-left-text"></i>
                  <textarea name="message" class="form-control" rows="4" placeholder="Write your message">{{ old('message') }}</textarea>
                </div>
              </div>

              <div class="form-field full-field">
                <button type="submit" class="contact-submit-btn">
                  <span>Submit Enquiry</span>
                  <i class="bi bi-send"></i>
                </button>
              </div>

            </div>

          </form>

        </div>

      </div>

    </div>
  </section>
  <!-- ================= ULTRA PREMIUM TIMING & CONTACT END ================= -->



  <!-- ================= ULTRA PREMIUM FAQ SECTION ================= -->
  <section class="section-padding faq-section" id="faqs">
    <div class="faq-bg-pattern"></div>

    <div class="container">

      <div class="section-heading text-center" data-aos="fade-up">
        <span class="section-badge">
          <i class="bi bi-question-circle-fill"></i>
          FAQs
        </span>

        <h2 class="section-title faq-title">
          Common Patient Questions
        </h2>

        <p class="section-text mx-auto faq-text">
          Find quick answers about clinic timing, appointment booking, available dental services and visit support.
        </p>
      </div>

      <div class="faq-layout" data-aos="fade-up" data-aos-delay="100">

        <!-- LEFT HELP CARD -->
        <div class="faq-help-card">
          <div class="faq-help-icon">
            <i class="bi bi-headset"></i>
          </div>

          <h3>Need dental help?</h3>

          <p>
            Call {{ $clinicFullName }} for appointment support, dental pain guidance or direction assistance.
          </p>

          <div class="faq-help-info">
            <span>
              <i class="bi bi-telephone-fill"></i>
              {{ $displayPhone }}
            </span>

            <span>
              <i class="bi bi-clock-fill"></i>
              {{ $workingHours }}
            </span>

            <span>
              <i class="bi bi-geo-alt-fill"></i>
              {{ $shortAddress }}
            </span>
          </div>

          <a href="tel:{{ $phoneLink }}" class="faq-call-btn">
            Call Clinic
            <i class="bi bi-arrow-right"></i>
          </a>
        </div>

        <!-- RIGHT FAQ ACCORDION -->
        <div class="faq-accordion-wrap">
          <div class="accordion premium-accordion" id="faqAccordion">
            @forelse($faqs as $faq)
              @php
                $faqId = 'faqItem' . $faq->id;
                $faqAnswer = str_replace(
                    ['{working_hours}', '{sunday_hours}', '{phone}', '{clinic_name}'],
                    [$workingHours, $sundayHours, $displayPhone, $clinicFullName],
                    $faq->answer ?? ''
                );
              @endphp

              <div class="accordion-item">
                <h2 class="accordion-header" id="{{ $faqId }}Heading">
                  <button class="accordion-button {{ $loop->first ? '' : 'collapsed' }}" type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#{{ $faqId }}"
                    aria-expanded="{{ $loop->first ? 'true' : 'false' }}"
                    aria-controls="{{ $faqId }}">
                    <span class="faq-question-icon">
                      <i class="{{ $faq->icon_class ?: 'bi bi-question-circle' }}"></i>
                    </span>
                    <span>{{ $faq->question }}</span>
                  </button>
                </h2>

                <div id="{{ $faqId }}"
                  class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}"
                  aria-labelledby="{{ $faqId }}Heading"
                  data-bs-parent="#faqAccordion">
                  <div class="accordion-body">
                    {{ $faqAnswer }}
                  </div>
                </div>
              </div>
            @empty
              <div class="accordion-item">
                <div class="accordion-body">
                  No FAQs added yet.
                </div>
              </div>
            @endforelse

          </div>
        </div>

      </div>

    </div>
  </section>
  <!-- ================= ULTRA PREMIUM FAQ SECTION END================= -->



  <!-- ================= ULTRA PREMIUM MAP / LOCATION SECTION ================= -->
  <section class="map-section" id="map">
    <div class="map-bg-pattern"></div>

    <div class="container">
      <div class="map-box" data-aos="fade-up">

        <!-- LEFT CONTENT -->
        <div class="map-content">

          <span class="section-badge">
            <i class="bi bi-geo-alt-fill"></i>
            Clinic Location
          </span>

          <h2>{{ $clinicFullName }}, {{ $shortAddress }}</h2>

          <p>
            {{ $fullAddress }}
          </p>

          <div class="map-info-list">

            <div class="map-info-item">
              <span class="map-info-icon">
                <i class="bi bi-telephone-fill"></i>
              </span>
              <div>
                <strong>Call Clinic</strong>
                <a href="tel:{{ $phoneLink }}">{{ $displayPhone }}</a>
              </div>
            </div>

            <div class="map-info-item">
              <span class="map-info-icon">
                <i class="bi bi-clock-fill"></i>
              </span>
              <div>
                <strong>Clinic Timing</strong>
                <span>{{ $workingHours }} | {{ $sundayHours }}</span>
              </div>
            </div>

            <div class="map-info-item">
              <span class="map-info-icon">
                <i class="bi bi-signpost-2-fill"></i>
              </span>
              <div>
                <strong>Landmark</strong>
                <span>Beside Yes Bank ATM, E Boring Canal Road</span>
              </div>
            </div>

          </div>

          <div class="map-actions">
            <a href="https://www.google.com/maps/search/?api=1&query={{ $mapQuery }}"
              target="_blank" class="btn btn-premium">
              <i class="bi bi-geo-alt-fill"></i>
              Get Direction
            </a>

            <a href="tel:{{ $phoneLink }}" class="map-light-btn">
              <i class="bi bi-telephone-fill"></i>
              Call Now
            </a>

            <a href="https://wa.me/{{ $whatsappLink }}" target="_blank" class="map-whatsapp-btn">
              <i class="bi bi-whatsapp"></i>
              WhatsApp
            </a>
          </div>

        </div>

        <!-- RIGHT MAP -->
        <div class="map-frame-wrap">
          <div class="map-frame-top">
            <div>
              <span class="map-live-dot"></span>
              <strong>Live Location Preview</strong>
            </div>

            <a href="https://www.google.com/maps/search/?api=1&query={{ $mapQuery }}"
              target="_blank">
              Open Map
              <i class="bi bi-arrow-up-right"></i>
            </a>
          </div>

          <div class="map-frame">
            <iframe src="https://www.google.com/maps?q={{ $mapQuery }}&output=embed"
              loading="lazy" referrerpolicy="no-referrer-when-downgrade"
              title="{{ $clinicFullName }} Location Map"></iframe>
          </div>

          <div class="map-floating-badge">
            <i class="bi bi-geo-alt-fill"></i>
            <div>
              <strong>{{ $shortAddress }}</strong>
              <span>Dental Clinic Location</span>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
  <!-- ================= ULTRA PREMIUM MAP / LOCATION SECTION END================= -->



  <!-- ================= ULTRA PREMIUM FINAL CTA ================= -->
  <section class="final-cta" id="finalCta">
    <div class="final-cta-bg-pattern"></div>

    <div class="container">
      <div class="final-cta-box" data-aos="zoom-in">

        <div class="final-cta-glow final-cta-glow-1"></div>
        <div class="final-cta-glow final-cta-glow-2"></div>

        <div class="final-cta-content">

          <span class="final-cta-badge">
            <i class="bi bi-heart-pulse-fill"></i>
            Premium Dental Care in {{ $shortAddress }}
          </span>

          <h2>Ready for a Healthier Smile?</h2>

          <p>
            Call {{ $clinicFullName }} or book your dental appointment today for consultation,
            cleaning, root canal, crowns, implants and complete oral care.
          </p>

          <div class="final-cta-actions">
            <a href="{{ route('book-appointment') }}" class="btn btn-white">
              <i class="bi bi-calendar2-check"></i>
              Book Appointment
            </a>

            <a href="tel:{{ $phoneLink }}" class="btn btn-outline-white">
              <i class="bi bi-telephone-fill"></i>
              Call Clinic
            </a>

            <a href="https://wa.me/{{ $whatsappLink }}" target="_blank" class="btn btn-whatsapp-white">
              <i class="bi bi-whatsapp"></i>
              WhatsApp
            </a>
          </div>

          <div class="final-cta-trust">

            <div>
              <i class="bi bi-star-fill"></i>
              <strong>{{ $googleRating }} Rating</strong>
              <span>Google Rating</span>
            </div>

            <div>
              <i class="bi bi-chat-square-heart-fill"></i>
              <strong>{{ $patientReviewCount }} Reviews</strong>
              <span>Patient Trust</span>
            </div>

            <div>
              <i class="bi bi-clock-fill"></i>
              <strong>Open 7 Days</strong>
              <span>Clinic Support</span>
            </div>

          </div>

        </div>

      </div>
    </div>
  </section>
  <!-- ================= ULTRA PREMIUM FINAL CTA END================= -->

@endsection
