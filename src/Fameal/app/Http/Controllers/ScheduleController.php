<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;

class ScheduleController extends Controller
{
  public function scheduleAdd(Request $request)
  {
    $request->validate([
      'start_date' => 'required|integer',
      'end_date' => 'required|integer',
      'menu_name' => 'required|max:32',
    ]);

    $schedule = new Schedule;
    $schedule->start_date = date('Y-m-d', $request->input('start_date') / 1000);
    $schedule->end_date = date('Y-m-d', $request->input('end_date') / 1000);
    $schedule->menu_name = $request->input('menu_name');
    $schedule->save();
    return;
  }
}
