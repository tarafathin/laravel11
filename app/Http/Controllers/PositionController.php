<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    /**
     * Tampilkan daftar semua posisi/jabatan.
     */
    public function index()
    {
        $positions = Position::latest()->paginate(10);
        return view('positions.index', compact('positions'));
    }

    /**
     * Tampilkan form untuk menambah posisi baru.
     */
    public function create()
    {
        return view('positions.create');
    }

    /**
     * Simpan posisi baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_jabatan' => 'required|string|max:100|unique:positions,nama_jabatan',
            'gaji_pokok'   => 'required|numeric|min:0',
        ], [
            'nama_jabatan.required' => 'Nama jabatan wajib diisi.',
            'nama_jabatan.unique' => 'Nama jabatan sudah digunakan.',
            'gaji_pokok.required' => 'Gaji pokok wajib diisi.',
            'gaji_pokok.numeric' => 'Gaji pokok harus berupa angka.'
        ]);

        Position::create([
            'nama_jabatan' => $request->nama_jabatan,
            'gaji_pokok' => $request->gaji_pokok
        ]);

        return redirect()->route('positions.index')->with('success', 'Jabatan berhasil ditambahkan.');
    }

    /**
     * Tampilkan detail satu jabatan.
     */
    public function show(Position $position)
    {
        return view('positions.show', compact('position'));
    }

    /**
     * Tampilkan form edit jabatan.
     */
    public function edit(Position $position)
    {
        return view('positions.edit', compact('position'));
    }

    /**
     * Update data jabatan di database.
     */
    public function update(Request $request, Position $position)
    {
        $request->validate([
            'nama_jabatan' => 'required|string|max:100|unique:positions,nama_jabatan,' . $position->id,
            'gaji_pokok'   => 'required|numeric|min:0',
        ], [
            'nama_jabatan.required' => 'Nama jabatan wajib diisi.',
            'gaji_pokok.required' => 'Gaji pokok wajib diisi.',
        ]);

        $position->update([
            'nama_jabatan' => $request->nama_jabatan,
            'gaji_pokok' => $request->gaji_pokok
        ]);

        return redirect()->route('positions.index')->with('success', 'Jabatan berhasil diperbarui.');
    }

    /**
     * Hapus jabatan dari database.
     */
    public function destroy(Position $position)
    {
        $position->delete();
        return redirect()->route('positions.index')->with('success', 'Jabatan berhasil dihapus.');
    }
}
