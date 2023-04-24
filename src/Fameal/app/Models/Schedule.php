<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
  use HasFactory;
  protected $fillable = [
    'menu_name',
    'start_date',
    'end_date',
    'family_id',
  ];
  public function family()
  {
    return $this->belongsTo(Family::class);
  }
}
