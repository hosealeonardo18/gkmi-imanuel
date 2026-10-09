<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="description" content="@yield('description', 'Landing page GKMI Imanuel Cipayung')" />
  <title>@yield('title', config('church.name', 'GKMI Imanuel Cipayung'))</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
  @include('components.layout.navbar')

  <main>
    @yield('content')
  </main>

  @include('components.layout.footer')

  <script>
    // Provide config data to JS
    window.SITE_CONFIG = {
      church: @json(config('church')),
      schedules: @json(config('church.schedules')),
      events: @json(config('church.events')),
      ministries: @json(config('church.ministries')),
      hero: @json(config('church.hero')),
      about: @json(config('church.about'))
    };
  </script>
</body>
</html>
