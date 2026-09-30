<?php

namespace App\Support;

use Carbon\CarbonInterface;
use Illuminate\Support\Carbon;

final class FlashSaleBanner
{
    private const MONTHS = [
        1 => 'JANUARI', 'FEBRUARI', 'MARET', 'APRIL', 'MEI', 'JUNI',
        'JULI', 'AGUSTUS', 'SEPTEMBER', 'OKTOBER', 'NOVEMBER', 'DESEMBER',
    ];

    public static function title(?CarbonInterface $date = null): string
    {
        $date = ($date ?? Carbon::now())->copy()->setTimezone('Asia/Jakarta');
        $day = $date->day;
        $month = $date->month;

        if ($day <= 5) {
            return 'FLASH SALE GAJIAN';
        }

        if ($day === $month) {
            return "FLASH SALE {$month}.{$month}";
        }

        if ($day >= 25) {
            return 'FLASH SALE AKHIR BULAN';
        }

        return 'FLASH SALE '.self::MONTHS[$month];
    }
}
