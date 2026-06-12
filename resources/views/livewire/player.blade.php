<div class="sticky-top" id="lv-player">
    <div class="player-bar px-4 pt-2 d-flex">
        <div class="w-100 d-flex align-items-center">
            <h1 class="navbar-brand navbar-brand-autodark pe-0 pe-md-3 ">
                <a href="#">
                    <img src="/assets/logo/png/logo-no-background.png" width="150"  alt="Tabler" class="navbar-brand-image">
                </a>
            </h1>
            <div class="d-flex align-items-center mx-3 gap-3">
                <span class="player-control" id="prev_btn">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-player-skip-back-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M19.496 4.136l-12 7a1 1 0 0 0 0 1.728l12 7a1 1 0 0 0 1.504 -.864v-14a1 1 0 0 0 -1.504 -.864z" stroke-width="0" fill="currentColor"></path>
                        <path d="M4 4a1 1 0 0 1 .993 .883l.007 .117v14a1 1 0 0 1 -1.993 .117l-.007 -.117v-14a1 1 0 0 1 1 -1z" stroke-width="0" fill="currentColor"></path>
                    </svg>
                </span>
                <span class="player-control" id="play">
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
                <span class="player-control" id="next_btn">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-player-skip-forward-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M3 5v14a1 1 0 0 0 1.504 .864l12 -7a1 1 0 0 0 0 -1.728l-12 -7a1 1 0 0 0 -1.504 .864z" stroke-width="0" fill="currentColor"></path>
                        <path d="M20 4a1 1 0 0 1 .993 .883l.007 .117v14a1 1 0 0 1 -1.993 .117l-.007 -.117v-14a1 1 0 0 1 1 -1z" stroke-width="0" fill="currentColor"></path>
                    </svg>
                </span>
                <span class="player-control" id="shuffle_btn" title="Shuffle">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrows-shuffle-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M18 4l3 3l-3 3"></path>
                        <path d="M18 20l3 -3l-3 -3"></path>
                        <path d="M3 7h3a5 5 0 0 1 5 5a5 5 0 0 0 5 5h5"></path>
                        <path d="M3 17h3a5 5 0 0 0 5 -5a5 5 0 0 1 5 -5h5"></path>
                    </svg>
                </span>
                <span class="player-control" id="repeat_btn" title="Repeat">
                    {{-- normal repeat (off / repeat-all) --}}
                    <svg id="repeat-icon" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-repeat" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M4 12v-3a3 3 0 0 1 3 -3h13m-3 -3l3 3l-3 3"></path>
                        <path d="M20 12v3a3 3 0 0 1 -3 3h-13m3 3l-3 -3l3 -3"></path>
                    </svg>
                    {{-- repeat-one --}}
                    <svg id="repeat-one-icon" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-repeat-once d-none" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M4 12v-3a3 3 0 0 1 3 -3h13m-3 -3l3 3l-3 3"></path>
                        <path d="M20 12v3a3 3 0 0 1 -3 3h-13m3 3l-3 -3l3 -3"></path>
                        <path d="M11 11l1 -1v4"></path>
                    </svg>
                </span>
                <span class="player-control" id="volume_btn" title="Mute / unmute">
                    <svg id="volume-icon" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-volume" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M15 8a5 5 0 0 1 0 8"></path>
                        <path d="M17.7 5a9 9 0 0 1 0 14"></path>
                        <path d="M6 15h-2a1 1 0 0 1 -1 -1v-4a1 1 0 0 1 1 -1h2l3.5 -4.5a.8 .8 0 0 1 1.5 .5v14a.8 .8 0 0 1 -1.5 .5l-3.5 -4.5"></path>
                    </svg>
                    <svg id="volume-mute-icon" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-volume-off d-none" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M15 8a5 5 0 0 1 1.912 4.512"></path>
                        <path d="M17.7 5a9 9 0 0 1 1.297 11.066"></path>
                        <path d="M9.069 5.054l.93 -.954a.8 .8 0 0 1 1.5 .5v2.448"></path>
                        <path d="M12 12v6a.8 .8 0 0 1 -1.5 .5l-3.5 -4.5h-2a1 1 0 0 1 -1 -1v-4a1 1 0 0 1 1 -1h2"></path>
                        <path d="M3 3l18 18"></path>
                    </svg>
                </span>
                <input type="range" id="volume_slider" class="vol-slider" min="0" max="1" step="0.01" value="1" title="Volume">
            </div>
        </div>
        <div class="flex-shrink d-flex align-items-center justify-content-end gap-2">
            <span>
                <button type="button" class="btn btn-theme-toggle p-1" onclick="window.toggleTheme()" title="Toggle light / dark">
                    <!-- shown in dark mode: switch to light -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon theme-icon-sun" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
                        <path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7"></path>
                    </svg>
                    <!-- shown in light mode: switch to dark -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon theme-icon-moon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z"></path>
                    </svg>
                </button>
            </span>
            <span class="float-right">
                <button class="btn btn-settings p-1" data-bs-toggle="modal" data-bs-target="#settingsModal">
                    <svg xmlns="http://www.w3.org/2000/svg" class="m-0 icon icon-tabler icon-tabler-settings" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z"></path>
                        <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path>
                    </svg>
                </button>
            </span>
        </div>
    </div>
    <div class="px-4 player-bar d-flex align-items-center w-100">
        <div style="min-height: 100px;" class="d-flex align-items-center w-100">
                <div class="flex-shrink-0 me-2">
                    <img id="album_art" src="/assets/default_art_1.png" onerror="this.onerror=null;this.src='/assets/default_art_1.png';" class="rounded" alt="Track" width="80px" height="80px">
                </div>
                <div id="waveform" class="flex-fill">
                    <div id="time">0:00</div>
                    <div id="song_title">Loading...</div>
                    <div id="duration">0:00</div>
                </div>
            </div>
        </div>

    @teleport('body')
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="settingsModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="settingsModalLabel">Settings</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @livewire('settings')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>
    @endteleport
