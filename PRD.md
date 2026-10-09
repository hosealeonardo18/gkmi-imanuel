# PRODUCT REQUIREMENT DOCUMENT
## Landing Page GKMI Imanuel Cipayung

**Project Name:** GKMI Imanuel Cipayung Landing Page  
**Framework:** Laravel 12  
**Application Type:** Public Church Landing Page  
**Version:** 1.0  
**Status:** Planning / Ready for Development  
**Primary Language:** Bahasa Indonesia  
**Frontend Rendering:** Laravel Blade  
**Primary Integration:** YouTube Data API  

---

# 1. Product Overview

GKMI Imanuel Cipayung membutuhkan landing page resmi yang berfungsi sebagai pusat informasi digital gereja bagi jemaat maupun pengunjung baru.

Website harus memiliki tampilan:

- Minimalis.
- Modern.
- Clean.
- Warm.
- Responsive.
- Ringan.
- Cepat.
- Mudah di-maintain.
- Mudah dikembangkan.
- Memiliki reusable component.
- Memiliki animasi dan interaction yang subtle.
- Terintegrasi dengan YouTube.

Landing page tidak hanya berfungsi sebagai website informasi, tetapi juga harus memberikan user experience yang modern dan memudahkan pengunjung mengetahui:

- Identitas gereja.
- Jadwal ibadah.
- Ibadah terbaru.
- Live streaming.
- Upcoming event.
- Pelayanan.
- Aktivitas gereja.
- Lokasi.
- Contact.
- Social media.

---

# 2. Product Objective

Tujuan utama website adalah memberikan digital presence resmi untuk:

**GKMI Imanuel Cipayung**

Website harus mampu menjawab kebutuhan utama pengunjung:

```text
Siapa GKMI Imanuel Cipayung?
          ↓
Kapan ibadah berlangsung?
          ↓
Apa kegiatan terbaru?
          ↓
Apakah sedang Live?
          ↓
Bagaimana cara datang?
          ↓
Bagaimana menghubungi gereja?
```

---

# 3. User Target

## 3.1 Jemaat

Jemaat dapat:

- Melihat jadwal ibadah.
- Melihat event.
- Menonton ibadah terbaru.
- Menonton live streaming.
- Mengakses YouTube.
- Mengakses lokasi gereja.
- Melihat pelayanan.

## 3.2 Pengunjung Baru

Pengunjung baru dapat:

- Mengenal gereja.
- Mengetahui jadwal ibadah.
- Mengetahui lokasi.
- Melihat suasana dan aktivitas gereja.
- Mengetahui pelayanan yang tersedia.
- Merencanakan kunjungan.

---

# 4. Product Scope

Landing page memiliki section:

```text
01. Navbar
02. Hero
03. Quick Information
04. About
05. Worship Schedule
06. Latest Service / YouTube Live
07. Upcoming Events
08. Ministries
09. Gallery
10. New Here
11. Location & Contact
12. Footer
```

Website menggunakan konsep:

> Minimalist × Editorial × Warm × Modern Church

---

# 5. Technical Stack

## 5.1 Backend

```text
PHP
Laravel 12
```

Laravel bertanggung jawab untuk:

- Routing.
- Controller.
- Service layer.
- Configuration.
- Cache.
- YouTube integration.
- Environment configuration.
- Server-side rendering.
- Error handling.

---

# 6. Frontend Stack

Frontend menggunakan:

```text
Laravel Blade
Tailwind CSS
Custom CSS
Vanilla JavaScript
```

Tidak menggunakan framework JavaScript berat seperti:

- React.
- Vue.
- Angular.

Landing page tidak membutuhkan SPA sehingga server-side rendering Laravel lebih sederhana dan ringan.

---

# 7. Tailwind CSS Strategy

Untuk development dan production **tidak direkomendasikan menggunakan Tailwind Play CDN**.

