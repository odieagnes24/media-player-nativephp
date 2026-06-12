<div>
    {{-- Tabs — `tab` is entangled with the server property, so the highlight
         updates instantly on click while the content switch syncs in the back. --}}
    <div class="lv-tabs px-4 pt-3" x-data="{ tab: $wire.entangle('tab').live }">
        <div class="d-flex">
            <span class="lv-tab me-4" :class="tab === 'list' && 'active'"      @click="tab = 'list'">List</span>
            <span class="lv-tab me-4" :class="tab === 'favorites' && 'active'" @click="tab = 'favorites'">Favorites</span>
            <span class="lv-tab me-4" :class="tab === 'albums' && 'active'"    @click="tab = 'albums'">Albums</span>
            <span class="lv-tab me-4" :class="tab === 'artist' && 'active'"    @click="tab = 'artist'">Artist</span>
        </div>
    </div>

    {{-- Content dims briefly only while a tab switch is loading --}}
    <div wire:target="tab" wire:loading.delay.class="lv-loading">

    {{-- ============================== LIST ============================== --}}
    @if($tab === 'list')
        <div class="card">
            @forelse ($this->tracks as $track)
                @include('livewire.partials.track-row', ['track' => $track])
            @empty
                <div class="lv-empty">No tracks yet — open Settings and scan a folder.</div>
            @endforelse

            @if($this->tracks->hasMorePages())
                {{-- Auto-load the next page when this sentinel scrolls into view --}}
                <div wire:key="load-more" x-data
                     x-init="new IntersectionObserver((e) => e[0].isIntersecting && $wire.loadMore())
                                .observe($el)"
                     class="lv-loadmore">
                    Loading more…
                </div>
            @endif
        </div>

    {{-- ============================== FAVORITES ======================== --}}
    @elseif($tab === 'favorites')
        <div class="card">
            @forelse ($this->favorites as $track)
                @include('livewire.partials.track-row', ['track' => $track])
            @empty
                <div class="lv-empty">No favorites yet — tap the &#9825; on any track to add it here.</div>
            @endforelse
        </div>

    {{-- ============================== ALBUMS =========================== --}}
    @elseif($tab === 'albums')
        @if($selectedAlbum === null)
            <div class="lv-grid px-4 py-3">
                @forelse ($this->albums as $i => $album)
                    <div class="lv-card" wire:key="album-{{ $i }}" wire:click="openAlbum({{ $i }})">
                        <img class="lv-card-art"
                             src="{{ $album->cover_id ? '/art/' . $album->cover_id : '/assets/default_art_1.png' }}"
                             onerror="this.onerror=null;this.src='/assets/default_art_1.png';" alt="">
                        <div class="lv-card-title">{{ $album->album }}</div>
                        <div class="lv-card-sub">{{ $album->artist }} · {{ $album->track_count }} {{ \Illuminate\Support\Str::plural('track', $album->track_count) }}</div>
                    </div>
                @empty
                    <div class="lv-empty">No albums yet.</div>
                @endforelse
            </div>
        @else
            <div class="lv-detail-head px-4 py-3 d-flex align-items-center">
                <button class="btn-back me-3" wire:click="back">&larr;</button>
                <div>
                    <div class="lv-detail-title">{{ $selectedAlbum }}</div>
                    <div class="lv-detail-sub">{{ $this->albumTracks->count() }} {{ \Illuminate\Support\Str::plural('track', $this->albumTracks->count()) }}</div>
                </div>
            </div>
            <div class="card">
                @foreach ($this->albumTracks as $track)
                    @include('livewire.partials.track-row', ['track' => $track])
                @endforeach
            </div>
        @endif

    {{-- ============================== ARTIST =========================== --}}
    @elseif($tab === 'artist')
        @if($selectedArtist === null)
            <div class="lv-grid px-4 py-3">
                @forelse ($this->artists as $i => $artist)
                    <div class="lv-card lv-card--round" wire:key="artist-{{ $i }}" wire:click="openArtist({{ $i }})">
                        <img class="lv-card-art"
                             src="{{ $artist->cover_id ? '/art/' . $artist->cover_id : '/assets/default_art_1.png' }}"
                             onerror="this.onerror=null;this.src='/assets/default_art_1.png';" alt="">
                        <div class="lv-card-title">{{ $artist->artist }}</div>
                        <div class="lv-card-sub">{{ $artist->track_count }} {{ \Illuminate\Support\Str::plural('track', $artist->track_count) }}</div>
                    </div>
                @empty
                    <div class="lv-empty">No artists yet.</div>
                @endforelse
            </div>
        @else
            <div class="lv-detail-head px-4 py-3 d-flex align-items-center">
                <button class="btn-back me-3" wire:click="back">&larr;</button>
                <div>
                    <div class="lv-detail-title">{{ $selectedArtist }}</div>
                    <div class="lv-detail-sub">{{ $this->artistTracks->count() }} {{ \Illuminate\Support\Str::plural('track', $this->artistTracks->count()) }}</div>
                </div>
            </div>
            <div class="card">
                @foreach ($this->artistTracks as $track)
                    @include('livewire.partials.track-row', ['track' => $track])
                @endforeach
            </div>
        @endif
    @endif
    </div>{{-- /content --}}
</div>