</div>

@push('my-scripts')
    <script>
        document.addEventListener('livewire:init', function () {
            const themeColor = (name) =>
                getComputedStyle(document.documentElement).getPropertyValue(name).trim()

            // Zoom level in pixels-per-second. Higher = more zoomed in and the
            // wave scrolls faster. This is what makes the wave wider than the
            // container so it can scroll DJ-style. Tune to taste.
            const ZOOM = 100

            const wavesurfer = WaveSurfer.create({
                container: '#waveform',
                waveColor: themeColor('--lv-wave'),
                progressColor: themeColor('--lv-wave-progress'),
                cursorColor: themeColor('--lv-text'),
                cursorWidth: 2,
                height: 60,
                autoplay: false,
                hideScrollbar: true,
                fillParent: true,
                minPxPerSec: ZOOM,   // zoom in so the wave is scrollable
                autoScroll: true,    // scroll to follow playback
                autoCenter: true,    // keep the playhead centered while scrolling
                dragToSeek: true,
            })

            // Recolor the waveform when the light/dark theme is toggled
            window.addEventListener('lv:themechange', function () {
                wavesurfer.setOptions({
                    waveColor: themeColor('--lv-wave'),
                    progressColor: themeColor('--lv-wave-progress'),
                    cursorColor: themeColor('--lv-text'),
                })
            })

            let btn_play = document.getElementById('btn-play')
            let btn_pause = document.getElementById('btn-pause')
            let song_title = document.getElementById('song_title')
            let album_art = document.getElementById('album_art')
            let prev_btn = document.getElementById('prev_btn')
            let next_btn = document.getElementById('next_btn')

            // ===== Play queue (client-side) =====
            // queue: ordered [{ id, title, art:bool }] for the active view.
            // order: indices into queue defining playback order (shuffled or not).
            // pos:   current position within order.
            let queue = []
            let order = []
            let pos = 0

            // Playback modes
            let shuffleOn = false
            let repeatMode = 0   // 0 = off, 1 = repeat all, 2 = repeat one
            let lastVolume = 1

            const shuffle_btn     = document.getElementById('shuffle_btn')
            const repeat_btn      = document.getElementById('repeat_btn')
            const repeat_icon     = document.getElementById('repeat-icon')
            const repeat_one_icon = document.getElementById('repeat-one-icon')
            const volume_btn      = document.getElementById('volume_btn')
            const volume_slider   = document.getElementById('volume_slider')
            const volume_icon     = document.getElementById('volume-icon')
            const volume_mute_icon= document.getElementById('volume-mute-icon')

            const showPlaying = () => { btn_play.classList.add('d-none');  btn_pause.classList.remove('d-none') }
            const showPaused  = () => { btn_pause.classList.add('d-none'); btn_play.classList.remove('d-none') }

            const currentTrack = () => queue[order[pos]]

            // Build the play order. When shuffling, keep `firstQueueIdx` first and
            // randomise the rest (a shuffle bag — no repeats until the queue is done).
            function buildOrder(firstQueueIdx) {
                if (shuffleOn) {
                    const rest = queue.map((_, i) => i).filter(i => i !== firstQueueIdx)
                    for (let i = rest.length - 1; i > 0; i--) {
                        const j = Math.floor(Math.random() * (i + 1))
                        ;[rest[i], rest[j]] = [rest[j], rest[i]]
                    }
                    order = [firstQueueIdx, ...rest]
                    pos = 0
                } else {
                    order = queue.map((_, i) => i)
                    pos = firstQueueIdx
                }
            }

            function playAt() {
                const t = currentTrack()
                if (t) loadTrack(t)
            }

            function nextTrack(auto = false) {
                if (!queue.length) return
                if (auto && repeatMode === 2) { wavesurfer.setTime(0); wavesurfer.play(); return }

                if (pos < order.length - 1) { pos++; playAt(); return }

                // reached the end of the queue
                if (repeatMode === 1) {                                  // repeat all -> loop
                    if (shuffleOn) buildOrder(Math.floor(Math.random() * queue.length))
                    else pos = 0
                    playAt()
                    return
                }
                if (auto) showPaused()                                   // no repeat: stop
            }

            function prevTrack() {
                if (!queue.length) return
                if (wavesurfer.getCurrentTime() > 3) { wavesurfer.setTime(0); return }  // restart current
                if (pos > 0) { pos--; playAt() } else { wavesurfer.setTime(0) }
            }

            prev_btn.addEventListener('click', prevTrack)
            next_btn.addEventListener('click', () => nextTrack(false))

            // The active view (list / favorites / album / artist) sets the queue.
            Livewire.on('queue-play', (event) => {
                const data = event[0] ?? event
                queue = data.queue || []
                const startIdx = Math.max(0, queue.findIndex(t => t.id === data.start))
                buildOrder(startIdx)
                playAt()
            })

            // ---- Shuffle ------------------------------------------------------
            shuffle_btn.addEventListener('click', () => {
                shuffleOn = !shuffleOn
                shuffle_btn.classList.toggle('is-active', shuffleOn)
                if (queue.length) buildOrder(order[pos])   // reorder upcoming, keep current playing
            })

            // ---- Repeat (off -> all -> one) -----------------------------------
            repeat_btn.addEventListener('click', () => {
                repeatMode = (repeatMode + 1) % 3
                repeat_btn.classList.toggle('is-active', repeatMode !== 0)
                repeat_icon.classList.toggle('d-none', repeatMode === 2)
                repeat_one_icon.classList.toggle('d-none', repeatMode !== 2)
            })

            // ---- Volume -------------------------------------------------------
            function applyVolume(v) {
                wavesurfer.setVolume(v)
                volume_slider.value = v
                const muted = v <= 0
                volume_icon.classList.toggle('d-none', muted)
                volume_mute_icon.classList.toggle('d-none', !muted)
            }
            volume_slider.addEventListener('input', (e) => {
                const v = parseFloat(e.target.value)
                if (v > 0) lastVolume = v
                applyVolume(v)
            })
            volume_btn.addEventListener('click', () => {
                applyVolume(wavesurfer.getVolume() > 0 ? 0 : (lastVolume || 1))
            })

            // ---- Play / Pause -------------------------------------------------
            document.getElementById('play').addEventListener('click', function (e) {
                e.preventDefault()
                wavesurfer.playPause()
                wavesurfer.isPlaying() ? showPlaying() : showPaused()
            });

            const formatTime = (seconds) => {
                const minutes = Math.floor(seconds / 60)
                const secondsRemainder = Math.round(seconds) % 60
                const paddedSeconds = `0${secondsRemainder}`.slice(-2)
                return `${minutes}:${paddedSeconds}`
            }

            const timeEl = document.querySelector('#time')
            const durationEl = document.querySelector('#duration')

            // Title of the track currently being loaded (used by the loading handler)
            let currentTitle = ''

            // Register playback listeners ONCE (not per loadTrack, or they stack up)
            wavesurfer.on('decode', (duration) => (durationEl.textContent = formatTime(duration)))
            wavesurfer.on('timeupdate', (currentTime) => (timeEl.textContent = formatTime(currentTime)))

            // When a track ends, advance through the queue (handles repeat / shuffle).
            wavesurfer.on('finish', () => nextTrack(true))

            wavesurfer.on('loading', (percent) => {
                song_title.innerHTML = percent < 100 ? ('Loading ' + percent + '%') : currentTitle
            })

            wavesurfer.on('ready', () => {
                song_title.innerHTML = currentTitle
                wavesurfer.setOptions({ minPxPerSec: ZOOM })           // re-assert zoom after load
                wavesurfer.setVolume(parseFloat(volume_slider.value))  // volume resets on each load
                wavesurfer.play()
                showPlaying()
            })

            // t = { id, title, art:bool }
            function loadTrack(t)
            {
                currentTitle = t.title
                album_art.setAttribute('src', t.art ? '/art/' + t.id : '/assets/default_art_1.png')
                wavesurfer.load('/readfile/' + t.id)
            }
        });

    </script>
@endpush