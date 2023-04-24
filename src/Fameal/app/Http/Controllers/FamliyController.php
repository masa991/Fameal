<?php

namespace App\Http\Controllers;

use App\Models\Family;
use App\Models\User;
use Illuminate\Http\Request;

class FamilyController extends Controller
{
  public function __construct()
  {
    $this -> middleware('auth');
  }

  public function create()
  {
    $family = new Family();
    return view('family/create', compact('family'));
  }

  public function store(Request $request)
  {
    $family = new Family();
    $family->name = $request->name;
    $family->save();

    return redirect("/family");
  }

  public function show()
  {

  }
}
