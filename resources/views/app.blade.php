<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" @class(['dark' => ($appearance ?? 'system') === 'dark'])>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="/favicon.ico" sizes="any">

    @if (request()->routeIs('cycle10.landing'))
        <link rel="preload" as="image" href="/assets/hero-consultant-460-alpha.webp" imagesrcset="/assets/hero-consultant-460-alpha.webp 460w, /assets/hero-consultant-660-alpha.webp 660w, /assets/hero-consultant.webp 820w" imagesizes="(max-width: 899px) 250px, 560px" fetchpriority="high">
    @elseif (request()->routeIs('cycle12.price', 'home', 'toefl-hack', 'bio-ig-toefl-hack'))
        <link rel="preconnect" href="https://demo-fullbright.b-cdn.net" crossorigin>
        <link rel="preload" as="image" href="/assets-c12/hero-consultant.webp" imagesrcset="/assets-c12/hero-consultant-360.webp 360w, /assets-c12/hero-consultant.webp 660w" imagesizes="(max-width: 899px) 250px, 560px" fetchpriority="high">
        <link rel="preload" as="image" href="/logo/Logo-Fullbright.webp" fetchpriority="high">
    @endif

    <script>
        window.__META_PAGE_VIEW_EVENT_ID = window.crypto?.randomUUID?.() ?? `${Date.now()}-${Math.random().toString(36).slice(2)}`;
        window.__PBM_META_EVENTS = @js(app(\App\Analytics\MetaEventMapper::class)->forMode(config('analytics.mode')));
    </script>

    @if (filled(config('meta.pixel_id')))
        <script>
            !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=true;n.version='2.0';n.queue=[];
            const loadFbq = () => {
                if (b.getElementById('fb-pixel-script')) return;
                t=b.createElement(e);t.id='fb-pixel-script';t.async=true;t.src=v;
                s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s);
            };
            if ('requestIdleCallback' in window) { requestIdleCallback(loadFbq, { timeout: 2500 }); }
            else { window.addEventListener('load', loadFbq, { once: true }); }
            }(window,document,'script','https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', @js(config('meta.pixel_id')));
        </script>
    @endif

    @if ($gtmId = config('integrations.gtm_container_id'))
        <script>
            window.dataLayer = window.dataLayer || [];
            (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':Date.now(),event:'gtm.js'});
            const loadGtm = () => {
                if (d.getElementById('gtm-script')) return;
                var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';
                j.id='gtm-script';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
            };
            if ('requestIdleCallback' in window) { requestIdleCallback(loadGtm, { timeout: 2500 }); }
            else { window.addEventListener('load', loadGtm, { once: true }); }
            })(window,document,'script','dataLayer',@js($gtmId));
        </script>
    @elseif ($ga4Id = config('integrations.ga4_measurement_id'))
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments)}
            gtag('js', new Date());
            gtag('config', @js($ga4Id));
            const loadGa4 = () => {
                if (document.getElementById('ga4-script')) return;
                const s = document.createElement('script');
                s.id = 'ga4-script'; s.async = true; s.src = 'https://www.googletagmanager.com/gtag/js?id={{ urlencode($ga4Id) }}';
                document.head.appendChild(s);
            };
            if ('requestIdleCallback' in window) { requestIdleCallback(loadGa4, { timeout: 2500 }); }
            else { window.addEventListener('load', loadGa4, { once: true }); }
        </script>
    @endif

    @if ($clarityId = config('integrations.clarity_project_id'))
        <script>
            (function(c,l,a,r,i,t,y){c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
            const loadClarity = () => {
                if (l.getElementById('clarity-script')) return;
                t=l.createElement(r);t.id='clarity-script';t.async=1;t.src='https://www.clarity.ms/tag/'+i;
                y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
            };
            if ('requestIdleCallback' in window) { requestIdleCallback(loadClarity, { timeout: 3000 }); }
            else { window.addEventListener('load', loadClarity, { once: true }); }
            })(window,document,'clarity','script',@js($clarityId));
            const pbmLandingSource = sessionStorage.getItem('pbm_landing_source') || location.pathname;
            clarity('set', 'landing_source', pbmLandingSource);
            clarity('identify', @js(request()->attributes->get('pbm_visitor_id')));
        </script>
    @endif

    <script>
        (() => {
            const appearance = @js($appearance ?? 'system');
            if (appearance === 'dark' || (appearance === 'system' && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark');
            }
        })();
    </script>

    @if (!request()->routeIs('cycle10.landing', 'cycle12.price', 'home', 'toefl-hack', 'bio-ig-toefl-hack'))
        @fonts
    @endif
    @viteReactRefresh
    @vite([request()->routeIs('cycle10.landing') ? 'resources/css/cycle10.css' : 'resources/css/app.css', 'resources/js/app.tsx', "resources/js/pages/{$page['component']}.tsx"])
    <x-inertia::head>
        <title>{{ config('app.name', 'PBM Landing Page Boilerplate') }}</title>
    </x-inertia::head>
</head>
<body class="{{ request()->routeIs('cycle10.landing') ? 'antialiased' : 'font-sans antialiased' }}">
    @if ($gtmId = config('integrations.gtm_container_id'))
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id={{ urlencode($gtmId) }}" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    @endif
    @if (request()->routeIs('cycle12.price', 'home', 'toefl-hack', 'bio-ig-toefl-hack'))
        <script data-page="app" type="application/json">{!! json_encode($page, JSON_HEX_TAG) !!}</script>
        <div id="app">
            @include('cycle12.hero-shell')
        </div>
    @else
        <x-inertia::app />
    @endif
</body>
</html>
