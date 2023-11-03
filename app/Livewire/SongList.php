<?php

namespace App\Livewire;

use App\Models\Songs;
use Livewire\Component;

class SongList extends Component
{
    public $tracks = [];

    public function mount()
    {
        $this->tracks = Songs::latest()->where('picture', '!=', null)->limit(20)->get();
    }

    public function placeholder()
    {
        return view('livewire.placeholders.track-list');
    }

    public function render()
    {
        return view('livewire.song-list');
    }
}
