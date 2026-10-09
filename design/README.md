# GKMI Imanuel Cipayung — Landing Page Prototype

Prototype frontend berdasarkan planning dan wireframe landing page GKMI Imanuel Cipayung.

## Design Direction

- Minimalist
- Warm monochrome
- Montserrat
- Responsive
- Subtle scroll reveal
- Editorial layout
- Mobile friendly
- Config-driven content
- YouTube Live / Latest Service ready

## File

```text
gkmi-imanuel-landing-page/
├── index.html
├── styles.css
├── config.js
└── app.js
```

## Cara Menjalankan

Cara paling sederhana:

1. Extract folder.
2. Buka `index.html`.

Untuk YouTube API dan development yang lebih stabil, disarankan menjalankan melalui local server.

Contoh:

```bash
python -m http.server 8000
```

Kemudian buka:

```text
http://localhost:8000
```

## Mengubah Konten

Mayoritas konten dapat diubah dari:

```text
config.js
```

Contoh:

```javascript
window.SITE_CONFIG = {
  church: {
    name: "GKMI Imanuel Cipayung",
    shortLocation: "Cipayung",
    address: "...",
    whatsapp: "...",
    instagram: "...",
    googleMapsUrl: "..."
  }
};
```

## YouTube Integration

Di `config.js`:

```javascript
youtube: {
  channelName: "GKMI Imanuel Cipayung",
  channelUrl: "...",
  apiKey: "",
  channelId: "",
  fallbackVideoId: ""
}
```

### Logic

```text
Check Live Stream
       ↓
Ada live?
 ┌─────┴─────┐
 YES         NO
 ↓            ↓
LIVE       Latest Video
 └─────┬──────┘
       ↓
Landing Page
```

Agar otomatis berjalan, isi:

- `apiKey`
- `channelId`

Jika belum ingin menggunakan YouTube Data API, isi `fallbackVideoId` agar satu video tetap dapat ditampilkan.

> Catatan keamanan:
> Untuk production, jangan meletakkan API key unrestricted di frontend.
> Restrict key berdasarkan HTTP referrer atau pindahkan request ke backend/serverless endpoint.

## Foto

Prototype saat ini menggunakan visual placeholder supaya tidak mengasumsikan aset gereja.

Cari elemen dengan teks:

- `Foto Ibadah / Jemaat`
- `Foto Gereja`
- `Gallery 01`, dst.

Placeholder tersebut dapat diganti dengan foto asli gereja.

## Next Recommended Step

1. Masukkan logo asli.
2. Masukkan photography asli.
3. Finalisasi alamat dan sosial media.
4. Isi jadwal ibadah.
5. Masukkan YouTube channel ID.
6. Finalisasi upcoming event.
7. Deploy ke hosting/VPS.
