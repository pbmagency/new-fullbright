<?php

use App\Services\AbTestingService;
use App\Services\AnalyticsMetricsService;
use Carbon\CarbonImmutable;
use Inertia\Testing\AssertableInertia as Assert;

test('all landing routes have analytics tracking enabled and proper components', function (string $url, string $expectedComponent) {
    config()->set('analytics.mode', 'ctwa');
    config()->set('analytics.enabled', true);

    $this->get($url)
        ->assertOk()
        ->assertInertia(fn (Assert $page) => $page
            ->component($expectedComponent)
            ->where('tracking.enabled', true)
            ->where('tracking.mode', 'ctwa')
            ->where('tracking.pageUrl', $url)
            ->etc());
})->with([
    ['/', 'cycle12/LandingPage'],
    ['/toefl-hack', 'cycle12/LandingPage'],
    ['/bio-ig-toefl-hack', 'cycle12/LandingPage'],
    ['/c12-price', 'cycle12/LandingPage'],
    ['/c10-lp', 'cycle10/LandingPage'],
]);

test('visits and conversions from all landing page routes appear in admin analytics and ab labs', function (string $landingSource) {
    config()->set('analytics.mode', 'ctwa');
    config()->set('analytics.enabled', true);

    $events = [
        ['visit', ['event_id' => "visit-{$landingSource}"]],
        ['intent', ['event_id' => "intent-{$landingSource}", 'location' => 'amankan_seat_pricing']],
        ['direct_checkout', [
            'event_id' => "checkout-{$landingSource}",
            'zone' => 'pricing',
            'action' => 'external_checkout',
            'cta_label' => 'Amankan Seat Sekarang',
            'location' => 'amankan_seat_pricing',
            'value' => 99000,
        ]],
        ['whatsapp_lead', [
            'event_id' => "wa-{$landingSource}",
            'zone' => 'floating',
            'action' => 'whatsapp',
            'cta_label' => 'Konsultasi WhatsApp',
            'location' => 'floating_whatsapp',
        ]],
    ];

    foreach ($events as [$eventType, $data]) {
        $this->postJson('/analytics/track', [
            'event_type' => $eventType,
            'event_data' => ['landing_source' => $landingSource, ...$data],
        ])->assertCreated()->assertJson(['accepted' => 1]);
    }

    $from = CarbonImmutable::now()->startOfDay();
    $to = CarbonImmutable::now()->endOfDay();

    $dashboard = app(AnalyticsMetricsService::class)->dashboard($from, $to);
    $labs = app(AbTestingService::class)->report($from, $to);
    $page = collect($labs['performance'])->firstWhere('source', $landingSource);

    expect($dashboard['stats']['visits'])->toBeGreaterThanOrEqual(1)
        ->and($dashboard['stats']['direct_checkouts'])->toBeGreaterThanOrEqual(1)
        ->and($dashboard['stats']['whatsapp_leads'])->toBeGreaterThanOrEqual(1)
        ->and($page)->not->toBeNull()
        ->and($page['visits'])->toBe(1)
        ->and($page['direct_checkouts'])->toBe(1)
        ->and($page['whatsapp_leads'])->toBe(1)
        ->and($page['intents'])->toBe(1);
})->with([
    '/',
    '/toefl-hack',
    '/bio-ig-toefl-hack',
    '/c12-price',
    '/c10-lp',
]);

test('survey clicks in return popup and difficulty survey appear in micro conversion attribution ctas', function () {
    config()->set('analytics.mode', 'ctwa');
    config()->set('analytics.enabled', true);

    $landingSource = '/';

    // 1. Difficulty survey click (midpage zone, link action)
    $this->postJson('/analytics/track', [
        'event_type' => 'intent',
        'event_data' => [
            'landing_source' => $landingSource,
            'event_id' => 'survey-diff-1',
            'zone' => 'midpage',
            'action' => 'link',
            'cta_label' => 'Bingung mulai belajar dari mana',
            'location' => 'difficulty_survey_bingung_mulai_belajar',
            'destination' => 'difficulty_survey',
        ],
    ])->assertCreated();

    // 2. Return popup survey click (floating zone, link action)
    $this->postJson('/analytics/track', [
        'event_type' => 'intent',
        'event_data' => [
            'landing_source' => $landingSource,
            'event_id' => 'survey-return-1',
            'zone' => 'floating',
            'action' => 'link',
            'cta_label' => 'Harganya masih terlalu mahal buatku',
            'location' => 'return_popup_harga_terlalu_mahal',
            'destination' => 'return_popup_survey',
        ],
    ])->assertCreated();

    $from = CarbonImmutable::now()->startOfDay();
    $to = CarbonImmutable::now()->endOfDay();

    $labs = app(AbTestingService::class)->report($from, $to);
    $ctas = collect($labs['ctas']);

    $floatingLink = $ctas->firstWhere(fn ($row) => $row['zone'] === 'floating' && $row['action'] === 'link');
    $midpageLink = $ctas->firstWhere(fn ($row) => $row['zone'] === 'midpage' && $row['action'] === 'link');

    expect($floatingLink)->not->toBeNull()
        ->and($floatingLink['clicks'])->toBeGreaterThanOrEqual(1)
        ->and($midpageLink)->not->toBeNull()
        ->and($midpageLink['clicks'])->toBeGreaterThanOrEqual(1);
});

