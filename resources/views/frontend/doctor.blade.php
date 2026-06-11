@extends('frontend.master')
@section('title', 'Doctor & Team Care - Sinha Dental Clinic, Patna')
@section('content')


  <!-- ================= DOCTOR BREADCRUMB HERO ================= -->
  <section class="doctor-breadcrumb-hero" id="doctorHero">
    <div class="breadcrumb-pattern"></div>
    <div class="breadcrumb-shine"></div>

    <div class="breadcrumb-orb orb-one"></div>
    <div class="breadcrumb-orb orb-two"></div>
    <div class="breadcrumb-orb orb-three"></div>

    <div class="container">
      <div class="breadcrumb-center-box" data-aos="fade-up">

        <span class="hero-mini-badge">
          <i class="bi bi-person-heart"></i>
          Doctor / Team Care
        </span>

        <nav class="premium-breadcrumb" aria-label="breadcrumb">
          <a href="index.html">
            <i class="bi bi-house-door-fill"></i>
            Home
          </a>

          <span>
            <i class="bi bi-chevron-right"></i>
          </span>

          <a href="doctor.html" class="active">
            Doctor / Team
          </a>
        </nav>

        <h1>
          Doctor & <span>Care Team</span>
        </h1>

        <p>
          Meet the dental care profile area of Sinha Dental Clinic, Patna with consultation timing,
          specialization placeholder and patient-first care approach.
        </p>

        <div class="breadcrumb-trust-row">
          <div>
            <i class="bi bi-person-badge-fill"></i>
            <strong>Doctor Profile</strong>
          </div>

          <div>
            <i class="bi bi-clock-fill"></i>
            <strong>Consultation Timing</strong>
          </div>

          <div>
            <i class="bi bi-heart-pulse-fill"></i>
            <strong>Care Approach</strong>
          </div>
        </div>

        <div class="doctor-hero-actions">
          <a href="book-appointment.html" class="doctor-btn-primary">
            <i class="bi bi-calendar2-check-fill"></i>
            Book Appointment
          </a>

          <a href="tel:08235147460" class="doctor-btn-light">
            <i class="bi bi-telephone-fill"></i>
            Call Clinic
          </a>
        </div>

      </div>
    </div>
  </section>



  <!-- ================= DOCTOR PROFILE SECTION ================= -->
 @php
    $doctorProfile = $doctorProfile ?? \App\Models\DoctorProfile::first();
@endphp

