# Planning & Wireframe Landing Page  
## GKMI Imanuel Cipayung

---

# 1. Project Overview

## 1.1 Nama Project

**Landing Page GKMI Imanuel Cipayung**

## 1.2 Nama Gereja

**GKMI Imanuel Cipayung**

## 1.3 Channel YouTube

**GKMI Imanuel Cipayung**

## 1.4 Tujuan Website

Landing page dibuat sebagai halaman utama digital GKMI Imanuel Cipayung yang dapat digunakan oleh jemaat maupun pengunjung baru untuk:

- Mengenal GKMI Imanuel Cipayung.
- Melihat jadwal ibadah.
- Melihat ibadah atau live streaming terbaru.
- Mengetahui kegiatan gereja.
- Mengenal pelayanan yang tersedia.
- Melihat dokumentasi kegiatan gereja.
- Mengetahui lokasi gereja.
- Mengakses kontak dan media sosial gereja.
- Membantu pengunjung baru merencanakan kunjungan pertama.

Landing page harus dapat menjawab empat pertanyaan utama:

1. Ini gereja apa?
2. Kapan jadwal ibadahnya?
3. Di mana lokasinya?
4. Apa yang sedang berlangsung?

---

# 2. Target User

Website akan digunakan oleh dua kelompok utama.

## 2.1 Jemaat Existing

Kebutuhan utama:

- Melihat jadwal ibadah.
- Mengakses live streaming.
- Melihat ibadah terbaru.
- Melihat kegiatan gereja.
- Mengakses media sosial gereja.

## 2.2 Pengunjung Baru

Kebutuhan utama:

- Mengenal gereja.
- Mengetahui jadwal ibadah.
- Mengetahui lokasi.
- Melihat gambaran suasana gereja.
- Mengetahui pelayanan yang tersedia.
- Mendapatkan informasi sebelum melakukan kunjungan.

---

# 3. Design Direction

## 3.1 Visual Style

Design direction yang digunakan:

- Minimalist.
- Modern.
- Clean.
- Warm.
- Editorial.
- Soft.
- Eye-catching namun tidak berlebihan.
- Menggunakan whitespace yang cukup.
- Photography menjadi salah satu elemen visual utama.
- Tidak menggunakan terlalu banyak card.
- Tidak menggunakan typography oversized.

Konsep utama:

> **Minimalist × Editorial × Warm × Modern Church**

---

# 4. Typography

Seluruh website menggunakan:

**Montserrat**

## Typography Scale

| Element | Weight | Desktop |
|---|---:|---:|
| Hero Heading | 600 | 42–46px |
| Section Heading | 600 | 28–34px |
| Card Heading | 600 | 18–20px |
| Body | 400 | 15–16px |
| Caption | 500 | 12–13px |
| Navigation | 500 | 14px |

### Mobile

Ukuran heading akan disesuaikan secara responsive.

Contoh:

```css
.hero-title {
    font-size: 42px;
}

@media (max-width: 768px) {
    .hero-title {
        font-size: 30px;
    }
}
```

Tidak menggunakan hero title dengan ukuran `70px–100px`.

---

# 5. Color Palette

Color palette utama menggunakan pendekatan:

**Warm Monochrome / Soft Neutral**

## Primary Colors

```text
Primary Background
#FAFAF8

Secondary Background
#F3F2EE

Card Background
#FFFFFF

Primary Text
#252525

Secondary Text
#77736E

Border
#E7E4DF

Soft Accent
#D5D0C8
```

## Optional Accent

```text
Soft Sage
#C9D1C3
```

Accent hanya digunakan pada beberapa elemen seperti:

- Button.
- Hover.
- Active navigation.
- Indicator.
- Decorative element.

---

# 6. Layout System

## Desktop

```text
Maximum Width     : 1240px
Content Width     : ±1120px
Grid              : 12 Columns
Section Spacing   : 100–120px
Card Radius       : 12–16px
Button Radius     : Pill / 999px
```

## Mobile

```text
Side Padding      : 20px
Section Spacing   : 64–80px
Card Radius       : 12px
```

Website menggunakan pendekatan:

**Mobile-first Responsive Design**

---

# 7. Sitemap

Website dibuat sebagai **Single Page Landing Page**.

