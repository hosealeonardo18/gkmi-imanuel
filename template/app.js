(() => {
  const config = window.SITE_CONFIG || {};

  const qs = (selector, parent = document) => parent.querySelector(selector);
  const qsa = (selector, parent = document) => [...parent.querySelectorAll(selector)];

  const setTextAll = (selector, value) => {
    if (!value) return;
    qsa(selector).forEach((el) => {
      el.textContent = value;
    });
  };

  const setHrefAll = (selector, value) => {
    if (!value) return;
    qsa(selector).forEach((el) => {
      el.href = value;
    });
  };

  const initContent = () => {
    setTextAll("[data-church-name]", config.church?.name);
    setTextAll("[data-hero-eyebrow]", config.hero?.eyebrow);
    setTextAll("[data-hero-description]", config.hero?.description);
    setTextAll("[data-about-copy]", config.about?.description);
    setTextAll("[data-location-short]", config.church?.shortLocation);
    setTextAll("[data-address]", config.church?.address);

    const primarySchedule = config.schedules?.[0];
    if (primarySchedule) {
      setTextAll(
        "[data-primary-schedule]",
        `${primarySchedule.day} · ${primarySchedule.time}`
      );
    }

    setHrefAll("[data-youtube-link]", config.youtube?.channelUrl);
    setHrefAll("[data-instagram-link]", config.church?.instagram);
    setHrefAll("[data-maps-link]", config.church?.googleMapsUrl);

    if (config.church?.whatsapp) {
      const phone = config.church.whatsapp.replace(/[^\d]/g, "");
      setHrefAll("[data-whatsapp-link]", `https://wa.me/${phone}`);
      qsa("[data-whatsapp-link]").forEach((el) => {
        if (el.textContent.includes("Isi nomor")) {
          el.textContent = config.church.whatsapp;
        }
      });
    }
  };

  const renderSchedules = () => {
    const container = qs("#schedule-list");
    if (!container) return;

    container.innerHTML = (config.schedules || [])
      .map(
        (item, index) => `
          <div class="schedule-row reveal">
            <span class="index">${String(index + 1).padStart(2, "0")}</span>
            <span class="name">${item.name}</span>
            <span class="day">${item.day}</span>
            <span class="time">${item.time}</span>
            <span class="row-arrow">→</span>
          </div>
        `
      )
      .join("");
  };

  const renderEvents = () => {
    const container = qs("#event-list");
    if (!container) return;

    container.innerHTML = (config.events || [])
      .map(
        (item) => `
          <article class="event-row reveal">
            <div class="event-date">
              <strong>${item.date}</strong>
              <span>${item.month}</span>
            </div>

            <div class="event-copy">
              <h3>${item.title}</h3>
              <p>${item.location || ""}</p>
            </div>

            <span class="event-time">${item.time || ""}</span>
            <span class="row-arrow">→</span>
          </article>
        `
      )
      .join("");
  };

  const renderMinistries = () => {
    const container = qs("#ministry-grid");
    if (!container) return;

    container.innerHTML = (config.ministries || [])
      .map(
        (item) => `
          <article class="ministry-card reveal">
            <h3>${item.name}</h3>
            <span>
              ${item.subtitle || "Ministry"}
              <b>→</b>
            </span>
          </article>
        `
      )
      .join("");
  };

  const initHeader = () => {
    const header = qs("#site-header");

    const update = () => {
      header?.classList.toggle("scrolled", window.scrollY > 24);
    };

    update();
    window.addEventListener("scroll", update, { passive: true });
  };

  const initMobileMenu = () => {
    const menu = qs("#mobile-menu");
    const toggle = qs("#menu-toggle");
    const close = qs("#mobile-close");

    if (!menu || !toggle || !close) return;

    const openMenu = () => {
      menu.classList.add("open");
      menu.setAttribute("aria-hidden", "false");
      toggle.setAttribute("aria-expanded", "true");
      document.body.classList.add("menu-open");
    };

    const closeMenu = () => {
      menu.classList.remove("open");
      menu.setAttribute("aria-hidden", "true");
      toggle.setAttribute("aria-expanded", "false");
      document.body.classList.remove("menu-open");
    };

    toggle.addEventListener("click", openMenu);
    close.addEventListener("click", closeMenu);
    qsa("a", menu).forEach((link) => link.addEventListener("click", closeMenu));
  };

  const initReveal = () => {
    const items = qsa(".reveal, .reveal-image");

    if (!("IntersectionObserver" in window)) {
      items.forEach((item) => item.classList.add("visible"));
      return;
    }

    const observer = new IntersectionObserver(
      (entries, obs) => {
        entries.forEach((entry) => {
          if (!entry.isIntersecting) return;
          entry.target.classList.add("visible");
          obs.unobserve(entry.target);
        });
      },
      {
        threshold: 0.13,
        rootMargin: "0px 0px -40px 0px"
      }
    );

    items.forEach((item) => observer.observe(item));
  };

  const formatDate = (dateString) => {
    if (!dateString) return "";
    try {
      return new Intl.DateTimeFormat("id-ID", {
        day: "2-digit",
        month: "long",
        year: "numeric"
      }).format(new Date(dateString));
    } catch {
      return "";
    }
  };

  const renderYoutubeVideo = ({ videoId, title, publishedAt, live = false }) => {
    const stage = qs("#youtube-stage");
    const titleEl = qs("#youtube-title");
    const dateEl = qs("#youtube-date");
    const statusEl = qs("#youtube-status");
    const watchLink = qs("#youtube-watch-link");

    if (!videoId || !stage) return;

    stage.innerHTML = `
      <iframe
        src="https://www.youtube.com/embed/${encodeURIComponent(videoId)}"
        title="${title || "YouTube video"}"
        loading="lazy"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
        allowfullscreen
      ></iframe>
    `;

    if (titleEl) titleEl.textContent = title || config.youtube?.channelName || "";
    if (dateEl) dateEl.textContent = live ? "Sedang berlangsung sekarang" : formatDate(publishedAt);

    if (statusEl) {
      statusEl.textContent = live ? "LIVE NOW" : "LATEST SERVICE";
      statusEl.classList.toggle("is-live", live);
    }

    if (watchLink) {
      watchLink.href = `https://www.youtube.com/watch?v=${encodeURIComponent(videoId)}`;
    }
  };

  const youtubeSearch = async ({ liveOnly = false }) => {
    const yt = config.youtube || {};
    const params = new URLSearchParams({
      part: "snippet",
      channelId: yt.channelId,
      type: "video",
      maxResults: "1",
      order: liveOnly ? "date" : "date",
      key: yt.apiKey
    });

    if (liveOnly) {
      params.set("eventType", "live");
    }

    const response = await fetch(
      `https://www.googleapis.com/youtube/v3/search?${params.toString()}`
    );

    if (!response.ok) {
      throw new Error(`YouTube API error: ${response.status}`);
    }

    const data = await response.json();
    return data.items?.[0] || null;
  };

  const initYouTube = async () => {
    const yt = config.youtube || {};

    if (yt.fallbackVideoId) {
      renderYoutubeVideo({
        videoId: yt.fallbackVideoId,
        title: yt.channelName || "GKMI Imanuel Cipayung"
      });
    }

    if (!yt.apiKey || !yt.channelId) {
      return;
    }

    try {
      const liveItem = await youtubeSearch({ liveOnly: true });

      if (liveItem?.id?.videoId) {
        renderYoutubeVideo({
          videoId: liveItem.id.videoId,
          title: liveItem.snippet?.title,
          publishedAt: liveItem.snippet?.publishedAt,
          live: true
        });
        return;
      }

      const latestItem = await youtubeSearch({ liveOnly: false });

      if (latestItem?.id?.videoId) {
        renderYoutubeVideo({
          videoId: latestItem.id.videoId,
          title: latestItem.snippet?.title,
          publishedAt: latestItem.snippet?.publishedAt,
          live: false
        });
      }
    } catch (error) {
      console.warn("YouTube integration gagal dimuat:", error);
    }
  };

  const initYear = () => {
    const year = qs("#current-year");
    if (year) year.textContent = new Date().getFullYear();
  };

  renderSchedules();
  renderEvents();
  renderMinistries();
  initContent();
  initHeader();
  initMobileMenu();
  initYear();

  requestAnimationFrame(() => {
    initReveal();
  });

  initYouTube();
})();
