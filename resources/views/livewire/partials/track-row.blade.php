{{-- Single track row. Expects $track (App\Models\Track). --}}
<div class="list-group card-list-group" x-data="{ is_hover: false }" wire:key="track-{{ $track->id }}">
    <div class="list-group-item">
        <div class="row g-2 align-items-center">
            <div class="col-auto" style="position:relative" wire:click="play({{ $track->id }})" @mouseover="is_hover = true" @mouseout="is_hover = false">
                <div x-show.important="is_hover" class="track-art-overlay rounded d-flex justify-content-center align-items-center" style="position:absolute; width:40px; height:40px;">
                    <span style="cursor:pointer;">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M6 4v16a1 1 0 0 0 1.524 .852l13 -8a1 1 0 0 0 0 -1.704l-13 -8a1 1 0 0 0 -1.524 .852z" stroke-width="0" fill="currentColor"></path>
                        </svg>
                    </span>
                </div>
                <img src="{{ $track->art != null ? '/art/' . $track->id : '/assets/default_art_1.png' }}" onerror="this.onerror=null;this.src='/assets/default_art_1.png';" class="rounded" alt="Song" width="40" height="40">
            </div>
            <div class="col">
                <div class="track-title">{{ $track->title }}</div>
                <div class="track-artist">{{ $track->artist }}</div>
            </div>
            <div class="col-auto track-time">{{ $track->playtime }}</div>
            <div class="col-auto">
                <button type="button"
                        class="btn-row-action @if($track->favorite) is-fav @endif"
                        wire:click.stop="toggleFavorite({{ $track->id }})"
                        title="{{ $track->favorite ? 'Remove from favorites' : 'Add to favorites' }}">
                    @if($track->favorite)
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-filled" width="22" height="22" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="currentColor" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" /></svg>
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="22" height="22" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" /></svg>
                    @endif
                </button>
            </div>
            <div class="col-auto lh-1">
                <div class="dropdown">
                    <a href="#" class="btn-row-action" data-bs-toggle="dropdown" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="22" height="22" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /><path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /><path d="M19 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /></svg>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <button class="dropdown-item" type="button" wire:click="play({{ $track->id }})">Play</button>
                        <button class="dropdown-item" type="button" wire:click="toggleFavorite({{ $track->id }})">
                            {{ $track->favorite ? 'Remove from favorites' : 'Add to favorites' }}
                        </button>
                        <div class="dropdown-divider"></div>
                        <button class="dropdown-item text-danger" type="button"
                                wire:click="removeTrack({{ $track->id }})"
                                wire:confirm="Remove “{{ $track->title }}” from your library?">
                            Remove from library
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
