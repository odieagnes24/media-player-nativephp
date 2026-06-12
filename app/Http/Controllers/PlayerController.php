<?php

namespace App\Http\Controllers;

use App\Models\Track;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

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

    public function art(Track $track)
    {
        // Art is written via Storage::disk('public'), which NativePHP relocates to a
        // per-user writable folder. Serve it through this disk so we read from the
        // real location instead of relying on the public/storage symlink.
        $disk = Storage::disk('public');
        $relative = ltrim((string) $track->art, '/');

        if ($track->art && $disk->exists($relative)) {
            return $disk->response($relative);
        }

        return response()->file(public_path('assets/default_art_1.png'));
    }
}
