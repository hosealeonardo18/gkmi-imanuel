    <section class="section" id="ministry">
      <div class="container">
        <div class="section-heading reveal">
          <div>
            <p class="eyebrow">PELAYANAN</p>
            <h2>Bertumbuh dan melayani bersama.</h2>
          </div>
          <p>Temukan ruang untuk terhubung, bertumbuh, dan melayani.</p>
        </div>

        <div class="ministry-grid" id="ministry-grid">
          @foreach ($ministries as $ministry)
            <a class="ministry-card reveal" href="{{ route('ministry.show', $ministry['slug']) }}" aria-label="Detail pelayanan {{ $ministry['name'] }}">
              @if ($ministry['image'])
                <img
                  src="{{ $ministry['image'] }}"
                  alt="{{ $ministry['name'] }} Ministry"
                  loading="lazy"
                >
              @endif
              <h3>{{ $ministry['name'] }}</h3>
              <span>
                {{ $ministry['subtitle'] ?? $ministry['name'] . ' Ministry' }}
                <b>→</b>
              </span>
            </a>
          @endforeach
        </div>
      </div>
    </section>