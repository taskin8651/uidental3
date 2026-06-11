<!DOCTYPE html>
<html lang="en">
<head>
  @php
    $settingValue = function ($key, $default = '') use ($websiteSetting) {
      return $websiteSetting ? $websiteSetting->value($key) : $default;
    };

  @endphp
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title', $settingValue('site_title', 'Sinha Dental Clinic Patna | Dental Clinic in Kidwaipuri, Patna'))</title>
  <meta name="description"
    content="@yield('meta_description', $settingValue('meta_description', 'Sinha Dental Clinic in Patna offers professional dental consultation, teeth cleaning, root canal, crowns, implants, braces, smile designing and emergency dental care.'))" />
  <meta name="keywords"
    content="{{ $settingValue('meta_keywords', 'Dental clinic in Patna, dentist in Patna, Sinha Dental Clinic, root canal Patna, teeth cleaning Patna, dental implant Patna, dentist Kidwaipuri Patna') }}" />
  @if(!empty($websiteSetting?->favicon))
    <link rel="icon" href="{{ $websiteSetting->favicon }}">
  @endif
  <!-- Google Fonts: Document Font Direction -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Manrope:wght@400;500;600;700;800&display=swap"
    rel="stylesheet">
  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <!-- AOS Animation -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/about.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/contact.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/doctor.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/gallery.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/book-appointment.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/services.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/service-details.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/testimonials.css') }}" />
  

