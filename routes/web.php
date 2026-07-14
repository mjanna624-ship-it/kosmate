<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\BillController;
use App\Models\Schedule;
use App\Models\Bill;
use App\Http\Controllers\TodoController;
use App\Models\Todo;
use App\Http\Controllers\NoteController;
use App\Models\Note;
use App\Http\Controllers\CalendarController;

Route::resource('schedules', ScheduleController::class)
    ->middleware(['auth'])
    ->names('schedules');

Route::resource('bills', BillController::class)
    ->middleware(['auth'])
    ->names('bills');

Route::resource('todos', TodoController::class)
    ->middleware(['auth'])
    ->names('todos');

Route::patch('/todos/{todo}/selesai', [TodoController::class, 'selesai'])
    ->middleware('auth')
    ->name('todos.selesai');

Route::resource('notes', NoteController::class)
    ->middleware(['auth'])
    ->names('notes');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {

$totalJadwal = Schedule::count();
$totalTagihan = Bill::count();
$totalTodo = Todo::count();
$totalCatatan = Note::count();

$tugasSelesai = Todo::where('status', 'Selesai')->count();

$progress = $totalTodo > 0
    ? round(($tugasSelesai / $totalTodo) * 100)
    : 0;

$jadwalHariIni = Schedule::whereDate('tanggal', now()->toDateString())
    ->orderBy('jam')
    ->get();

$tagihanMendekati = Bill::where('status', 'Belum Lunas')
    ->orderBy('jatuh_tempo')
    ->take(3)
    ->get();

return view('dashboard', compact(
    'totalJadwal',
    'totalTodo',
    'totalTagihan',
    'totalCatatan',
    'jadwalHariIni',
    'tagihanMendekati',
    'tugasSelesai',
    'progress'
));

})->middleware(['auth','verified'])->name('dashboard');

Route::get('/calendar', [CalendarController::class, 'index'])
    ->middleware('auth')
    ->name('calendar');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

});

require __DIR__.'/auth.php';
