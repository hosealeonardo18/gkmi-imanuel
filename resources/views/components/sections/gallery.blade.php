<section class="section gallery-section" id="gallery">
  <div class="container">
    <div class="section-heading reveal">
      <div>
        <p class="eyebrow">LIFE AT CHURCH</p>
        <h2>Kehidupan dalam komunitas.</h2>
      </div>
      <p>Kebersamaan dalam pelayanan dan pertumbuhan. Pilih foto untuk melihat lebih dekat.</p>
    </div>

    <div class="gallery-grid">
      @foreach ($church['gallery'] as $photo)
        <a
          class="gallery-item {{ $loop->first ? 'gallery-item-large' : ($loop->last ? 'gallery-item-tall' : '') }} reveal-image"
          href="{{ $photo['image'] }}"
          data-gallery-photo
          data-title="{{ $photo['title'] }}"
          data-description="{{ $photo['description'] }}"
          aria-label="Lihat foto: {{ $photo['title'] }}"
          aria-haspopup="dialog"
        >
          <img src="{{ $photo['image'] }}" alt="{{ $photo['title'] }} — {{ $church['name'] }}" width="600" height="500" loading="lazy">
          <span class="gallery-caption">{{ $photo['title'] }} <span aria-hidden="true">↗</span></span>
        </a>
      @endforeach
    </div>
  </div>

  <dialog class="gallery-dialog" id="gallery-dialog" aria-labelledby="gallery-detail-title" aria-describedby="gallery-detail-description">
    <div class="gallery-dialog-toolbar">
      <span class="eyebrow">LIFE AT CHURCH</span>
      <form method="dialog">
        <button class="gallery-close" aria-label="Tutup detail foto" autofocus>×</button>
      </form>
    </div>
    <img class="gallery-detail-image" id="gallery-detail-image" alt="">
    <div class="gallery-detail-footer">
      <div>
        <h3 id="gallery-detail-title"></h3>
        <p id="gallery-detail-description"></p>
      </div>
      <div class="gallery-controls">
        <button type="button" id="gallery-previous" aria-label="Foto sebelumnya">←</button>
        <span id="gallery-counter" aria-live="polite" aria-atomic="true"></span>
        <button type="button" id="gallery-next" aria-label="Foto berikutnya">→</button>
      </div>
    </div>
  </dialog>
</section>
