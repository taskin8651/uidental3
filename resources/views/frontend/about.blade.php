@extends('frontend.master')
@section('content')


  <!-- ================= ULTRA PREMIUM CENTER BREADCRUMB HERO ================= -->
  <section class="about-breadcrumb-hero" id="about">
    <div class="breadcrumb-pattern"></div>
    <div class="breadcrumb-shine"></div>

    <div class="breadcrumb-orb orb-one"></div>
    <div class="breadcrumb-orb orb-two"></div>
    <div class="breadcrumb-orb orb-three"></div>

    <div class="container">
      <div class="breadcrumb-center-box reveal">

        <span class="hero-mini-badge">
          <i class="bi bi-stars"></i>
          Premium Dental Care in {{ $shortAddress }}
        </span>

        <nav class="premium-breadcrumb" aria-label="breadcrumb">
          <a href="{{ route('home') }}">
            <i class="bi bi-house-door-fill"></i>
            Home
          </a>

          <span>
            <i class="bi bi-chevron-right"></i>
          </span>

          <a href="{{ route('about') }}" class="active">
            About Clinic
          </a>
        </nav>

        <h1>
          About {{ $clinicName }} <span>{{ $clinicSubtitle }}</span>
        </h1>

        <p>
          A clean, patient-friendly and trusted dental clinic in {{ $shortAddress }} focused on
          comfortable consultation, hygiene-first treatment and complete oral care for every smile.
        </p>

        <div class="breadcrumb-trust-row">
          <div>
            <i class="bi bi-star-fill"></i>
            <strong>{{ $googleRating }} Google Rating</strong>
          </div>

          <div>
            <i class="bi bi-chat-square-heart-fill"></i>
            <strong>{{ $patientReviewCount }} Patient Reviews</strong>
          </div>

          <div>
            <i class="bi bi-geo-alt-fill"></i>
            <strong>{{ $shortAddress }}</strong>
          </div>
        </div>

        <div class="about-hero-actions">
          <a href="{{ route('book-appointment') }}" class="about-btn-primary">
            <i class="bi bi-calendar2-check-fill"></i>
            Book Appointment
          </a>

          <a href="tel:{{ $phoneLink }}" class="about-btn-light">
            <i class="bi bi-telephone-fill"></i>
            Call Clinic
          </a>
        </div>

      </div>
    </div>
  </section>
  <!-- ================= ULTRA PREMIUM CENTER BREADCRUMB HERO END ================= -->



  <!-- ================= ABOUT INTRO ================= -->
 @php
    $aboutPage = $aboutPage ?? \App\Models\AboutPage::first();

    $defaultPoints = [
        [
            'text' => 'Clean and patient-friendly care environment',
            'status' => 1,
        ],
        [
            'text' => 'Consultation, cleaning, root canal, crowns and implants',
            'status' => 1,
        ],
        [
            'text' => 'Easy call, WhatsApp, appointment and direction support',
            'status' => 1,
        ],
    ];

    $points = $aboutPage && !empty($aboutPage->points) ? $aboutPage->points : $defaultPoints;
@endphp

@if($aboutPage)
    <section class="about-intro section-padding">
        <div class="container">
            <div class="about-intro-grid">

                <div class="about-image-area reveal">
                    <div class="about-image-frame">
                        <img src="{{ $aboutPage->image }}"
                             alt="{{ $aboutPage->image_alt ?? 'Dental care at ' . $clinicFullName }}">

                        <div class="about-exp-card">
                            <strong>{{ $aboutPage->card_title ?? 'Trusted' }}</strong>
                            <span>{{ $aboutPage->card_subtitle ?? 'Dental Care' }}</span>
                        </div>
                    </div>
                </div>

                <div class="about-content reveal">
                    <span class="section-badge">
                        <i class="bi bi-heart-pulse-fill"></i>
                        {{ $aboutPage->badge_text ?? 'Clinic Introduction' }}
                    </span>

                    <h2>
                        {{ $aboutPage->title ?? 'Gentle Dental Care With Hygiene, Comfort & Confidence' }}
                    </h2>

                    @if(!empty($aboutPage->description_one))
                        <p>
                            {{ $aboutPage->description_one }}
                        </p>
                    @endif

                    @if(!empty($aboutPage->description_two))
                        <p>
                            {{ $aboutPage->description_two }}
                        </p>
                    @endif

                    @if(!empty($points))
                        <div class="about-points">
                            @foreach($points as $point)
                                @if(!empty($point['text']) && !empty($point['status']))
                                    <div>
                                        <i class="bi bi-check2-circle"></i>
                                        <span>{{ $point['text'] }}</span>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </section>

    <!-- ================= TRUST STATS ================= -->
    <section class="trust-section section-padding">
        <div class="trust-pattern"></div>

        <div class="container">
            <div class="section-heading reveal">
                <span class="section-badge">
                    <i class="bi bi-shield-check"></i>
                    Why Patients Trust Us
                </span>

                <h2>Trusted Care, Clear Guidance & Better Smile Confidence</h2>

                <p>
                    Built around hygiene, patient comfort, quality treatment planning and easy clinic access.
                </p>
            </div>

            <div class="trust-grid">
                <div class="trust-card reveal">
                    <div class="trust-icon">
                        <i class="bi bi-star-fill"></i>
                    </div>

                    <strong class="counter" data-target="{{ $aboutPage->google_rating ?? $googleRating }}">
                        0
                    </strong>

                    <span>Google Rating</span>
                </div>

                <div class="trust-card reveal">
                    <div class="trust-icon">
                        <i class="bi bi-chat-square-heart-fill"></i>
                    </div>

                    <strong class="counter" data-target="{{ $aboutPage->patient_reviews ?? $patientReviewCount }}">
                        0
                    </strong>

                    <span>Patient Reviews</span>
                </div>

                <div class="trust-card reveal">
                    <div class="trust-icon">
                        <i class="bi bi-calendar2-week-fill"></i>
                    </div>

                    <strong>{{ $aboutPage->clinic_availability ?? '7 Days' }}</strong>

                    <span>Clinic Availability</span>
                </div>

                <div class="trust-card reveal">
                    <div class="trust-icon">
                        <i class="bi bi-geo-alt-fill"></i>
                    </div>

                    <strong>{{ $aboutPage->clinic_location ?? $shortAddress }}</strong>

                    <span>Clinic Location</span>
                </div>
            </div>
        </div>
    </section>
