<?php

namespace App\Http\Controllers;

use App\Models\Schedule;

class CalendarController extends Controller
{
    public function index()
    {
        $events = Schedule::all()->map(function ($schedule) {

            return [
                'title' => $schedule->judul,
                'start' => $schedule->tanggal,
            ];

        });

        return view('calendar', compact('events'));
    }
}