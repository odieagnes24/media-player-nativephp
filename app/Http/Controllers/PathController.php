<?php

namespace App\Http\Controllers;

use App\Models\Path;
use Exception;
use getID3 as GlobalGetID3;
use Owenoj\LaravelGetId3\GetId3;
use Illuminate\Http\Request;

class PathController extends Controller
{
    private $files = [];

    private $allowed_formats = ['mp3', 'flac', 'ogg'];

    public function doScan()
    {
        $paths = Path::all();
  
        if(empty($paths))
        {
            abort(404, 'No directory found!');
        }

        foreach($paths as $path)
        {
           $this->deepScan($path->path);
        }

        dd($this->files);
    }

    private function deepScan($directory)
    {
        // $track = GetId3::fromDiskAndPath('local', '');
        // dd($track->getArtwork());

        $getId3 = new GlobalGetID3;
        $track = $getId3->analyze('C:\web\media-player-native-php\public\songs\DNA.mp3');
      
        $getId3 = new GlobalGetID3;
        $track2 = $getId3->analyze('C:\web\media-player-native-php\public\songs\Am I Wrong - Nico & Vinz.mp3');
        
        $getId3 = new GlobalGetID3;
        $track3 = $getId3->analyze('C:\web\media-player-native-php\public\songs\Passionfruit.flac');

        dd($track, $track2, $track3);

        try{
            $contents = scandir($directory);

            if ($contents !== false) {
                foreach ($contents as $entry) {
                    if ($entry != "." && $entry != "..") {
                        $entryPath = $directory . '/' . $entry;
    
                        if (is_file($entryPath)) {
                            if(in_array(pathinfo($entryPath)['extension'], $this->allowed_formats)) {
                                $getId3 = new GlobalGetID3;
                                $track = $getId3->analyze($entryPath);

                                dd($track);
                                array_push($this->files, $entryPath);
                            }
                        } elseif (is_dir($entryPath)) {
                            // echo "Directory: $entryPath\n";
                            $this->deepScan($entryPath); // Recursively scan subdirectories
                        }
                    }
                }
            }
        }
        catch(Exception $e){
            dd($e);
            abort(404, 'Directory Not Found');
        }
    
    }
}
