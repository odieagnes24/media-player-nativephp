<?php

namespace App\Livewire;

use App\Models\Track;
use Livewire\Attributes\On;
use Livewire\Component;

class Player extends Component
{   
    public function render()
    {
        return view('livewire.player');
    }

    #[On('play-track')]
    public function playTrack(Track $track)
    {   
        $next = Track::where('id', '>', $track->id)->first()?->id;
        $prev = Track::where('id', '<', $track->id)->orderBy('id', 'desc')->first()?->id;

        $this->dispatch('load-track', [
            'id' => $track->id,
            'title' => $track->artist .' - '. $track->title,
            'art' => ($track->art != null) ? $track->art : 'null',
            'next' => $next,
            'prev' => $prev,
        ]);
        
        $this->skipRender();
    }
}
