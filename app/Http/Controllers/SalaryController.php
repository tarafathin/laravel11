<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use App\Models\Employee;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    public function index()
    {
        $salaries = Salary::with('employee')->latest()->paginate(10);
        return view('salaries.index', compact('salaries'));
    }

    public function create()
    {
        $employees = Employee::orderBy('nama_lengkap')->get();
        return view('salaries.create', compact('employees'));
    }

    public function store(Request $request)
{
    $request->validate([
        'karyawan_id'        => 'required|exists:employees,id',
        'bulan'              => 'required|date_format:Y-m', // contoh: 2025-01
        'gaji_pokok'         => 'required|numeric|min:0',
        'tunjangan'          => 'nullable|numeric|min:0',
        'potongan'           => 'nullable|numeric|min:0',
        'status_pembayaran'  => 'required|string|max:50',
        'keterangan'         => 'nullable|string',
    ]);

    $total_gaji = 
          ($request->gaji_pokok ?? 0)
        + ($request->tunjangan ?? 0)
        - ($request->potongan ?? 0);

    Salary::create([
        'karyawan_id'        => $request->karyawan_id,
        'bulan'              => $request->bulan,
        'gaji_pokok'         => $request->gaji_pokok,
        'tunjangan'          => $request->tunjangan ?? 0,
        'potongan'           => $request->potongan ?? 0,
        'total_gaji'         => $total_gaji,
        'status_pembayaran'  => $request->status_pembayaran,
        'keterangan'         => $request->keterangan,
    ]);

    return redirect()->route('salaries.index')
                     ->with('success', 'Data gaji berhasil ditambahkan.');
}

    public function show(Salary $salary)
    {
        $salary->load('employee');
        return view('salaries.show', compact('salary'));
    }

    public function edit(Salary $salary)
    {
        $employees = Employee::orderBy('nama_lengkap')->get();
        return view('salaries.edit', compact('salary', 'employees'));
    }

    public function update(Request $request, Salary $salary)
    {
        $request->validate([
            'karyawan_id'        => 'required|exists:employees,id',
            'bulan'              => 'nullable|string|max:10',
            'gaji_pokok'         => 'required|numeric|min:0',
            'tunjangan'          => 'nullable|numeric|min:0',
            'potongan'           => 'nullable|numeric|min:0',
            'status_pembayaran'  => 'required|string|max:50',
            'keterangan'         => 'nullable|string',
        ]);

        $total_gaji = 
            ($request->gaji_pokok ?? 0) +
            ($request->tunjangan ?? 0) -
            ($request->potongan ?? 0);

        $salary->update([
            'karyawan_id'        => $request->karyawan_id,
            'bulan'              => $request->bulan ?? now()->format('Y-m'),
            'gaji_pokok'         => $request->gaji_pokok,
            'tunjangan'          => $request->tunjangan ?? 0,
            'potongan'           => $request->potongan ?? 0,
            'total_gaji'         => $total_gaji,
            'status_pembayaran'  => $request->status_pembayaran,
            'keterangan'         => $request->keterangan,
        ]);

        return redirect()->route('salaries.index')->with('success', 'Data gaji berhasil diperbarui.');
    }

    public function destroy(Salary $salary)
    {
        $salary->delete();
        return redirect()->route('salaries.index')->with('success', 'Data gaji berhasil dihapus.');
    }
}
