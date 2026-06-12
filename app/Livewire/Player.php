<?php

namespace App\Livewire;

use Livewire\Component;

class Player extends Component
{
    // Playback is driven entirely client-side by the queue in player.blade.php.
    // TrackList::play() dispatches the 'queue-play' browser event with the
    // ordered queue for the active view; this component just renders the UI.
    public function render()
    {
        return view('livewire.player');
    }
}
