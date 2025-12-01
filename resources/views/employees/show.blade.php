@extends('layouts.master')
@section('title', 'Detail Pegawai')

@section('content')
<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-white text-shadow">Detail Pegawai</h2>
    </div>

    <div class="glass-box p-4 rounded-4 shadow-lg">

        <table class="table table-bordered align-middle 
            bg-white bg-opacity-75 rounded-4 overflow-hidden shadow-sm">

            <tbody>

                <tr>
                    <th class="bg-light fw-semibold" style="width: 30%;">Nama Lengkap</th>
                    <td>{{ $employee->nama_lengkap }}</td>
                </tr>

                <tr>
                    <th class="bg-light fw-semibold">Email</th>
                    <td>{{ $employee->email }}</td>
                </tr>

                <tr>
                    <th class="bg-light fw-semibold">Nomor Telepon</th>
                    <td>{{ $employee->nomor_telepon ?? '-' }}</td>
                </tr>

                <tr>
                    <th class="bg-light fw-semibold">Tanggal Lahir</th>
                    <td>{{ \Carbon\Carbon::parse($employee->tanggal_lahir)->format('d M Y') }}</td>
                </tr>

                <tr>
                    <th class="bg-light fw-semibold">Alamat</th>
                    <td>{{ $employee->alamat }}</td>
                </tr>

                <tr>
                    <th class="bg-light fw-semibold">Tanggal Masuk</th>
                    <td>{{ \Carbon\Carbon::parse($employee->tanggal_masuk)->format('d M Y') }}</td>
                </tr>

                <tr>
                    <th class="bg-light fw-semibold">Status</th>
                    <td>
                        @if($employee->status == 'aktif')
                            <span class="badge bg-success px-3 py-2">Aktif</span>
                        @else
                            <span class="badge bg-secondary px-3 py-2">Nonaktif</span>
                        @endif
                    </td>
                </tr>

                <tr>
                    <th class="bg-light fw-semibold">Departemen</th>
                    <td>{{ $employee->department->nama_departemen ?? '-' }}</td>
                </tr>

                <tr>
                    <th class="bg-light fw-semibold">Jabatan</th>
                    <td>{{ $employee->position->nama_jabatan ?? '-' }}</td>
                </tr>

            </tbody>

        </table>

        <div class="text-end mt-3">
            <a href="{{ route('employees.index') }}" class="btn btn-secondary px-4">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>

    </div>

</div>

<style>
/* Glass Container */
.glass-box {
    background: rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(14px);
    -webkit-backdrop-filter: blur(14px);
    border-radius: 16px;
    border: 1px solid rgba(255, 255, 255, 0.25);
}

/* Shadow for title */
.text-shadow {
    text-shadow: 0 2px 10px rgba(0,0,0,0.6);
}

</style>
@endsection
