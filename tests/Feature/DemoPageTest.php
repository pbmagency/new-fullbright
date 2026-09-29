<?php

use Inertia\Testing\AssertableInertia as Assert;

test('root and alias routes render cycle12 landing page', function (string $url) {
    $this->get($url)->assertOk()->assertInertia(fn (Assert $page) => $page
        ->component('cycle12/LandingPage')
        ->where('tracking.enabled', true));
})->with([
    '/',
    '/toefl-hack',
    '/bio-ig-toefl-hack',
    '/c12-price',
]);

