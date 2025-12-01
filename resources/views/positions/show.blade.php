@extends('layouts.master')
@section('title', 'Detail Jabatan')

@section('content')
<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-white text-shadow">Detail Jabatan</h2>
    </div>

    <div class="glass-box p-4 rounded-4 shadow-lg">

        <table class="table table-hover align-middle bg-white bg-opacity-25 text-white rounded-3 overflow-hidden">
            <tbody>
                <tr>
                    <th class="fw-semibold text-white" style="width: 30%">Nama Jabatan</th>
                    <td>{{ $position->nama_jabatan }}</td>
                </tr>

                <tr>
                    <th class="fw-semibold text-white">Gaji Pokok</th>
                    <td class="fw-bold text-success">
                        Rp {{ number_format($position->gaji_pokok, 0, ',', '.') }}
                    </td>
                </tr>

                <tr>
                    <th class="fw-semibold text-white">Dibuat Pada</th>
                    <td>{{ $position->created_at->format('d M Y H:i') }}</td>
                </tr>

                <tr>
                    <th class="fw-semibold text-white">Diperbarui Terakhir</th>
                    <td>{{ $position->updated_at->format('d M Y H:i') }}</td>
                </tr>

            </tbody>
        </table>

        <div class="text-end mt-3">
            <a href="{{ route('positions.index') }}" class="btn btn-cancel px-4">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>

    </div>
</div>

{{-- Glass UI CSS --}}
<style>
.glass-box {
    background: rgba(255, 255, 255, 0.20);
    backdrop-filter: blur(14px);
    -webkit-backdrop-filter: blur(14px);
    border: 1px solid rgba(255, 255, 255, 0.25);
}

.text-shadow {
    text-shadow: 0px 3px 10px rgba(0,0,0,0.6);
}

.table td, .table th {
    color: white !important;
    background: transparent !important;
}

.btn-cancel {
    background: rgba(255,255,255,0.25);
    color: white;
    border: 1px solid rgba(255,255,255,0.4);
    font-weight: 600;
    border-radius: 10px;
}
.btn-cancel:hover {
    background: rgba(255,255,255,0.4);
}
</style>

@endsection