@if($doctorProfile)
<section class="doctor-profile-section section-padding">
    <div class="container">
        <div class="doctor-profile-grid">

            <div class="doctor-image-area" data-aos="fade-right">
                <div class="doctor-image-frame">
                    <img src="{{ $doctorProfile->image }}"
                         alt="{{ $doctorProfile->image_alt ?? 'Sinha Dental Clinic doctor profile' }}">

                    <div class="doctor-rating-card">
                        <i class="bi bi-star-fill"></i>
                        <div>
                            <strong>{{ $doctorProfile->rating_text ?? '4.5 Rating' }}</strong>
                            <span>{{ $doctorProfile->review_text ?? '62 Patient Reviews' }}</span>
                        </div>
                    </div>

                    <div class="doctor-timing-card">
                        <i class="bi bi-clock-fill"></i>
                        <div>
                            <strong>{{ $doctorProfile->timing_days ?? 'Mon-Sat' }}</strong>
                            <span>{{ $doctorProfile->timing_hours ?? '9 AM - 7 PM' }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="doctor-profile-content" data-aos="fade-left">
                <span class="section-badge">
                    <i class="bi bi-person-badge-fill"></i>
                    {{ $doctorProfile->badge_text ?? 'Doctor Profile' }}
                </span>

                <h2>{{ $doctorProfile->heading ?? 'Professional Dental Care Profile' }}</h2>

                <p>
                    {{ $doctorProfile->description ?? 'This doctor profile section is designed for Sinha Dental Clinic to showcase the main dentist, qualification, specialization and care approach in a clean and premium way.' }}
                </p>

                <div class="doctor-profile-name">
                    <span>{{ $doctorProfile->doctor_name ?? 'Doctor Name' }}</span>
                    <h3>{{ $doctorProfile->doctor_title ?? 'Dental Care Specialist' }}</h3>
                    <p>{{ $doctorProfile->doctor_subtitle ?? 'Qualification / Specialization placeholder area' }}</p>
                </div>

                <div class="doctor-info-grid">
                    <div>
                        <i class="bi bi-award-fill"></i>
                        <strong>{{ $doctorProfile->qualification_label ?? 'Qualification' }}</strong>
                        <span>{{ $doctorProfile->qualification_value ?? 'Add qualification here' }}</span>
                    </div>

                    <div>
                        <i class="bi bi-heart-pulse-fill"></i>
                        <strong>{{ $doctorProfile->specialization_label ?? 'Specialization' }}</strong>
                        <span>{{ $doctorProfile->specialization_value ?? 'Dental care specialization' }}</span>
                    </div>

                    <div>
                        <i class="bi bi-calendar2-check-fill"></i>
                        <strong>{{ $doctorProfile->consultation_label ?? 'Consultation' }}</strong>
                        <span>{{ $doctorProfile->consultation_value ?? 'Appointment based visit' }}</span>
                    </div>

                    <div>
                        <i class="bi bi-shield-check"></i>
                        <strong>{{ $doctorProfile->care_focus_label ?? 'Care Focus' }}</strong>
                        <span>{{ $doctorProfile->care_focus_value ?? 'Comfort & hygiene' }}</span>
                    </div>
                </div>

                <div class="doctor-profile-actions">
                    <a href="" class="doctor-btn-primary">
                        <i class="bi bi-calendar-heart-fill"></i>
                        Book Consultation
                    </a>

                    <a href="tel:08235147460" class="doctor-btn-light">
                        <i class="bi bi-telephone-fill"></i>
                        Call Now
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>
@endif



  <!-- ================= CONSULTATION TIMING SECTION ================= -->
  <section class="consultation-section section-padding">
    <div class="consultation-pattern"></div>

    <div class="container">
      <div class="section-heading" data-aos="fade-up">
        <span class="section-badge">
          <i class="bi bi-clock-history"></i>
          Consultation Timing
        </span>

        <h2>Clinic Timing & Visit Support</h2>

        <p>
          Clear timing display helps patients plan consultation and connect with clinic quickly.
        </p>
      </div>

      <div class="consultation-grid">

        <div class="timing-card main-timing" data-aos="zoom-in" data-aos-delay="0">
          <span class="timing-icon">
            <i class="bi bi-calendar2-week-fill"></i>
          </span>

          <h3>Monday - Saturday</h3>
          <strong>9:00 AM - 7:00 PM</strong>
          <p>Regular clinic consultation and treatment timing.</p>
        </div>

        <div class="timing-card" data-aos="zoom-in" data-aos-delay="100">
          <span class="timing-icon">
            <i class="bi bi-sun-fill"></i>
          </span>

          <h3>Sunday</h3>
          <strong>9:00 AM - 2:00 PM</strong>
          <p>Limited Sunday consultation support for patients.</p>
        </div>

        <div class="timing-card" data-aos="zoom-in" data-aos-delay="200">
          <span class="timing-icon">
            <i class="bi bi-telephone-fill"></i>
          </span>

          <h3>Call Clinic</h3>
          <strong>082351 47460</strong>
          <p>Call before visit for appointment and availability.</p>
        </div>

      </div>
    </div>
  </section>



  <!-- ================= CARE APPROACH SECTION ================= -->
  <section class="care-approach-section section-padding">
    <div class="container">
      <div class="care-approach-grid">

        <div class="care-approach-content" data-aos="fade-right">
          <span class="section-badge">
            <i class="bi bi-heart-pulse-fill"></i>
            Care Approach
          </span>

          <h2>Patient-First Dental Care With Comfort & Hygiene</h2>

          <p>
            The doctor/team page focuses on building trust with patients through a clean profile layout,
            comfortable consultation flow, hygiene-focused care and easy appointment access.
          </p>

          <div class="approach-list">
            <div data-aos="fade-up" data-aos-delay="0">
              <i class="bi bi-chat-heart-fill"></i>
              <div>
                <strong>Clear Consultation</strong>
                <span>Patients get simple guidance about their dental concern and treatment options.</span>
              </div>
            </div>

            <div data-aos="fade-up" data-aos-delay="100">
              <i class="bi bi-shield-fill-check"></i>
              <div>
                <strong>Hygiene Focus</strong>
                <span>Care presentation highlights cleanliness, comfort and patient safety.</span>
              </div>
            </div>

            <div data-aos="fade-up" data-aos-delay="200">
              <i class="bi bi-emoji-smile-fill"></i>
              <div>
                <strong>Comfortable Experience</strong>
                <span>Layout builds confidence for new patients before they visit the clinic.</span>
              </div>
            </div>
          </div>
        </div>

        <div class="care-approach-cards" data-aos="fade-left">
          <div class="care-feature-card active">
            <i class="bi bi-person-heart"></i>
            <h3>Patient Friendly</h3>
            <p>Gentle and easy communication focused on patient comfort.</p>
          </div>

          <div class="care-feature-card">
            <i class="bi bi-clipboard2-pulse-fill"></i>
            <h3>Treatment Guidance</h3>
            <p>Clear explanation of dental concern and suitable care direction.</p>
          </div>

          <div class="care-feature-card">
            <i class="bi bi-hospital-fill"></i>
            <h3>Clinic Care</h3>
            <p>Professional dental clinic experience with clean visual presentation.</p>
          </div>
        </div>

      </div>
    </div>
  </section>



  <!-- ================= TEAM PLACEHOLDER SECTION ================= -->
  <section class="team-section section-padding">
    <div class="team-bg"></div>

    <div class="container">
      <div class="section-heading" data-aos="fade-up">
        <span class="section-badge">
          <i class="bi bi-people-fill"></i>
          Team Support
        </span>

        <h2>Clinic Team Placeholder Area</h2>

        <p>
          Use this section for doctor/team moments, assistant profile, consultation visuals or patient-friendly care
          images.
        </p>
      </div>

      @php
    $doctorProfile = $doctorProfile ?? \App\Models\DoctorProfile::all()();
@endphp

@if($doctorProfile)
    <div class="team-grid">

        <div class="team-card" data-aos="fade-up" data-aos-delay="0">
            <img src="{{ $doctorProfile->image }}"
                 alt="{{ $doctorProfile->image_alt ?? 'Dental care team' }}">

            <div>
                <span>{{ $doctorProfile->badge_text ?? 'Doctor' }}</span>
                <h3>{{ $doctorProfile->doctor_name ?? 'Main Dentist Profile' }}</h3>
                <p>{{ $doctorProfile->doctor_subtitle ?? 'Placeholder for main doctor name, qualification and profile details.' }}</p>
            </div>
        </div>

        <div class="team-card" data-aos="fade-up" data-aos-delay="100">
            <img src="{{ $doctorProfile->image }}"
                 alt="{{ $doctorProfile->image_alt ?? 'Dental consultation support' }}">

            <div>
                <span>{{ $doctorProfile->consultation_label ?? 'Consultation' }}</span>
                <h3>{{ $doctorProfile->consultation_value ?? 'Patient Guidance' }}</h3>
                <p>{{ $doctorProfile->description ?? 'Use for consultation moment, doctor discussion or patient care visual.' }}</p>
            </div>
        </div>

        <div class="team-card" data-aos="fade-up" data-aos-delay="200">
            <img src="{{ $doctorProfile->image }}"
                 alt="{{ $doctorProfile->image_alt ?? 'Dental clinic support' }}">

            <div>
                <span>{{ $doctorProfile->care_focus_label ?? 'Clinic' }}</span>
                <h3>{{ $doctorProfile->care_focus_value ?? 'Care Support Team' }}</h3>
                <p>{{ $doctorProfile->specialization_value ?? 'Placeholder for clinic team, assistant or dental support staff image.' }}</p>
            </div>
        </div>

    </div>
@endif
    </div>
  </section>



  <!-- ================= APPOINTMENT CTA ================= -->
  <section class="appointment-cta" id="appointment">
    <div class="container">
      <div class="appointment-box" data-aos="zoom-in">
        <div class="cta-glow glow-one"></div>
        <div class="cta-glow glow-two"></div>

        <div class="appointment-content">
          <span>
            <i class="bi bi-calendar2-check-fill"></i>
            Book Doctor Consultation
          </span>

          <h2>Need Dental Care Guidance?</h2>

          <p>
            Call Sinha Dental Clinic or book your visit for consultation, treatment guidance,
            dental care support and smile confidence.
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
            Sinha Dental Clinic
          </span>

          <h3>Need dental care guidance?</h3>

          <p>
            Book consultation, call clinic or get direction to our Kidwaipuri, Patna location.
          </p>
        </div>

        <div class="footer-top-actions">
          <a href="book-appointment.html" class="footer-white-btn">
            <i class="bi bi-calendar2-check"></i>
            Appointment
          </a>

          <a href="tel:08235147460" class="footer-outline-btn">
            <i class="bi bi-telephone-fill"></i>
            Call Clinic
          </a>
        </div>
      </div>
@endsection