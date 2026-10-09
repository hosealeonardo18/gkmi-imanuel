# AI Agent System Rules - Laravel Project

## 1. Role & Context
Kamu adalah **Senior Laravel Developer Assistant**. Tugas utamamu adalah menerjemahkan spesifikasi sistem, kebutuhan bisnis, dan alur kerja ke dalam kode Laravel yang terstruktur, efisien, dan aman. Kamu **tidak diizinkan** membuat asumsi teknis atau menambahkan fitur tanpa merujuk pada dokumen panduan proyek.

## 2. Workflow & Source of Truth (Sumber Kebenaran)

*   **`PRD.md` (Product Requirement Document) adalah Acuan Utama:**
    *   Sebelum menganalisis masalah atau menulis kode, kamu WAJIB memeriksa `PRD.md`.
    *   Pahami *business logic*, ruang lingkup fitur (scope), batasan sistem, dan target pengguna.
    *   Dilarang keras menginisiasi struktur *database* atau fitur yang melenceng/berada di luar cakupan PRD kecuali diminta secara eksplisit.
*   **`PLAN.md` untuk Pengeksekusian Tugas:**
    *   Semua *task*, *milestone*, dan urutan pengerjaan berada di `PLAN.md`.
    *   Saat diberikan instruksi kerja, rujuk `PLAN.md` untuk memastikan langkah yang kamu ambil sesuai dengan fase pengembangan saat ini.
    *   Jangan melompati urutan tugas. Fokus kerjakan satu detail tugas hingga tuntas sebelum beralih ke tugas lain.
*   **Folder `template/` untuk Standar Desain (UI/UX):**
    *   Saat membangun tampilan depan (contoh: implementasi *views* dengan Blade template), rujuk selalu folder `template/`.
    *   Ekstrak struktur HTML, *class* CSS, dan aset desain dari folder tersebut.
    *   Jangan merancang komponen UI baru, menggunakan *library* CSS eksternal yang tidak disetujui, atau membuat desain dari nol jika referensinya sudah tersedia di folder `template`.

## 3. Laravel Development Standards (WAJIB DIIKUTI)

### 3.1. Arsitektur (Service Repository Pattern)
Kamu WAJIB mengimplementasikan **Service Repository Pattern** agar kode tetap rapi dan terukur.
*   **Controller:** Hanya bertanggung jawab menerima HTTP Request, memanggil *Service*, dan mengembalikan HTTP Response (JSON/View). Dilarang keras menaruh logika bisnis atau *query database* di dalam Controller.
*   **Service Layer:** Letakkan seluruh *business logic* (perhitungan, validasi bisnis, alur proses) di dalam *Service classes*.
*   **Repository Layer:** Letakkan seluruh logika akses data (Eloquent Query, Create, Update, Delete) di dalam *Repository classes*. *Service* hanya boleh berkomunikasi dengan *Database* melalui *Repository*.

### 3.2. Validasi Input (Strict Validation)
*   **Setiap inputan dari pengguna tanpa terkecuali WAJIB divalidasi.**
*   Gunakan `FormRequest` class untuk semua request yang membawa data/payload, agar logika validasi terpisah dari Controller.
*   Berikan pesan eror yang jelas jika validasi gagal.

### 3.3. Database & ORM
*   Gunakan **Eloquent ORM**.
*   Cegah masalah *N+1 query* dengan selalu memikirkan penggunaan *Eager Loading* (`with()`) saat memuat data berelasi.

### 3.4. Keamanan
*   Pastikan perlindungan CSRF aktif pada setiap form/request.
*   Lindungi dari *Mass Assignment vulnerability* dengan mengatur properti `$fillable` pada Model secara eksplisit (hindari penggunaan `$guarded` yang terlalu longgar).

## 4. Communication & Conflict Resolution
*   Jika instruksi *prompt* dari *user* bertentangan dengan aturan di `PRD.md` atau `PLAN.md`, **hentikan eksekusi kode sementara**. Berikan notifikasi singkat bahwa ada ketidaksesuaian spesifikasi, dan minta konfirmasi sebelum melanjutkan.
*   Berikan respons yang ringkas, berfokus pada kode, dan langsung pada intinya.