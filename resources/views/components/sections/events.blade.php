    <section class="section section-soft" id="events">
      <div class="container">
        <div class="section-heading reveal">
          <div>
            <p class="eyebrow">UPCOMING</p>
            <h2>Kegiatan yang akan datang.</h2>
          </div>
          <p>Temukan waktu untuk beribadah, bersekutu, dan bertumbuh bersama.</p>
        </div>

        <div class="event-list" id="event-list">
          @forelse ($events as $event)
            <article class="event-row reveal">
              <div class="event-date">
                <strong>{{ $event['date'] }}</strong>
                <span>{{ $event['month'] }} {{ $event['year'] ?? '' }}</span>
              </div>
              <div class="event-copy">
                <h3>{{ $event['title'] }}</h3>
                <p>{{ $event['location'] }}</p>
              </div>
              <span class="event-time">{{ $event['time'] }}</span>
              <a class="row-arrow" href="#contact" aria-label="Informasi {{ $event['title'] }}">→</a>
            </article>
          @empty
            <p class="body-copy">Belum ada kegiatan yang dijadwalkan. Nantikan informasi berikutnya.</p>
          @endforelse
        </div>
      </div>
    </section>