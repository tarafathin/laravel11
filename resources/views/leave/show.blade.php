@extends('layouts.master')
@section('title', 'Detail Cuti Pegawai | App Pegawai')

@section('content')
<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-white text-shadow">Detail Cuti Pegawai</h2>
    </div>

    <div class="glass-box p-4 rounded-4 shadow-lg">

        <table class="table table-bordered align-middle 
            bg-white bg-opacity-75 rounded-4 overflow-hidden shadow-sm">

            <tbody>

                <tr>
                    <th class="bg-light fw-semibold" style="width: 30%;">Nama Pegawai</th>
                    <td>{{ $leave->employee->nama_lengkap ?? '-' }}</td>
                </tr>

                <tr>
                    <th class="bg-light fw-semibold">Jenis Cuti</th>
                    <td class="text-capitalize">{{ $leave->jenis_cuti }}</td>
                </tr>

                <tr>
                    <th class="bg-light fw-semibold">Tanggal Mulai</th>
                    <td>{{ \Carbon\Carbon::parse($leave->tanggal_mulai)->format('d M Y') }}</td>
                </tr>

                <tr>
                    <th class="bg-light fw-semibold">Tanggal Selesai</th>
                    <td>{{ \Carbon\Carbon::parse($leave->tanggal_selesai)->format('d M Y') }}</td>
                </tr>

                <tr>
                    <th class="bg-light fw-semibold">Jumlah Hari</th>
                    <td>{{ $leave->jumlah_hari }} hari</td>
                </tr>

                <tr>
                    <th class="bg-light fw-semibold">Status Pengajuan</th>
                    <td>
                        @if($leave->status_pengajuan == 'menunggu')
                            <span class="badge bg-warning text-dark px-3 py-2">Menunggu</span>
                        @elseif($leave->status_pengajuan == 'disetujui')
                            <span class="badge bg-success px-3 py-2">Disetujui</span>
                        @else
                            <span class="badge bg-danger px-3 py-2">Ditolak</span>
                        @endif
                    </td>
                </tr>

                <tr>
                    <th class="bg-light fw-semibold">Keterangan</th>
                    <td>{{ $leave->keterangan ?? '-' }}</td>
                </tr>

            </tbody>

        </table>

        <div class="text-end mt-3">
            <a href="{{ route('leave.index') }}" class="btn btn-secondary px-4">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>

    </div>

</div>

<style>
.glass-box {
    background: rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(14px);
    -webkit-backdrop-filter: blur(14px);
    border-radius: 16px;
    border: 1px solid rgba(255, 255, 255, 0.25);
}

.text-shadow {
    text-shadow: 0 2px 10px rgba(0,0,0,0.6);
}
</style>
@endsection
