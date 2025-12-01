<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employee;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    /**
     * Menampilkan semua data absensi.
     */
    public function index()
    {
        $attendances = Attendance::with('employee')->latest()->paginate(10);
        return view('attendance.index', compact('attendances'));
    }

    /**
     * Menampilkan form tambah absensi baru.
     */
    public function create()
    {
        $employees = Employee::orderBy('nama_lengkap')->get();
        return view('attendance.create', compact('employees'));
    }

    /**
     * Menyimpan data absensi baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:employees,id',
            'tanggal' => 'required|date',
            'waktu_masuk' => 'nullable|string',
            'waktu_keluar' => 'nullable|string|after_or_equal:waktu_masuk',
            'status_absensi' => 'required|in:hadir,izin,sakit,alpha'
        ], [
            'karyawan_id.required' => 'Pilih nama karyawan.',
            'tanggal.required' => 'Tanggal wajib diisi.',
            'status_absensi.required' => 'Status absensi wajib dipilih.',
            'waktu_keluar.after_or_equal' => 'Waktu keluar tidak boleh lebih awal dari waktu masuk.'
        ]);

        // Konversi waktu ke format H:i jika input adalah 12 jam
        $waktuMasuk = $this->convertTo24Hour($request->waktu_masuk);
        $waktuKeluar = $this->convertTo24Hour($request->waktu_keluar);

        Attendance::create([
            'karyawan_id' => $request->karyawan_id,
            'tanggal' => $request->tanggal,
            'waktu_masuk' => $waktuMasuk,
            'waktu_keluar' => $waktuKeluar,
            'status_absensi' => $request->status_absensi
        ]);

        return redirect()->route('attendance.index')->with('success', 'Data absensi berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail satu data absensi.
     */
    public function show(Attendance $attendance)
    {
        $attendance->load('employee');
        return view('attendance.show', compact('attendance'));
    }

    /**
     * Menampilkan form edit absensi.
     */
    public function edit(Attendance $attendance)
    {
        $employees = Employee::orderBy('nama_lengkap')->get();
        return view('attendance.edit', compact('attendance', 'employees'));
    }

    /**
     * Menyimpan hasil edit absensi.
     */
    public function update(Request $request, Attendance $attendance)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:employees,id',
            'tanggal' => 'required|date',
            'waktu_masuk' => 'nullable|string',
            'waktu_keluar' => 'nullable|string|after_or_equal:waktu_masuk',
            'status_absensi' => 'required|in:hadir,izin,sakit,alpha'
        ], [
            'karyawan_id.required' => 'Pilih nama karyawan.',
            'tanggal.required' => 'Tanggal wajib diisi.',
            'status_absensi.required' => 'Status absensi wajib dipilih.',
            'waktu_keluar.after_or_equal' => 'Waktu keluar tidak boleh lebih awal dari waktu masuk.'
        ]);

        // Konversi waktu ke format H:i
        $waktuMasuk = $this->convertTo24Hour($request->waktu_masuk);
        $waktuKeluar = $this->convertTo24Hour($request->waktu_keluar);

        $attendance->update([
            'karyawan_id' => $request->karyawan_id,
            'tanggal' => $request->tanggal,
            'waktu_masuk' => $waktuMasuk,
            'waktu_keluar' => $waktuKeluar,
            'status_absensi' => $request->status_absensi
        ]);

        return redirect()->route('attendance.index')->with('success', 'Data absensi berhasil diperbarui.');
    }

    /**
     * Menghapus data absensi.
     */
    public function destroy(Attendance $attendance)
    {
        $attendance->delete();
        return redirect()->route('attendance.index')->with('success', 'Data absensi berhasil dihapus.');
    }

    /**
     * Konversi waktu dari format 12 jam (AM/PM) ke 24 jam (H:i)
     */
    private function convertTo24Hour($time)
    {
        if (!$time) return null;

        try {
            // Coba parse sebagai 12 jam (h:i A)
            $carbon = Carbon::createFromFormat('h:i A', $time);
            return $carbon->format('H:i');
        } catch (\Exception $e) {
            // Jika gagal, coba parse sebagai 24 jam (H:i)
            try {
                $carbon = Carbon::createFromFormat('H:i', $time);
                return $carbon->format('H:i');
            } catch (\Exception $e2) {
                // Jika tetap gagal, kembalikan null
                return null;
            }
        }
    }
}