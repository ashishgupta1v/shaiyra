<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="#031632">
        <meta name="description" content="Shaiyra Gupta — A heirloom digital journal capturing every moment of a beautiful life.">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
        <meta name="apple-mobile-web-app-title" content="Shaiyra">
        <title>Shaiyra Gupta — Heirloom Journal</title>

        <!-- PWA Manifest -->
        <link rel="manifest" href="/manifest.json">
        <link rel="apple-touch-icon" href="/icons/icon-192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/icons/icon-96.png">

        <!-- Fonts & Icons -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600&family=Manrope:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&display=swap" rel="stylesheet">

        @vite(['resources/sass/app.scss', 'resources/js/app.js'])

        <!-- Service Worker Registration -->
        <script>
            if ('serviceWorker' in navigator) {
                window.addEventListener('load', () => {
                    navigator.serviceWorker.register('/sw.js')
                        .then(reg => console.log('[SW] Registered:', reg.scope))
                        .catch(err => console.log('[SW] Registration failed:', err));
                });
            }
        </script>
    </head>
    <body class="antialiased" style="background-color:#fcf9f5; color:#031632;">
        <div id="app">
            <router-view></router-view>
        </div>
    </body>
</html>
