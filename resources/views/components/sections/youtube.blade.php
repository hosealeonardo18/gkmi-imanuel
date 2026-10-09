    <section class="section" id="service">
      <div class="container">
        <div class="section-heading section-heading-inline reveal">
          <div>
            <p class="eyebrow">LATEST SERVICE</p>
            <h2>Ibadah terbaru.</h2>
          </div>
          <a class="text-link" data-youtube-link href="{{ $youtube['watch_url'] ?? (config('services.youtube.channel_id') ? 'https://www.youtube.com/channel/' . config('services.youtube.channel_id') : '#service') }}" target="_blank" rel="noreferrer">
            Lihat YouTube <span>→</span>
          </a>
        </div>

        <article class="youtube-card reveal">
          <div class="youtube-stage" id="youtube-stage">
            @if ($youtube)
              <iframe
                src="{{ $youtube['embed_url'] }}"
                title="{{ $youtube['title'] }}"
                loading="lazy"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen
              ></iframe>
            @else
              <div class="youtube-placeholder">
                <div class="play-button">▶</div>
                <span>Video ibadah belum tersedia.</span>
              </div>
            @endif
          </div>

          <div class="youtube-meta">
            <div>
              <span class="live-pill {{ ($youtube['is_live'] ?? false) ? 'is-live' : '' }}" id="youtube-status">{{ ($youtube['is_live'] ?? false) ? 'LIVE NOW' : 'LATEST SERVICE' }}</span>
              <h3 id="youtube-title">{{ $youtube['title'] ?? config('church.name') }}</h3>
              <p id="youtube-date">
                @if ($youtube['is_live'] ?? false)
                  Sedang berlangsung sekarang
                @elseif (! empty($youtube['published_at']))
                  <time datetime="{{ $youtube['published_at'] }}">{{ $youtube['published_at'] }}</time>
                @else
                  Silakan kunjungi channel YouTube kami untuk melihat ibadah.
                @endif
              </p>
            </div>
            <a class="text-link" id="youtube-watch-link" data-youtube-link href="{{ $youtube['watch_url'] ?? (config('services.youtube.channel_id') ? 'https://www.youtube.com/channel/' . config('services.youtube.channel_id') : '#service') }}" target="_blank" rel="noreferrer">
              Watch on YouTube <span>→</span>
            </a>
          </div>
        </article>
      </div>
    </section>