<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
  use HasFactory;

  protected $fillable = [
    'title',
    'description',
    'serving',
    'image',
    'family_id',
  ];

  public function family()
  {
    return $this->belongsTo(Family::class);
  }
  public function ingredient()
  {
    return $this->hasMany(Ingredient::class);
  }
  public function step()
  {
    return $this->hasMany(Step::class);
  }
}
