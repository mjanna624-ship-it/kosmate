<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use Illuminate\Http\Request;

class BillController extends Controller
{
    public function index()
{
    $bills = Bill::latest()->get();

    return view('bills.index', compact('bills'));
}

public function create()
{
    return view('bills.create');
}

public function store(Request $request)
{
    $request->validate([
        'nama' => 'required',
        'jumlah' => 'required|numeric',
        'jatuh_tempo' => 'required|date',
        'status' => 'required',
    ]);

    Bill::create([
        'nama' => $request->nama,
        'jumlah' => $request->jumlah,
        'jatuh_tempo' => $request->jatuh_tempo,
        'status' => $request->status,
    ]);

    return redirect()
        ->route('bills.index')
        ->with('success', 'Tagihan berhasil ditambahkan.');
}

public function edit(Bill $bill)
{
    return view('bills.edit', compact('bill'));
}

public function update(Request $request, Bill $bill)
{
    $request->validate([
        'nama' => 'required',
        'jumlah' => 'required|numeric',
        'jatuh_tempo' => 'required|date',
        'status' => 'required',
    ]);

    $bill->update([
        'nama' => $request->nama,
        'jumlah' => $request->jumlah,
        'jatuh_tempo' => $request->jatuh_tempo,
        'status' => $request->status,
    ]);

    return redirect()
        ->route('bills.index')
        ->with('success', 'Tagihan berhasil diperbarui.');
}

public function destroy(Bill $bill)
{
    $bill->delete();

    return redirect()
        ->route('bills.index')
        ->with('success', 'Tagihan berhasil dihapus.');
}

}