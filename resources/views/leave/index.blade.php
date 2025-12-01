@extends('layouts.master')
@section('title', 'Daftar Cuti | App Pegawai')

@section('content')
<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-white text-shadow">Daftar Cuti Pegawai</h2>

        <a href="{{ route('leave.create') }}" class="btn btn-primary btn-lg shadow">
            <i class="bi bi-plus-circle"></i> Ajukan Cuti
        </a>
    </div>

    {{-- ALERT SUCCESS --}}
    @if(session('success'))
        <div class="alert alert-success shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-hover align-middle shadow-lg bg-white bg-opacity-75 rounded-4 overflow-hidden">

            <thead class="table-dark bg-opacity-50" style="backdrop-filter: blur(6px);">
                <tr>
                    <th class="text-center">ID</th>
                    <th>Pegawai</th>
                    <th>Jenis Cuti</th>
                    <th>Tanggal</th>
                    <th>Jumlah Hari</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($leave as $item)
                <tr>

                    {{-- ID --}}
                    <td class="text-center fw-bold">{{ $item->id }}</td>

                    {{-- PEGAWAI --}}
                    <td>
                        {{ $item->employee->nama_lengkap ?? '-' }}
                    </td>

                    {{-- JENIS CUTI --}}
                    <td class="fw-semibold">
                        {{ ucfirst($item->jenis_cuti) }}
                    </td>

                    {{-- TANGGAL CUTI --}}
                    <td>
                        <span class="badge bg-info text-dark px-3 py-2">
                            {{ \Carbon\Carbon::parse($item->tanggal_mulai)->format('d M Y') }}
                        </span>
                        —
                        <span class="badge bg-info text-dark px-3 py-2">
                            {{ \Carbon\Carbon::parse($item->tanggal_selesai)->format('d M Y') }}
                        </span>
                    </td>

                    {{-- JUMLAH HARI --}}
                    <td>
                        <span class="badge bg-dark px-3 py-2">
                            {{ $item->jumlah_hari }} hari
                        </span>
                    </td>

                    {{-- ACTION BUTTONS --}}
                    <td class="text-center">

                        <a href="{{ route('leave.show', $item->id) }}"
                           class="btn btn-sm btn-info me-1">
                            <i class="bi bi-eye"></i>
                        </a>

                        <a href="{{ route('leave.edit', $item->id) }}"
                           class="btn btn-sm btn-warning text-white me-1">
                            <i class="bi bi-pencil-square"></i>
                        </a>

                        <form action="{{ route('leave.destroy', $item->id) }}"
                              method="POST"
                              class="d-inline">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                onclick="return confirm('Hapus pengajuan cuti ini?')"
                                class="btn btn-sm btn-danger">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>

                    </td>
                </tr>

                @empty
                <tr>
                    <td colspan="6" class="text-center py-4 text-white">
                        <i class="bi bi-emoji-neutral fs-1"></i>
                        <p class="mt-2">Belum ada data cuti.</p>
                    </td>
                </tr>
                @endforelse

            </tbody>

        </table>
    </div>

    {{-- PAGINATION --}}
    <div class="mt-3">
        {{ $leave->links() }}
    </div>

</div>

<style>
.text-shadow { text-shadow: 0 2px 10px rgba(0,0,0,0.6); }
</style>

@endsection
