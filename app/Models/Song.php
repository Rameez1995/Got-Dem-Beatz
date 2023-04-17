<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
  use HasFactory;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'title',
    'desc',
    'lyrics',
    'bpm',
    'producer_id',
    'min',
    'sec',
    'image',
    'price',
    'song_file',
    'sorting',
    'status',
  ];

    public function drum_kit_loops()
    {
        return $this->belongsTo(DrumKitLoop::class, 'album_id');
    }

    public function producers()
    {
        return $this->belongsTo(Producer::class, 'producer_id');
    }

    public function song_tags()
    {
        return $this->hasMany(SongTag::class, 'song_id');
    }

    public function users()
    {
      return $this->belongsToMany(
        User::class,
        'user_songs',
        'song_id',
        'user_id');
      }

}
