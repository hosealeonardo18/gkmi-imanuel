<?php

namespace Tests\Feature;

use App\Services\YouTube\YouTubeService;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class YouTubeTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->withoutVite();
        config(['services.youtube.api_key' => 'private-test-key', 'services.youtube.channel_id' => 'UCtest']);
        Cache::flush();
        Http::preventStrayRequests();
    }

    private function video(): array
    {
        return ['items' => [[
            'id' => ['videoId' => 'abcdefghijk'],
            'snippet' => ['title' => 'Ibadah "Minggu" <test>', 'publishedAt' => '2026-10-04T02:00:00Z'],
        ]]];
    }

    public function test_missing_configuration_shows_fallback_without_api_requests(): void
    {
        config(['services.youtube.api_key' => null, 'services.youtube.channel_id' => null]);

        $this->get('/')->assertOk()->assertSee('Video ibadah belum tersedia.');
        Http::assertNothingSent();
    }

    public function test_live_video_is_rendered_and_cached_without_exposing_the_key(): void
    {
        Http::fake(['*' => Http::response($this->video())]);

        $this->get('/')->assertOk()
            ->assertSee('https://www.youtube.com/embed/abcdefghijk', false)
            ->assertSee('Ibadah "Minggu" <test>')
            ->assertSee('LIVE NOW')
            ->assertDontSee('private-test-key', false);
        $this->get('/')->assertOk();
        Http::assertSentCount(1);
        Http::assertSent(fn ($request) => $request['eventType'] === 'live');
    }

    public function test_latest_video_is_used_when_no_live_stream_exists(): void
    {
        Http::fakeSequence()->push(['items' => []])->push($this->video());

        $service = app(YouTubeService::class);
        $this->assertFalse($service->getLatestOrLiveVideo()->isLive);
        $this->travel(3)->minutes();
        Http::fake(['*' => Http::response(['items' => []])]);
        $this->assertSame('abcdefghijk', $service->getLatestOrLiveVideo()->videoId);
        Http::assertSentCount(1);
        $this->travelBack();
    }

    public function test_api_failure_is_cached_and_the_page_still_loads(): void
    {
        Http::fake(['*' => Http::response([], 403)]);

        $this->get('/')->assertOk()->assertSee('Video ibadah belum tersedia.');
        $this->get('/')->assertOk();
        Http::assertSentCount(2);
    }

    public function test_connection_failure_is_cached(): void
    {
        Http::fake(['*' => Http::failedConnection()]);

        $service = app(YouTubeService::class);
        $this->assertNull($service->getLatestOrLiveVideo());
        $this->assertNull($service->getLatestOrLiveVideo());
        Http::assertSentCount(2);
    }

    public function test_invalid_video_id_is_not_embedded(): void
    {
        Http::fake(['*' => Http::response(['items' => [['id' => ['videoId' => 'invalid']]]])]);

        $this->assertNull(app(YouTubeService::class)->getLatestOrLiveVideo());
    }
}
