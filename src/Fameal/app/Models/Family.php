<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
  use HasFactory;

  protected $fillable = [
    'name',
  ];

  public function user()
  {
    return $this->hasMany(User::class);
  }
  public function schedule()
  {
    return $this->hasMany(Schedule::class);
  }
  public function recipe()
  {
    return $this->hasMany(Recipe::class);
  }
}
