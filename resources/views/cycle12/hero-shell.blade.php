{{-- Static Critical Hero Shell for Instant FCP & LCP before JS hydration --}}
<div class="[min-height:100vh] [background:#fff] [font-family:Nunito,system-ui,sans-serif]">
    {{-- Urgency Banner --}}
    <a id="urgency-banner" href="#pricing" data-analytics-location="flash_sale_banner" class="[position:fixed] [top:0] [left:0] [right:0] [z-index:51] [display:flex] [align-items:center] [justify-content:center] [flex-wrap:nowrap] [gap:8px] [background:#C10707] [padding:8px_12px] [text-align:center] [text-decoration:none] [white-space:nowrap] [overflow:hidden] max-[500px]:[padding:10px_12px]">
        <span id="banner-full" class="[font-size:13px] [font-weight:800] [letter-spacing:0.02em] [text-transform:uppercase] [color:#fff] [line-height:1.4] max-[500px]:[display:none]">🔥 {{ \App\Support\FlashSaleBanner::title() }} · DISKON 60%</span>
        <span id="banner-short" class="[display:none] [font-size:11px] [font-weight:800] [letter-spacing:0.01em] [text-transform:uppercase] [color:#fff] [line-height:1.4] max-[500px]:[display:inline] max-[500px]:[font-size:12.5px]">🔥 {{ \App\Support\FlashSaleBanner::title() }} · 60%</span>
        <span class="[display:inline-flex] [align-items:center] [gap:5px] [flex-shrink:0] [background:#fff] [color:#C10707] [border-radius:9999px] [padding:3px_10px] [line-height:1.2]">
            <span id="banner-timer-label" class="[font-size:11px] [font-weight:800] [letter-spacing:0.04em] [text-transform:uppercase] max-[500px]:[display:none]">⏱ Berakhir</span>
            <span class="[font-size:13px] [font-weight:900] [font-variant-numeric:tabular-nums] max-[500px]:[font-size:14px] [letter-spacing:0.04em]">11:59:59</span>
        </span>
    </a>

    {{-- Navbar --}}
    <div style="height: 102px;"></div>
    <header style="position:fixed;top:38px;left:0;right:0;z-index:50;background:rgba(255,255,255,0.92);backdrop-filter:blur(12px);-webkit-backdrop-filter:blur(12px);box-shadow:none;transition:box-shadow 0.2s ease;">
        <div class="[max-width:1152px] [margin:0_auto] [height:64px] [display:flex] [align-items:center] [justify-content:space-between] [padding:0_24px]">
            <a href="#" aria-label="Full Bright Indonesia" data-analytics-location="logo_full_bright_navbar" class="[display:flex] [align-items:center] [text-decoration:none]">
                <img loading="eager" decoding="async" fetchpriority="high" src="/logo/Logo-Fullbright.webp" width="160" height="160" alt="Full Bright Indonesia" class="[height:auto] [width:160px] [object-fit:contain] [display:block]" />
            </a>
            <a href="#pricing" data-analytics-location="amankan_seat_navbar" class="[display:flex] [flex-direction:column] [justify-content:center] [gap:1px] [border-radius:9999px] [background:#D70808] [box-shadow:0_6px_16px_rgba(215,8,8,0.35)] [text-decoration:none] [padding:7px_16px]">
                <span class="[font-size:13px] [font-weight:800] [color:#fff] [white-space:nowrap] [line-height:1.2]">🎓 Amankan Seat</span>
                <span class="[display:flex] [align-items:center] [gap:5px]">
                    <span class="[font-size:11px] [text-decoration:line-through] [color:rgba(255,255,255,0.92)] [white-space:nowrap]">Rp250rb</span>
                    <span class="[font-size:14px] [font-weight:900] [color:#fff] [white-space:nowrap]">Rp99rb</span>
                    <span class="[background:#F59E0B] [color:#151515] [font-size:10px] [font-weight:900] [padding:2px_7px] [border-radius:9999px] [white-space:nowrap]">-60%</span>
                </span>
            </a>
        </div>
    </header>

    {{-- Hero --}}
    <section id="hero" class="[position:relative] [overflow:hidden] [background:linear-gradient(160deg,#fff_55%,#FFF5F5_100%)]">
        <div class="[pointer-events:none] [position:absolute] [top:-96px] [right:-96px] [height:384px] [width:384px] [border-radius:9999px] [background:#D70808] [filter:blur(120px)] [opacity:0.07]"></div>
        <div class="[pointer-events:none] [position:absolute] [bottom:-96px] [left:-96px] [height:288px] [width:288px] [border-radius:9999px] [background:#151515] [filter:blur(100px)] [opacity:0.05]"></div>

        <div id="hero-section-inner" class="[position:relative] [max-width:1152px] [margin:0_auto] [padding:40px_24px_16px] [display:grid] [grid-template-columns:1fr] [gap:40px] max-[500px]:[padding-top:24px] max-[500px]:[padding-bottom:8px] max-[500px]:[gap:24px]">
            <div class="[display:grid] [grid-template-columns:1.05fr_0.95fr] [gap:40px] [align-items:center] max-[899px]:[position:relative] max-[899px]:[grid-template-columns:1fr] max-[899px]:[gap:12px]">
                <div class="[display:flex] [flex-direction:column] [gap:16px] [grid-column:1] [position:relative] [z-index:1]">
                    <div id="hero-rating-badge" class="[display:inline-flex] [align-items:center] [gap:8px] [border-radius:9999px] [padding:6px_16px] [font-size:12px] [font-weight:700] [letter-spacing:0.05em] [color:#374151] [border:1.5px_solid_#151515] [width:fit-content] max-[500px]:[font-size:clamp(9px,2.6vw,12px)] max-[500px]:[padding:clamp(4px,1.2vw,6px)_clamp(10px,3vw,16px)]">
                        <span class="[display:flex] [gap:2px] [color:#F59E0B]">★★★★★</span>
                        <span class="[letter-spacing:0.08em] [text-transform:uppercase]">45.000+ ALUMNI</span>
                        <div class="[margin-left:8px] [display:flex]">
                            <img loading="lazy" decoding="async" src="/assets-c12/People%201.webp" width="80" height="80" alt="alumni" class="[height:20px] [width:20px] [border-radius:9999px] [border:2px_solid_#fff] [object-fit:cover] [margin-left:-8px] max-[500px]:[height:clamp(14px,4vw,20px)] max-[500px]:[width:clamp(14px,4vw,20px)]" />
                            <img loading="lazy" decoding="async" src="/assets-c12/People%202.webp" width="79" height="80" alt="alumni" class="[height:20px] [width:20px] [border-radius:9999px] [border:2px_solid_#fff] [object-fit:cover] [margin-left:-8px] max-[500px]:[height:clamp(14px,4vw,20px)] max-[500px]:[width:clamp(14px,4vw,20px)]" />
                            <img loading="lazy" decoding="async" src="/assets-c12/People%203.webp" width="80" height="79" alt="alumni" class="[height:20px] [width:20px] [border-radius:9999px] [border:2px_solid_#fff] [object-fit:cover] [margin-left:-8px] max-[500px]:[height:clamp(14px,4vw,20px)] max-[500px]:[width:clamp(14px,4vw,20px)]" />
                        </div>
                    </div>

                    <h1 id="hero-headline" class="[margin:0] [font-size:clamp(30px,4vw,44px)] [line-height:1.15] [font-weight:900] [font-family:Nunito,sans-serif] [color:#151515] max-[500px]:[font-size:clamp(24px,7vw,30px)]">
                        Serius Soal Beasiswa &amp; CPNS?<br />Capai <span class="[background-image:linear-gradient(rgb(245,_183,_0),_rgb(245,_183,_0))] [background-repeat:no-repeat] [background-size:100%_12px] [background-position:0px_100%] [box-decoration-break:clone] [-webkit-box-decoration-break:clone] [padding:0px_2px]">TOEFL 500+ dalam 15 Hari Saja</span>
                    </h1>

                    <p id="hero-subheadline" class="[margin:0] [font-size:16px] [line-height:1.6] [color:#3d3d3d] max-[500px]:[font-size:clamp(12px,3.4vw,14px)]">
                        <b>Persiapkan dari</b><strong class="[color:rgb(21,_21,_21)]">&nbsp;sekarang</strong>&nbsp;dengan strategi <strong class="[color:rgb(21,_21,_21)]">belajar 1 jam sehari</strong> yang telah membantu <strong class="[color:rgb(21,_21,_21)]">45.000+ alumni</strong> meraih <b>beasiswa impian</b> mereka.
                    </p>

                    <div id="hero-trust-badges" class="[display:flex] [flex-wrap:wrap] [gap:8px] max-[500px]:[display:none]">
                        <span class="[display:inline-flex] [align-items:center] [gap:4px] [border-radius:9999px] [padding:6px_12px] [font-size:12px] [font-weight:600] [background:#F3F4F6] [color:#374151] [border:1px_solid_#e5e7eb]">✓ Lembaga Resmi ITP &amp; IIEF</span>
                        <span class="[display:inline-flex] [align-items:center] [gap:4px] [border-radius:9999px] [padding:6px_12px] [font-size:12px] [font-weight:600] [background:#F3F4F6] [color:#374151] [border:1px_solid_#e5e7eb]">✓ 13+ Tahun Pengalaman</span>
                    </div>

                    <div id="hero-cta-row" class="[display:flex] [flex-direction:column] [gap:12px]">
                        <div id="hero-cta-buttons" class="[display:flex] [flex-wrap:wrap] [gap:12px] max-[500px]:[flex-direction:column]">
                            <a href="#pricing" data-analytics-location="mulai_persiapan_toefl_hero" class="[display:inline-flex] [align-items:center] [justify-content:center] [gap:8px] [font-weight:700] [border-radius:16px] [padding:14px_28px] [font-size:16px] [color:#fff] [background:#D70808] [box-shadow:0_4px_20px_rgba(215,8,8,0.35)] [text-decoration:none] max-[500px]:[font-size:clamp(12px,3.6vw,16px)] max-[500px]:[padding:clamp(10px,3vw,14px)_clamp(16px,5vw,28px)] max-[500px]:[width:100%] max-[500px]:[box-sizing:border-box]">Mulai Persiapan TOEFL →</a>
                            <a href="#testimonials" data-analytics-location="lihat_bukti_alumni_hero" class="[display:inline-flex] [align-items:center] [justify-content:center] [gap:8px] [font-weight:700] [border-radius:16px] [padding:14px_28px] [font-size:16px] [color:#151515] [border:2px_solid_#D70808] [text-decoration:none] max-[500px]:[font-size:clamp(12px,3.6vw,16px)] max-[500px]:[padding:clamp(10px,3vw,14px)_clamp(16px,5vw,28px)] max-[500px]:[width:100%] max-[500px]:[box-sizing:border-box]">Lihat Bukti Alumni →</a>
                        </div>
                        <div id="hero-rating-line" class="[display:flex] [align-items:center] [justify-content:flex-start] [flex-wrap:wrap] [gap:8px_12px]">
                            <span class="[display:flex] [align-items:center] [gap:4px] [font-size:12px] [font-weight:600] [color:#6b7280] max-[500px]:[font-size:clamp(9px,2.6vw,12px)]">★★★★★ <span class="[margin-left:4px] max-[500px]:[font-size:clamp(9px,2.6vw,12px)]">4.9/5 Google Review</span></span>
                            <span class="[font-size:12px] [color:#6b7280] max-[500px]:[font-size:clamp(9px,2.6vw,12px)]">•</span>
                            <span class="[font-size:12px] [font-weight:600] [color:#6b7280] max-[500px]:[font-size:clamp(9px,2.6vw,12px)]">45.000+ Alumni Sukses</span>
                            <span class="[font-size:12px] [color:#6b7280] max-[500px]:[font-size:clamp(9px,2.6vw,12px)]">•</span>
                            <span class="[font-size:12px] [font-weight:600] [color:#6b7280] max-[500px]:[font-size:clamp(9px,2.6vw,12px)]">🛡 Garansi 100%</span>
                        </div>
                    </div>
                </div>

                <div class="[display:flex] [justify-content:center] [align-items:flex-end] [grid-column:2] max-[899px]:[grid-column:1] max-[899px]:[margin-top:-4px]">
                    <div class="[width:100%] [max-width:560px] [position:relative] [align-self:stretch] [display:flex] [align-items:flex-end] [justify-content:center] max-[899px]:[max-width:250px] max-[899px]:[align-self:initial]">
                        <img loading="eager" decoding="async" fetchpriority="high" src="/assets-c12/hero-consultant.webp" srcset="/assets-c12/hero-consultant-360.webp 360w, /assets-c12/hero-consultant.webp 660w" sizes="(max-width: 899px) 250px, 560px" width="660" height="805" alt="Konsultan Full Bright Indonesia siap membantu persiapan TOEFL kamu" class="[display:block] [width:100%] [height:auto] [max-height:min(72vh,660px)] [object-fit:contain] [object-position:bottom_center] [filter:drop-shadow(0_18px_40px_rgba(0,0,0,0.16))] [mask-image:linear-gradient(to_bottom,#000_0%,#000_78%,rgba(0,0,0,0.5)_92%,transparent_100%)] [-webkit-mask-image:linear-gradient(to_bottom,#000_0%,#000_78%,rgba(0,0,0,0.5)_92%,transparent_100%)] max-[899px]:[max-height:min(28vh,215px)] max-[899px]:[filter:drop-shadow(0_12px_28px_rgba(0,0,0,0.14))]" />
                        <div class="hidden min-[900px]:contents">
                            <div class="[position:absolute] [bottom:18px] [left:0] [display:flex] [max-width:216px] [align-items:center] [gap:10px] [border-radius:16px] [background:#fff] [padding:11px_14px] [box-shadow:0_8px_32px_rgba(0,0,0,0.14)]">
                                <span class="[font-size:22px]">🎓</span>
                                <p class="[margin:0] [font-size:12px] [line-height:1.35] [font-weight:900] [color:#151515] [font-family:Nunito,sans-serif]">Alumni kami tersebar di seluruh dunia</p>
                            </div>
                            <div class="[position:absolute] [top:12px] [right:0] [display:flex] [align-items:center] [gap:6px] [border-radius:16px] [background:#fff] [padding:8px_12px] [box-shadow:0_8px_32px_rgba(0,0,0,0.12)]">
                                <span class="[color:#F59E0B]">★★★★★</span>
                                <span class="[margin-left:4px] [font-size:12px] [font-weight:900] [color:#151515]">4.9</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="hero-scroll-cue" class="[position:relative] [display:flex] [justify-content:center] [padding-bottom:4px] max-[899px]:[margin-top:-78px] max-[899px]:[padding-bottom:10px]">
            <div class="[display:flex] [height:52px] [width:52px] [align-items:center] [justify-content:center] [border-radius:9999px] [background:#F3F4F6] [border:1px_solid_#e5e7eb] [color:#374151] [animation:heroBounce_2s_ease-in-out_infinite]">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M12 4v14M5 12l7 7 7-7"></path></svg>
            </div>
        </div>

        <div class="[line-height:0] [margin-bottom:-1px]">
            <svg viewBox="0 0 1440 56" preserveAspectRatio="none" class="[display:block] [width:100%] [height:56px]">
                <path d="M0,28 C240,56 480,0 720,28 C960,56 1200,0 1440,28 L1440,56 L0,56 Z" fill="#F3F3F3"></path>
            </svg>
        </div>
    </section>
</div>