</head>
<body>

  <!-- ================= ULTRA PREMIUM TOP BAR ================= -->
  <div class="top-bar">
    <div class="top-bar-bg-glow"></div>

    <div class="container">
      <div class="top-bar-wrapper">

        <!-- LEFT INFO -->
        <div class="top-left">

          <a href="tel:{{ $phoneLink }}" class="top-info-item top-phone">
            <span class="top-icon">
              <i class="bi bi-telephone-fill"></i>
            </span>
            <span class="top-info-text">
              <small>Call Clinic</small>
              <strong>{{ $displayPhone }}</strong>
            </span>
          </a>

          <a href="#map" class="top-info-item">
            <span class="top-icon">
              <i class="bi bi-geo-alt-fill"></i>
            </span>
            <span class="top-info-text">
              <small>Clinic Location</small>
              <strong>{{ $shortAddress }}</strong>
            </span>
          </a>

          <div class="top-info-item">
            <span class="top-icon">
              <i class="bi bi-clock-fill"></i>
            </span>
            <span class="top-info-text">
              <small>Working Hours</small>
              <strong>{{ $workingHours }}</strong>
            </span>
          </div>

        </div>

        <!-- RIGHT CTA -->
        <div class="top-right">

          <div class="top-rating-pill">
            <i class="bi bi-star-fill"></i>
            <span>{{ $googleRating }} Google Rating</span>
          </div>

          <a href="tel:{{ $phoneLink }}" class="top-action-btn">
            <i class="bi bi-telephone-outbound"></i>
            <span>Call Now</span>
          </a>

          <a href="#map" class="top-action-btn top-action-light">
            <i class="bi bi-signpost-2"></i>
            <span>Direction</span>
          </a>

        </div>

      </div>
    </div>
  </div>
  <!-- ================= ULTRA PREMIUM TOP BAR ENd ================= -->



  <!-- ================= ULTRA PREMIUM HEADER / NAVBAR ================= -->
  <header class="site-header" id="siteHeader">
    <nav class="navbar navbar-expand-xl">
      <div class="container nav-container">

        <!-- BRAND -->
        <a class="navbar-brand" href="{{ route('home') }}" aria-label="{{ $clinicName }} Home">
          @if(!empty($websiteSetting?->logo))
            <img src="{{ $websiteSetting->logo }}" alt="{{ $clinicName }}" style="max-height:48px;width:auto;">
          @else
            <span class="brand-icon">
              <i class="bi bi-heart-pulse-fill"></i>
            </span>
          @endif

          <span class="brand-text">
            <strong>{{ $clinicName }}</strong>
            <small>{{ $clinicSubtitle }}</small>
          </span>
        </a>

        <!-- MOBILE BUTTONS -->
        <div class="mobile-header-actions">
          <a href="tel:{{ $phoneLink }}" class="mobile-head-call" aria-label="Call Clinic">
            <i class="bi bi-telephone-fill"></i>
          </a>

          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar"
            aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="menu-line"></span>
            <span class="menu-line"></span>
            <span class="menu-line"></span>
          </button>
        </div>

        <!-- MENU -->
        <div class="collapse navbar-collapse" id="mainNavbar">

          <div class="mobile-menu-head d-xl-none">
            <span>Navigation</span>
            <strong>{{ $clinicName }} {{ $clinicSubtitle }}</strong>
            <small>Premium Dental Care in {{ $shortAddress }}</small>
          </div>

          <ul class="navbar-nav mx-auto mb-2 mb-xl-0">
            <li class="nav-item">
              <a class="nav-link active" href="{{ route('home') }}">
                <i class="bi bi-house-door"></i>
                <span>Home</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{ route('about') }}">
                <i class="bi bi-info-circle"></i>
                <span>About</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{ route('services.index') }}">
                <i class="bi bi-grid-1x2"></i>
                <span>Services</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{ route('doctor-profile') }}">
                <i class="bi bi-person-badge"></i>
                <span>Doctor</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{ route('gallery') }}">
                <i class="bi bi-images"></i>
                <span>Gallery</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{ route('testimonials') }}">
                <i class="bi bi-chat-quote"></i>
                <span>Reviews</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{ route('contact') }}">
                <i class="bi bi-envelope"></i>
                <span>Contact</span>
              </a>
            </li>
          </ul>

          <!-- DESKTOP CTA -->
          <div class="header-actions">
            <a href="tel:{{ $phoneLink }}" class="header-call d-none d-xxl-flex">
              <span class="header-call-icon">
                <i class="bi bi-telephone-fill"></i>
              </span>
              <span>
                <small>Call Clinic</small>
                <strong>{{ $displayPhone }}</strong>
              </span>
            </a>

            <a href="{{ route('book-appointment') }}" class="header-book-btn">
              <i class="bi bi-calendar2-check"></i>
              <span>Book Appointment</span>
            </a>
          </div>

          <!-- MOBILE CTA -->
          <div class="mobile-menu-actions d-xl-none">
            <a href="tel:{{ $phoneLink }}">
              <i class="bi bi-telephone-fill"></i>
              <span>Call</span>
            </a>

            <a href="#map">
              <i class="bi bi-geo-alt-fill"></i>
              <span>Direction</span>
            </a>

            <a href="#appointment">
              <i class="bi bi-calendar2-check"></i>
              <span>Book</span>
            </a>
          </div>

        </div>

      </div>
    </nav>
  </header>
  <!-- ================= ULTRA PREMIUM HEADER / NAVBAR END ================= -->



  @yield('content')

  
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
            {{ $clinicName }} {{ $clinicSubtitle }}
          </span>

          <h3>Need dental care guidance?</h3>

          <p>
            Book consultation, call clinic or get direction to our {{ $shortAddress }} location.
          </p>
        </div>

        <div class="footer-top-actions">
          <a href="#appointment" class="footer-white-btn">
            <i class="bi bi-calendar2-check"></i>
            Appointment
          </a>

          <a href="tel:{{ $phoneLink }}" class="footer-outline-btn">
            <i class="bi bi-telephone-fill"></i>
            Call Clinic
          </a>
        </div>
      </div>

      <!-- FOOTER MAIN -->
      <div class="footer-main-grid">

        <!-- BRAND -->
        <div class="footer-brand-card" data-aos="fade-up" data-aos-delay="50">
          <a href="#home" class="footer-brand">
            @if(!empty($websiteSetting?->logo))
              <img src="{{ $websiteSetting->logo }}" alt="{{ $clinicName }}" style="max-height:52px;width:auto;">
            @else
              <span class="footer-brand-icon">
                <i class="bi bi-heart-pulse-fill"></i>
              </span>
            @endif

            <span>
              <strong>{{ $clinicName }}</strong>
              <small>{{ $clinicSubtitle }}</small>
            </span>
          </a>

          <p>
            Premium dental clinic website skeleton for professional dental care,
            appointment enquiry and patient conversion.
          </p>

          <div class="footer-rating">
            <div>
              <strong>{{ $googleRating }}</strong>
              <span>Google Rating</span>
            </div>

            <div>
              <strong>{{ $patientReviewCount }}</strong>
              <span>Patient Reviews</span>
            </div>
          </div>

          <div class="footer-social">
            <a href="{{ $settingValue('facebook_url', '#') }}" aria-label="Facebook">
              <i class="bi bi-facebook"></i>
            </a>

            <a href="{{ $settingValue('instagram_url', '#') }}" aria-label="Instagram">
              <i class="bi bi-instagram"></i>
            </a>

            <a href="https://wa.me/{{ $whatsappLink }}" target="_blank" aria-label="WhatsApp">
              <i class="bi bi-whatsapp"></i>
            </a>

            <a href="tel:{{ $phoneLink }}" aria-label="Call">
              <i class="bi bi-telephone-fill"></i>
            </a>
          </div>
        </div>

        <!-- PAGES -->
        <div class="footer-link-card" data-aos="fade-up" data-aos-delay="100">
          <h5>Quick Pages</h5>

          <a href="#home">
            <i class="bi bi-arrow-right-short"></i>
            Home
          </a>

          <a href="#about">
            <i class="bi bi-arrow-right-short"></i>
            About Clinic
          </a>

          <a href="#services">
            <i class="bi bi-arrow-right-short"></i>
            Services
          </a>

          <a href="#doctor">
            <i class="bi bi-arrow-right-short"></i>
            Doctor Care
          </a>

          <a href="#contact">
            <i class="bi bi-arrow-right-short"></i>
            Contact
          </a>
        </div>

        <!-- SERVICES -->
        <div class="footer-link-card" data-aos="fade-up" data-aos-delay="150">
          <h5>Dental Services</h5>

          <a href="#services">
            <i class="bi bi-arrow-right-short"></i>
            Root Canal
          </a>

          <a href="#services">
            <i class="bi bi-arrow-right-short"></i>
            Teeth Cleaning
          </a>

          <a href="#services">
            <i class="bi bi-arrow-right-short"></i>
            Dental Implant
          </a>

          <a href="#services">
            <i class="bi bi-arrow-right-short"></i>
            Braces
          </a>

          <a href="#services">
            <i class="bi bi-arrow-right-short"></i>
            Smile Designing
          </a>
        </div>

        <!-- CONTACT -->
        <div class="footer-contact-card" data-aos="fade-up" data-aos-delay="200">
          <h5>Clinic Contact</h5>

          <div class="footer-contact-item">
            <span>
              <i class="bi bi-telephone-fill"></i>
            </span>
            <div>
              <strong>Phone</strong>
              <a href="tel:{{ $phoneLink }}">{{ $displayPhone }}</a>
            </div>
          </div>

          @if($displayEmail)
            <div class="footer-contact-item">
              <span>
                <i class="bi bi-envelope-fill"></i>
              </span>
              <div>
                <strong>Email</strong>
                <a href="mailto:{{ $displayEmail }}">{{ $displayEmail }}</a>
              </div>
            </div>
          @endif

          <div class="footer-contact-item">
            <span>
              <i class="bi bi-geo-alt-fill"></i>
            </span>
            <div>
              <strong>Location</strong>
              <p>{{ $shortAddress }}</p>
            </div>
          </div>

          <div class="footer-contact-item">
            <span>
              <i class="bi bi-clock-fill"></i>
            </span>
            <div>
              <strong>Timing</strong>
              <p>{{ $workingHours }}<br>{{ $sundayHours }}</p>
            </div>
          </div>

          <a href="#map" class="footer-direction-btn">
            Get Direction
            <i class="bi bi-arrow-up-right"></i>
          </a>
        </div>

      </div>

      <!-- FOOTER BOTTOM -->
      <div class="footer-bottom">
        <p>&copy; {{ $footerText }}</p>

        <div class="footer-bottom-links">
          <a href="#faqs">FAQs</a>
          <a href="#services">Services</a>
          <a href="#appointment">Appointment</a>
        </div>
      </div>

    </div>
  </footer>
  <!-- ================= ULTRA UNIQUE PREMIUM FOOTER END ================= -->



  <!-- ================= ULTRA PREMIUM FLOATING QUICK ACTIONS ================= -->
  <div class="floating-actions" aria-label="Quick Contact Actions">

    <a href="tel:{{ $phoneLink }}" class="floating-action-card float-call" aria-label="Call {{ $clinicName }}">
      <span class="floating-icon">
        <i class="bi bi-telephone-fill"></i>
      </span>

      <span class="floating-text">
        <small>Call Clinic</small>
        <strong>{{ $displayPhone }}</strong>
      </span>
    </a>

    <a href="https://wa.me/{{ $whatsappLink }}" target="_blank" class="floating-action-card float-whatsapp"
      aria-label="WhatsApp {{ $clinicName }}">
      <span class="floating-icon">
        <i class="bi bi-whatsapp"></i>
      </span>

      <span class="floating-text">
        <small>WhatsApp</small>
        <strong>Chat Now</strong>
      </span>
    </a>

    <a href="#map" class="floating-action-card float-location" aria-label="Get Direction">
      <span class="floating-icon">
        <i class="bi bi-geo-alt-fill"></i>
      </span>

      <span class="floating-text">
        <small>Location</small>
        <strong>Direction</strong>
      </span>
    </a>

  </div>
  <!-- ================= ULTRA PREMIUM FLOATING QUICK ACTIONS ================= -->



  <!-- ================= ULTRA PREMIUM MOBILE BOTTOM NAV ================= -->
  <div class="mobile-bottom-nav" id="mobileBottomNav">

    <span class="mobile-nav-indicator"></span>

    <a href="#home" class="mobile-nav-link active" data-index="0">
      <span class="mobile-nav-icon">
        <i class="bi bi-house-door"></i>
      </span>
      <span>Home</span>
    </a>

    <a href="#services" class="mobile-nav-link" data-index="1">
      <span class="mobile-nav-icon">
        <i class="bi bi-grid"></i>
      </span>
      <span>Services</span>
    </a>

    <a href="tel:{{ $phoneLink }}" class="mobile-nav-link mobile-call-link" data-index="2">
      <span class="mobile-nav-icon">
        <i class="bi bi-telephone-fill"></i>
      </span>
      <span>Call</span>
    </a>

    <a href="#map" class="mobile-nav-link" data-index="3">
      <span class="mobile-nav-icon">
        <i class="bi bi-geo-alt"></i>
      </span>
      <span>Location</span>
    </a>

    <a href="#appointment" class="mobile-nav-link mobile-book-link" data-index="4">
      <span class="mobile-nav-icon">
        <i class="bi bi-calendar-check-fill"></i>
      </span>
      <span>Book</span>
    </a>

  </div>
  <!-- ================= ULTRA PREMIUM MOBILE BOTTOM NAV END================= -->



  <!-- ================= ULTRA PREMIUM GALLERY LIGHTBOX ================= -->
  <div class="lightbox" id="lightbox" aria-hidden="true">

    <div class="lightbox-backdrop"></div>

    <div class="lightbox-panel">

      <button class="lightbox-close" id="lightboxClose" type="button" aria-label="Close Gallery Preview">
        <i class="bi bi-x-lg"></i>
      </button>

      <div class="lightbox-topbar">
        <div>
          <span class="lightbox-live-dot"></span>
          <strong>Gallery Preview</strong>
        </div>

          <small>{{ $clinicName }} {{ $clinicSubtitle }}</small>
      </div>

      <div class="lightbox-image-wrap">
        <button class="lightbox-nav lightbox-prev" id="lightboxPrev" type="button" aria-label="Previous Image">
          <i class="bi bi-chevron-left"></i>
        </button>

        <img src="" alt="Gallery Preview" id="lightboxImg">

        <button class="lightbox-nav lightbox-next" id="lightboxNext" type="button" aria-label="Next Image">
          <i class="bi bi-chevron-right"></i>
        </button>
      </div>

      <div class="lightbox-footer">
        <div>
          <span>Clinic Gallery</span>
          <strong id="lightboxTitle">Clinic Preview</strong>
        </div>

        <a href="#appointment" class="lightbox-cta">
          Book Visit
          <i class="bi bi-arrow-right"></i>
        </a>
      </div>

    </div>

  </div>
  <!-- ================= ULTRA PREMIUM GALLERY LIGHTBOX END================= -->



  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <!-- AOS JS -->
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

  <!-- Custom JS -->
  <script src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>
