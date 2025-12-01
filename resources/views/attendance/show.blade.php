@extends('layouts.master')
@section('title', 'Detail Absensi')

@section('content')
<div class="container py-4">

    <h2 class="fw-bold text-white text-shadow mb-4">Detail Absensi Pegawai</h2>

    <div class="glass-box p-4 rounded-4 shadow-lg">

        <table class="table table-borderless align-middle table-detail-glass">
            <tbody>
                <tr class="glass-row">
                    <th>Nama Pegawai</th>
                    <td>{{ $attendance->employee->nama_lengkap ?? '-' }}</td>
                </tr>

                <tr class="glass-row">
                    <th>Tanggal</th>
                    <td>{{ \Carbon\Carbon::parse($attendance->tanggal)->format('d M Y') }}</td>
                </tr>

                <tr class="glass-row">
                    <th>Waktu Masuk</th>
                    <td>{{ $attendance->waktu_masuk ?? '-' }}</td>
                </tr>

                <tr class="glass-row">
                    <th>Waktu Keluar</th>
                    <td>{{ $attendance->waktu_keluar ?? '-' }}</td>
                </tr>

                <tr class="glass-row">
                    <th>Status Absensi</th>
                    <td>
                        <span class="badge status-badge status-{{ strtolower($attendance->status_absensi) }}">
                            {{ ucfirst($attendance->status_absensi) }}
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="text-end mt-3">
            <a href="{{ route('attendance.index') }}" class="btn btn-cancel px-4">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>

    </div>
</div>

{{-- ===========================
     GLASS UI STYLING
=========================== --}}
<style>

/* GLASS BOX */
.glass-box {
    background: rgba(255, 255, 255, 0.28);
    backdrop-filter: blur(14px);
    -webkit-backdrop-filter: blur(14px);
    border-radius: 20px;
    padding: 30px;
    border: 1px solid rgba(255,255,255,0.35);
    box-shadow: 0 8px 28px rgba(0,0,0,0.25);
}

/* TABLE STYLING */
.table-detail-glass th,
.table-detail-glass td {
    padding: 14px 12px;
    font-size: 16px;
}

.table-detail-glass th {
    width: 30%;
    font-weight: 700;
    color: #222;
}

.table-detail-glass td {
    color: #111;
    font-weight: 500;
}

/* ROW HOVER */
.glass-row:hover {
    background: rgba(255, 255, 255, 0.22);
    transition: .3s;
}

/* STATUS BADGE COLORS */
.status-hadir { background: #28a745 !important; }
.status-izin  { background: #0dcaf0 !important; color: #000 !important; }
.status-sakit { background: #ffc107 !important; color: #000 !important; }
.status-alpha { background: #dc3545 !important; }

/* BUTTON */
.btn-cancel {
    background: rgba(255,255,255,0.25);
    color: white;
    border: 1px solid rgba(255,255,255,0.4);
    font-weight: 600;
    border-radius: 10px;
}

.btn-cancel:hover {
    background: rgba(255,255,255,0.40);
}

/* TEXT SHADOW */
.text-shadow {
    text-shadow: 0 2px 10px rgba(0,0,0,0.7);
}

</style>

@endsection
