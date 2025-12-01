<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use App\Models\Employee;
use Illuminate\Http\Request;

class LeaveController extends Controller
{
    public function index()
    {
        $leave = Leave::with('employee')->paginate(10);

        return view('leave.index', compact('leave'));
    }

    public function create()
    {
        $employees = Employee::orderBy('nama_lengkap')->get();

        return view('leave.create', compact('employees'));
    }

    public function store(Request $request)
    {
        // VALIDASI
        $validated = $request->validate([
            'karyawan_id'      => 'required|exists:employees,id',
            'tanggal_mulai'    => 'required|date',
            'tanggal_selesai'  => 'required|date|after_or_equal:tanggal_mulai',
            'jumlah_hari'      => 'nullable|integer|min:1',
            'jenis_cuti'       => 'required|string',
            'status_pengajuan' => 'nullable|string',
            'keterangan'       => 'nullable|string',
        ]);

        // DEFAULT status kalau kosong
        if (empty($validated['status_pengajuan'])) {
            $validated['status_pengajuan'] = 'menunggu';
        }

        // SIMPAN
        Leave::create($validated);

        return redirect()
            ->route('leave.index')
            ->with('success', 'Data cuti berhasil ditambahkan.');
    }

    public function edit(Leave $leave)
    {
        $employees = Employee::orderBy('nama_lengkap')->get();

        return view('leave.edit', compact('leave', 'employees'));
    }

    public function update(Request $request, Leave $leave)
    {
        $validated = $request->validate([
            'karyawan_id'      => 'required|exists:employees,id',
            'tanggal_mulai'    => 'required|date',
            'tanggal_selesai'  => 'required|date|after_or_equal:tanggal_mulai',
            'jumlah_hari'      => 'nullable|integer|min:1',
            'jenis_cuti'       => 'required|string',
            'status_pengajuan' => 'required|string',
            'keterangan'       => 'nullable|string',
        ]);

        $leave->update($validated);

        return redirect()
            ->route('leave.index')
            ->with('success', 'Data cuti berhasil diperbarui.');
    }

    public function show(Leave $leave)
    {
        $leave->load('employee');

        return view('leave.show', compact('leave'));
    }

    public function destroy(Leave $leave)
    {
        $leave->delete();

        return redirect()
            ->route('leave.index')
            ->with('success', 'Data cuti berhasil dihapus.');
    }
}
