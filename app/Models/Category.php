<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  use HasFactory;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name',
    'desc',
    'image',
    'status',
  ];

  public function drum_kit_loops()
  {
      return $this->hasMany(DrumKitLoop::class,'genre_id');
  }
}
