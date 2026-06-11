@extends('frontend.master')
@section('title', 'Contact Us - Sinha Dental Clinic Patna')
@section('content')
  <!-- ================= CONTACT HERO ================= -->
  <section class="contact-breadcrumb-hero" id="contactHero">
    <div class="breadcrumb-pattern"></div>
    <div class="breadcrumb-shine"></div>

    <div class="breadcrumb-orb orb-one"></div>
    <div class="breadcrumb-orb orb-two"></div>
    <div class="breadcrumb-orb orb-three"></div>

    <div class="container">
      <div class="breadcrumb-center-box" data-aos="fade-up">

        <span class="hero-mini-badge">
          <i class="bi bi-envelope-heart-fill"></i>
          Contact Clinic
        </span>

        <nav class="premium-breadcrumb" aria-label="breadcrumb">
          <a href="index.html">
            <i class="bi bi-house-door-fill"></i>
            Home
          </a>

          <span>
            <i class="bi bi-chevron-right"></i>
          </span>

          <a href="contact.html" class="active">
            Contact
          </a>
        </nav>

        <h1>
          Contact Sinha <span>Dental Clinic</span>
        </h1>

        <p>
          Call clinic, get direction, check timing or send appointment enquiry for dental
          consultation, cleaning, root canal, crowns, implants, braces and complete oral care.
        </p>

        <div class="breadcrumb-trust-row">
          <div>
            <i class="bi bi-telephone-fill"></i>
            <strong>082351 47460</strong>
          </div>

          <div>
            <i class="bi bi-clock-fill"></i>
            <strong>Open 7 Days</strong>
          </div>

          <div>
            <i class="bi bi-geo-alt-fill"></i>
            <strong>Kidwaipuri, Patna</strong>
          </div>
        </div>

        <div class="contact-hero-actions">
          <a href="tel:08235147460" class="contact-btn-primary">
            <i class="bi bi-telephone-fill"></i>
            Call Clinic
          </a>

          <a href="#map" class="contact-btn-light">
            <i class="bi bi-geo-alt-fill"></i>
            Get Direction
          </a>
        </div>

      </div>
    </div>
  </section>



  <!-- ================= CONTACT INFO CARDS ================= -->
  <section class="contact-info-section section-padding">
    <div class="container">

      <div class="section-heading" data-aos="fade-up">
        <span class="section-badge">
          <i class="bi bi-info-circle-fill"></i>
          Clinic Contact Details
        </span>

        <h2>Address, Phone, Timing & Quick Contact</h2>

        <p>
          Contact details to help patients easily call, visit and book appointment enquiry.
        </p>
      </div>

      <div class="contact-info-grid">

        <div class="contact-info-card main-info-card" data-aos="fade-up" data-aos-delay="0">
          <span class="contact-info-icon">
            <i class="bi bi-geo-alt-fill"></i>
          </span>

          <h3>Clinic Address</h3>

          <p>
            Shop No. 11, Sri Ram Kunj Apartment, E Boring Canal Rd,
            beside Yes Bank ATM, Nageshwar Colony, Kidwaipuri,
            Patna, Bihar 800001
          </p>

          <a href="#map">
            View Map
            <i class="bi bi-arrow-right"></i>
          </a>
        </div>

        <div class="contact-info-card" data-aos="fade-up" data-aos-delay="100">
          <span class="contact-info-icon">
            <i class="bi bi-telephone-fill"></i>
          </span>

          <h3>Phone Number</h3>

          <strong>082351 47460</strong>

          <p>
            Call clinic for appointment enquiry and visit support.
          </p>

          <a href="tel:08235147460">
            Call Now
            <i class="bi bi-arrow-right"></i>
          </a>
        </div>

        <div class="contact-info-card" data-aos="fade-up" data-aos-delay="200">
          <span class="contact-info-icon">
            <i class="bi bi-clock-fill"></i>
          </span>

          <h3>Clinic Timing</h3>

          <strong>Mon-Sat: 9 AM - 7 PM</strong>

          <p>
            Sunday: 9:00 AM - 2:00 PM
          </p>

          <a href="book-appointment.html">
            Book Visit
            <i class="bi bi-arrow-right"></i>
          </a>
        </div>

      </div>
    </div>
  </section>



 <!-- ================= APPOINTMENT FORM SECTION ================= -->
