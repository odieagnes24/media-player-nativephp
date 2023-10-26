<?php

namespace App\Livewire;

use App\Http\Controllers\PathController;
use App\Models\Path;
use Livewire\Component;
use Native\Laravel\Dialog;

class Settings extends Component
{
    public function render()
    {
        return view('livewire.settings', [
            'paths' => Path::all()
        ]);
    }

    public function addFolder()
    {
        $path = Dialog::new()
                ->folders()
                ->open();

        if($path != null)
        {
            Path::updateOrCreate([
                'path' => $path
            ]);
        }
    }

    public function remove(Path $path)
    {
        $path->delete();
    }

    public function doScan()
    {
        // dd('t4est');
        $path_con = new PathController;
        $path_con->doScan();
    }
}
