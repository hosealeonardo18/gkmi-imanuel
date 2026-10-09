/**
 * Semua konten utama landing page dapat diubah dari file ini.
 * Tidak perlu mengubah HTML untuk mengganti jadwal, kegiatan, pelayanan, dll.
 */
window.SITE_CONFIG = {
  church: {
    name: "GKMI Imanuel Cipayung",
    shortLocation: "Cipayung",
    address: "Alamat gereja dapat diisi di config.js",
    whatsapp: "",
    instagram: "",
    googleMapsUrl: ""
  },

  hero: {
    eyebrow: "SELAMAT DATANG DI",
    description:
      "Sebuah komunitas untuk bertumbuh bersama dalam iman, kasih, dan pengharapan."
  },

  about: {
    description:
      "Kami hadir sebagai komunitas yang bertumbuh bersama dalam iman, kasih, dan pengharapan. Silakan ganti teks ini dengan profil resmi GKMI Imanuel Cipayung."
  },

  /**
   * YouTube Integration
   *
   * Isi apiKey + channelId agar sistem otomatis:
   * 1. Mencari livestream aktif.
   * 2. Jika tidak live, mengambil video terbaru.
   *
   * fallbackVideoId boleh diisi jika ingin video tertentu tetap tampil
   * ketika API belum dikonfigurasi.
   */
  youtube: {
    channelName: "GKMI Imanuel Cipayung",
    channelUrl: "https://www.youtube.com/results?search_query=GKMI+Imanuel+Cipayung",
    apiKey: "",
    channelId: "",
    fallbackVideoId: ""
  },

  schedules: [
    {
      name: "Ibadah Raya",
      day: "Minggu",
      time: "09.00 WIB"
    },
    {
      name: "Sekolah Minggu",
      day: "Minggu",
      time: "09.00 WIB"
    },
    {
      name: "Persekutuan Doa",
      day: "Rabu",
      time: "19.00 WIB"
    }
  ],

  events: [
    {
      date: "04",
      month: "OCT",
      title: "Ibadah Raya Minggu",
      time: "09.00 WIB",
      location: "GKMI Imanuel Cipayung"
    },
    {
      date: "11",
      month: "OCT",
      title: "Fellowship",
      time: "17.00 WIB",
      location: "GKMI Imanuel Cipayung"
    },
    {
      date: "18",
      month: "OCT",
      title: "Youth Service",
      time: "17.00 WIB",
      location: "GKMI Imanuel Cipayung"
    }
  ],

  ministries: [
    {
      name: "Youth",
      subtitle: "Youth Ministry"
    },
    {
      name: "Children",
      subtitle: "Children Ministry"
    },
    {
      name: "Worship",
      subtitle: "Worship Ministry"
    },
    {
      name: "Family",
      subtitle: "Family Ministry"
    },
    {
      name: "Prayer",
      subtitle: "Prayer Ministry"
    }
  ]
};