Dokumentasi Tailwind menjelaskan bahwa Play CDN ditujukan untuk development dan bukan pilihan terbaik untuk production.

Walaupun server menggunakan shared hosting, Tailwind tetap dapat digunakan dengan cara:

```text
Development Computer
        ↓
npm / Vite
        ↓
Compile Tailwind
        ↓
Production CSS
        ↓
Upload ke Shared Hosting
```

Shared hosting **tidak harus menjalankan Node.js**.

Node.js hanya dibutuhkan saat proses development/build.

Production server hanya menerima hasil build:

```text
public/build/
```

### Recommended Architecture

```text
Development
Tailwind + Vite
      ↓
npm run build
      ↓
Production Assets
      ↓
Upload ke Shared Hosting
```

---

# 8. Blade Architecture

Blade hanya bertanggung jawab untuk markup dan rendering component.

Blade **tidak diperbolehkan memiliki inline CSS**.

Tidak diperbolehkan:

```html
<style>
...
</style>
```

Tidak diperbolehkan inline JavaScript:

```html
<script>
...
</script>
```

Tidak diperbolehkan:

```html
<div style="background:red">
```

Blade hanya boleh melakukan:

```text
HTML
Blade Directive
Blade Component
Data Rendering
CSS Class
Component Props
```

---

# 9. Asset Loading

Main layout hanya memanggil file asset.

Contoh:

```blade
@vite([
    'resources/css/app.css',
    'resources/js/app.js'
])
```

Tidak diperbolehkan menaruh logic JavaScript langsung di Blade.

---

# 10. Blade Component Architecture

Website menggunakan reusable Blade Components.

Contoh struktur:

```text
resources/
└── views/
    ├── layouts/
    │   └── app.blade.php
    │
    ├── pages/
    │   └── home.blade.php
    │
    └── components/
        ├── layout/
        │   ├── navbar.blade.php
        │   └── footer.blade.php
        │
        ├── ui/
        │   ├── button.blade.php
        │   ├── section-title.blade.php
        │   ├── arrow-link.blade.php
        │   ├── image.blade.php
        │   └── badge.blade.php
        │
        └── sections/
            ├── hero.blade.php
            ├── quick-info.blade.php
            ├── about.blade.php
            ├── schedule.blade.php
            ├── latest-service.blade.php
            ├── events.blade.php
            ├── ministries.blade.php
            ├── gallery.blade.php
            ├── new-here.blade.php
            └── contact.blade.php
```

---

# 11. Dynamic Component Strategy

Dynamic component digunakan pada section landing page apabila section perlu dirender berdasarkan konfigurasi.

Contoh konsep:

```blade
@foreach ($sections as $section)

    <x-dynamic-component
        :component="$section['component']"
        :data="$section['data'] ?? []"
    />

@endforeach
```

Contoh configuration:

```php
return [

    [
        'component' => 'sections.hero',
    ],

    [
        'component' => 'sections.about',
    ],

    [
        'component' => 'sections.schedule',
    ],

    [
        'component' => 'sections.latest-service',
    ],

];
```

Dengan pendekatan ini urutan section dapat dikembangkan tanpa membuat `home.blade.php` terlalu panjang.

---

# 12. Component Reusability Rule

Developer wajib melakukan pengecekan sebelum membuat component/function baru.

Jika sebuah UI digunakan minimal dua kali, pertimbangkan menjadi reusable component.

Contoh:

```text
Button
Arrow Link
Section Heading
Image Wrapper
Container
Badge
Social Link
Event Row
Schedule Row
```

Tidak diperbolehkan membuat component baru jika hanya menyebabkan unnecessary abstraction.

Tujuan:

> Reusable, tetapi tidak over-engineered.

---

# 13. JavaScript Architecture

JavaScript harus modular.

Tidak diperbolehkan membuat satu file JavaScript berisi seluruh logic aplikasi.

Recommended structure:

