<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Tampilkan semua data departemen.
     */
    public function index()
    {
        // Ambil semua data departemen dari database
        $departments = Department::latest()->paginate(10);

        // Kirim ke view departments/index.blade.php
        return view('departments.index', compact('departments'));
    }

    /**
     * Tampilkan form tambah departemen.
     */
    public function create()
    {
        return view('departments.create');
    }

    /**
     * Simpan data departemen baru ke database.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_departemen' => 'required|string|max:100|unique:departments,nama_departemen',
        ], [
            'nama_departemen.required' => 'Nama departemen wajib diisi.',
            'nama_departemen.unique' => 'Nama departemen sudah ada.'
        ]);

        // Simpan ke database
        Department::create([
            'nama_departemen' => $request->nama_departemen,
        ]);

        // Kembali ke halaman utama dengan pesan sukses
        return redirect()->route('departments.index')->with('success', 'Departemen berhasil ditambahkan.');
    }

    /**
     * Tampilkan detail satu departemen.
     */
    public function show(Department $department)
    {
        return view('departments.show', compact('department'));
    }

    /**
     * Tampilkan form edit departemen.
     */
    public function edit(Department $department)
    {
        return view('departments.edit', compact('department'));
    }

    /**
     * Update data departemen.
     */
    public function update(Request $request, Department $department)
    {
        $request->validate([
            'nama_departemen' => 'required|string|max:100|unique:departments,nama_departemen,' . $department->id,
        ], [
            'nama_departemen.required' => 'Nama departemen wajib diisi.',
            'nama_departemen.unique' => 'Nama departemen sudah digunakan.'
        ]);

        // Update data
        $department->update([
            'nama_departemen' => $request->nama_departemen,
        ]);

        return redirect()->route('departments.index')->with('success', 'Departemen berhasil diperbarui.');
    }

    /**
     * Hapus data departemen.
     */
    public function destroy(Department $department)
    {
        $department->delete();
        return redirect()->route('departments.index')->with('success', 'Departemen berhasil dihapus.');
    }
}
