@extends('frontend.master')
@section('content')

  <!-- ================= APPOINTMENT HERO ================= -->
  <section class="appointment-hero" id="appointmentHero">
    <div class="breadcrumb-pattern"></div>
    <div class="breadcrumb-shine"></div>

    <div class="breadcrumb-orb orb-one"></div>
    <div class="breadcrumb-orb orb-two"></div>
    <div class="breadcrumb-orb orb-three"></div>

    <div class="container">
      <div class="appointment-hero-grid">

        <div class="appointment-hero-content" data-aos="fade-right">
          <span class="hero-mini-badge">
            <i class="bi bi-calendar2-check-fill"></i>
            Book Appointment
          </span>

          <nav class="premium-breadcrumb" aria-label="breadcrumb">
            <a href="index.html">
              <i class="bi bi-house-door-fill"></i>
              Home
            </a>

            <span>
              <i class="bi bi-chevron-right"></i>
            </span>

            <a href="book-appointment.html" class="active">
              Book Appointment
            </a>
          </nav>

          <h1>
            Book Your <span>Dental Visit</span>
          </h1>

          <p>
            Send appointment enquiry for dental consultation, teeth cleaning, root canal,
            dental crown, dental implant, braces, smile designing and emergency dental care.
          </p>

          <div class="appointment-hero-actions">
            <a href="book-appointment.htmlForm" class="appointment-btn-primary">
              <i class="bi bi-calendar-heart-fill"></i>
              Fill Appointment Form
            </a>

            <a href="tel:08235147460" class="appointment-btn-light">
              <i class="bi bi-telephone-fill"></i>
              Call Clinic
            </a>
          </div>
        </div>

        <div class="appointment-hero-card" data-aos="fade-left">
          <div class="hero-card-icon">
            <i class="bi bi-heart-pulse-fill"></i>
          </div>

          <h3>Quick Appointment Enquiry</h3>

          <p>
            Submit your appointment enquiry and clinic team can connect for visit support.
          </p>

          <div class="hero-card-points">
            <div>
              <i class="bi bi-star-fill"></i>
              <span>4.5 Google Rating</span>
            </div>

            <div>
              <i class="bi bi-chat-square-heart-fill"></i>
              <span>62 Patient Reviews</span>
            </div>

            <div>
              <i class="bi bi-clock-fill"></i>
              <span>Open 7 Days</span>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>



  <!-- ================= APPOINTMENT FORM SECTION ================= -->
  <section class="appointment-form-section section-padding" id="appointmentForm">
    <div class="form-bg-pattern"></div>

    <div class="container">
      <div class="appointment-form-grid">

        <div class="appointment-form-content" data-aos="fade-right">
          <span class="section-badge">
            <i class="bi bi-send-check-fill"></i>
            Appointment Enquiry Form
          </span>

          <h2>Share Your Details For Appointment Support</h2>

          <p>
            Fill the appointment enquiry form and clinic team can connect for visit support.
          </p>

          <div class="appointment-contact-list">

            <a href="tel:08235147460" class="appointment-contact-item">
              <i class="bi bi-telephone-fill"></i>
              <div>
                <strong>Call Clinic</strong>
                <span>082351 47460</span>
              </div>
            </a>

            <a href="https://wa.me/918235147460" target="_blank" class="appointment-contact-item">
              <i class="bi bi-whatsapp"></i>
              <div>
                <strong>WhatsApp</strong>
                <span>Chat Now</span>
              </div>
            </a>

            <a href="contact.html#map" class="appointment-contact-item">
              <i class="bi bi-geo-alt-fill"></i>
              <div>
                <strong>Clinic Location</strong>
                <span>Kidwaipuri, Patna</span>
              </div>
            </a>

          </div>
        </div>

        <div class="premium-appointment-form" data-aos="fade-left">
          @if(session('appointment_success'))
            <div class="alert alert-success mb-3">
              {{ session('appointment_success') }}
            </div>
          @endif

          <form class="appointment-form" method="POST" action="{{ route('appointment.store') }}">
            @csrf

            <div class="form-row">
              <div class="form-group">
                <label for="appointmentFullName">Full Name</label>
                <input type="text" id="appointmentFullName" name="full_name" value="{{ old('full_name') }}" placeholder="Enter your full name" required>
              </div>

              <div class="form-group">
                <label for="appointmentPhoneNumber">Phone Number</label>
                <input type="tel" id="appointmentPhoneNumber" name="phone" value="{{ old('phone') }}" placeholder="Enter phone number" required>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group">
                <label for="appointmentEmailAddress">Email <span>(Optional)</span></label>
                <input type="email" id="appointmentEmailAddress" name="email" value="{{ old('email') }}" placeholder="Enter email address">
              </div>

              <div class="form-group">
                <label for="appointmentPreferredDate">Preferred Date</label>
                <input type="date" id="appointmentPreferredDate" name="preferred_date" value="{{ old('preferred_date') }}">
              </div>
            </div>

            <div class="form-row">
              <div class="form-group">
                <label for="appointmentServiceRequired">Service Required</label>
                <select id="appointmentServiceRequired" name="service_id" required>
                  <option value="">Select Service</option>
                  @foreach($services ?? [] as $service)
                    <option value="{{ $service->id }}" {{ old('service_id') == $service->id ? 'selected' : '' }}>
                      {{ $service->title }}
                    </option>
                  @endforeach
                </select>
              </div>

              <div class="form-group">
                <label for="appointmentMessage">Message</label>
                <textarea id="appointmentMessage" name="message" rows="4"
                  placeholder="Write your dental concern or appointment message">{{ old('message') }}</textarea>
              </div>
            </div>

            <button type="submit" class="submit-btn">
              <span>Submit Enquiry</span>
              <i class="bi bi-send-fill"></i>
            </button>

          </form>
        </div>

      </div>
    </div>
  </section>



  <!-- ================= SERVICE QUICK SELECT ================= -->
  <section class="appointment-services-section section-padding">
    <div class="container">

      <div class="section-heading" data-aos="fade-up">
        <span class="section-badge">
          <i class="bi bi-grid-1x2-fill"></i>
          Appointment Services
        </span>

        <h2>Select Care For Your Dental Need</h2>

        <p>
          Services listed as per appointment enquiry dropdown and frontend scope.
        </p>
      </div>

      <div class="appointment-service-grid">

        <div class="appointment-service-card" data-aos="fade-up" data-aos-delay="0">
          <i class="bi bi-chat-heart-fill"></i>
          <h3>Dental Consultation</h3>
          <p>Visit for dental concern discussion and treatment guidance.</p>
        </div>

        <div class="appointment-service-card" data-aos="fade-up" data-aos-delay="80">
          <i class="bi bi-brush-fill"></i>
          <h3>Teeth Cleaning</h3>
          <p>Professional cleaning and scaling appointment enquiry.</p>
        </div>

        <div class="appointment-service-card" data-aos="fade-up" data-aos-delay="160">
          <i class="bi bi-shield-fill-plus"></i>
          <h3>Root Canal Treatment</h3>
          <p>Consultation support for tooth pain and RCT treatment.</p>
        </div>

        <div class="appointment-service-card" data-aos="fade-up" data-aos-delay="0">
          <i class="bi bi-gem"></i>
          <h3>Dental Crown</h3>
          <p>Restorative crown care appointment enquiry.</p>
        </div>

        <div class="appointment-service-card" data-aos="fade-up" data-aos-delay="80">
          <i class="bi bi-plus-circle-fill"></i>
          <h3>Dental Implant</h3>
          <p>Missing tooth replacement consultation support.</p>
        </div>

        <div class="appointment-service-card" data-aos="fade-up" data-aos-delay="160">
          <i class="bi bi-emoji-smile-fill"></i>
          <h3>Smile Designing</h3>
          <p>Cosmetic smile consultation and care planning.</p>
        </div>

      </div>
    </div>
  </section>



  <!-- ================= CLINIC TIMING SECTION ================= -->
  <section class="appointment-timing-section section-padding">
    <div class="timing-bg-pattern"></div>

    <div class="container">
      <div class="section-heading" data-aos="fade-up">
        <span class="section-badge">
          <i class="bi bi-clock-history"></i>
          Clinic Timing
        </span>

        <h2>Plan Your Visit Easily</h2>

        <p>
          Call before visit for availability and appointment support.
        </p>
      </div>

      <div class="timing-grid">

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



  <!-- ================= MAP CTA SECTION ================= -->
  <section class="appointment-location-section section-padding">
    <div class="container">
      <div class="appointment-location-box" data-aos="zoom-in">

        <div class="location-icon">
          <i class="bi bi-geo-alt-fill"></i>
        </div>

        <div class="location-content">
          <span>Clinic Address</span>
          <h2>Visit Sinha Dental Clinic, Kidwaipuri Patna</h2>
          <p>
            Shop No. 11, Sri Ram Kunj Apartment, E Boring Canal Rd, beside Yes Bank ATM,
            Nageshwar Colony, Kidwaipuri, Patna, Bihar 800001
          </p>
        </div>

        <a href="contact.html#map" class="appointment-btn-primary">
          <i class="bi bi-signpost-2-fill"></i>
          Get Direction
        </a>

      </div>
    </div>
  </section>



  <!-- ================= FINAL CTA ================= -->
  <section class="appointment-cta">
    <div class="container">
      <div class="appointment-box" data-aos="zoom-in">
        <div class="cta-glow glow-one"></div>
        <div class="cta-glow glow-two"></div>

        <div class="appointment-content">
          <span>
            <i class="bi bi-calendar2-check-fill"></i>
            Book Your Visit
          </span>

          <h2>Ready For A Healthier Smile?</h2>

          <p>
            Submit your appointment enquiry or call Sinha Dental Clinic for consultation, cleaning,
            root canal, crowns, implants, braces, smile designing and emergency dental care.
          </p>

          <div class="appointment-actions">
            <a href="book-appointment.htmlForm" class="btn-white">
              <i class="bi bi-calendar-heart-fill"></i>
              Fill Form
            </a>

            <a href="tel:08235147460" class="btn-outline-white">
              <i class="bi bi-telephone-fill"></i>
              Call Clinic
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
