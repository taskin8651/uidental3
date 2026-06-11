@extends('frontend.master')
@section('content')


  <!-- ================= REVIEWS HERO ================= -->
  <section class="reviews-breadcrumb-hero" id="reviewsHero">
    <div class="breadcrumb-pattern"></div>
    <div class="breadcrumb-shine"></div>

    <div class="breadcrumb-orb orb-one"></div>
    <div class="breadcrumb-orb orb-two"></div>
    <div class="breadcrumb-orb orb-three"></div>

    <div class="container">
      <div class="breadcrumb-center-box" data-aos="fade-up">

        <span class="hero-mini-badge">
          <i class="bi bi-star-fill"></i>
          Patient Reviews
        </span>

        <nav class="premium-breadcrumb" aria-label="breadcrumb">
          <a href="{{ route('home') }}">
            <i class="bi bi-house-door-fill"></i>
            Home
          </a>

          <span>
            <i class="bi bi-chevron-right"></i>
          </span>

          <a href="{{ route('testimonials') }}" class="active">
            Reviews
          </a>
        </nav>

        <h1>
          Patient Reviews <span>& Google Rating</span>
        </h1>

        <p>
          Explore patient review placeholders and Google rating highlight for {{ $clinicFullName }},
          {{ $shortAddress }} with a clean, trust-focused testimonial layout.
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
            <i class="bi bi-shield-check"></i>
            <strong>Trusted Dental Care</strong>
          </div>
        </div>

        <div class="reviews-hero-actions">
          <a href="#reviewsList" class="reviews-btn-primary">
            <i class="bi bi-chat-quote-fill"></i>
            View Reviews
          </a>

          <a href="tel:{{ $phoneLink }}" class="reviews-btn-light">
            <i class="bi bi-telephone-fill"></i>
            Call Clinic
          </a>
        </div>

      </div>
    </div>
  </section>



  <!-- ================= RATING HIGHLIGHT ================= -->
  <section class="rating-highlight-section section-padding">
    <div class="container">
      <div class="rating-highlight-grid">

        <div class="rating-score-card" data-aos="fade-right">
          <div class="rating-circle">
            <strong>{{ $googleRating }}</strong>
            <span>Google Rating</span>
          </div>

          <div class="rating-stars">
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-half"></i>
          </div>

          <p>
            Based on {{ $patientReviewCount }} patient reviews for {{ $clinicFullName }}.
          </p>

          <div class="rating-meta">
            <div>
              <i class="bi bi-chat-heart-fill"></i>
              <strong>62</strong>
              <span>Reviews</span>
            </div>

            <div>
              <i class="bi bi-geo-alt-fill"></i>
              <strong>{{ $shortAddress }}</strong>
              <span>Clinic Location</span>
            </div>
          </div>
        </div>

        <div class="rating-content" data-aos="fade-left">
          <span class="section-badge">
            <i class="bi bi-award-fill"></i>
            Google Rating Highlight
          </span>

          <h2>Trusted By Patients For Comfortable Dental Care</h2>

          <p>
            This reviews page is designed to build patient confidence with rating highlights,
            testimonial cards and clear call-to-action support for appointment, call and direction.
          </p>

          <div class="rating-points">
            <div data-aos="fade-up" data-aos-delay="0">
              <i class="bi bi-check2-circle"></i>
              <span>Google rating highlight card</span>
            </div>

            <div data-aos="fade-up" data-aos-delay="100">
              <i class="bi bi-check2-circle"></i>
              <span>Patient review card layout</span>
            </div>

            <div data-aos="fade-up" data-aos-delay="200">
              <i class="bi bi-check2-circle"></i>
              <span>Trust-focused dental clinic presentation</span>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>



  <!-- ================= REVIEWS GRID ================= -->
  <section class="reviews-section section-padding" id="reviewsList">
    <div class="reviews-bg-pattern"></div>

    <div class="container">
      <div class="section-heading" data-aos="fade-up">
        <span class="section-badge">
          <i class="bi bi-chat-square-heart-fill"></i>
          Patient Testimonials
        </span>

        <h2>Patient Review Card Layout</h2>

        <p>
          Clean testimonial cards for clinic experience, consultation comfort, treatment guidance and dental care
          support.
        </p>
      </div>

      <div class="reviews-grid">
        @forelse($patientReviews as $review)
          <article class="review-card" data-aos="fade-up" data-aos-delay="{{ ($loop->index % 3) * 100 }}">
            <div class="review-top">
              <div class="review-avatar">
                <span>{{ $review->avatar_letter ?: strtoupper(substr($review->title, 0, 1)) }}</span>
              </div>

              <div>
                <h3>{{ $review->title }}</h3>
                <small>{{ $review->service_name }}</small>
              </div>
            </div>

            <div class="review-stars">
              @for($star = 1; $star <= 5; $star++)
                @if($review->rating >= $star)
                  <i class="bi bi-star-fill"></i>
                @elseif($review->rating >= $star - 0.5)
                  <i class="bi bi-star-half"></i>
                @else
                  <i class="bi bi-star"></i>
                @endif
              @endfor
            </div>

            <p>
              {{ $review->review_text }}
            </p>

            @if($review->badge_text)
              <span class="review-badge">
                <i class="{{ $review->badge_icon ?: 'bi bi-shield-check' }}"></i>
                {{ $review->badge_text }}
              </span>
            @endif
          </article>
        @empty
          <p>No patient reviews added yet.</p>
        @endforelse
      </div>
    </div>
  </section>



  <!-- ================= REVIEW CTA STRIP ================= -->
  <section class="review-trust-section section-padding">
    <div class="container">
      <div class="trust-review-box" data-aos="zoom-in">
        <div class="trust-review-icon">
          <i class="bi bi-chat-quote-fill"></i>
        </div>

        <div>
          <span>Trusted Dental Care</span>
          <h2>{{ $googleRating }} Google Rating With {{ $patientReviewCount }} Patient Reviews</h2>
          <p>
            Visit {{ $clinicFullName }} for consultation, cleaning, root canal, crowns, implants,
            braces, smile designing and emergency dental care.
          </p>
        </div>

        <a href="tel:{{ $phoneLink }}" class="reviews-btn-primary">
          <i class="bi bi-telephone-fill"></i>
          Call Clinic
        </a>
      </div>
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
            Book Your Visit
          </span>

          <h2>Ready For A Trusted Dental Consultation?</h2>

          <p>
            Book your visit at {{ $clinicFullName }} for consultation, cleaning, root canal,
            crowns, implants, braces, smile designing and complete oral care.
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
