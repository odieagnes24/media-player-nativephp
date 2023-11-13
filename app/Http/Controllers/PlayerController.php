<?php

namespace App\Http\Controllers;

use App\Models\Songs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class PlayerController extends Controller
{
    public function readfile($data)
    {
        $track_path = json_decode(Crypt::decrypt($data), true); 
        if(file_exists($track_path['path']))
        {
            return response()->file($track_path['path'], ['Content-Type' => $track_path['mime']]);
        }
    }
}
