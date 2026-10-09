    <section class="section section-soft" id="schedule">
      <div class="container">
        <div class="section-heading reveal">
          <div>
            <p class="eyebrow">JADWAL IBADAH</p>
            <h2>Beribadah bersama kami.</h2>
          </div>
          <p>Temukan waktu yang sesuai untuk hadir dan bertumbuh bersama.</p>
        </div>

        <div class="schedule-list" id="schedule-list">
          @forelse ($schedules as $schedule)
            <div class="schedule-row reveal">
              <span class="index">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
              <span class="name">{{ $schedule['name'] }}</span>
              <span class="day">{{ $schedule['day'] }}</span>
              <span class="time">{{ $schedule['time'] }}</span>
              <a class="row-arrow" href="#contact" aria-label="Informasi {{ $schedule['name'] }}">→</a>
            </div>
          @empty
            <p class="body-copy">Jadwal ibadah belum tersedia. Hubungi kami untuk informasi lebih lanjut.</p>
          @endforelse
        </div>
      </div>
    </section>