@endif



  <!-- ================= HYGIENE / CARE APPROACH ================= -->
  <section class="care-section section-padding">
    <div class="container">
      <div class="care-grid">

        <div class="care-content reveal">
          <span class="section-badge">
            <i class="bi bi-droplet-fill"></i>
            Hygiene & Comfort
          </span>

          <h2>Every Visit Focused On Safety, Cleanliness & Patient Ease</h2>

          <p>
            The clinic presentation highlights hygiene focus and patient care approach clearly,
            so visitors feel comfortable before booking their first visit.
          </p>

          <div class="care-list">
            <div class="care-item">
              <i class="bi bi-shield-fill-check"></i>
              <div>
                <strong>Hygiene-First Setup</strong>
                <span>Clean clinical presentation and patient-safe treatment environment.</span>
              </div>
            </div>

            <div class="care-item">
              <i class="bi bi-person-heart"></i>
              <div>
                <strong>Patient-Friendly Guidance</strong>
                <span>Simple explanation of treatment steps, options and oral care support.</span>
              </div>
            </div>

            <div class="care-item">
              <i class="bi bi-clipboard2-pulse-fill"></i>
              <div>
                <strong>Complete Oral Care</strong>
                <span>Consultation, cleaning, RCT, crowns, braces, implants and emergency care.</span>
              </div>
            </div>
          </div>
        </div>

        <div class="care-cards reveal">
          <div class="premium-care-card active">
            <i class="bi bi-hospital-fill"></i>
            <h3>Modern Clinic Feel</h3>
            <p>Premium visual layout with soft medical colors and clean spacing.</p>
          </div>

          <div class="premium-care-card">
            <i class="bi bi-emoji-smile-fill"></i>
            <h3>Comfortable Experience</h3>
            <p>Patient-first communication and trust-building dental care approach.</p>
          </div>

          <div class="premium-care-card">
            <i class="bi bi-award-fill"></i>
            <h3>Professional Care</h3>
            <p>Dental service presentation designed for credibility and easy conversion.</p>
          </div>
        </div>

      </div>
    </div>
  </section>



  <!-- ================= FACILITIES ================= -->
  <section class="facility-section section-padding">
    <div class="facility-bg"></div>

    <div class="container">
      <div class="section-heading reveal">
        <span class="section-badge">
          <i class="bi bi-building-fill-check"></i>
          Clinic Facilities
        </span>

        <h2>Facilities That Build Confidence Before The Visit</h2>

        <p>
          Premium clinic visuals for reception, dental chair, equipment, sterilization and patient care.
        </p>
      </div>

    

@if($facilities->count())
    <div class="facility-grid">
        @foreach($facilities as $facility)
            <div class="facility-card reveal">
                <img src="{{ $facility->image }}"
                     alt="{{ $facility->image_alt ?? $facility->title }}">

                <div>
                    <span>{{ $facility->number ?? str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                    <h3>{{ $facility->title }}</h3>
                    <p>{{ $facility->description }}</p>
                </div>
            </div>
        @endforeach
    </div>
@endif
    </div>
  </section>



  <!-- ================= PATIENT CARE TIMELINE ================= -->
  <section class="timeline-section section-padding">
    <div class="container">
      <div class="timeline-wrapper">

        <div class="timeline-left reveal">
          <span class="section-badge">
            <i class="bi bi-diagram-3-fill"></i>
            Patient Care Approach
          </span>

          <h2>Simple, Clear & Comfortable Dental Visit Process</h2>

          <p>
            The care approach is explained in a clean way, helping patients understand
            how the clinic supports them from enquiry to appointment.
          </p>

          <a href="#appointment" class="about-btn-primary">
            <span>Start Your Appointment</span>
            <i class="bi bi-arrow-right"></i>
          </a>
        </div>

        <div class="timeline-list">
          <div class="timeline-item reveal">
            <span>01</span>
            <div>
              <h3>Consultation & Concern Understanding</h3>
              <p>Patient concern, symptoms and dental needs are understood clearly.</p>
            </div>
          </div>

          <div class="timeline-item reveal">
            <span>02</span>
            <div>
              <h3>Diagnosis & Treatment Guidance</h3>
              <p>Clear care explanation and suitable treatment options are shared.</p>
            </div>
          </div>

          <div class="timeline-item reveal">
            <span>03</span>
            <div>
              <h3>Comfort-Focused Dental Treatment</h3>
              <p>Treatment experience is designed around comfort, hygiene and trust.</p>
            </div>
          </div>

          <div class="timeline-item reveal">
            <span>04</span>
            <div>
              <h3>Aftercare & Smile Confidence</h3>
              <p>Patients receive care guidance for better oral health after treatment.</p>
            </div>
          </div>
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
            Book Your Visit
          </span>

          <h2>Ready For A Healthier & Confident Smile?</h2>

          <p>
            Visit {{ $clinicFullName }} for dental consultation, cleaning, root canal, crowns,
            implants, braces, smile designing and complete oral care.
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


@endsection
