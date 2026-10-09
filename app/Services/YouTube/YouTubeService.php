<?php

namespace App\Services\YouTube;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

final class YouTubeService
{
    private const API_BASE = 'https://www.googleapis.com/youtube/v3/search';

    private const CACHE_KEY_LIVE   = 'church.youtube.live';
    private const CACHE_KEY_LATEST = 'church.youtube.latest';

    private readonly string $apiKey;
    private readonly string $channelId;

    public function __construct()
    {
        $this->apiKey    = config('services.youtube.api_key', '');
        $this->channelId = config('services.youtube.channel_id', '');
    }

    /**
     * Ambil video yang sedang live atau video terbaru.
     * Sesuai PRD §22: cek cache → cek live → fallback ke latest.
     */
    public function getLatestOrLiveVideo(): ?YouTubeVideoData
    {
        if (! $this->isConfigured()) {
            return null;
        }

        // Cek cache live (TTL: 1 menit)
        $cached = Cache::get(self::CACHE_KEY_LIVE);
        if ($cached !== null) {
            return $cached;
        }

        try {
            // Prioritas 1: Live stream aktif
            $live = $this->fetchLiveStream();
            if ($live !== null) {
                Cache::put(self::CACHE_KEY_LIVE, $live, now()->addMinutes(1));
                return $live;
            }

            // Prioritas 2: Video terbaru (TTL: 15 menit)
            $latest = Cache::remember(
                self::CACHE_KEY_LATEST,
                now()->addMinutes(15),
                fn () => $this->fetchLatestVideo()
            );

            // Simpan juga di cache live agar tidak repeat check terlalu sering
            Cache::put(self::CACHE_KEY_LIVE, $latest, now()->addMinutes(2));

            return $latest;

        } catch (\Throwable $e) {
            Log::warning('YouTubeService: Failed to retrieve video', [
                'exception' => $e->getMessage(),
            ]);

            return null;
        }
    }

    /**
     * Cek apakah ada live stream yang sedang aktif.
     */
    private function fetchLiveStream(): ?YouTubeVideoData
    {
        $response = Http::timeout(5)->get(self::API_BASE, [
            'part'       => 'snippet',
            'channelId'  => $this->channelId,
            'type'       => 'video',
            'eventType'  => 'live',
            'maxResults' => 1,
            'key'        => $this->apiKey,
        ]);

        if (! $response->successful()) {
            Log::warning('YouTubeService: Live stream API call failed', [
                'status' => $response->status(),
            ]);
            return null;
        }

        $items = $response->json('items', []);

        if (empty($items)) {
            return null;
        }

        return YouTubeVideoData::fromApiItem($items[0], isLive: true);
    }

    /**
     * Ambil video terbaru dari channel.
     */
    private function fetchLatestVideo(): ?YouTubeVideoData
    {
        $response = Http::timeout(5)->get(self::API_BASE, [
            'part'       => 'snippet',
            'channelId'  => $this->channelId,
            'type'       => 'video',
            'order'      => 'date',
            'maxResults' => 1,
            'key'        => $this->apiKey,
        ]);

        if (! $response->successful()) {
            Log::warning('YouTubeService: Latest video API call failed', [
                'status' => $response->status(),
            ]);
            return null;
        }

        $items = $response->json('items', []);

        if (empty($items)) {
            return null;
        }

        return YouTubeVideoData::fromApiItem($items[0], isLive: false);
    }

    private function isConfigured(): bool
    {
        return ! empty($this->apiKey) && ! empty($this->channelId);
    }
}
