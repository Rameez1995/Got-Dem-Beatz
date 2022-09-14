<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DrumKitLoop extends Model
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
    'strikethrough_price',
    'price',
    'type',
    'genre_id',
    'image',
    'file',
    'status',
  ];

    public function categories()
    {
        return $this->belongsTo(Category::class, 'genre_id');
    }

    public function songs()
    {
        return $this->hasMany(Song::class,'album_id');
    }
    
}
