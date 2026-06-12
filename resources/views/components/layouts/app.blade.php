<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="light">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Page Title' }}</title>

        <!-- Apply saved theme before paint to avoid a flash -->
        <script>
            (function () {
                var saved = localStorage.getItem('lv-theme') || 'light';
                document.documentElement.setAttribute('data-bs-theme', saved);
            })();
            window.toggleTheme = function () {
                var el = document.documentElement;
                var next = el.getAttribute('data-bs-theme') === 'dark' ? 'light' : 'dark';
                el.setAttribute('data-bs-theme', next);
                localStorage.setItem('lv-theme', next);
                window.dispatchEvent(new Event('lv:themechange'));
            };
        </script>

        <!-- Tabler Core -->
        <script src="/assets/dist/js/tabler.min.js"></script>
        <!-- CSS files -->
        <link href="/assets/dist/css/tabler.min.css" rel="stylesheet"/>
        <!-- LaraVibe dark-neutral theme (must load after Tabler) -->
        <link href="/assets/css/laravibe.css" rel="stylesheet"/>

        <style>
            #waveform {
                cursor: pointer;
                position: relative;
                /* In a flex row, default min-width:auto lets the wave canvas
                   overflow past the container (breaks layout + seeking).
                   min-width:0 makes flex-fill use the *remaining* space. */
                min-width: 0;
                overflow: hidden;
            }
            #time,
            #duration {
                position: absolute;
                z-index: 11;
                top: 50%;
                margin-top: -1px;
                transform: translateY(-50%);
                font-size: 11px;
                background: rgba(0, 0, 0, 0.75);
                padding: 2px;
                color: #ddd;
            }
            #time {
                left: 0;
            }
            #duration {
                right: 0;
            }

            #song_title {
                font-size: 15px;
            }   
        </style>

        @livewireStyles

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <div class="page">
            
            @livewire('player')

            <div class="page-wrapper">
                <!-- Page body -->
                <div class="page-body m-0">
                    <div class="">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>

        @livewireScripts

        @stack('my-scripts')

        {{-- Keep the sticky library tabs pinned exactly below the player,
             whatever the player's height is (it changes with window size). --}}
        <script>
            (function () {
                function syncPlayerHeight() {
                    var p = document.getElementById('lv-player');
                    if (p) {
                        document.documentElement.style.setProperty('--player-height', p.offsetHeight + 'px');
                    }
                }
                window.addEventListener('load', syncPlayerHeight);
                window.addEventListener('resize', syncPlayerHeight);
                document.addEventListener('DOMContentLoaded', function () {
                    syncPlayerHeight();
                    var p = document.getElementById('lv-player');
                    if (p && window.ResizeObserver) {
                        new ResizeObserver(syncPlayerHeight).observe(p);
                    }
                });
            })();
        </script>
    </body>
</html>
