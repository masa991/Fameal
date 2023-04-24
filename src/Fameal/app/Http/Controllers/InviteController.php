<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Invite;
use App\Mail\BareMail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use App\Notifications\InvitationFamilyNotification;

class InviteController extends Controller
{
  use Notifiable;

  public function showLinkRequestForm()
  {
    return view('invite');
  }

  public function sendInviteFamilyEmail(Request $request)
  {
    $this->validateEmail($request);

    do {
      $token = Str::random(16);
    } while (Invite::where('token', $token)->first());

    $invite = Invite::create([
      'email' => $request->get('email'),
      'family_id' => Auth::user()->family_id,
      'token' => $token,
    ]);

    $invite->notify(new InvitationFamilyNotification($token, new BareMail()));

    return redirect()
      ->back()
      ->with('status', 'メール送信が完了しました。');
  }

  protected function validateEmail(Request $request)
  {
    $request->validate([
      'email' => 'required|email',
    ]);
  }
}
