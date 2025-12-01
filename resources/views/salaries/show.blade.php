@extends('layouts.master')
@section('title', 'Detail Gaji Pegawai')

@section('content')
<div class="container py-4">

    <h2 class="fw-bold text-white text-shadow mb-4">Detail Gaji Pegawai</h2>

    <!-- GUNAKAN GLASS STYLE -->
    <div class="glass-box">

        <table class="table table-borderless align-middle text-white">

            <tbody>

                <!-- NAMA PEGAWAI -->
                <tr class="glass-row">
                    <th class="fw-semibold">Nama Pegawai</th>
                    <td>{{ $salary->employee->nama_lengkap ?? '-' }}</td>
                </tr>

                <!-- BULAN -->
                <tr class="glass-row">
                    <th class="fw-semibold">Bulan</th>
                    <td>
                        <span class="badge bg-info text-dark px-3 py-2 shadow-sm">
                            {{ $salary->bulan }}
                        </span>
                    </td>
                </tr>

                <!-- GAJI POKOK -->
                <tr class="glass-row">
                    <th class="fw-semibold">Gaji Pokok</th>
                    <td class="text-success fw-semibold">
                        Rp {{ number_format($salary->gaji_pokok, 0, ',', '.') }}
                    </td>
                </tr>

                <!-- TUNJANGAN -->
                <tr class="glass-row">
                    <th class="fw-semibold">Tunjangan</th>
                    <td class="text-primary fw-semibold">
                        Rp {{ number_format($salary->tunjangan, 0, ',', '.') }}
                    </td>
                </tr>

                <!-- POTONGAN -->
                <tr class="glass-row">
                    <th class="fw-semibold">Potongan</th>
                    <td class="text-danger fw-semibold">
                        Rp {{ number_format($salary->potongan, 0, ',', '.') }}
                    </td>
                </tr>

                <!-- TOTAL GAJI -->
                <tr class="glass-row">
                    <th class="fw-semibold">Total Gaji</th>
                    <td class="text-warning fw-bold fs-5">
                        Rp {{ number_format($salary->total_gaji, 0, ',', '.') }}
                    </td>
                </tr>

                <!-- STATUS -->
                <tr class="glass-row">
                    <th class="fw-semibold">Status Pembayaran</th>
                    <td>
                        @if($salary->status_pembayaran == 'Sudah')
                            <span class="badge bg-success px-3 py-2 shadow-sm">Sudah Dibayar</span>
                        @else
                            <span class="badge bg-warning text-dark px-3 py-2 shadow-sm">Belum Dibayar</span>
                        @endif
                    </td>
                </tr>

                <!-- KETERANGAN -->
                <tr class="glass-row">
                    <th class="fw-semibold">Keterangan</th>
                    <td>{{ $salary->keterangan ?? '-' }}</td>
                </tr>

            </tbody>
        </table>

        <div class="text-end mt-3">
            <a href="{{ route('salaries.index') }}" class="btn btn-secondary px-4">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>

    </div>
</div>

<style>
/* Glass Box */
.glass-box {
    background: rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    padding: 30px;
    border-radius: 18px;
    border: 1px solid rgba(255, 255, 255, 0.25);
    box-shadow: 0 8px 28px rgba(0, 0, 0, 0.25);
}

/* Table Row Glass */
.glass-row th,
.glass-row td {
    padding: 14px 12px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.25);
}

/* Table Headers */
th {
    width: 30%;
    color: #fff;
    font-weight: 600 !important;
}

/* Table Text */
td {
    color: #fff;
}

/* Hover row effect */
.glass-row:hover {
    background: rgba(255, 255, 255, 0.12);
    transition: 0.2s ease-in-out;
}
</style>

@endsection