```text
resources/js/
│
├── app.js
│
├── modules/
│   ├── navbar.js
│   ├── mobile-menu.js
│   ├── scroll-animation.js
│   ├── youtube-player.js
│   └── smooth-scroll.js
│
└── functions/
    ├── debounce.js
    ├── throttle.js
    ├── element-visible.js
    └── format-date.js
```

Hasil build akan masuk:

```text
public/build/
```

---

# 14. Reusable JavaScript Function

Function generik harus reusable.

Contoh:

```javascript
export function debounce(callback, delay = 250) {
    let timer;

    return (...args) => {
        clearTimeout(timer);

        timer = setTimeout(() => {
            callback(...args);
        }, delay);
    };
}
```

Tidak diperbolehkan membuat duplicate utility function pada beberapa module.

---

# 15. CSS Architecture

CSS dipisahkan berdasarkan responsibility.

Recommended:

```text
resources/css/
│
├── app.css
│
├── base/
│   ├── variables.css
│   ├── typography.css
│   └── reset.css
│
├── components/
│   ├── button.css
│   ├── navbar.css
│   ├── card.css
│   └── section-title.css
│
├── sections/
│   ├── hero.css
│   ├── about.css
│   ├── schedule.css
│   ├── youtube.css
│   ├── event.css
│   ├── ministry.css
│   ├── gallery.css
│   └── contact.css
│
└── utilities/
    └── animation.css
```

`app.css` hanya bertugas meng-import file CSS lainnya.

Contoh:

```css
@import "./base/variables.css";
@import "./base/typography.css";

@import "./components/button.css";
@import "./components/navbar.css";

@import "./sections/hero.css";
@import "./sections/about.css";
```

---

# 16. Image Asset Management

Seluruh image disimpan di:

```text
public/images/
```

Recommended structure:

```text
public/images/
│
├── brand/
│   ├── logo.webp
│   └── favicon.webp
│
├── hero/
│   └── hero.webp
│
├── about/
│   └── church.webp
│
├── ministries/
│   ├── youth.webp
│   ├── children.webp
│   ├── worship.webp
│   ├── family.webp
│   └── prayer.webp
│
└── gallery/
    ├── gallery-01.webp
    ├── gallery-02.webp
    └── gallery-03.webp
```

---

# 17. Image Optimization Standard

Image tidak boleh menggunakan file besar tanpa kebutuhan.

Format utama:

```text
WebP
```

AVIF dapat digunakan sebagai optional optimization.

Recommended maximum:

```text
Hero Image
≤ 300–400 KB

Regular Image
≤ 150–250 KB

Thumbnail
≤ 100 KB

Logo
≤ 100 KB
```

Dimension gambar harus menyesuaikan ukuran rendering.

Tidak diperbolehkan menggunakan gambar:

```text
6000 × 4000px
```

jika hanya ditampilkan:

```text
800 × 600px
```

---

# 18. Image Loading Strategy

Image di bawah viewport menggunakan:

```html
loading="lazy"
```

Hero image tidak menggunakan lazy load karena merupakan LCP candidate.

Hero dapat menggunakan:

```html
fetchpriority="high"
```

Image wajib memiliki:

```text
width
height
alt
```

untuk mengurangi layout shift.

---

# 19. YouTube Integration

Landing page terintegrasi dengan channel:

**GKMI Imanuel Cipayung**

Backend Laravel melakukan komunikasi dengan YouTube Data API.

JavaScript browser tidak diperbolehkan memegang YouTube API Secret/API Key sensitif.

---

# 20. YouTube Integration Architecture

```text
Visitor
   ↓
Laravel Controller
   ↓
LandingPageService
   ↓
YouTubeService
   ↓
Laravel Cache
   ↓
YouTube Data API
```

Browser tidak langsung memanggil API YouTube untuk mengambil data channel.

---

# 21. YouTube Service

Recommended class:

