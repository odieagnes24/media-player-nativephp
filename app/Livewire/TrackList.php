<?php

namespace App\Livewire;

use App\Models\Track;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;

class TrackList extends Component
{
    public string $tab = 'list';        // list | albums | artist

    public int $perPage = 100;           // grows as the user scrolls the List tab

    public ?string $selectedAlbum = null;

    public ?string $selectedArtist = null;

    /* ---- List tab ------------------------------------------------------- */

    #[Computed]
    public function tracks()
    {
        return Track::latest()->paginate($this->perPage);
    }

    public function loadMore()
    {
        if ($this->tracks->hasMorePages()) {
            $this->perPage += 100;
        }
    }

    /* ---- Favorites tab -------------------------------------------------- */

    #[Computed]
    public function favorites()
    {
        return Track::where('favorite', true)->latest()->get();
    }

    /* ---- Albums tab ----------------------------------------------------- */

    #[Computed]
    public function albums()
    {
        return Track::query()
            ->selectRaw('album, MAX(artist) as artist, COUNT(*) as track_count, MIN(CASE WHEN art IS NOT NULL THEN id END) as cover_id')
            ->groupBy('album')
            ->orderBy('album')
            ->get();
    }

    #[Computed]
    public function albumTracks()
    {
        if ($this->selectedAlbum === null) {
            return collect();
        }

        return Track::where('album', $this->selectedAlbum)
            ->orderBy('title')
            ->get();
    }

    public function openAlbum(int $index)
    {
        $this->selectedAlbum = $this->albums[$index]->album ?? null;
    }

    /* ---- Artist tab ----------------------------------------------------- */

    #[Computed]
    public function artists()
    {
        return Track::query()
            ->selectRaw('artist, COUNT(*) as track_count, MIN(CASE WHEN art IS NOT NULL THEN id END) as cover_id')
            ->groupBy('artist')
            ->orderBy('artist')
            ->get();
    }

    #[Computed]
    public function artistTracks()
    {
        if ($this->selectedArtist === null) {
            return collect();
        }

        return Track::where('artist', $this->selectedArtist)
            ->orderBy('album')
            ->orderBy('title')
            ->get();
    }

    public function openArtist(int $index)
    {
        $this->selectedArtist = $this->artists[$index]->artist ?? null;
    }

    /* ---- Navigation ----------------------------------------------------- */

    // Runs whenever $tab changes (it is entangled with the tab bar in the view).
    public function updatedTab()
    {
        $this->back();
        $this->perPage = 100;
    }

    // Fired by the scanner when the library changes — the re-render this triggers
    // recomputes the track/album/artist queries, so new tracks appear.
    #[On('library-updated')]
    public function refreshLibrary()
    {
        //
    }

    public function back()
    {
        $this->selectedAlbum = null;
        $this->selectedArtist = null;
    }

    /* ---- Playback ------------------------------------------------------- */

    // Play a track AND make the current view the up-next queue.
    public function play(int $id)
    {
        $queue = $this->currentQueueTracks()->map(fn ($t) => [
            'id'       => $t->id,
            'title'    => $t->title,
            'artist'   => $t->artist,
            'album'    => $t->album,
            'art'      => (bool) $t->art,
            'favorite' => (bool) $t->favorite,
        ])->values();

        $this->dispatch('queue-play', ['queue' => $queue, 'start' => $id]);
        $this->skipRender();   // playback doesn't change the list UI
    }

    /* ---- Player-bar actions (dispatched from the now-playing bar) -------- */

    // Heart button on the player bar toggles the currently-playing track.
    #[On('player-favorite')]
    public function favoriteFromPlayer($id)
    {
        $this->toggleFavorite((int) $id);
    }

    // Clicking the title on the player bar jumps to that album.
    #[On('player-open-album')]
    public function openAlbumByName($name)
    {
        $this->tab = 'albums';
        $this->selectedArtist = null;
        $this->selectedAlbum = $name;
        $this->perPage = 100;
    }

    // Clicking the artist on the player bar jumps to that artist.
    #[On('player-open-artist')]
    public function openArtistByName($name)
    {
        $this->tab = 'artist';
        $this->selectedAlbum = null;
        $this->selectedArtist = $name;
        $this->perPage = 100;
    }

    // The ordered set of tracks backing whatever view is active.
    private function currentQueueTracks()
    {
        if ($this->tab === 'favorites') {
            return $this->favorites;
        }
        if ($this->tab === 'albums' && $this->selectedAlbum !== null) {
            return $this->albumTracks;
        }
        if ($this->tab === 'artist' && $this->selectedArtist !== null) {
            return $this->artistTracks;
        }

        // List tab (or grids with nothing opened): the whole library, list order.
        return Track::latest()->get();
    }

    /* ---- Track actions -------------------------------------------------- */

    public function toggleFavorite(int $id)
    {
        $track = Track::find($id);

        if ($track) {
            $track->favorite = ! $track->favorite;
            $track->save();
        }
    }

    public function removeTrack(int $id)
    {
        $track = Track::find($id);

        if ($track) {
            if ($track->art) {
                Storage::disk('public')->delete(ltrim($track->art, '/'));
            }

            $track->delete();
        }
    }

    public function render()
    {
        return view('livewire.track-list');
    }

    public function placeholder()
    {
        return view('livewire.placeholders.track-list');
    }
}
