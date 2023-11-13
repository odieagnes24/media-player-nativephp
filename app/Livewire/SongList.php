<?php

namespace App\Livewire;

use App\Models\Songs;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Computed;
use Livewire\Component;

class SongList extends Component
{
    public $tracks = [];

    public function mount()
    {
        $this->tracks = collect(Storage::disk('public')->json('/scanned/data.json'));
    }

    // #[Computed(persist: true)]
    // public function tracks()
    // {
    //     return collect(Storage::disk('public')->json('/scanned/data.json'));
    // }

    public function placeholder()
    {
        return view('livewire.placeholders.track-list');
    }

    public function render()
    {
        return view('livewire.song-list');
    }

    public function doPlay($key)
    {
        $track = $this->tracks[$key];
        $this->dispatch('play-track', 
            id: $track['id'], 
            data: Crypt::encrypt(json_encode(['path' => $track['path'], 'mime' => $track['mime_type']])), 
            title: $track['artist'] .' - ' . $track['title'],
            art: $track['art'],
        );
        
        $this->skipRender();
    }
}
