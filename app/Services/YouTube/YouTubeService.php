<?php

namespace App\Services\YouTube;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

final class YouTubeService
{
    private const API_BASE = 'https://www.googleapis.com/youtube/v3/search';

    private readonly string $apiKey;
    private readonly string $channelId;

    public function __construct()
    {
        $this->apiKey = config('services.youtube.api_key') ?? '';
        $this->channelId = config('services.youtube.channel_id') ?? '';
    }

    public function getLatestOrLiveVideo(): ?YouTubeVideoData
    {
        if ($this->apiKey === '' || $this->channelId === '') {
            return null;
        }

        $channel = hash('sha256', $this->channelId);
        $liveKey = "church.youtube.live.{$channel}";
        $latestKey = "church.youtube.latest.{$channel}";

        try {
            $cached = Cache::get($liveKey);
            if ($cached !== null) {
                return $cached ?: null;
            }

            $live = $this->fetchVideo(isLive: true);
            if ($live !== null) {
                Cache::put($liveKey, $live, now()->addMinute());

                return $live;
            }

            $latest = Cache::get($latestKey);
            if ($latest === null) {
                $latest = $this->fetchVideo(isLive: false);
                if ($latest !== null) {
                    Cache::put($latestKey, $latest, now()->addMinutes(15));
                }
            }

            // Cache false too: empty results and API failures need a cooldown.
            Cache::put($liveKey, $latest ?? false, now()->addMinutes(2));

            return $latest ?: null;
        } catch (\Throwable) {
            Log::warning('YouTubeService: Cache unavailable');

            return null;
        }
    }

    private function fetchVideo(bool $isLive): ?YouTubeVideoData
    {
        try {
            $response = Http::connectTimeout(3)->timeout(5)->get(self::API_BASE, [
                'part' => 'snippet',
                'channelId' => $this->channelId,
                'type' => 'video',
                'maxResults' => 1,
                'videoEmbeddable' => 'true',
                'key' => $this->apiKey,
                ...($isLive ? ['eventType' => 'live'] : ['order' => 'date']),
            ]);

            if (! $response->successful()) {
                Log::warning('YouTubeService: API request failed', ['status' => $response->status()]);

                return null;
            }

            $item = $response->json('items.0');
            if (! is_array($item) || ! preg_match('/^[A-Za-z0-9_-]{11}$/', $item['id']['videoId'] ?? '')) {
                return null;
            }

            return YouTubeVideoData::fromApiItem($item, $isLive);
        } catch (\Throwable) {
            // Exception messages can include the request URL and API key.
            Log::warning('YouTubeService: API unavailable');

            return null;
        }
    }
}
