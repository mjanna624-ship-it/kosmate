<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::latest()->get();

        return view('schedules.index', compact('schedules'));
    }

    public function create()
    {
        return view('schedules.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'judul' => 'required',
        'tanggal' => 'required',
        'jam' => 'required',
    ]);

    Schedule::create([
        'judul' => $request->judul,
        'tanggal' => $request->tanggal,
        'jam' => $request->jam,
        'keterangan' => $request->keterangan,
    ]);

    return redirect()->route('schedules.index')
        ->with('success', 'Jadwal berhasil ditambahkan.');
}

public function edit(Schedule $schedule)
{
    return view('schedules.edit', compact('schedule'));
}

public function update(Request $request, Schedule $schedule)
{
    $request->validate([
        'judul' => 'required',
        'tanggal' => 'required',
        'jam' => 'required',
    ]);

    $schedule->update($request->all());

    return redirect()
        ->route('schedules.index')
        ->with('success', 'Jadwal berhasil diperbarui.');
}

public function destroy(Schedule $schedule)
{
    $schedule->delete();

    return redirect()->route('schedules.index')
        ->with('success', 'Jadwal berhasil dihapus.');
}
}