<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Family;
use App\Models\Invite;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
  /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

  use RegistersUsers;

  /**
   * Where to redirect users after registration.
   *
   * @var string
   */
  protected $redirectTo = RouteServiceProvider::HOME;

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('guest');
  }

  /**
   * Get a validator for an incoming registration request.
   *
   * @param  array  $data
   * @return \Illuminate\Contracts\Validation\Validator
   */
  protected function validator(array $data)
  {
    return Validator::make($data, [
      'name' => ['required', 'string', 'max:255'],
      'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
      'password' => ['required', 'string', 'min:8', 'confirmed'],
    ]);
  }

  /**
   * Create a new user instance after a valid registration.
   *
   * @param  array  $data
   * @return \App\Models\User
   */
  protected function create(array $data)
  {
    $checkUniqueName = true;
    while ($checkUniqueName) {
      $familyName = Str::random(16);
      $checkUniqueName = Family::where('name', $familyName)->exists();
    }

    $family = Family::create([
      'name' => $familyName,
    ]);

    $checkUniqueName = true;
    while ($checkUniqueName) {
      $userName = Str::random(16);
      $checkUniqueName = User::where('name', $userName)->exists();
    }

    return User::create([
      'family_id' => $family->id,
      'name' => $data['name'],
      'email' => $data['email'],
      'password' => Hash::make($data['password']),
    ]);
  }

  public function showInvitedUserRegistrationForm(string $token)
  {
    $invite = Invite::where('token', $token)->first();

    if (!isset($invite)) {
      abort(401);
    }

    return view('auth.invite_register', [
      'token' => $invite->token,
      'family_id' => $invite->family_id,
      'email' => $invite->email,
    ]);
  }
  public function registerInvitedUser(Request $request)
  {
    if (!$invite = Invite::where('token', $request->token)->first()) {
      abort(401);
    }

    $request->validate([
      'name' => ['required', 'string', 'max:50'],
      'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users', 'email')->whereNull('deleted_at'),],
      'password' => ['required', 'string', 'min:8', 'confirmed'],
    ]);

    $checkUniqueName = true;
    while ($checkUniqueName) {
      $userName = Str::random(16);
      $checkUniqueName = User::where('name', $userName)->exists();
    }

    $user = User::create([
      'name' => $userName,
      'email' => $request->email,
      'password' => Hash::make($request->password),
      'family_id' => $request->family_id,
    ]);

    $this->guard()->login($user, true);

    $invite->delete();

    return $this->registered($request, $user)
      ?: redirect($this->redirectPath());
  }
  public function redirectPath()
    {
      $family = Family::where('id', Auth::user()->family_id)->first();
      return "families/$family->id/edit";
    }
}
