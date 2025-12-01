@extends('layouts.master')
@section('title', 'Daftar Departemen | App Pegawai')

@section('content')
<div class="container py-4">

    <!-- Judul & Tombol -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-white text-shadow">Daftar Departemen</h2>

        <a href="{{ route('departments.create') }}" class="btn btn-primary btn-lg shadow">
            <i class="bi bi-plus-circle"></i> Tambah Departemen
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
                    <th>Nama Departemen</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($departments as $dept)
                <tr>
                    <td class="text-center fw-semibold">{{ $dept->id }}</td>

                    <td class="fw-medium">
                        {{ $dept->nama_departemen }}
                    </td>

                    <td class="text-center">

                        {{-- Lihat --}}
                        <a href="{{ route('departments.show', $dept->id) }}" 
                           class="btn btn-sm btn-info me-1">
                           <i class="bi bi-eye"></i>
                        </a>

                        {{-- Edit --}}
                        <a href="{{ route('departments.edit', $dept->id) }}" 
                           class="btn btn-sm btn-warning text-white me-1">
                           <i class="bi bi-pencil-square"></i>
                        </a>

                        {{-- Hapus --}}
                        <form action="{{ route('departments.destroy', $dept->id) }}" 
                              method="POST" class="d-inline">
                            @csrf 
                            @method('DELETE')
                            <button type="submit" 
                                class="btn btn-sm btn-danger"
                                onclick="return confirm('Hapus departemen ini?')">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>

                @empty
                <tr>
                    <td colspan="3" class="text-center py-4 text-white">
                        <i class="bi bi-emoji-neutral fs-1"></i>
                        <p class="mt-2">Belum ada departemen.</p>
                    </td>
                </tr>
                @endforelse
            </tbody>

        </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-3">
        {{ $departments->links() }}
    </div>

</div>
@endsection