```text
app/
└── Services/
    └── YouTube/
        ├── YouTubeService.php
        └── YouTubeVideoData.php
```

Respons service:

```php
[
    'video_id' => '',
    'title' => '',
    'thumbnail' => '',
    'published_at' => '',
    'is_live' => false,
]
```

---

# 22. YouTube Logic

Flow:

```text
Request Landing Page
        ↓
Check Cache Live Video
        ↓
Cache Available?
 ┌───────────────┐
 YES             NO
 ↓                ↓
Return        Call YouTube API
                  ↓
              Search Live
                  ↓
           Live Available?
           ┌─────┴─────┐
           YES         NO
           ↓            ↓
       Live Video   Latest Video
           ↓            ↓
           └─────┬──────┘
                 ↓
              Cache
                 ↓
               View
```

---

# 23. YouTube Priority

Prioritas konten:

```text
1. Active Livestream
2. Latest YouTube Video
3. Fallback Content
```

Jika API YouTube gagal:

Website **tetap harus dapat ditampilkan**.

Latest Service section menampilkan fallback.

---

# 24. Application Cache Strategy

Caching merupakan mandatory requirement.

Laravel menyediakan mekanisme seperti `Cache::remember()` dan `Cache::flexible()` untuk menyimpan hasil proses/API agar tidak dilakukan pada setiap request.

Recommended cache:

| Data | Cache TTL |
|---|---:|
| Active YouTube Live | 1–2 menit |
| Latest YouTube Video | 10–15 menit |
| Channel Information | 24 jam |
| Landing configuration | 1 jam / static |
| Event | 30–60 menit |
| Schedule | 1 jam / static |

---

# 25. Cache Driver

Karena target menggunakan shared hosting, initial recommendation:

```env
CACHE_STORE=file
```

Keuntungan:

- Tidak membutuhkan Redis.
- Tidak membutuhkan service tambahan.
- Mudah digunakan pada shared hosting.

Jika database tersedia dan file caching bermasalah:

```env
CACHE_STORE=database
```

Redis tidak menjadi mandatory requirement untuk Phase 1.

---

# 26. Cache Example

```php
$video = Cache::remember(
    'youtube.latest-video',
    now()->addMinutes(15),
    fn () => $this->youtubeService->getLatestVideo()
);
```

---

# 27. Cache Key Standard

Cache key harus memiliki namespace.

Contoh:

```text
church.youtube.live
church.youtube.latest
church.youtube.channel
church.events.active
church.schedule
church.settings
```

Hindari:

```text
latest
data
cache
video
```

karena terlalu generic.

---

# 28. Laravel Optimization

Production deployment harus menjalankan optimization Laravel.

Laravel menyediakan view cache sehingga Blade dapat diprecompile dan tidak perlu selalu dikompilasi saat request.

Deployment command:

```bash
php artisan optimize
```

atau granular:

```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

---

# 29. HTTP Cache

Static/public response yang sesuai dapat menggunakan HTTP cache header.

Laravel menyediakan `cache.headers` middleware termasuk dukungan `max_age`, `stale_while_revalidate`, dan ETag.

Penggunaannya harus mempertimbangkan data live YouTube agar informasi live tidak terlalu lama tersimpan di browser.

---

# 30. Controller Architecture

Controller harus tipis.

Recommended:

```text
app/
└── Http/
    └── Controllers/
        └── HomeController.php
```

Controller tidak melakukan:

- YouTube API processing.
- Business logic.
- Cache implementation detail.
- Data transformation kompleks.

Controller hanya:

```text
Request
↓
Service
↓
View
```

---

# 31. Example Controller

```php
final class HomeController extends Controller
{
    public function __construct(
        private readonly LandingPageService $landingPageService
    ) {
    }

    public function index(): View
    {
        return view(
            'pages.home',
            $this->landingPageService->getData()
        );
    }
}
```

---

# 32. Service Architecture

Recommended:

```text
app/
└── Services/
    ├── LandingPageService.php
    │
    └── YouTube/
        ├── YouTubeService.php
        └── YouTubeVideoData.php
