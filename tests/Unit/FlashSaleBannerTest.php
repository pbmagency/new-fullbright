<?php

use App\Support\FlashSaleBanner;
use Illuminate\Support\Carbon;

it('uses the Jakarta calendar for each flash sale period', function (string $date, string $expected): void {
    expect(FlashSaleBanner::title(Carbon::parse($date, 'Asia/Jakarta')))->toBe($expected);
})->with([
    ['2026-10-01', 'FLASH SALE GAJIAN'],
    ['2026-10-05', 'FLASH SALE GAJIAN'],
    ['2026-10-06', 'FLASH SALE OKTOBER'],
    ['2026-10-09', 'FLASH SALE OKTOBER'],
    ['2026-10-10', 'FLASH SALE 10.10'],
    ['2026-10-11', 'FLASH SALE OKTOBER'],
    ['2026-10-24', 'FLASH SALE OKTOBER'],
    ['2026-10-25', 'FLASH SALE AKHIR BULAN'],
    ['2026-10-31', 'FLASH SALE AKHIR BULAN'],
    ['2026-11-10', 'FLASH SALE NOVEMBER'],
    ['2026-11-11', 'FLASH SALE 11.11'],
    ['2026-11-12', 'FLASH SALE NOVEMBER'],
    ['2026-02-02', 'FLASH SALE GAJIAN'],
]);
