  <footer class="footer">
    <div class="container">
      <div class="footer-top">
        <div class="footer-brand">
          <span class="brand-mark">✦</span>
          <h2>GKMI<br>Imanuel Cipayung</h2>
          <p>Sebuah komunitas untuk bertumbuh bersama dalam iman, kasih, dan pengharapan.</p>
        </div>

        <div class="footer-links">
          <div>
            <span>Navigation</span>
            <a href="{{ route('home') }}#home">Home</a>
            <a href="{{ route('home') }}#about">Tentang</a>
            <a href="{{ route('home') }}#schedule">Ibadah</a>
            <a href="{{ route('home') }}#ministry">Pelayanan</a>
            <a href="{{ route('home') }}#events">Kegiatan</a>
          </div>
          <div>
            <span>Social</span>
            <a data-instagram-link href="#" target="_blank" rel="noreferrer">Instagram</a>
            <a data-youtube-link href="{{ config('services.youtube.channel_id') ? 'https://www.youtube.com/channel/' . config('services.youtube.channel_id') : route('home') . '#service' }}" target="_blank" rel="noreferrer">YouTube</a>
            <a data-whatsapp-link href="#">WhatsApp</a>
          </div>
        </div>
      </div>

      <div class="footer-bottom">
        <span>© <span id="current-year"></span> GKMI Imanuel Cipayung</span>
        <span>Dibuat dengan kasih.</span>
      </div>
    </div>
  </footer>