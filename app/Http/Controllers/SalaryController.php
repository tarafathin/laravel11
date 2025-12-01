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
            'periodic'           => 'required|string|max:255',
            'total_gaji'         => 'required|numeric|min:0',
            'status_pembayaran'  => 'required|string|max:50',
            'keterangan'         => 'nullable|string',
        ]);

        Salary::create([
            'karyawan_id'        => $request->karyawan_id,
            'periodic'           => $request->periodic,
            'total_gaji'         => $request->total_gaji,
            'status_pembayaran'  => $request->status_pembayaran,
            'keterangan'         => $request->keterangan,
        ]);

        return redirect()->route('salaries.index')->with('success', 'Data gaji berhasil ditambahkan.');
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
            'periodic'           => 'required|string|max:255',
            'total_gaji'         => 'required|numeric|min:0',
            'status_pembayaran'  => 'required|string|max:50',
            'keterangan'         => 'nullable|string',
        ]);

        $salary->update([
            'karyawan_id'        => $request->karyawan_id,
            'periodic'           => $request->periodic,
            'total_gaji'         => $request->total_gaji,
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
