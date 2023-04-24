<?php

namespace App\Models;

use App\Mail\BareMail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Notifications\InvitationFamilyNotification;
use Illuminate\Notifications\Notifiable;


class Invite extends Model
{
  use HasFactory, Notifiable;

  protected $fillable = [
    'family_id',
    'email',
    'token',
  ];

  public function sendInvitationFamilyNotification($token)
  {
    $this->notify(new InvitationFamilyNotification($token, new BareMail()));
  }
}
