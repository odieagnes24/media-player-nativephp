<?php

namespace App\Livewire;

use App\Models\Track;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class TrackList extends Component
{
    use WithPagination;

    public $page = 1;

    public $total_page = 0;

    public function mount()
    {
        $this->total_page = $this->tracks->lastPage();
    }

    #[Computed()]
    public function tracks()
    {
        return Track::latest()->paginate(20);
    }

    public function render()
    {   
        return view('livewire.track-list');
    }

    public function placeholder()
    {
        return view('livewire.placeholders.track-list');
    }

    public function nextBatch()
    {
        $this->page++;

        $new_tracks = Track::latest()->paginate(20, page: $this->page);
 
        $this->tracks = $this->tracks->concat($new_tracks);
    }    
    
    public function doPopulate()
    {   
        while($this->page <= $this->total_page) {
            $this->nextBatch();
        }
    }
}
