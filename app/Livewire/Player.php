<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;

class Player extends Component
{   
    public function render()
    {
        return view('livewire.player');
    }

    #[On('play-track')]
    public function playTrack($id, $data, $title, $art)
    {   
        $this->dispatch('load-track', [
            'id' => $id,
            'data' => $data,
            'title' => $title,
            'art' => $art,
        ]);
        
        $this->skipRender(); 
    }
}