```text
HOME
│
├── Navbar
│
├── Hero
│
├── Quick Information
│
├── Tentang Kami
│
├── Jadwal Ibadah
│
├── Latest Service / Live
│
├── Upcoming Events
│
├── Pelayanan
│
├── Gallery
│
├── New Here
│
├── Location & Contact
│
└── Footer
```

Navbar menggunakan anchor navigation.

```text
#home
#about
#service
#ministry
#event
#contact
```

---

# 8. Navbar

## Desktop Wireframe

```text
┌─────────────────────────────────────────────────────────────────────────────┐
│                                                                             │
│ [LOGO] GKMI IMANUEL CIPAYUNG     Home  Tentang  Ibadah  Pelayanan  Event  │
│                                                               [Kunjungi →] │
│                                                                             │
└─────────────────────────────────────────────────────────────────────────────┘
```

## Navigation

Menu:

- Home
- Tentang
- Ibadah
- Pelayanan
- Kegiatan
- Kontak

CTA:

**Kunjungi Kami**

## Navbar Behaviour

Pada posisi paling atas:

```text
Transparent / mengikuti background halaman
```

Setelah user melakukan scroll:

```text
Background       : White / 85%
Backdrop Blur    : Aktif
Bottom Border    : Soft
Position         : Sticky / Fixed
```

---

# 9. Hero Section

Hero menggunakan **split layout** antara content dan photography.

## Desktop Wireframe

```text
┌──────────────────────────────────────────────────────────────────────────────┐
│                                                                              │
│                                                                              │
│   SELAMAT DATANG DI                    ┌─────────────────────────────────┐    │
│                                        │                                 │    │
│   GKMI Imanuel                         │                                 │    │
│   Cipayung                             │        HERO PHOTO               │    │
│                                        │                                 │    │
│   Sebuah komunitas untuk bertumbuh     │       Kegiatan / Ibadah        │    │
│   bersama dalam iman, kasih, dan       │                                 │    │
│   pengharapan.                         │                                 │    │
│                                        └─────────────────────────────────┘    │
│   [ Jadwal Ibadah ]  Lokasi Kami →                                         │
│                                                                              │
│                                                                              │
└──────────────────────────────────────────────────────────────────────────────┘
```

## Hero Content

### Eyebrow

```text
SELAMAT DATANG DI
```

### Heading

```text
GKMI Imanuel Cipayung
```

### Description

```text
Sebuah komunitas untuk bertumbuh bersama
dalam iman, kasih, dan pengharapan.
```

### CTA

Primary:

```text
Jadwal Ibadah
```

Secondary:

```text
Lokasi Kami →
```

---

# 10. Hero Initial Animation

Ketika website pertama kali dibuka:

```text
Eyebrow
↓
Heading
↓
Description
↓
CTA
↓
Hero Image
```

Timing:

```text
Eyebrow       0ms
Heading       100ms
Description   200ms
Button        300ms
Hero Image    Fade + Scale
```

Durasi animasi:

```text
600–900ms
```

Animation harus terasa subtle dan smooth.

---

# 11. Quick Information

Section kecil setelah Hero untuk memberikan informasi utama secara cepat.

```text
┌───────────────────────────────────────────────────────────────────────────┐
│                                                                           │
│  IBADAH MINGGU            LOKASI                      YOUTUBE              │
│  09.00 WIB                Cipayung                    Watch Service →      │
│                                                                           │
└───────────────────────────────────────────────────────────────────────────┘
```

Informasi nantinya dapat diganti sesuai kebutuhan.

---

# 12. Tentang Kami

## Wireframe

```text
                     TENTANG KAMI


┌──────────────────────────┐      GKMI IMANUEL CIPAYUNG
│                          │
│                          │      Sebuah komunitas yang hadir untuk
│                          │      bertumbuh bersama dalam iman,
│      CHURCH IMAGE        │      kasih dan pengharapan.
│                          │
│                          │      Isi dapat disesuaikan kemudian.
│                          │
└──────────────────────────┘
                                  Tentang kami →
```

Content terdiri dari:

- Foto gereja / kegiatan.
- Nama gereja.
- Deskripsi singkat.
- Link menuju informasi selengkapnya.

---

# 13. Jadwal Ibadah

Schedule menggunakan layout editorial.

Tidak menggunakan card besar.

