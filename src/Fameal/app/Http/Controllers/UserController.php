<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
  public function edit()
  {
    return view('users.edit', ['user' => Auth::user()]);
  }
  public function update(Request $request)
  {
    $user = User::find($request->id);
    $user->nickname = $request->nickname;

    if ($request->file('avatar')->isValid()) {
      $image = $request->file('avatar');
      $path = Storage::disk('s3')->put('/', $image);
      $user->avatar = Storage::disk('s3')->url($path);
    }

    $user->save();

    return redirect("families/$user->family_id");
  }
}
