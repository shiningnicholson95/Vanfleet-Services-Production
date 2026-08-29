document.addEventListener('DOMContentLoaded', () => {

  /* ── Mobile Drawer ── */
  const drawer  = document.getElementById('vf-drawer');
  const toggles = document.querySelectorAll('[data-drawer-toggle]');
  const closes  = document.querySelectorAll('[data-drawer-close]');

  function openDrawer() {
    if (!drawer) return;
    drawer.setAttribute('aria-hidden', 'false');
    document.body.style.overflow = 'hidden';
    const firstLink = drawer.querySelector('.vf-drawer__nav a, .vf-drawer__close');
    if (firstLink) firstLink.focus();
  }

  function closeDrawer() {
    if (!drawer) return;
    drawer.setAttribute('aria-hidden', 'true');
    document.body.style.overflow = '';
  }

  toggles.forEach(btn => btn.addEventListener('click', openDrawer));
  closes.forEach(el  => el.addEventListener('click', closeDrawer));

  /* Close on Escape — return focus to the hamburger that opened it */
  document.addEventListener('keydown', e => {
    if (e.key === 'Escape' && drawer && drawer.getAttribute('aria-hidden') === 'false') {
      closeDrawer();
      const toggle = document.querySelector('.vf-menu-toggle');
      if (toggle) toggle.focus();
    }
  });

  /* Auto-close drawer if viewport widens past the desktop-nav breakpoint */
  window.addEventListener('resize', () => {
    if (window.innerWidth > 980 && drawer && drawer.getAttribute('aria-hidden') === 'false') {
      closeDrawer();
    }
  });

  /* ── Dropdown Nav Toggles ── */
  document.querySelectorAll('.vf-dropdown-toggle').forEach(btn => {
    btn.addEventListener('click', e => {
      e.stopPropagation();
      const li = btn.closest('.vf-has-dropdown');
      if (!li) return;
      const open = li.classList.toggle('is-open');
      btn.setAttribute('aria-expanded', open ? 'true' : 'false');
      // Close sibling dropdowns at the same level
      if (li.parentElement) {
        li.parentElement.querySelectorAll('.vf-has-dropdown.is-open').forEach(sib => {
          if (sib !== li) {
            sib.classList.remove('is-open');
            const sibBtn = sib.querySelector('.vf-dropdown-toggle');
            if (sibBtn) sibBtn.setAttribute('aria-expanded', 'false');
          }
        });
      }
    });
  });

  // Close desktop dropdowns when clicking outside nav
  document.addEventListener('click', e => {
    if (!e.target.closest('.vf-nav .vf-has-dropdown')) {
      document.querySelectorAll('.vf-nav .vf-has-dropdown.is-open').forEach(li => {
        li.classList.remove('is-open');
        const btn = li.querySelector('.vf-dropdown-toggle');
        if (btn) btn.setAttribute('aria-expanded', 'false');
      });
    }
  });

  /* ── FAQ Accordion ── */
  document.querySelectorAll('[data-faq-button]').forEach(btn => {
    btn.addEventListener('click', () => {
      const item = btn.closest('.vf-faq__item');
      const open = item.classList.toggle('is-open');
      btn.setAttribute('aria-expanded', open ? 'true' : 'false');
    });
  });

  /* ── Scroll state ── */
  window.addEventListener('scroll', () => {
    document.body.classList.toggle('has-scrolled', window.scrollY > 20);
  }, { passive: true });

  /* ── Hero Form AJAX Submit ── */
  const heroForm = document.getElementById('vf-hero-form');
  if (heroForm) {
    heroForm.addEventListener('submit', function(e) {
      e.preventDefault();

      const btn    = heroForm.querySelector('.vf-hero-form__submit');
      const status = heroForm.querySelector('.vf-hero-form__status');
      const name   = (heroForm.querySelector('[name="full_name"]').value || '').trim();
      const phone  = (heroForm.querySelector('[name="phone"]').value || '').trim();
      const email  = (heroForm.querySelector('[name="email"]').value || '').trim();

      if (!name || !phone || !email) {
        status.textContent = 'Please enter your name, phone number, and email.';
        status.className = 'vf-hero-form__status vf-hero-form__status--error';
        status.removeAttribute('hidden');
        return;
      }

      const origText   = btn.textContent;
      btn.disabled     = true;
      btn.textContent  = 'Sending…';
      status.setAttribute('hidden', '');

      const data = new FormData(heroForm);
      data.set('action', 'vanfleet_home_hero_request_service');

      const ajaxUrl = (window.vfConfig && window.vfConfig.ajaxUrl) || '/wp-admin/admin-ajax.php';

      fetch(ajaxUrl, { method: 'POST', body: data, credentials: 'same-origin' })
        .then(function(r) { return r.json(); })
        .then(function(r) {
          if (r.success) {
            status.textContent = r.data.message || "Thank you! We’ll call you right back.";
            status.className = 'vf-hero-form__status vf-hero-form__status--success';
            heroForm.reset();
          } else {
            status.textContent = (r.data && r.data.message) || 'Something went wrong. Please call us directly.';
            status.className = 'vf-hero-form__status vf-hero-form__status--error';
          }
          status.removeAttribute('hidden');
        })
        .catch(function() {
          status.textContent = 'Connection error. Please call us directly at (267) 300-4526.';
          status.className = 'vf-hero-form__status vf-hero-form__status--error';
          status.removeAttribute('hidden');
        })
        .finally(function() {
          btn.disabled    = false;
          btn.textContent = origText;
        });
    });
  }

  /* ── Financing Form AJAX Submit ── */
  const financingForm = document.getElementById('vf-financing-form');
  if (financingForm) {
    financingForm.addEventListener('submit', function(e) {
      e.preventDefault();

      const btn     = financingForm.querySelector('.vf-financing-form__submit');
      const status  = financingForm.querySelector('.vf-hero-form__status');
      const name    = (financingForm.querySelector('[name="full_name"]').value || '').trim();
      const phone   = (financingForm.querySelector('[name="phone"]').value || '').trim();
      const email   = (financingForm.querySelector('[name="email"]').value || '').trim();
      const city    = (financingForm.querySelector('[name="city"]').value || '').trim();
      const consent = financingForm.querySelector('[name="consent"]').checked;

      if (!name || !phone || !email || !city || !consent) {
        status.textContent = 'Please fill in all required fields and confirm consent.';
        status.className = 'vf-hero-form__status vf-hero-form__status--error';
        status.removeAttribute('hidden');
        return;
      }

      const origText  = btn.textContent;
      btn.disabled    = true;
      btn.textContent = 'Sending…';
      status.setAttribute('hidden', '');

      const data = new FormData(financingForm);
      data.set('action', 'vanfleet_financing_request');

      const ajaxUrl = (window.vfConfig && window.vfConfig.ajaxUrl) || '/wp-admin/admin-ajax.php';

      fetch(ajaxUrl, { method: 'POST', body: data, credentials: 'same-origin' })
        .then(function(r) { return r.json(); })
        .then(function(r) {
          if (r.success) {
            status.textContent = r.data.message || "Thank you! We'll be in touch.";
            status.className = 'vf-hero-form__status vf-hero-form__status--success';
            financingForm.reset();
          } else {
            status.textContent = (r.data && r.data.message) || 'Something went wrong. Please call us directly.';
            status.className = 'vf-hero-form__status vf-hero-form__status--error';
          }
          status.removeAttribute('hidden');
        })
        .catch(function() {
          status.textContent = 'Connection error. Please call us directly at (267) 300-4526.';
          status.className = 'vf-hero-form__status vf-hero-form__status--error';
          status.removeAttribute('hidden');
        })
        .finally(function() {
          btn.disabled    = false;
          btn.textContent = origText;
        });
    });
  }

  /* ── Schedule Service Form AJAX Submit ── */
  const scheduleForm = document.getElementById('vf-schedule-form');
  if (scheduleForm) {
    scheduleForm.addEventListener('submit', function(e) {
      e.preventDefault();

      const btn     = scheduleForm.querySelector('.vf-schedule-form__submit');
      const status  = scheduleForm.querySelector('.vf-hero-form__status');
      const name    = (scheduleForm.querySelector('[name="full_name"]').value || '').trim();
      const phone   = (scheduleForm.querySelector('[name="phone"]').value || '').trim();
      const service = (scheduleForm.querySelector('[name="service_needed"]').value || '').trim();

      if (!name || !phone || !service) {
        status.textContent = 'Please fill in your name, phone, and the service needed.';
        status.className = 'vf-hero-form__status vf-hero-form__status--error';
        status.removeAttribute('hidden');
        return;
      }

      const origText  = btn.textContent;
      btn.disabled    = true;
      btn.textContent = 'Sending…';
      status.setAttribute('hidden', '');

      const data = new FormData(scheduleForm);
      data.set('action', 'vanfleet_schedule_service_request');

      const ajaxUrl = (window.vfConfig && window.vfConfig.ajaxUrl) || '/wp-admin/admin-ajax.php';

      fetch(ajaxUrl, { method: 'POST', body: data, credentials: 'same-origin' })
        .then(function(r) { return r.json(); })
        .then(function(r) {
          if (r.success) {
            status.textContent = r.data.message || 'Thank you! We’ll confirm your appointment shortly.';
            status.className = 'vf-hero-form__status vf-hero-form__status--success';
            scheduleForm.reset();
          } else {
            status.textContent = (r.data && r.data.message) || 'Something went wrong. Please call us directly.';
            status.className = 'vf-hero-form__status vf-hero-form__status--error';
          }
          status.removeAttribute('hidden');
        })
        .catch(function() {
          status.textContent = 'Connection error. Please call us directly at (267) 300-4526.';
          status.className = 'vf-hero-form__status vf-hero-form__status--error';
          status.removeAttribute('hidden');
        })
        .finally(function() {
          btn.disabled    = false;
          btn.textContent = origText;
        });
    });
  }

  /* ── Newsletter Form AJAX Submit ── */
  const newsletterForm = document.getElementById('vf-newsletter-form');
  if (newsletterForm) {
    newsletterForm.addEventListener('submit', function(e) {
      e.preventDefault();

      const btn    = newsletterForm.querySelector('.vf-newsletter__submit');
      const status = newsletterForm.querySelector('.vf-hero-form__status');
      const email  = (newsletterForm.querySelector('[name="email"]').value || '').trim();

      if (!email) {
        status.textContent = 'Please enter a valid email address.';
        status.className = 'vf-hero-form__status vf-hero-form__status--error';
        status.removeAttribute('hidden');
        return;
      }

      const origText   = btn.textContent;
      btn.disabled     = true;
      btn.textContent  = 'Subscribing…';
      status.setAttribute('hidden', '');

      const data = new FormData(newsletterForm);
      data.set('action', 'vanfleet_newsletter_signup');

      const ajaxUrl = (window.vfConfig && window.vfConfig.ajaxUrl) || '/wp-admin/admin-ajax.php';

      fetch(ajaxUrl, { method: 'POST', body: data, credentials: 'same-origin' })
        .then(function(r) { return r.json(); })
        .then(function(r) {
          if (r.success) {
            status.textContent = r.data.message || "You're subscribed!";
            status.className = 'vf-hero-form__status vf-hero-form__status--success';
            newsletterForm.reset();
          } else {
            status.textContent = (r.data && r.data.message) || 'Something went wrong. Please try again.';
            status.className = 'vf-hero-form__status vf-hero-form__status--error';
          }
          status.removeAttribute('hidden');
        })
        .catch(function() {
          status.textContent = 'Connection error. Please try again shortly.';
          status.className = 'vf-hero-form__status vf-hero-form__status--error';
          status.removeAttribute('hidden');
        })
        .finally(function() {
          btn.disabled    = false;
          btn.textContent = origText;
        });
    });
  }

});