```

`LandingPageService` bertanggung jawab mengumpulkan:

```text
Church Information
Schedule
Upcoming Event
Ministry
Gallery
YouTube Data
```

---

# 33. Repository Pattern

Repository Pattern **tidak menjadi mandatory requirement pada Phase 1**.

Alasannya:

Landing page belum memiliki domain/database kompleks.

Architecture:

```text
Controller
    ↓
Service
    ↓
Config / API
```

lebih sederhana dibanding:

```text
Controller
↓
Service
↓
Repository
↓
Config
```

Jika nanti dibangun CMS/Admin dan data berasal dari database, repository/data abstraction dapat ditambahkan.

---

# 34. Configuration Architecture

Static website information dapat diletakkan pada:

```text
config/church.php
```

Contoh:

```php
return [

    'name' => 'GKMI Imanuel Cipayung',

    'hero' => [
        'eyebrow' => 'Selamat Datang di',
        'description' => '...',
    ],

    'contact' => [
        'address' => '',
        'whatsapp' => '',
        'instagram' => '',
    ],

];
```

Dengan pendekatan ini:

Content tidak tersebar di Blade.

---

# 35. Environment Configuration

Secret atau credential wajib diletakkan pada `.env`.

Contoh:

```env
YOUTUBE_API_KEY=
YOUTUBE_CHANNEL_ID=

GOOGLE_MAPS_EMBED_URL=

APP_ENV=production
APP_DEBUG=false
```

---

# 36. ENV Access Rule

Tidak diperbolehkan memanggil:

```php
env('YOUTUBE_API_KEY')
```

langsung dari Service atau Controller.

ENV hanya digunakan dari config.

Contoh:

```php
// config/services.php

'youtube' => [
    'api_key' => env('YOUTUBE_API_KEY'),
    'channel_id' => env('YOUTUBE_CHANNEL_ID'),
],
```

Service mengambil:

```php
config('services.youtube.api_key');
```

Hal ini juga penting karena Laravel configuration caching mengharuskan pemanggilan `env()` dilakukan melalui file configuration.

---

# 37. Security Requirements

Production:

```env
APP_ENV=production
APP_DEBUG=false
```

Credential tidak boleh:

- Commit ke Git.
- Ditulis di JavaScript.
- Ditulis di Blade.
- Ditulis langsung dalam Service.
- Ditampilkan pada error response.

`.env` wajib terdapat pada:

```text
.gitignore
```

---

# 38. Laravel Routing

Landing page menggunakan controller-based route.

```php
Route::get('/', [HomeController::class, 'index'])
    ->name('home');
```

Hindari business logic pada:

```text
routes/web.php
```

---

# 39. Main Blade

Main page harus sangat sederhana.

Contoh:

```blade
@extends('layouts.app')

@section('content')

    @foreach ($sections as $section)

        <x-dynamic-component
            :component="$section['component']"
            :data="$section['data'] ?? []"
        />

    @endforeach

@endsection
```

Tidak boleh berisi ratusan baris markup.

---

# 40. Layout Blade

`layouts/app.blade.php` bertanggung jawab untuk:

```text
doctype
html
head
meta
SEO
font
CSS
body
JS
```

---

# 41. Animation

Animation menggunakan:

```text
CSS
IntersectionObserver
Vanilla JavaScript
```

Tidak membutuhkan library animation besar pada Phase 1.

Effects:

- Fade Up.
- Fade In.
- Image Reveal.
- Stagger.
- Navbar transition.
- Hover animation.
- Subtle image scale.

---

# 42. Scroll Animation

JavaScript reusable:

```text
scroll-animation.js
```

Semua section menggunakan system yang sama.

Tidak membuat animation logic terpisah untuk setiap section jika behavior sama.

---

# 43. Reduced Motion

Website harus menghormati:

```css
@media (prefers-reduced-motion: reduce)
```

Animation dikurangi atau dinonaktifkan untuk user yang memiliki accessibility preference tersebut.

---

# 44. Design System

Typography:

```text
Montserrat
```

Color:

```text
Background
#FAFAF8

