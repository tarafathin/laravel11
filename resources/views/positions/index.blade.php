@extends('layouts.master')
@section('title', 'Daftar Jabatan | App Pegawai')

@section('content')
<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-white text-shadow">Daftar Jabatan</h2>

        <a href="{{ route('positions.create') }}" class="btn btn-primary btn-lg shadow">
            <i class="bi bi-plus-circle"></i> Tambah Jabatan
        </a>
    </div>

    {{-- Alert Success --}}
    @if(session('success'))
        <div class="alert alert-success shadow-sm">{{ session('success') }}</div>
    @endif


    <div class="table-responsive">
        <table class="table table-hover align-middle shadow-lg bg-white bg-opacity-75 rounded-4 overflow-hidden">

            <thead class="table-dark bg-opacity-50" style="backdrop-filter: blur(6px);">
                <tr>
                    <th class="text-center">ID</th>
                    <th>Nama Jabatan</th>
                    <th>Gaji Pokok</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($positions as $pos)
                <tr>

                    <td class="text-center fw-bold">{{ $pos->id }}</td>

                    <td>{{ $pos->nama_jabatan }}</td>

                    <td class="text-success fw-semibold">
                        Rp {{ number_format($pos->gaji_pokok, 0, ',', '.') }}
                    </td>

                    <td class="text-center">
                        <a href="{{ route('positions.show', $pos->id) }}" 
                           class="btn btn-sm btn-info me-1">
                           <i class="bi bi-eye"></i>
                        </a>

                        <a href="{{ route('positions.edit', $pos->id) }}" 
                           class="btn btn-sm btn-warning text-white me-1">
                           <i class="bi bi-pencil-square"></i>
                        </a>

                        <form action="{{ route('positions.destroy', $pos->id) }}"
                              method="POST" class="d-inline">
                            @csrf @method('DELETE')

                            <button type="submit" 
                                onclick="return confirm('Hapus jabatan ini?')"
                                class="btn btn-sm btn-danger">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>

                </tr>

                @empty
                <tr>
                    <td colspan="4" class="text-center py-4 text-white">
                        <i class="bi bi-emoji-neutral fs-1"></i>
                        <p class="mt-2">Belum ada jabatan.</p>
                    </td>
                </tr>
                @endforelse
            </tbody>

        </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-3">
        {{ $positions->links() }}
    </div>

</div>

{{-- STYLE --}}
<style>
.text-shadow {
    text-shadow: 0 2px 10px rgba(0,0,0,0.6);
}
</style>

@endsection
