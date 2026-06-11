"use strict";

(function () {
  document.documentElement.classList.add("js-ready");

  function ready(callback) {
    if (document.readyState !== "loading") {
      callback();
    } else {
      document.addEventListener("DOMContentLoaded", callback);
    }
  }

  function refreshAos(delay) {
    if (!window.AOS) return;

    setTimeout(function () {
      AOS.refreshHard();
    }, delay || 150);
  }

  function initAos() {
    if (!window.AOS) return;

    AOS.init({
      duration: 900,
      once: true,
      offset: 80,
      easing: "ease-out-cubic",
      mirror: false
    });

    refreshAos(400);
  }

  function applyRevealAnimations() {
    const revealItems = document.querySelectorAll(".reveal");

    revealItems.forEach(function (item, index) {
      if (!item.hasAttribute("data-aos")) {
        item.setAttribute("data-aos", "fade-up");
      }

      if (!item.hasAttribute("data-aos-duration")) {
        item.setAttribute("data-aos-duration", "850");
      }

      if (!item.hasAttribute("data-aos-delay")) {
        item.setAttribute("data-aos-delay", String((index % 5) * 80));
      }

      if (!item.hasAttribute("data-aos-easing")) {
        item.setAttribute("data-aos-easing", "ease-out-cubic");
      }
    });

    document.querySelectorAll(".about-breadcrumb-hero .reveal").forEach(function (item) {
      item.setAttribute("data-aos", "zoom-in");
      item.setAttribute("data-aos-duration", "900");
      item.setAttribute("data-aos-delay", "80");
    });

    document.querySelectorAll(".trust-card.reveal, .facility-card.reveal, .timeline-item.reveal").forEach(function (item, index) {
      item.setAttribute("data-aos", "fade-up");
      item.setAttribute("data-aos-delay", String((index % 4) * 100));
    });

    document.querySelectorAll(".about-image-area.reveal, .care-content.reveal, .timeline-left.reveal").forEach(function (item) {
      item.setAttribute("data-aos", "fade-right");
    });

    document.querySelectorAll(".about-content.reveal, .care-cards.reveal, .timeline-list .reveal").forEach(function (item) {
      item.setAttribute("data-aos", "fade-left");
    });

    document.querySelectorAll(".service-card").forEach(function (card, index) {
      if (!card.hasAttribute("data-aos")) {
        card.setAttribute("data-aos", "fade-up");
      }

      if (!card.hasAttribute("data-aos-delay")) {
        card.setAttribute("data-aos-delay", String((index % 3) * 90));
      }
    });

    document.querySelectorAll(".process-card").forEach(function (card, index) {
      if (!card.hasAttribute("data-aos")) {
        card.setAttribute("data-aos", "zoom-in");
      }

      if (!card.hasAttribute("data-aos-delay")) {
        card.setAttribute("data-aos-delay", String(index * 90));
      }
    });
  }

  function initHeader() {
    const siteHeader = document.getElementById("siteHeader");

    function handleHeaderScroll() {
      if (!siteHeader) return;

      if (window.scrollY > 60) {
        siteHeader.classList.add("scrolled");
      } else {
        siteHeader.classList.remove("scrolled");
      }
    }

    window.addEventListener("scroll", handleHeaderScroll, { passive: true });
    handleHeaderScroll();
  }

  function initMobileMenu() {
    const mainNavbar = document.getElementById("mainNavbar");
    const navbarToggler = document.querySelector(".navbar-toggler");

    if (navbarToggler && mainNavbar) {
      mainNavbar.addEventListener("show.bs.collapse", function () {
        navbarToggler.classList.add("active");
      });

      mainNavbar.addEventListener("hide.bs.collapse", function () {
        navbarToggler.classList.remove("active");
      });
    }

    document.querySelectorAll("#mainNavbar .nav-link, #mainNavbar a, .mobile-menu-actions a").forEach(function (link) {
      link.addEventListener("click", function () {
        if (!mainNavbar || !mainNavbar.classList.contains("show") || !window.bootstrap) return;

        const collapseInstance =
          window.bootstrap.Collapse.getInstance(mainNavbar) ||
          new window.bootstrap.Collapse(mainNavbar, { toggle: false });

        collapseInstance.hide();
      });
    });
  }

  function initMobileBottomNav() {
    const bottomNavLinks = document.querySelectorAll(".mobile-nav-link");
    const mobileNavIndicator = document.querySelector(".mobile-nav-indicator");

    function moveMobileIndicator(index) {
      if (!mobileNavIndicator) return;
      mobileNavIndicator.style.transform = "translateX(" + index * 100 + "%)";
    }

    bottomNavLinks.forEach(function (link) {
      link.addEventListener("click", function () {
        const index = Number(link.getAttribute("data-index") || 0);

        bottomNavLinks.forEach(function (item) {
          item.classList.remove("active");
        });

        link.classList.add("active");
        moveMobileIndicator(index);
      });
    });

    const defaultActive = document.querySelector(".mobile-nav-link.active");

    if (defaultActive) {
      moveMobileIndicator(Number(defaultActive.getAttribute("data-index") || 0));
    }
  }

  function initActiveNavOnScroll() {
    const sections = document.querySelectorAll("section[id]");
    const menuLinks = document.querySelectorAll(".nav-link, .mobile-bottom-nav a");

    if (!sections.length || !menuLinks.length) return;

    function activeMenuOnScroll() {
      let currentSection = "";

      sections.forEach(function (section) {
        const sectionTop = section.offsetTop - 130;
        const sectionHeight = section.offsetHeight;

        if (window.scrollY >= sectionTop && window.scrollY < sectionTop + sectionHeight) {
          currentSection = section.getAttribute("id") || "";
        }
      });

      menuLinks.forEach(function (link) {
        const href = link.getAttribute("href");

        link.classList.toggle("active", href === "#" + currentSection);
      });
    }

    window.addEventListener("scroll", activeMenuOnScroll, { passive: true });
    activeMenuOnScroll();
  }

  function initCounters() {
    const counters = document.querySelectorAll(".counter");
    let counterStarted = false;

    function animateCounter(counter) {
      const target = parseFloat(counter.getAttribute("data-target") || "0");
      const isDecimal = target % 1 !== 0;
      const duration = 1300;
      const startTime = performance.now();

      function updateCounter(currentTime) {
        const progress = Math.min((currentTime - startTime) / duration, 1);
        const easedProgress = 1 - Math.pow(1 - progress, 3);
        const currentValue = target * easedProgress;

        counter.textContent = isDecimal ? currentValue.toFixed(1) : Math.floor(currentValue);

        if (progress < 1) {
          requestAnimationFrame(updateCounter);
        } else {
          counter.textContent = isDecimal ? target.toFixed(1) : Math.floor(target);
        }
      }

      requestAnimationFrame(updateCounter);
    }

    if (!counters.length) return;

    if ("IntersectionObserver" in window) {
      const counterObserver = new IntersectionObserver(
        function (entries) {
          entries.forEach(function (entry) {
            if (entry.isIntersecting && !counterStarted) {
              counterStarted = true;
              counters.forEach(animateCounter);
              counterObserver.disconnect();
            }
          });
        },
        { threshold: 0.25 }
      );

      counterObserver.observe(counters[0]);
    } else {
      counters.forEach(animateCounter);
    }
  }

  function initTestimonials() {
    const testimonialCards = document.querySelectorAll(".testimonial-card");
    const testimonialDots = document.querySelectorAll(".testimonial-dots button");
    const nextReviewBtn = document.querySelector(".nextReview");
    const prevReviewBtn = document.querySelector(".prevReview");
    let testimonialIndex = 0;
    let testimonialTimer = null;

    function showTestimonial(index) {
      if (!testimonialCards[index]) return;

      testimonialCards.forEach(function (card) {
        card.classList.remove("active-review");
      });

      testimonialDots.forEach(function (dot) {
        dot.classList.remove("active");
      });

      testimonialCards[index].classList.add("active-review");

      if (testimonialDots[index]) {
        testimonialDots[index].classList.add("active");
      }
    }

    function nextTestimonial() {
      testimonialIndex = testimonialIndex + 1 >= testimonialCards.length ? 0 : testimonialIndex + 1;
      showTestimonial(testimonialIndex);
    }

    function prevTestimonial() {
      testimonialIndex = testimonialIndex - 1 < 0 ? testimonialCards.length - 1 : testimonialIndex - 1;
      showTestimonial(testimonialIndex);
    }

    function startAutoSlide() {
      testimonialTimer = setInterval(nextTestimonial, 5200);
    }

    function resetAutoSlide() {
      clearInterval(testimonialTimer);
      startAutoSlide();
    }

    if (!testimonialCards.length) return;

    showTestimonial(testimonialIndex);
    startAutoSlide();

    if (nextReviewBtn) {
      nextReviewBtn.addEventListener("click", function () {
        nextTestimonial();
        resetAutoSlide();
      });
    }

    if (prevReviewBtn) {
      prevReviewBtn.addEventListener("click", function () {
        prevTestimonial();
        resetAutoSlide();
      });
    }

    testimonialDots.forEach(function (dot, index) {
      dot.addEventListener("click", function () {
        testimonialIndex = index;
        showTestimonial(testimonialIndex);
        resetAutoSlide();
      });
    });
  }

  function initFilters() {
    const filterButtons = document.querySelectorAll(".filter-btn");

    filterButtons.forEach(function (button) {
      button.addEventListener("click", function () {
        const filterValue = button.getAttribute("data-filter") || "all";
        const filterGroup = button.closest("section") || document;
        const cards = filterGroup.querySelectorAll(".service-card, .gallery-card");

        filterButtons.forEach(function (item) {
          item.classList.remove("active");
        });

        button.classList.add("active");

        cards.forEach(function (card, index) {
          const category = card.getAttribute("data-category");
          const shouldShow = filterValue === "all" || category === filterValue;

          if (shouldShow) {
            card.classList.remove("hide");
            card.style.display = "";

            if (card.classList.contains("service-card")) {
              card.setAttribute("data-aos", "fade-up");
              card.setAttribute("data-aos-delay", String((index % 3) * 80));
            }
          } else {
            card.classList.add("hide");
            card.style.display = "none";
          }
        });

        refreshAos(150);
      });
    });
  }

  function initLightbox() {
    const galleryButtons = document.querySelectorAll(".gallery-view-btn, .gallery-btn");
    const lightbox = document.getElementById("lightbox");
    const lightboxImg = document.getElementById("lightboxImg");
    const lightboxTitle = document.getElementById("lightboxTitle");
    const lightboxClose = document.getElementById("lightboxClose");
    const lightboxBackdrop = document.querySelector(".lightbox-backdrop");
    const lightboxPrev = document.getElementById("lightboxPrev");
    const lightboxNext = document.getElementById("lightboxNext");
    const galleryItems = [];
    let currentIndex = 0;

    function openLightbox(index) {
      if (!lightbox || !lightboxImg || !galleryItems.length) return;

      const item = galleryItems[index];

      if (!item || !item.image) return;

      currentIndex = index;
      lightboxImg.setAttribute("src", item.image);
      lightboxImg.setAttribute("alt", item.title);

      if (lightboxTitle) {
        lightboxTitle.textContent = item.title;
      }

      lightbox.classList.add("active");
      lightbox.setAttribute("aria-hidden", "false");
      document.body.classList.add("lightbox-open");
      document.body.style.overflow = "hidden";
    }

    function closeLightbox() {
      if (!lightbox || !lightboxImg) return;

      lightbox.classList.remove("active");
      lightbox.setAttribute("aria-hidden", "true");
      lightboxImg.setAttribute("src", "");
      document.body.classList.remove("lightbox-open");
      document.body.style.overflow = "";
    }

    function showPrevImage() {
      if (!galleryItems.length) return;
      openLightbox(currentIndex - 1 < 0 ? galleryItems.length - 1 : currentIndex - 1);
    }

    function showNextImage() {
      if (!galleryItems.length) return;
      openLightbox(currentIndex + 1 >= galleryItems.length ? 0 : currentIndex + 1);
    }

    galleryButtons.forEach(function (button, index) {
      const card = button.closest(".gallery-card");
      const imageSrc = button.getAttribute("data-img");
      const titleElement = card ? card.querySelector(".gallery-overlay h3, h3") : null;
      const title = titleElement ? titleElement.textContent.trim() : "Clinic Gallery";

      button.setAttribute("type", "button");

      galleryItems.push({
        image: imageSrc,
        title: title
      });

      button.addEventListener("click", function (event) {
        event.preventDefault();
        event.stopPropagation();
        openLightbox(index);
      });
    });

    if (lightboxClose) {
      lightboxClose.addEventListener("click", closeLightbox);
    }

    if (lightboxBackdrop) {
      lightboxBackdrop.addEventListener("click", closeLightbox);
    }

    if (lightbox) {
      lightbox.addEventListener("click", function (event) {
        if (event.target === lightbox) {
          closeLightbox();
        }
      });
    }

    if (lightboxPrev) {
      lightboxPrev.addEventListener("click", function (event) {
        event.preventDefault();
        event.stopPropagation();
        showPrevImage();
      });
    }

    if (lightboxNext) {
      lightboxNext.addEventListener("click", function (event) {
        event.preventDefault();
        event.stopPropagation();
        showNextImage();
      });
    }

    document.addEventListener("keydown", function (event) {
      if (!lightbox || !lightbox.classList.contains("active")) return;

      if (event.key === "Escape") {
        closeLightbox();
      }

      if (event.key === "ArrowLeft") {
        showPrevImage();
      }

      if (event.key === "ArrowRight") {
        showNextImage();
      }
    });
  }

  function initForms() {
    document.querySelectorAll("form").forEach(function (form) {
      form.addEventListener("submit", function (event) {
        const submitButton = form.querySelector("button[type='submit'], .submit-btn");

        if (!submitButton || form.hasAttribute("data-allow-submit")) return;

        event.preventDefault();

        const oldText = submitButton.innerHTML;

        submitButton.innerHTML = "Submitted <i class='bi bi-check2-circle'></i>";
        submitButton.disabled = true;

        setTimeout(function () {
          submitButton.innerHTML = oldText;
          submitButton.disabled = false;
          form.reset();
        }, 1800);
      });
    });
  }

  function initFaqRefresh() {
    document.querySelectorAll(".accordion-button").forEach(function (button) {
      button.addEventListener("click", function () {
        refreshAos(260);
      });
    });
  }

  function initSmoothScroll() {
    const siteHeader = document.getElementById("siteHeader");

    document.querySelectorAll('a[href^="#"]').forEach(function (anchor) {
      anchor.addEventListener("click", function (event) {
        const targetId = anchor.getAttribute("href");

        if (!targetId || targetId.length <= 1) return;

        const targetElement = document.querySelector(targetId);

        if (!targetElement) return;

        event.preventDefault();

        const headerOffset = siteHeader ? siteHeader.offsetHeight + 14 : 90;
        const elementPosition = targetElement.getBoundingClientRect().top;
        const offsetPosition = elementPosition + window.scrollY - headerOffset;

        window.scrollTo({
          top: offsetPosition,
          behavior: "smooth"
        });
      });
    });
  }

  ready(function () {
    applyRevealAnimations();
    initAos();
    initHeader();
    initMobileMenu();
    initMobileBottomNav();
    initActiveNavOnScroll();
    initCounters();
    initTestimonials();
    initFilters();
    initLightbox();
    initForms();
    initFaqRefresh();
    initSmoothScroll();
  });
})();
