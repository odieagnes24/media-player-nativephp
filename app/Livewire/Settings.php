<?php

namespace App\Livewire;

use App\Http\Controllers\PathController;
use App\Models\Path;
use App\Models\Songs;
use Exception;
use getID3 as GlobalGetID3;
use Livewire\Component;
use Native\Laravel\Dialog;

class Settings extends Component
{
    private $files = [];

    private $allowed_formats = ['mp3', 'flac', 'ogg'];

    public $progress = 0;

    public function doScan()
    {
        // ini_set('memory_limit', '1024M');
        // sleep(1);
        $this->progress = 0;
        
        $paths = Path::all();
  
        if(empty($paths))
        {
            abort(404, 'No directory found!');
        }

        foreach($paths as $path)
        {
           $this->deepScan($path->path);
        }

        $this->analyzeFiles();
    }

    private function analyzeFiles()
    {
        // $getId3 = new GlobalGetID3;
        // $track = $getId3->analyze('C:\web\media-player-native-php\public\songs\DNA.mp3');
      
        // $getId3 = new GlobalGetID3;
        // $track2 = $getId3->analyze('C:\web\media-player-native-php\public\songs\Am I Wrong - Nico & Vinz.mp3');
        
        // $getId3 = new GlobalGetID3;
        // $track3 = $getId3->analyze('C:\web\media-player-native-php\public\songs\Passionfruit.flac');

        // dd($track, $track2, $track3);

        // Set the chunk size (adjust this according to your needs)
        $chunkSize = 10;

        // Calculate the total number of chunks
        $totalChunks = ceil(count($this->files) / $chunkSize);
 
        // Initialize a progress variable
        $progress = 0;
        
        foreach (array_chunk($this->files, $chunkSize) as $chunk) {
            // Process the current chunk here
            foreach($chunk as $file)
            {
                $this->stream(  
                    to: 'current_track',
                    content: $file,
                    replace: true,
                );

                $getId3 = new GlobalGetID3;
                $track = $getId3->analyze($file);

                $this->saveTrack($track);
            }

            // Update the progress
            $progress += 1;
        
            // Calculate the percentage progress
            $this->progress = ($progress / $totalChunks) * 100;
            
            // Stream the progress 
            $this->stream(  
                to: 'count',
                content: number_format($this->progress, 2) . '%',
                replace: true,
            );
     
            $this->stream(  
                to: 'count_progress',
                content: '<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: '. intval($this->progress) .'%"></div>',
                replace: true,
            );
        }
        
        $this->progress = 0;
        $this->dispatch('close-scan-modal');
    }

    private function saveTrack($track)
    {
        $path = $track['filenamepath'];
        $title = pathinfo($track['filenamepath'], PATHINFO_FILENAME);
        $artist = 'Unknown Artis';
        $album = 'Unknown Album';
        $playtime = '0:00';
        $picture = null;
    
        if(array_key_exists('tags', $track))
        {
            $tag = current($track['tags']);

            if(array_key_exists('title', $tag))
            {
                if(is_array($tag['title']))
                {
                    $title = current($tag['title']);
                }
                else
                {
                    $title = $tag['title'];
                }
            }
          
            if(array_key_exists('album', $tag))
            {
                if(is_array($tag['album']))
                {
                    $album = current($tag['album']);
                }
                else
                {
                    $album = $tag['album'];
                }
            }
         
            if(array_key_exists('artist', $tag))
            {
                if(is_array($tag['artist']))
                {
                    $artist = current($tag['artist']);
                }
                else
                {
                    $artist = $tag['artist'];
                }
            }
        }
    
        if(array_key_exists('playtime_string', $track))
        {
            $playtime = $track['playtime_string'];
        }

        if(array_key_exists('comments', $track))
        {
            if(array_key_exists('picture', $track['comments']))
            {
                $attempt = current($track['comments']['picture']);

                if(array_key_exists('data', $attempt))
                {
                    $picture = $attempt['data'];
                    // $picture = base64_encode($attempt['data']);
                } 
            }
        }

        Songs::updateOrCreate([
            'title' => $title,
            'path' => $path,
        ], [
            'path' => $path,
            'title' => $title,
            'artist' => $artist,
            'album' => $album,
            'playtime' => $playtime,
            'picture' => $picture,
        ]);
    }

    private function deepScan($directory)
    {
        try{
            
            $contents = scandir($directory);

            if ($contents !== false) {
                foreach ($contents as $entry) {
                    if ($entry != "." && $entry != "..") {
                        $entryPath = $directory . '/' . $entry;
    
                        if (is_file($entryPath)) {
                            if(in_array(pathinfo($entryPath)['extension'], $this->allowed_formats)) {
                                array_push($this->files, $entryPath);
                            }
                        } elseif (is_dir($entryPath)) {
                            $this->deepScan($entryPath); // Recursively scan subdirectories
                        }
                    }
                }
            }
        }
        catch(Exception $e){
            
            abort(404, 'Directory Not Found');
        }
    }

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
}
