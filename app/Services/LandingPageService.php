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
        return config('church.ministries', []);
    }

    public function getMinistry(string $slug): ?array
    {
        foreach ($this->getMinistries() as $ministry) {
            if ($ministry['slug'] === $slug) {
                return $ministry;
            }
        }

        return null;
    }

    private function getEvents(): array
    {
        return config('church.events', []);
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
