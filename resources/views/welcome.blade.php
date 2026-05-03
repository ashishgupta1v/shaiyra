<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel Vue Tailwind</title>

        <!-- Fonts & Icons -->
        <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,400;0,600;0,700;1,400&family=Work+Sans:wght@400;500;600&family=Manrope:wght@400;500;700&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />

        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    </head>
    <body class="antialiased font-body-md bg-background text-on-surface">
        <div id="app">
            <router-view></router-view>
        </div>
    </body>
</html>
