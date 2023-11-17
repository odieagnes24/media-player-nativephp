<?php

namespace App\Http\Controllers;

use App\Models\Track;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class PlayerController extends Controller
{
    // public function readfile($data)
    // {
    //     $track_path = json_decode(Crypt::decrypt($data), true); 
    //     if(file_exists($track_path['path']))
    //     {
    //         return response()->file($track_path['path'], ['Content-Type' => $track_path['mime']]);
    //     }
    // }

    public function readfile(Track $track)
    {
        if(file_exists($track->path))
        {
            return response()->file($track->path, ['Content-Type' => $track->mime_type]);
        }
    }
}
