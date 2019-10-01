<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    protected $guarded = ['id'];


    // Relations

    public function songs()
    {
        return $this->hasMany(Song::class);
    }

    // Accessors

    public function getOrderOfLastSongAttribute(){
        $last_song = $this->songs()->orderBy('order', 'desc')->first();
        if($last_song){
            return $last_song->order;
        }
        return 0;
    }

    public function getDataAttribute(){
        return json_decode($this->data);
    }
}
