@extends('layouts.master')
@section('title', 'Daftar Absensi | App Pegawai')

@section('content')
<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-white text-shadow">Daftar Absensi Pegawai</h2>

        <a href="{{ route('attendance.create') }}" class="btn btn-primary btn-lg shadow">
            <i class="bi bi-plus-circle"></i> Tambah Absensi
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
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($attendances as $att)
                <tr>

                    {{-- ID --}}
                    <td class="text-center fw-bold">{{ $att->id }}</td>

                    {{-- Pegawai --}}
                    <td>{{ $att->employee->nama_lengkap ?? '-' }}</td>

                    {{-- Tanggal --}}
                    <td>
                        <span class="badge bg-info text-dark px-3 py-2">
                            {{ \Carbon\Carbon::parse($att->tanggal)->format('d M Y') }}
                        </span>
                    </td>

                    {{-- Status --}}
                    <td>
                        <span class="badge
                            @if($att->status_absensi == 'hadir') bg-success
                            @elseif($att->status_absensi == 'izin') bg-primary
                            @elseif($att->status_absensi == 'sakit') bg-warning text-dark
                            @else bg-danger @endif
                            px-3 py-2">
                            {{ ucfirst($att->status_absensi) }}
                        </span>
                    </td>

                    {{-- ACTION BUTTONS --}}
                    <td class="text-center">

                        <a href="{{ route('attendance.show', $att->id) }}" 
                           class="btn btn-sm btn-info me-1">
                            <i class="bi bi-eye"></i>
                        </a>

                        <a href="{{ route('attendance.edit', $att->id) }}" 
                           class="btn btn-sm btn-warning text-white me-1">
                            <i class="bi bi-pencil-square"></i>
                        </a>

                        <form action="{{ route('attendance.destroy', $att->id) }}" 
                              method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="btn btn-sm btn-danger"
                                    onclick="return confirm('Hapus data absensi ini?')">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>

                    </td>
                </tr>

                @empty
                <tr>
                    <td colspan="5" class="text-center py-4 text-white">
                        <i class="bi bi-emoji-neutral fs-1"></i>
                        <p class="mt-2">Belum ada data absensi.</p>
                    </td>
                </tr>
                @endforelse
            </tbody>

        </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-3">
        {{ $attendances->links() }}
    </div>

</div>
@endsection