## Wireframe

```text
JADWAL IBADAH

Temukan waktu untuk beribadah bersama kami.


─────────────────────────────────────────────────────────────────────

01        IBADAH RAYA                  MINGGU             09.00 WIB
                                                          →

─────────────────────────────────────────────────────────────────────

02        SEKOLAH MINGGU               MINGGU             09.00 WIB
                                                          →

─────────────────────────────────────────────────────────────────────

03        PERSEKUTUAN DOA              RABU               19.00 WIB
                                                          →

─────────────────────────────────────────────────────────────────────
```

Data tersebut merupakan placeholder.

---

# 14. Schedule Interaction

Saat user melakukan hover pada row:

```text
Background
#F3F2EE
```

Arrow:

```text
translateX(5px)
```

Transition:

```text
200–300ms
```

---

# 15. YouTube Integration

Section YouTube merupakan salah satu section utama landing page.

Tujuannya agar website otomatis menampilkan:

1. Live stream jika gereja sedang melakukan live.
2. Video ibadah terbaru jika sedang tidak live.

Channel:

**GKMI Imanuel Cipayung**

---

# 16. Latest Service / Live Wireframe

```text
LATEST SERVICE                                      Lihat YouTube →


┌───────────────────────────────────────────────────────────────────┐
│                                                                   │
│                                                                   │
│                        YOUTUBE VIDEO                              │
│                                                                   │
│                        ▶ PLAY                                    │
│                                                                   │
│                                                                   │
└───────────────────────────────────────────────────────────────────┘


● LIVE NOW / LATEST SERVICE

IBADAH RAYA MINGGU

Judul video terbaru dari channel GKMI Imanuel Cipayung

04 Oktober 2026                         Watch on YouTube →
```

---

# 17. YouTube Status

Jika sedang live:

```text
● LIVE NOW
```

Jika tidak sedang live:

```text
LATEST SERVICE
```

---

# 18. YouTube Integration Flow

```text
GKMI Imanuel Cipayung
          │
          ▼
     YouTube API
          │
          ▼
   Check Live Video
          │
     ┌────┴────┐
     │         │
    LIVE    NOT LIVE
     │         │
     ▼         ▼
Live Stream   Latest Video
     │         │
     └────┬────┘
          ▼
     Landing Page
```

## Logic

```text
1. Check active live stream.
2. Jika ada live stream → tampilkan live stream.
3. Jika tidak ada → cari video terbaru.
4. Ambil thumbnail video.
5. Ambil title.
6. Ambil publish date.
7. Ambil YouTube URL.
8. Render pada Latest Service section.
```

---

# 19. Upcoming Events

Upcoming Events menggunakan model agenda.

## Wireframe

```text
UPCOMING

Kegiatan yang akan datang


04
OCT       Ibadah Raya Minggu

          09.00 WIB
          GKMI Imanuel Cipayung                         →


─────────────────────────────────────────────────────────────────────


11
OCT       Fellowship

          17.00 WIB
          GKMI Imanuel Cipayung                         →


─────────────────────────────────────────────────────────────────────


18
OCT       Youth Service

          17.00 WIB
          GKMI Imanuel Cipayung                         →
```

Semua data event dapat diedit kemudian.

---

# 20. Pelayanan

Section pelayanan menggunakan photography sebagai elemen utama.

## Wireframe

```text
PELAYANAN

Bertumbuh dan melayani bersama.


┌──────────────────────────────┐ ┌──────────────────────────────┐
│                              │ │                              │
│          YOUTH               │ │         CHILDREN             │
│                              │ │                              │
│ Youth Ministry            →  │ │ Children Ministry        →  │
└──────────────────────────────┘ └──────────────────────────────┘


┌──────────────────────┐ ┌──────────────────────┐ ┌──────────────────────┐
│                      │ │                      │ │                      │
│      WORSHIP         │ │       FAMILY         │ │       PRAYER         │
│                      │ │                      │ │                      │
└──────────────────────┘ └──────────────────────┘ └──────────────────────┘
```

Data pelayanan merupakan placeholder.

---

# 21. Ministry Image Behaviour

Default:

```css
filter: saturate(0.2);
```

Saat hover:

```css
filter: saturate(1);
transform: scale(1.03);
```

Efek dibuat subtle.

