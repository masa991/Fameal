<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Family;
use App\Models\Schedule;
use App\Models\Recipe;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class FamilyController extends Controller
{
  public function __construct()
  {
    $this -> middleware('auth');
  }

  public function edit()
  {
    $family = Family::where('id', Auth::user()->family_id)->first();
    return view('families/edit', ['family'=>$family]);
  }

  public function update(Request $request)
  {
    $family = Family::findOrFail($request->id);
    $family->name = $request->name;
    $family->save();

    return redirect("families/$family->id");
  }

  public function show($id)
  {
    $today = Carbon::now();
    $family = Family::findOrFail($id);
    $users = User::with('family');
    $schedule = Schedule::with('family')->where('start_date', '<=', $today)->where('end_date', '>=', $today)->first();
    if (empty($schedule)) {
      $schedule = ['menu_name' => ""];
    }
    $recipe = Recipe::with('family')->where('title', $schedule['menu_name'])->first();
    return view('families/show', [
      'id' => $id,
      'family' => $family,
      'users' => $users,
      'schedule' => $schedule,
      'recipe' => $recipe,
    ]);
  }
}