Secondary
#F3F2EE

Primary Text
#252525

Secondary Text
#77736E

Border
#E7E4DF

Soft Accent
#D5D0C8
```

---

# 45. Responsive Requirement

Website wajib mendukung:

```text
Mobile
Tablet
Laptop
Desktop
Large Desktop
```

Minimum recommended testing:

```text
360px
390px
768px
1024px
1280px
1440px
```

---

# 46. Mobile First

Primary optimization dilakukan pada mobile.

Alasan utama:

Mayoritas user kemungkinan membuka link gereja dari:

```text
WhatsApp
Instagram
Google Search
YouTube
```

yang dominan digunakan melalui smartphone.

---

# 47. Performance Requirement

Performance menjadi mandatory requirement.

Target initial:

```text
Lighthouse Performance ≥ 90
Accessibility ≥ 90
Best Practices ≥ 90
SEO ≥ 90
```

Target Core Web Vitals:

```text
LCP < 2.5 sec
CLS < 0.1
INP < 200 ms
```

Target tersebut berlaku sebagai target engineering dan dapat dipengaruhi oleh kualitas shared hosting serta third-party embed.

---

# 48. Third Party Embed Strategy

YouTube iframe tidak harus langsung dimuat saat initial page load.

Recommended:

```text
Thumbnail
    ↓
User Click
    ↓
Load YouTube iframe
```

Tujuan:

Mengurangi initial JavaScript dan resource dari YouTube.

Pattern ini dapat disebut:

**Lite YouTube Embed**

---

# 49. Google Maps Strategy

Google Maps iframe juga tidak harus menjadi resource pertama yang dimuat.

Gunakan:

```text
loading="lazy"
```

atau tampilkan static placeholder/map button terlebih dahulu.

---

# 50. Font Strategy

Font:

**Montserrat**

Recommended:

- Google Fonts dengan preload/preconnect.
- Atau self-host WOFF2 jika diperlukan kemudian.

Weight yang digunakan dibatasi:

```text
400
500
600
700
```

Tidak perlu mengunduh semua weight Montserrat.

---

# 51. SEO Requirement

Page wajib memiliki:

```text
title
meta description
canonical
Open Graph
Twitter Card
favicon
structured heading
alt image
```

---

# 52. Suggested SEO Title

```text
GKMI Imanuel Cipayung | Gereja & Jadwal Ibadah
```

---

# 53. Open Graph

Saat website dibagikan melalui WhatsApp/social media harus menampilkan:

```text
Image
Title
Description
Website URL
```

Recommended OG image:

```text
1200 × 630 px
```

Optimized WebP/JPG.

---

# 54. Accessibility

Minimum:

- Semantic HTML.
- Button dapat digunakan keyboard.
- Image memiliki alt.
- Contrast cukup.
- Focus state terlihat.
- Navigation memiliki label.
- Mobile menu menggunakan aria attributes.
- Reduced motion support.

---

# 55. Error Handling

Jika YouTube API gagal:

```text
Website tetap load
↓
Service menangkap exception
↓
Return cached/fallback data
↓
Log error
```

Tidak diperbolehkan error API menyebabkan landing page HTTP 500.

---

# 56. Logging

External API failure dapat dicatat melalui Laravel log.

Contoh:

```php
Log::warning(
    'Failed to retrieve YouTube latest video',
    [
        'exception' => $exception->getMessage(),
    ]
);
```

Credential tidak boleh ikut masuk ke log.

---

# 57. Recommended Project Structure

```text
app/
├── Http/
│   └── Controllers/
│       └── HomeController.php
│
├── Services/
│   ├── LandingPageService.php
│   │
│   └── YouTube/
│       ├── YouTubeService.php
│       └── YouTubeVideoData.php
│
└── View/
    └── Components/


