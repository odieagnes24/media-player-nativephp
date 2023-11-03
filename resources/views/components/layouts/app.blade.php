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
            <!-- Navbar -->
            <div class="sticky-top">
                <div class="bg-yellow-lt px-4 pt-2 d-flex">
                    <div class="w-100 d-flex align-items-center">
                        <h1 class="navbar-brand navbar-brand-autodark pe-0 pe-md-3 ">
                            <a href="#">
                                <img src="/assets/logo/png/logo-no-background.png" width="150"  alt="Tabler" class="navbar-brand-image">
                            </a>
                        </h1>
                        <div class="d-flex align-items-center mx-3 justify-content-between" style="width: 180px;">
                            <span style="color: #551a8b; cursor:pointer;">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-player-skip-back-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M19.496 4.136l-12 7a1 1 0 0 0 0 1.728l12 7a1 1 0 0 0 1.504 -.864v-14a1 1 0 0 0 -1.504 -.864z" stroke-width="0" fill="currentColor"></path>
                                    <path d="M4 4a1 1 0 0 1 .993 .883l.007 .117v14a1 1 0 0 1 -1.993 .117l-.007 -.117v-14a1 1 0 0 1 1 -1z" stroke-width="0" fill="currentColor"></path>
                                </svg>
                            </span>
                            <span style="color: #551a8b; cursor:pointer;" id="play">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-player-play-filled" id="btn-play" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M6 4v16a1 1 0 0 0 1.524 .852l13 -8a1 1 0 0 0 0 -1.704l-13 -8a1 1 0 0 0 -1.524 .852z" stroke-width="0" fill="currentColor"></path>
                                </svg>

                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-player-pause-filled d-none" id="btn-pause" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M9 4h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h2a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2z" stroke-width="0" fill="currentColor"></path>
                                    <path d="M17 4h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h2a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2z" stroke-width="0" fill="currentColor"></path>
                                </svg>
                            </span>
                            <span style="color: #551a8b; cursor:pointer;">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-player-skip-forward-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M3 5v14a1 1 0 0 0 1.504 .864l12 -7a1 1 0 0 0 0 -1.728l-12 -7a1 1 0 0 0 -1.504 .864z" stroke-width="0" fill="currentColor"></path>
                                    <path d="M20 4a1 1 0 0 1 .993 .883l.007 .117v14a1 1 0 0 1 -1.993 .117l-.007 -.117v-14a1 1 0 0 1 1 -1z" stroke-width="0" fill="currentColor"></path>
                                </svg>
                            </span>
                            <span style="color: #551a8b; cursor:pointer;">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrows-shuffle-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M18 4l3 3l-3 3"></path>
                                    <path d="M18 20l3 -3l-3 -3"></path>
                                    <path d="M3 7h3a5 5 0 0 1 5 5a5 5 0 0 0 5 5h5"></path>
                                    <path d="M3 17h3a5 5 0 0 0 5 -5a5 5 0 0 1 5 -5h5"></path>
                                </svg>
                            </span>
                            <span style="color: #551a8b; cursor:pointer;">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-repeat" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M4 12v-3a3 3 0 0 1 3 -3h13m-3 -3l3 3l-3 3"></path>
                                    <path d="M20 12v3a3 3 0 0 1 -3 3h-13m3 3l-3 -3l3 -3"></path>
                                </svg>
                            </span>
                            <span style="color: #551a8b; cursor:pointer;">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-volume" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M15 8a5 5 0 0 1 0 8"></path>
                                    <path d="M17.7 5a9 9 0 0 1 0 14"></path>
                                    <path d="M6 15h-2a1 1 0 0 1 -1 -1v-4a1 1 0 0 1 1 -1h2l3.5 -4.5a.8 .8 0 0 1 1.5 .5v14a.8 .8 0 0 1 -1.5 .5l-3.5 -4.5"></path>
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div class="flex-shrink d-flex align-items-center justify-content-end">
                        <span style="color: #551a8b; cursor:pointer;" class="float-right">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-settings" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z"></path>
                                <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path>
                            </svg>
                        </span>
                    </div>
                </div>
                <div class="px-4 bg-yellow-lt d-flex align-items-center w-100">
                    <div style="min-height: 100px;" class="d-flex align-items-center w-100">
                            <div>
                                <div class="me-2">
                                    <img src="/static/tracks/a4fb1d293bd8d3fd38352418c50fcf1369a7a87d.jpg" class="rounded" alt="Górą ty" width="80px" height="80px">
                                </div>
                                </div>
                                <div id="waveform" style="width:92%;">
                                    <div id="time">0:00</div>
                                    <div id="song_title"> Calvin Harris - Slide </div>
                                    <div id="duration">0:00</div>
                                </div>
                            <div>
                        </div>
                    </div>
                </div>
                <div class="px-4 pt-3" style="background-color: #f6f8fb;">
                    <div class="d-flex">
                        <h2 class="me-4" style="cursor: pointer; border-bottom: solid orange;">List</h2>
                        <h2 class="me-4" style="cursor: pointer;">Albums</h2>
                        <h2 class="me-4" style="cursor: pointer;">Artist</h2>
                    </div>
                </div>
            </div>
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

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const wavesurfer = WaveSurfer.create({
                    container: '#waveform',
                    waveColor: '#4F4A85',
                    progressColor: '#383351',
                    url: '/songs/Passionfruit.flac',
                    responsive: true,
                    height: 60,
                    // width: '400px',
                    autoplay: false, // Set autoplay to false
                    hideScrollbar: true,
                    // autoCenter: true,
                    fillParent: true,
                    dragToSeek: true,
                    autoscroll: false,
                })

                let btn_play = document.getElementById('btn-play')
                let btn_pause = document.getElementById('btn-pause')
                let song_title = document.getElementById('song_title')

                document.getElementById('play').addEventListener('click', function (e) {
                    e.preventDefault()
                    wavesurfer.zoom(70)
                    wavesurfer.playPause()


                    let is_playing = wavesurfer.isPlaying()
                    if(is_playing)
                    {
                        btn_play.classList.add('d-none')
                        btn_pause.classList.remove('d-none')
                    }
                    else
                    {
                        btn_pause.classList.add('d-none')
                        btn_play.classList.remove('d-none')
                    }
                });

                const formatTime = (seconds) => {
                    const minutes = Math.floor(seconds / 60)
                    const secondsRemainder = Math.round(seconds) % 60
                    const paddedSeconds = `0${secondsRemainder}`.slice(-2)
                    return `${minutes}:${paddedSeconds}`
                }

                const timeEl = document.querySelector('#time')
                const durationEl = document.querySelector('#duration')
                wavesurfer.on('decode', (duration) => (durationEl.textContent = formatTime(duration) ))
                wavesurfer.on('timeupdate', (currentTime) => (timeEl.textContent = formatTime(currentTime)))

                wavesurfer.on('finish', (currentTime) => {
                    btn_pause.classList.add('d-none')
                    btn_play.classList.remove('d-none')
                })
             
                wavesurfer.on('loading', (percent) => {
                    song_title.innerHTML = 'Loading ' + percent + '%'

                    if(percent  == 100)
                    {
                        song_title.innerHTML = 'Drake - Passionfruit'
                    }
                })
            });
        </script>

        @stack('my-scripts')
    </body>
</html>