---

# 22. Gallery

Gallery menggunakan layout:

**Editorial / Asymmetric / Masonry**

Bukan grid 3 × 3 standar.

## Wireframe

```text
LIFE AT CHURCH

Kebersamaan dalam pelayanan dan pertumbuhan.


┌─────────────────────────────┐  ┌───────────────────────┐
│                             │  │                       │
│                             │  │        IMAGE          │
│          IMAGE              │  │                       │
│                             │  └───────────────────────┘
│                             │
└─────────────────────────────┘  ┌───────────────────────┐
                                 │                       │
 ┌──────────────┐ ┌────────────┐ │        IMAGE          │
 │    IMAGE     │ │   IMAGE    │ │                       │
 └──────────────┘ └────────────┘ └───────────────────────┘
```

Photography menggunakan gambar kegiatan gereja.

---

# 23. Gallery Animation

Ketika section masuk ke viewport:

```text
Image 1 → Reveal
Image 2 → Reveal + 100ms
Image 3 → Reveal + 200ms
Image 4 → Reveal + 300ms
```

Animation:

```text
Fade
Scale
TranslateY
```

---

# 24. New Here

Section khusus untuk pengunjung baru.

Section ini dapat menjadi salah satu visual highlight utama.

## Wireframe

```text
┌──────────────────────────────────────────────────────────────────┐
│                                                                  │
│                     BARU PERTAMA KALI?                           │
│                                                                  │
│                 Kami senang menyambut Anda.                      │
│                                                                  │
│        Temukan jadwal, lokasi, dan informasi sebelum             │
│                   kunjungan pertama Anda.                        │
│                                                                  │
│                   [ Rencanakan Kunjungan ]                       │
│                                                                  │
└──────────────────────────────────────────────────────────────────┘
```

Background dapat menggunakan:

```text
#292929
```

Text:

```text
#FFFFFF
```

Alternatif:

Warm beige / secondary background.

---

# 25. Location & Contact

## Wireframe

```text
KUNJUNGI KAMI


┌───────────────────────────────────┐ ┌─────────────────────────────┐
│                                   │ │                             │
│                                   │ │ GKMI Imanuel Cipayung       │
│                                   │ │                             │
│           GOOGLE MAP             │ │ Alamat Gereja               │
│                                   │ │ Placeholder                 │
│                                   │ │                             │
│                                   │ │ Jadwal                      │
│                                   │ │ Minggu · 09.00 WIB          │
│                                   │ │                             │
└───────────────────────────────────┘ │ [ Buka Google Maps ]        │
                                      │                             │
                                      └─────────────────────────────┘
```

Informasi yang nantinya dapat dimasukkan:

- Alamat gereja.
- WhatsApp.
- Instagram.
- YouTube.
- Google Maps.
- Jadwal ibadah.

---

# 26. Footer

## Wireframe

```text
──────────────────────────────────────────────────────────────────────────────


GKMI
IMANUEL CIPAYUNG


Sebuah komunitas untuk bertumbuh bersama
dalam iman, kasih dan pengharapan.


Home        Instagram
Tentang     YouTube
Ibadah      WhatsApp
Pelayanan
Kegiatan


──────────────────────────────────────────────────────────────────────────────

© 2026 GKMI Imanuel Cipayung                    Dibuat dengan kasih.
```

Footer dibuat simple dan menggunakan whitespace yang cukup.

---

# 27. Mobile Wireframe

Mobile design tidak hanya mengecilkan desktop layout.

Susunan content akan disesuaikan agar tetap nyaman digunakan.

---

# 28. Mobile Navbar

```text
┌───────────────────────────────┐
│ LOGO                     ☰    │
└───────────────────────────────┘
```

Hamburger menu membuka fullscreen navigation.

---

# 29. Mobile Menu

```text
┌──────────────────────────────┐
│ GKMI                     ×   │
│                              │
│                              │
│ Home                         │
│ Tentang                      │
│ Ibadah                       │
│ Pelayanan                    │
│ Kegiatan                     │
│ Kontak                       │
│                              │
│                              │
│ Instagram                    │
│ YouTube                      │
│                              │
│ [ Kunjungi Kami ]            │
│                              │
└──────────────────────────────┘
```

Animation:

```text
Overlay Fade
+
Menu Item Stagger
```

