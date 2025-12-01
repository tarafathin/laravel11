@extends('layouts.master')
@section('title', 'Daftar Gaji | App Pegawai')

@section('content')
<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-white text-shadow">Daftar Gaji Pegawai</h2>
        <a href="{{ route('salaries.create') }}" class="btn btn-primary btn-lg shadow">
            <i class="bi bi-plus-circle"></i> Tambah Gaji
        </a>
    </div>

    {{-- Alert sukses --}}
    @if(session('success'))
        <div class="alert alert-success shadow-sm">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-hover align-middle shadow-lg bg-white bg-opacity-75 rounded-4 overflow-hidden">

            <thead class="table-dark bg-opacity-50" style="backdrop-filter: blur(6px);">
                <tr>
                    <th class="text-center">ID</th>
                    <th>Pegawai</th>
                    <th>Gaji Pokok</th>
                    <th>Total Gaji</th>
                    <th>Bulan</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($salaries as $sal)
                <tr>
                    <td class="text-center fw-bold">{{ $sal->id }}</td>

                    <td>{{ $sal->employee->nama_lengkap ?? '-' }}</td>

                    <td class="text-success fw-semibold">
                        Rp {{ number_format($sal->gaji_pokok, 0, ',', '.') }}
                    </td>

                    <td class="text-primary fw-semibold">
                        Rp {{ number_format($sal->total_gaji, 0, ',', '.') }}
                    </td>

                    <td>
                        <span class="badge bg-info text-dark px-3 py-2">
                            {{ $sal->bulan }}
                        </span>
                    </td>

                    <td class="text-center">
                        <a href="{{ route('salaries.show', $sal->id) }}" 
                           class="btn btn-sm btn-info me-1">
                           <i class="bi bi-eye"></i>
                        </a>

                        <a href="{{ route('salaries.edit', $sal->id) }}" 
                           class="btn btn-sm btn-warning text-white me-1">
                           <i class="bi bi-pencil-square"></i>
                        </a>

                        <form action="{{ route('salaries.destroy', $sal->id) }}" 
                              method="POST" class="d-inline">
                            @csrf 
                            @method('DELETE')

                            <button type="submit" 
                                class="btn btn-sm btn-danger"
                                onclick="return confirm('Hapus data gaji ini?')">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>

                @empty
                <tr>
                    <td colspan="6" class="text-center py-4 text-white">
                        <i class="bi bi-emoji-neutral fs-1"></i>
                        <p class="mt-2">Belum ada data gaji.</p>
                    </td>
                </tr>

                @endforelse
            </tbody>

        </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-3">
        {{ $salaries->links() }}
    </div>

</div>
@endsection
