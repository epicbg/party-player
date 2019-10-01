<?php

namespace App\Http\Controllers;

use App\Playlist;
use App\Events\AddSong;
use Illuminate\Http\Request;

class PlaylistController extends Controller
{
    private $playlist;

    public function __construct(Playlist $playlist)
    {
        $this->playlist = $playlist; 
    }

    public function search(Request $request){
        $playlist = $this->playlist->where('key', $request->key)->first();
        
        if(!$playlist){
            $playlist = $this->playlist->create([
                'key' => $request->key
            ]);
        }

        return [
            'type' => 'success',
            'playlist' => $playlist->load('songs')
        ];
    }

    public function addSong(Request $request){
        $playlist = $this->playlist->where('key', $request->key)->first();

        $song = $playlist->songs()->create([
            'data' => json_encode($request->song),
            'inplay' => 0,
            'order' => $playlist->order_of_last_song
        ]);
        
        broadcast(new AddSong($song));
    }
}
