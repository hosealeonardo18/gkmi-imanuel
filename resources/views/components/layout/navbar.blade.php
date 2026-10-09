  <header class="site-header" id="site-header">
    <div class="container nav-wrap">
      <a class="brand" href="{{ route('home') }}#home" aria-label="GKMI Imanuel Cipayung">
        <span class="brand-mark" aria-hidden="true">✦</span>
        <span class="brand-copy">
          <strong data-church-name>GKMI Imanuel</strong>
          <small>Cipayung</small>
        </span>
      </a>

      <nav class="desktop-nav" aria-label="Navigasi utama">
        <a href="{{ route('home') }}#home">Home</a>
        <a href="{{ route('home') }}#about">Tentang</a>
        <a href="{{ route('home') }}#schedule">Ibadah</a>
        <a href="{{ route('home') }}#ministry">Pelayanan</a>
        <a href="{{ route('home') }}#events">Kegiatan</a>
        <a href="{{ route('home') }}#contact">Kontak</a>
      </nav>

      <a class="button button-small button-dark desktop-cta" href="{{ route('home') }}#contact">
        Kunjungi Kami <span>→</span>
      </a>

      <button class="menu-toggle" id="menu-toggle" aria-label="Buka menu" aria-expanded="false">
        <span></span><span></span>
      </button>
    </div>
  </header>

  <div class="mobile-menu" id="mobile-menu" aria-hidden="true">
    <div class="mobile-menu-inner">
      <div class="mobile-menu-top">
        <div class="brand">
          <span class="brand-mark">✦</span>
          <span class="brand-copy">
            <strong>GKMI Imanuel</strong>
            <small>Cipayung</small>
          </span>
        </div>
        <button class="mobile-close" id="mobile-close" aria-label="Tutup menu">×</button>
      </div>

      <nav class="mobile-nav">
        <a href="{{ route('home') }}#home">Home</a>
        <a href="{{ route('home') }}#about">Tentang</a>
        <a href="{{ route('home') }}#schedule">Ibadah</a>
        <a href="{{ route('home') }}#ministry">Pelayanan</a>
        <a href="{{ route('home') }}#events">Kegiatan</a>
        <a href="{{ route('home') }}#contact">Kontak</a>
      </nav>

      <div class="mobile-social">
        <a data-instagram-link href="#" target="_blank" rel="noreferrer">Instagram</a>
        <a data-youtube-link href="{{ config('services.youtube.channel_id') ? 'https://www.youtube.com/channel/' . config('services.youtube.channel_id') : route('home') . '#service' }}" target="_blank" rel="noreferrer">YouTube</a>
      </div>

      <a class="button button-dark" href="{{ route('home') }}#contact">Kunjungi Kami →</a>
    </div>
  </div>