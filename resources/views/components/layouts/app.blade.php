<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Page Title' }}</title> 
    
        <!-- Tabler Core -->
        <script src="/assets/dist/js/tabler.min.js"></script>
        <!-- CSS files -->
        <link href="/assets/dist/css/tabler.min.css" rel="stylesheet"/>

        <style>
            #waveform {
                cursor: pointer;
                position: relative;
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

        @vite('resources/js/app.js')
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
    </body>
</html>
