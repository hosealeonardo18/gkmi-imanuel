<?php

namespace App\Services\YouTube;

/**
 * Data Transfer Object untuk data video YouTube.
 */
final class YouTubeVideoData
{
    public function __construct(
        public readonly string $videoId,
        public readonly string $title,
        public readonly string $thumbnail,
        public readonly string $publishedAt,
        public readonly bool $isLive,
        public readonly string $watchUrl,
    ) {
    }

    public static function fromApiItem(array $item, bool $isLive = false): self
    {
        $videoId = $item['id']['videoId'] ?? '';

        return new self(
            videoId: $videoId,
            title: $item['snippet']['title'] ?? '',
            thumbnail: $item['snippet']['thumbnails']['high']['url']
                ?? $item['snippet']['thumbnails']['medium']['url']
                ?? '',
            publishedAt: $item['snippet']['publishedAt'] ?? '',
            isLive: $isLive,
            watchUrl: $videoId ? "https://www.youtube.com/watch?v={$videoId}" : '',
        );
    }

    public function embedUrl(): string
    {
        if (! $this->videoId) {
            return '';
        }

        return "https://www.youtube.com/embed/{$this->videoId}";
    }

    public function toArray(): array
    {
        return [
            'video_id'     => $this->videoId,
            'title'        => $this->title,
            'thumbnail'    => $this->thumbnail,
            'published_at' => $this->publishedAt,
            'is_live'      => $this->isLive,
            'watch_url'    => $this->watchUrl,
            'embed_url'    => $this->embedUrl(),
        ];
    }
}
