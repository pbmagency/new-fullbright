import { useEffect, useState } from 'react';

const MONTHS = [
  'JANUARI', 'FEBRUARI', 'MARET', 'APRIL', 'MEI', 'JUNI',
  'JULI', 'AGUSTUS', 'SEPTEMBER', 'OKTOBER', 'NOVEMBER', 'DESEMBER',
];

export function flashSaleTitle(date: Date): string {
  const parts = new Intl.DateTimeFormat('en-US', {
    timeZone: 'Asia/Jakarta',
    day: 'numeric',
    month: 'numeric',
  }).formatToParts(date);
  const day = Number(parts.find((part) => part.type === 'day')?.value);
  const month = Number(parts.find((part) => part.type === 'month')?.value);

  if (day <= 5) return 'FLASH SALE GAJIAN';
  if (day === month) return `FLASH SALE ${month}.${month}`;
  if (day >= 25) return 'FLASH SALE AKHIR BULAN';
  return `FLASH SALE ${MONTHS[month - 1]}`;
}

export default function FlashSaleBannerText() {
  const [title, setTitle] = useState(() => flashSaleTitle(new Date()));

  useEffect(() => {
    const update = () => setTitle(flashSaleTitle(new Date()));
    const interval = window.setInterval(update, 60_000);
    return () => window.clearInterval(interval);
  }, []);

  return (
    <>
      <span id="banner-full" className="[font-size:13px] [font-weight:800] [letter-spacing:0.02em] [text-transform:uppercase] [color:#fff] [line-height:1.4] max-[500px]:[display:none]">🔥 {title} · DISKON 60%</span>
      <span id="banner-short" className="[display:none] [font-size:11px] [font-weight:800] [letter-spacing:0.01em] [text-transform:uppercase] [color:#fff] [line-height:1.4] max-[500px]:[display:inline] max-[500px]:[font-size:12.5px]">🔥 {title} · 60%</span>
    </>
  );
}
