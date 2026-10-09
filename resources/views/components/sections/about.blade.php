    <section class="section" id="about">
      <div class="container split-section">
        <div class="section-media reveal-image">
          <img
            src="/images/about/church.jpg"
            alt="Gedung GKMI Imanuel Cipayung"
            width="600"
            height="500"
            loading="lazy"
          >
        </div>

        <div class="section-copy">
          <p class="eyebrow reveal">TENTANG KAMI</p>
          <h2 class="reveal reveal-delay-1" data-church-name>GKMI Imanuel Cipayung</h2>
          <p class="body-copy reveal reveal-delay-2" data-about-copy>
            {{ $church['about']['description'] }}
          </p>
          <details class="about-details reveal reveal-delay-3">
            <summary class="text-link">Kenali kami lebih dekat <span aria-hidden="true">+</span></summary>
            <div class="about-details-content">
              @foreach ($church['about']['details'] as $detail)
                <h3>{{ $detail['title'] }}</h3>
                <p class="body-copy">{{ $detail['description'] }}</p>
              @endforeach
              <a class="text-link" href="#schedule">Lihat jadwal ibadah <span>→</span></a>
              <a class="text-link" href="#contact">Rencanakan kunjungan <span>→</span></a>
            </div>
          </details>
        </div>
      </div>
    </section>