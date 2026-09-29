<?php

use App\Services\AbTestingService;
use App\Services\AnalyticsMetricsService;
use Carbon\CarbonImmutable;
use Inertia\Testing\AssertableInertia as Assert;

test('cycle 10 page is available with analytics tracking', function () {
    config()->set('analytics.mode', 'ctwa');

    $this->get('/c10-lp')->assertOk()->assertInertia(fn (Assert $page) => $page
        ->component('cycle10/LandingPage')
        ->where('tracking.enabled', true)
        ->where('tracking.mode', 'ctwa')
        ->etc());
});

test('cycle 10 visits and conversion appear in admin analytics and A/B Labs', function () {
    config()->set('analytics.mode', 'ctwa');
    config()->set('analytics.enabled', true);

    foreach ([
        ['visit', ['event_id' => 'c10-visit']],
        ['intent', ['event_id' => 'c10-intent', 'location' => 'pricing_self_checkout']],
        ['direct_checkout', [
            'event_id' => 'c10-checkout',
            'zone' => 'pricing',
            'action' => 'external_checkout',
            'cta_label' => 'Mulai Belajar Mandiri',
            'location' => 'pricing_self_checkout',
            'value' => 99000,
        ]],
        ['whatsapp_lead', [
            'event_id' => 'c10-whatsapp',
            'zone' => 'floating',
            'action' => 'whatsapp',
            'cta_label' => 'Chat WhatsApp',
            'location' => 'floating_whatsapp',
        ]],
    ] as [$eventType, $data]) {
        $this->postJson('/analytics/track', [
            'event_type' => $eventType,
            'event_data' => ['landing_source' => '/c10-lp', ...$data],
        ])->assertCreated()->assertJson(['accepted' => 1]);
    }

    $from = CarbonImmutable::now()->startOfDay();
    $to = CarbonImmutable::now()->endOfDay();
    $dashboard = app(AnalyticsMetricsService::class)->dashboard($from, $to);
    $labs = app(AbTestingService::class)->report($from, $to);
    $page = collect($labs['performance'])->firstWhere('source', '/c10-lp');

    expect($dashboard['stats']['visits'])->toBe(1)
        ->and($dashboard['stats']['direct_checkouts'])->toBe(1)
        ->and($dashboard['stats']['whatsapp_leads'])->toBe(1)
        ->and($page['visits'])->toBe(1)
        ->and($page['direct_checkouts'])->toBe(1)
        ->and($page['whatsapp_leads'])->toBe(1)
        ->and(collect($labs['ctas'])->firstWhere('source', '/c10-lp')['zone'])->toBe('pricing');
});