config/
├── church.php
└── services.php


resources/
├── views/
│   ├── layouts/
│   │   └── app.blade.php
│   │
│   ├── pages/
│   │   └── home.blade.php
│   │
│   └── components/
│       ├── layout/
│       ├── ui/
│       └── sections/
│
├── css/
│   ├── app.css
│   ├── base/
│   ├── components/
│   ├── sections/
│   └── utilities/
│
└── js/
    ├── app.js
    ├── modules/
    └── functions/


public/
├── images/
│   ├── brand/
│   ├── hero/
│   ├── about/
│   ├── ministries/
│   └── gallery/
│
└── build/


routes/
└── web.php
```

---

# 58. Coding Standard

Development wajib mengikuti:

```text
PSR-12
Laravel Convention
Single Responsibility Principle
DRY
KISS
Reusable Component
Dependency Injection
Strict Naming
Small Functions
Readable Code
```

---

# 59. Naming Convention

Class:

```text
PascalCase
```

Contoh:

```text
LandingPageService
YouTubeService
HomeController
```

Method:

```text
camelCase
```

Contoh:

```text
getLatestVideo()
getActiveLiveStream()
getLandingPageData()
```

CSS:

```text
kebab-case
```

JavaScript:

```text
camelCase
```

---

# 60. Function Rule

Function sebaiknya melakukan **satu responsibility**.

Hindari:

```text
getYouTubeAndScheduleAndEventsAndRenderEverything()
```

Gunakan:

```text
getLiveVideo()
getLatestVideo()
getSchedules()
getEvents()
```

---

# 61. Dependency Injection

Tidak disarankan:

```php
$youtube = new YouTubeService();
```

Gunakan constructor injection:

```php
public function __construct(
    private readonly YouTubeService $youtubeService
) {
}
```

---

# 62. Shared Hosting Compatibility

Production architecture harus compatible dengan shared hosting.

Tidak mandatory:

```text
Redis
Docker
Supervisor
Node Runtime
WebSocket
Queue Worker
```

Build frontend dilakukan sebelum deployment.

Production server hanya membutuhkan:

```text
PHP
Laravel
Composer dependencies
Database jika diperlukan
Static build assets
```

---

# 63. Deployment Strategy

Recommended deployment:

```text
Development Local
        ↓
composer install
        ↓
npm install
        ↓
npm run build
        ↓
Test
        ↓
Upload Project
        ↓
composer install --no-dev
        ↓
Configure .env
        ↓
Laravel Optimize
        ↓
Production
```

---

# 64. Production Command

Recommended:

```bash
composer install --no-dev --optimize-autoloader

php artisan optimize
```

Laravel menyediakan caching untuk configuration, routes, dan views guna mengurangi kerja framework saat production request. View caching secara khusus menghindari compilation Blade on-demand.

---

# 65. Public Directory

Domain harus diarahkan ke:

```text
/project/public
```

Tidak ke project root.

Tujuan:

File internal seperti:

```text
.env
vendor
storage
config
```

tidak terekspos melalui web.

---

# 66. Functional Acceptance Criteria

Landing page dinyatakan memenuhi requirement Phase 1 jika:

```text
✓ Landing page dapat dibuka tanpa login.

✓ Responsive pada mobile, tablet, dan desktop.

✓ Navbar sticky bekerja.

✓ Mobile menu bekerja.

✓ Hero animation bekerja.

✓ Scroll animation bekerja.

✓ Jadwal ibadah tampil.

✓ Upcoming event tampil.

✓ Ministry tampil.

✓ Gallery tampil.

✓ Contact dan lokasi tampil.

✓ Latest YouTube video dapat tampil.

