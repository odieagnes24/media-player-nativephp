<div>
<div class="px-4 pt-3" style="background-color: #f6f8fb;">
    <div class="d-flex">
        <h2 class="me-4" style="cursor: pointer; border-bottom: solid orange;">List</h2>
        <h2 class="me-4" style="cursor: pointer;">Albums</h2>
        <h2 class="me-4" style="cursor: pointer;">Artist</h2>
    </div>
</div>
<div class="card">
    <div wire:init="doPopulate"></div>
    @foreach ($this->tracks as $key => $track)
        <div class="list-group card-list-group" x-data="{
            is_hover: false
        }">
            <div class="list-group-item">
            <div class="row g-2 align-items-center">
                <div class="col-auto" style="position:relative" wire:click="$dispatch('play-track', { track: '{{ $track->id }}' })" @mouseover="is_hover = true" @mouseout="is_hover = false">
                <div x-show.important="is_hover" class="rounded d-flex justify-content-center align-items-center" style="position:absolute; width:40px; height:40px; background:#f1f5f9; opacity:0.9;">
                    <span style="color: #6c7a91; cursor:pointer;">
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
                </div>
                <img src="@if($track['art'] != null) /storage{{ $track->art }} @else /assets/default_art_1.png @endif" class="rounded" alt="Song" width="40" height="40">
                </div>
                <div class="col">
                    {{ $track->title }}
                <div class="text-muted">
                    {{ $track->artist }}
                </div>
                </div>
                <div class="col-auto text-muted">
                {{ $track->playtime }}
                </div>
                <div class="col-auto">
                    <a href="#" class="link-secondary">
                        <button class="switch-icon" data-bs-toggle="switch-icon">
                        <span class="switch-icon-a text-muted">
                            <!-- Download SVG icon from http://tabler-icons.io/i/heart -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" /></svg>
                        </span>
                        <span class="switch-icon-b text-red">
                            <!-- Download SVG icon from http://tabler-icons.io/i/heart -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" /></svg>
                        </span>
                        </button>
                    </a>
                </div>
                <div class="col-auto lh-1">
                    <div class="dropdown">
                        <a href="#" class="link-secondary" data-bs-toggle="dropdown"><!-- Download SVG icon from http://tabler-icons.io/i/dots -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /><path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /><path d="M19 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /></svg>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="#">
                            Action
                        </a>
                        <a class="dropdown-item" href="#">
                            Another action
                        </a>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
</div>