<section class="ba-form-section section-padding" id="appointmentForm">
  <div class="ba-form-pattern"></div>

  <div class="container">

    <div class="ba-form-wrapper">

      <!-- LEFT CONTENT -->
      <div class="ba-form-content" data-aos="fade-right">

        <span class="section-badge">
          <i class="bi bi-send-check-fill"></i>
          Appointment Enquiry Form
        </span>

        <h2>
          Share Your Details For Appointment Support
        </h2>

        <p>
          Fill the appointment enquiry form and clinic team can connect for visit support.
        </p>

        <div class="ba-contact-list">

          <a href="tel:08235147460" class="ba-contact-item">
            <i class="bi bi-telephone-fill"></i>
            <div>
              <strong>Call Clinic</strong>
              <span>082351 47460</span>
            </div>
          </a>

          <a href="https://wa.me/918235147460" target="_blank" class="ba-contact-item">
            <i class="bi bi-whatsapp"></i>
            <div>
              <strong>WhatsApp</strong>
              <span>Chat Now</span>
            </div>
          </a>

          <a href="contact.html#map" class="ba-contact-item">
            <i class="bi bi-geo-alt-fill"></i>
            <div>
              <strong>Clinic Location</strong>
              <span>Kidwaipuri, Patna</span>
            </div>
          </a>

        </div>

      </div>

      <!-- RIGHT FORM -->
      <div class="ba-form-card" data-aos="fade-left">

        @if(session('contact_success'))
          <div class="alert alert-success mb-3">
            {{ session('contact_success') }}
          </div>
        @endif

        <form class="ba-form"  method="POST" action="{{ route('contact.enquiry.store') }}">
          @csrf

          <div class="ba-form-row">

            <div class="ba-field">
              <label for="contactFullName">Full Name</label>
              <input
                type="text"
                id="contactFullName"
                name="full_name"
                value="{{ old('full_name') }}"
                placeholder="Enter your full name"
                required>
            </div>

            <div class="ba-field">
              <label for="contactPhoneNumber">Phone Number</label>
              <input
                type="tel"
                id="contactPhoneNumber"
                name="phone"
                value="{{ old('phone') }}"
                placeholder="Enter phone number"
                required>
            </div>

          </div>

          <div class="ba-form-row">

            <div class="ba-field">
              <label for="contactEmailAddress">Email <span>(Optional)</span></label>
              <input
                type="email"
                id="contactEmailAddress"
                name="email"
                value="{{ old('email') }}"
                placeholder="Enter email address">
            </div>

            <div class="ba-field">
              <label for="contactPreferredDate">Preferred Date</label>
              <input
                type="date"
                id="contactPreferredDate"
                name="preferred_date"
                value="{{ old('preferred_date') }}">
            </div>

          </div>

          <div class="ba-form-row">

            <div class="ba-field">
              <label for="contactServiceRequired">Service Required</label>
              <select id="contactServiceRequired" name="service_id" required>
                <option value="">Select Service</option>
                @foreach($services ?? [] as $service)
                  <option value="{{ $service->id }}" {{ old('service_id') == $service->id ? 'selected' : '' }}>
                    {{ $service->title }}
                  </option>
                @endforeach
              </select>
            </div>

            <div class="ba-field">
              <label for="contactPreferredTime">Preferred Time</label>
              <select id="contactPreferredTime" name="preferred_time">
                <option value="">Select Time</option>
                <option {{ old('preferred_time') === 'Morning' ? 'selected' : '' }}>Morning</option>
                <option {{ old('preferred_time') === 'Afternoon' ? 'selected' : '' }}>Afternoon</option>
                <option {{ old('preferred_time') === 'Evening' ? 'selected' : '' }}>Evening</option>
              </select>
            </div>

          </div>

          <div class="ba-field ba-field-full">
            <label for="contactMessage">Message</label>
            <textarea
              id="contactMessage"
              name="message"
              rows="5"
              placeholder="Write your dental concern or appointment message">{{ old('message') }}</textarea>
          </div>

          <button type="submit" class="ba-submit-btn">
            <span>Submit Enquiry</span>
            <i class="bi bi-send-fill"></i>
          </button>

        </form>

      </div>

    </div>

  </div>
</section>


  <!-- ================= MAP SECTION ================= -->
  <section class="map-section section-padding" id="map">
    <div class="container">

      <div class="section-heading" data-aos="fade-up">
        <span class="section-badge">
          <i class="bi bi-map-fill"></i>
          Clinic Location
        </span>

        <h2>Find Sinha Dental Clinic On Map</h2>

        <p>
          Visit the clinic at Kidwaipuri, Patna. Use the map area for direction support.
        </p>
      </div>

      <div class="map-wrapper" data-aos="zoom-in">
        <div class="map-info-card">
          <span>
            <i class="bi bi-geo-alt-fill"></i>
          </span>

          <div>
            <h3>Sinha Dental Clinic</h3>
            <p>
              Shop No. 11, Sri Ram Kunj Apartment, E Boring Canal Rd,
              beside Yes Bank ATM, Nageshwar Colony, Kidwaipuri,
              Patna, Bihar 800001
            </p>

            <a href="https://www.google.com/maps/search/?api=1&query=Sinha%20Dental%20Clinic%20Kidwaipuri%20Patna"
              target="_blank">
              Open Direction
              <i class="bi bi-arrow-up-right"></i>
            </a>
          </div>
        </div>

        <div class="map-embed">
          <iframe title="Sinha Dental Clinic Map"
            src="https://www.google.com/maps?q=Sinha%20Dental%20Clinic%20Kidwaipuri%20Patna&output=embed" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
          </iframe>
        </div>
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

          <h2>Ready For Dental Consultation?</h2>

          <p>
            Call Sinha Dental Clinic or send enquiry for consultation, cleaning, root canal,
            crowns, implants, braces, smile designing and emergency dental care.
          </p>

          <div class="appointment-actions">
            <a href="tel:08235147460" class="btn-white">
              <i class="bi bi-telephone-fill"></i>
              Call Clinic
            </a>

            <a href="book-appointment.html" class="btn-outline-white">
              <i class="bi bi-calendar-heart-fill"></i>
              Appointment Enquiry
            </a>

            <a href="#map" class="btn-outline-white">
              <i class="bi bi-geo-alt-fill"></i>
              Get Direction
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection
