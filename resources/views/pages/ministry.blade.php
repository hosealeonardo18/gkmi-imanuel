@extends('layouts.app')

@section('title', $ministry['subtitle'] . ' — ' . config('church.name'))
@section('description', $ministry['description'])

@section('content')
  <section class="section ministry-detail">
    <div class="container">
      <a class="text-link ministry-back" href="{{ route('home') }}#ministry">← Kembali ke pelayanan</a>
      <div class="split-section">
        <div class="section-media">
          <img src="{{ $ministry['image'] }}" alt="Pelayanan {{ $ministry['name'] }}" width="600" height="500" fetchpriority="high">
        </div>
        <div class="section-copy">
          <p class="eyebrow">PELAYANAN · {{ config('church.name') }}</p>
          <h1>{{ $ministry['subtitle'] }}</h1>
          <p class="body-copy">{{ $ministry['description'] }}</p>
          <h2 class="ministry-focus-title">Fokus pelayanan</h2>
          <ul class="ministry-focus">
            @foreach ($ministry['focus'] as $focus)
              <li>{{ $focus }}</li>
            @endforeach
          </ul>
          <p class="body-copy">Ingin mengenal atau terlibat dalam pelayanan ini? Hubungi gereja untuk informasi kegiatan dan cara bergabung.</p>
          <a class="button button-dark" href="{{ route('home') }}#contact">Hubungi kami <span>→</span></a>
        </div>
      </div>
    </div>
  </section>
@endsection
