import { formatDate } from '../functions/format-date';

export const initYouTube = async () => {
  const config = window.SITE_CONFIG || {};
  const yt = config.youtube || {};

  const renderYoutubeVideo = ({ videoId, title, publishedAt, live = false }) => {
    const stage = document.querySelector("#youtube-stage");
    const titleEl = document.querySelector("#youtube-title");
    const dateEl = document.querySelector("#youtube-date");
    const statusEl = document.querySelector("#youtube-status");
    const watchLink = document.querySelector("#youtube-watch-link");

    if (!videoId || !stage) return;

    stage.innerHTML = `<iframe
      src="https://www.youtube.com/embed/${encodeURIComponent(videoId)}"
      title="${title || "YouTube video"}"
      loading="lazy"
      allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
      allowfullscreen
    ></iframe>`;

    if (titleEl) titleEl.textContent = title || yt.channelName || "";
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