✓ Jika terdapat live stream, live menjadi prioritas.

✓ Jika YouTube API gagal, website tetap berjalan.

✓ Data YouTube menggunakan caching.

✓ Secret/API key berada di ENV.

✓ Blade tidak memiliki inline CSS.

✓ Blade tidak memiliki inline JavaScript.

✓ JavaScript modular.

✓ CSS modular.

✓ Reusable UI menggunakan Blade component.

✓ Image berada di public/images.

✓ Image sudah dioptimasi.

✓ Production APP_DEBUG=false.

✓ Laravel production cache diaktifkan.
```

---

# 67. Out of Scope Phase 1

Belum termasuk:

```text
CMS Admin
Authentication
Member Portal
Prayer Request Database
Article Management
Sermon Management
Event Registration
Online Offering
Push Notification
Newsletter
Multi-language
```

Fitur tersebut dapat menjadi Phase 2.

---

# 68. Future Development

Architecture Phase 1 harus memungkinkan penambahan:

```text
/admin
```

di masa depan untuk mengatur:

- Hero.
- Jadwal ibadah.
- Event.
- Ministry.
- Gallery.
- Contact.
- Announcement.

Tanpa melakukan rewrite total terhadap frontend.

---

# 69. Recommended Architecture Summary

```text
Browser
   ↓
Laravel Route
   ↓
HomeController
   ↓
LandingPageService
   ├── Church Config
   ├── Schedule
   ├── Event
   ├── Ministry
   │
   └── YouTubeService
          ↓
       Laravel Cache
          ↓
     YouTube Data API
   ↓
Blade Components
   ↓
HTML
   ↓
Compiled CSS + JS
```

---

# 70. Final Technical Decision

## Backend

```text
Laravel 12
```

## Frontend

```text
Blade
Tailwind CSS
Custom CSS
Vanilla JS
```

## Tailwind

```text
Compile locally using Vite
Upload production output
No Tailwind Play CDN in production
```

## Component

```text
Reusable Blade Components
Dynamic Component for configurable sections
```

## JavaScript

```text
Separate Module
Reusable Function
No Inline JS
```

## CSS

```text
Separate by Base / Component / Section / Utility
No Inline CSS
```

## Image

```text
public/images
WebP preferred
Lazy Loading
Compressed
Responsive
```

## Credential

```text
.env
↓
config/*
↓
Service
```

## Cache

```text
Laravel Cache
File Driver as initial shared-hosting option
YouTube Response Cache
Laravel View / Route / Config Cache
```

## Architecture Principle

```text
Clean
Reusable
Simple
Fast
Maintainable
Shared Hosting Friendly
```

---

# 71. Development Priority

```text
PHASE 01
Project Setup
↓
Laravel Architecture
↓
Design System
↓
Reusable Components


PHASE 02
Navbar
↓
Hero
↓
About
↓
Schedule
↓
YouTube
↓
Events
↓
Ministry
↓
Gallery
↓
Contact
↓
Footer


PHASE 03
Animation
↓
Responsive
↓
YouTube Integration
↓
Caching


PHASE 04
Image Optimization
↓
SEO
↓
Performance Optimization
↓
Testing


PHASE 05
Shared Hosting Deployment
↓
Laravel Optimize
↓
Production Testing
```

---

# 72. Definition of Done

Project dianggap selesai ketika:

```text
Design sesuai wireframe
+
Responsive
+
Clean Blade Architecture
+
Reusable Components
+
Modular CSS
+
Modular JS
+
YouTube Integration
+
Caching
+
Secure Credential
+
Optimized Assets
+
Production Optimization
+
Shared Hosting Deployment Ready
```

---

**Document:** Product Requirement Document  
**Project:** GKMI Imanuel Cipayung Landing Page  
**Framework:** Laravel 12  
**Architecture:** Blade Component + Service Layer  
**Deployment Target:** Shared Hosting  
**Status:** Ready for Development