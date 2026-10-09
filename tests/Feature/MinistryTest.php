<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class MinistryTest extends TestCase
{
    public function test_each_ministry_has_its_own_detail_page_without_youtube_requests(): void
    {
        $this->withoutVite();
        Http::preventStrayRequests();

        foreach (config('church.ministries') as $ministry) {
            $this->get(route('ministry.show', $ministry['slug']))
                ->assertOk()
                ->assertSee($ministry['subtitle'])
                ->assertSee($ministry['description'])
                ->assertSee($ministry['focus'][0])
                ->assertSee(route('home') . '#ministry', false)
                ->assertSee(route('home') . '#contact', false);
        }

        Http::assertNothingSent();
    }

    public function test_unknown_ministry_returns_not_found(): void
    {
        $this->get('/pelayanan/tidak-ada')->assertNotFound();
    }

    public function test_landing_cards_link_to_the_detail_pages(): void
    {
        $html = view('components.sections.ministry', [
            'ministries' => config('church.ministries'),
        ])->render();

        foreach (config('church.ministries') as $ministry) {
            $this->assertStringContainsString(route('ministry.show', $ministry['slug']), $html);
        }
    }
}