---

# 30. Mobile Hero

```text
┌───────────────────────────────┐
│ LOGO                     ☰    │
├───────────────────────────────┤
│                               │
│ SELAMAT DATANG DI             │
│                               │
│ GKMI Imanuel                  │
│ Cipayung                      │
│                               │
│ Sebuah komunitas untuk        │
│ bertumbuh bersama dalam       │
│ iman, kasih dan pengharapan.  │
│                               │
│ [ Jadwal Ibadah ]             │
│                               │
│ Lokasi Kami →                 │
│                               │
├───────────────────────────────┤
│                               │
│         HERO IMAGE            │
│                               │
│                               │
├───────────────────────────────┤
│                               │
│ IBADAH MINGGU                 │
│ 09.00 WIB                     │
│                               │
│ LOKASI                        │
│ Cipayung                      │
│                               │
│ YOUTUBE                       │
│ Watch Service →               │
│                               │
└───────────────────────────────┘
```

---

# 31. Mobile About

```text
TENTANG KAMI

┌───────────────────────────────┐
│                               │
│           IMAGE               │
│                               │
└───────────────────────────────┘

GKMI IMANUEL CIPAYUNG

Deskripsi singkat gereja yang
nantinya bisa diubah.

Tentang Kami →
```

---

# 32. Mobile Schedule

```text
JADWAL IBADAH


01
IBADAH RAYA

Minggu
09.00 WIB
────────────────────────


02
SEKOLAH MINGGU

Minggu
09.00 WIB
────────────────────────


03
PERSEKUTUAN DOA

Rabu
19.00 WIB
```

---

# 33. Mobile YouTube

```text
LATEST SERVICE


┌───────────────────────────────┐
│                               │
│        YOUTUBE VIDEO          │
│                               │
│             ▶                 │
│                               │
└───────────────────────────────┘


● LIVE NOW

IBADAH RAYA MINGGU

Judul Video YouTube

04 OCT 2026

Watch on YouTube →
```

---

# 34. Mobile Ministry

Untuk mobile, pelayanan ditampilkan satu column.

```text
┌─────────────────────────────┐
│                             │
│           YOUTH             │
│                             │
│ Youth Ministry          →   │
└─────────────────────────────┘

┌─────────────────────────────┐
│                             │
│         CHILDREN            │
│                             │
│ Children Ministry       →   │
└─────────────────────────────┘
```

---

# 35. Motion System

Animation tidak dibuat random untuk setiap section.

Seluruh website menggunakan motion system yang konsisten.

## Scroll Reveal

```css
opacity: 0;
transform: translateY(25px);
```

Menjadi:

```css
opacity: 1;
transform: translateY(0);
```

Duration:

```text
600ms
```

Easing:

```css
cubic-bezier(.22,.61,.36,1)
```

---

# 36. Image Reveal

Default:

```css
opacity: 0;
transform: scale(1.04);
```

Visible:

```css
opacity: 1;
transform: scale(1);
```

Duration:

```text
900ms
```

---

# 37. Stagger Animation

Untuk card atau item berulang:

```text
Item 1      0ms
Item 2    100ms
Item 3    200ms
Item 4    300ms
```

---

# 38. Button Interaction

Default:

```text
Jadwal Ibadah →
```

Hover:

```text
Jadwal Ibadah    →
```

Arrow bergerak sedikit ke kanan.

```css
transform: translateX(4px);
```

---

# 39. Link Interaction

Link menggunakan animated underline.

```text
Default
────────

Hover
━━━━━━━━
```

Animation:

```text
width: 0 → 100%
```

---

# 40. Image Hover

Untuk image card:

```css
transform: scale(1);
```

Hover:

```css
transform: scale(1.03);
```

Transition:

```text
400–600ms
```

---

# 41. Data Management

Konten website sebaiknya tidak langsung di-hardcode pada component.

Data dipisahkan agar mudah diedit.

## Struktur Project

```text
/src
│
├── components
│
├── sections
│
├── animations
│
├── services
│
└── data
    ├── church.js
    ├── schedule.js
    ├── ministry.js
    └── events.js
```

---

# 42. Church Data

Contoh:

