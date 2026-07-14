<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index()
    {
        $notes = Note::latest()->get();
        return view('notes.index', compact('notes'));
    }

    public function create()
    {
        return view('notes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
        ]);

        Note::create($request->all());

        return redirect()->route('notes.index')
            ->with('success', 'Catatan berhasil ditambahkan.');
    }

    public function edit(Note $note)
    {
        return view('notes.edit', compact('note'));
    }

    public function update(Request $request, Note $note)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
        ]);

        $note->update($request->all());

        return redirect()->route('notes.index')
            ->with('success', 'Catatan berhasil diperbarui.');
    }

    public function destroy(Note $note)
    {
        $note->delete();

        return redirect()->route('notes.index')
            ->with('success', 'Catatan berhasil dihapus.');
    }
}