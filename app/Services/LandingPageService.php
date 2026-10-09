<?php

namespace App\Services;

use App\Services\YouTube\YouTubeService;
use App\Services\YouTube\YouTubeVideoData;

class LandingPageService
{
    public function __construct(
        private readonly YouTubeService $youtubeService,
    ) {
    }

    public function getData(): array
    {
        return [
            'church'     => config('church'),
            'schedules'  => $this->getSchedules(),
            'ministries' => $this->getMinistries(),
            'events'     => $this->getEvents(),
            'youtube'    => $this->getYouTubeData(),
        ];
    }

    private function getSchedules(): array
    {
        return [
            [
                'id'   => 1,
                'name' => 'Ibadah Raya',
                'day'  => 'Minggu',
                'time' => '09.00 WIB',
            ],
            [
                'id'   => 2,
                'name' => 'Sekolah Minggu',
                'day'  => 'Minggu',
                'time' => '09.00 WIB',
            ],
            [
                'id'   => 3,
                'name' => 'Persekutuan Doa',
                'day'  => 'Rabu',
                'time' => '19.00 WIB',
            ],
        ];
    }

    private function getMinistries(): array
    {
        return [
            ['name' => 'Youth',    'subtitle' => 'Youth Ministry',    'image' => '/images/ministries/youth.jpg'],
            ['name' => 'Children', 'subtitle' => 'Children Ministry', 'image' => '/images/ministries/children.jpg'],
            ['name' => 'Worship',  'subtitle' => 'Worship Ministry',  'image' => '/images/ministries/worship.jpg'],
            ['name' => 'Family',   'subtitle' => 'Family Ministry',   'image' => '/images/ministries/family.jpg'],
            ['name' => 'Prayer',   'subtitle' => 'Prayer Ministry',   'image' => '/images/ministries/prayer.jpg'],
        ];
    }

    private function getEvents(): array
    {
        return [
            [
                'date'     => '04',
                'month'    => 'OCT',
                'title'    => 'Ibadah Raya Minggu',
                'time'     => '09.00 WIB',
                'location' => 'GKMI Imanuel Cipayung',
            ],
        ];
    }

    /**
     * Ambil data YouTube (live stream / video terbaru).
     * Jika API belum dikonfigurasi atau gagal, kembalikan null — Blade akan tampilkan fallback.
     */
    private function getYouTubeData(): ?array
    {
        $video = $this->youtubeService->getLatestOrLiveVideo();

        return $video?->toArray();
    }
}
