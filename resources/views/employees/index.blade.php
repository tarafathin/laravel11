@extends('layouts.master')
@section('title', 'Daftar Pegawai | App Pegawai')

@section('content')
<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-white text-shadow">Daftar Pegawai</h2>

        <a href="{{ route('employees.create') }}" class="btn btn-primary btn-lg shadow">
            <i class="bi bi-plus-circle"></i> Tambah Pegawai
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
                    <th>Nama Lengkap</th>
                    <th>Email</th>
                    <th>Jabatan</th>
                    <th>Departemen</th>
                    <th>Status</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($employees as $emp)
                <tr>

                    <td class="text-center fw-bold">{{ $emp->id }}</td>

                    <td class="fw-semibold">{{ $emp->nama_lengkap }}</td>

                    <td>{{ $emp->email }}</td>

                    <td>
                        <span class="badge bg-primary px-3 py-2">
                            {{ $emp->position?->nama_jabatan ?? '-' }}
                        </span>
                    </td>

                    <td>
                        <span class="badge bg-info text-dark px-3 py-2">
                            {{ $emp->department?->nama_departemen ?? '-' }}
                        </span>
                    </td>

                    <td>
                        <span class="badge 
                            {{ $emp->status == 'aktif' ? 'bg-success' : 'bg-secondary' }} 
                            px-3 py-2">
                            {{ ucfirst($emp->status) }}
                        </span>
                    </td>

                    <td class="text-center">

                        {{-- Lihat --}}
                        <a href="{{ route('employees.show', $emp->id) }}" 
                           class="btn btn-sm btn-info me-1">
                           <i class="bi bi-eye"></i>
                        </a>

                        {{-- Edit --}}
                        <a href="{{ route('employees.edit', $emp->id) }}" 
                           class="btn btn-sm btn-warning text-white me-1">
                           <i class="bi bi-pencil-square"></i>
                        </a>

                        {{-- Hapus --}}
                        <form action="{{ route('employees.destroy', $emp->id) }}" 
                              method="POST" 
                              class="d-inline">
                            @csrf @method('DELETE')
                            <button type="submit" 
                                    class="btn btn-sm btn-danger"
                                    onclick="return confirm('Hapus pegawai ini?')">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>

                    </td>
                </tr>

                @empty
                <tr>
                    <td colspan="7" class="text-center py-4 text-white">
                        <i class="bi bi-person-x fs-1"></i>
                        <p class="mt-2">Belum ada data pegawai.</p>
                    </td>
                </tr>
                @endforelse
            </tbody>

        </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-3">
        {{ $employees->links() }}
    </div>

</div>

<style>
.text-shadow {
    text-shadow: 0 2px 10px rgba(0,0,0,0.6);
}
</style>

@endsection