```javascript
export const church = {
    name: "GKMI Imanuel Cipayung",

    hero: {
        eyebrow: "Selamat Datang di",
        description:
            "Sebuah komunitas untuk bertumbuh bersama dalam iman, kasih, dan pengharapan."
    },

    youtube: {
        channelName: "GKMI Imanuel Cipayung"
    },

    address: "",
    whatsapp: "",
    instagram: ""
};
```

---

# 43. Schedule Data

Contoh:

```javascript
export const schedules = [
    {
        id: 1,
        name: "Ibadah Raya",
        day: "Minggu",
        time: "09.00 WIB"
    },
    {
        id: 2,
        name: "Sekolah Minggu",
        day: "Minggu",
        time: "09.00 WIB"
    },
    {
        id: 3,
        name: "Persekutuan Doa",
        day: "Rabu",
        time: "19.00 WIB"
    }
];
```

---

# 44. Ministry Data

Contoh:

```javascript
export const ministries = [
    {
        name: "Youth",
        image: ""
    },
    {
        name: "Children",
        image: ""
    },
    {
        name: "Worship",
        image: ""
    },
    {
        name: "Family",
        image: ""
    },
    {
        name: "Prayer",
        image: ""
    }
];
```

---

# 45. Event Data

Contoh:

```javascript
export const events = [
    {
        date: "04",
        month: "OCT",
        title: "Ibadah Raya Minggu",
        time: "09.00 WIB",
        location: "GKMI Imanuel Cipayung"
    }
];
```

---

# 46. Final User Journey

Flow utama landing page:

```text
NAVBAR
   ↓

HERO
Siapa gereja ini?
   ↓

QUICK INFO
Kapan dan di mana?
   ↓

ABOUT
Mengenal gereja lebih jauh.
   ↓

SCHEDULE
Kapan bisa ikut beribadah?
   ↓

LATEST SERVICE
Melihat ibadah / live terbaru.
   ↓

UPCOMING EVENTS
Apa kegiatan berikutnya?
   ↓

MINISTRY
Bagaimana saya dapat terlibat?
   ↓

GALLERY
Seperti apa kehidupan komunitasnya?
   ↓

NEW HERE
Saya baru pertama kali datang.
   ↓

LOCATION
Di mana lokasinya?
   ↓

FOOTER
Informasi tambahan dan social media.
```

---

# 47. Landing Page Final Structure

Final section order:

```text
01. Navbar
02. Hero
03. Quick Information
04. Tentang Kami
05. Jadwal Ibadah
06. Latest Service / Live YouTube
07. Upcoming Events
08. Pelayanan
09. Gallery / Life at Church
10. New Here
11. Location & Contact
12. Footer
```

---

# 48. Key Design Principles

Selama proses UI Design dan Development, beberapa prinsip berikut harus tetap dipertahankan:

1. Minimalis.
2. Tidak menggunakan font terlalu besar.
3. Menggunakan Montserrat.
4. Menggunakan warm monochrome.
5. Photography menjadi elemen visual penting.
6. Tidak terlalu banyak card.
7. Banyak menggunakan whitespace.
8. Animation subtle.
9. Tidak menggunakan animation berlebihan.
10. Mobile-first.
11. Content harus mudah diedit.
12. Latest Service terintegrasi dengan YouTube.
13. Jika sedang live, live stream menjadi prioritas.
14. Jika tidak live, tampilkan video terbaru.
15. UI tetap modern tetapi tidak terlihat seperti website corporate.
16. Website harus memberikan kesan hangat dan welcoming.

---

# 49. Development Phase

Tahapan pengerjaan:

```text
Planning
   ↓
Wireframe
   ↓
High Fidelity UI
   ↓
Responsive Design
   ↓
Frontend Development
   ↓
Animation Implementation
   ↓
YouTube Integration
   ↓
Content Binding
   ↓
Responsive Testing
   ↓
Performance Optimization
   ↓
Deployment
```

---

# 50. Project Status

```text
Planning        : DONE
Wireframe       : DONE
UI Design       : NEXT
Development     : PENDING
YouTube API     : PENDING
Content Final   : PENDING
Deployment      : PENDING
```

---

**Project:** GKMI Imanuel Cipayung Landing Page  
**Design Style:** Minimalist / Warm / Editorial  
**Typography:** Montserrat  
**Primary Integration:** YouTube Live & Latest Service