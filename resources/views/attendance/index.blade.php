@extends('layouts.master')
@section('title', 'Daftar Absensi | App Pegawai')

@section('content')
<div class="container py-4">
  <h2>Daftar Absensi</h2>
  <a href="{{ route('attendance.create') }}" class="btn btn-primary mb-3">Tambah Absensi</a>
  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif
  <div class="table-responsive">
    <table class="table table-custom table-hover">
      <thead>
        <tr>
          <th>ID</th>
          <th>Pegawai</th>
          <th>Tanggal</th>
          <th>Status</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse($attendances as $att)
        <tr>
          <td>{{ $att->id }}</td>
          <td>{{ $att->employee?->nama_lengkap ?? '-' }}</td>
          <td>{{ \Carbon\Carbon::parse($att->tanggal)->format('d M Y') }}</td>
          <td>
            <span class="badge bg-{{ 
                $att->status_absensi == 'hadir' ? 'success' : 
                ($att->status_absensi == 'sakit' ? 'warning' : 
                ($att->status_absensi == 'izin' ? 'info' : 'danger')) 
            }}">
              {{ ucfirst($att->status_absensi) }}
            </span>
          </td>
          <td>
            <a href="{{ route('attendance.show', $att->id) }}" class="btn btn-sm btn-info">Lihat</a>
            <a href="{{ route('attendance.edit', $att->id) }}" class="btn btn-sm btn-warning">Edit</a>
            <form action="{{ route('attendance.destroy', $att->id) }}" method="POST" style="display:inline;">
              @csrf @method('DELETE')
              <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus data absensi ini?')">Hapus</button>
            </form>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="5" class="text-center">Belum ada data absensi.</td>
        </tr>
        @endforelse
      </tbody>
    </table>
    {{ $attendances->links() }}
  </div>
</div>
@endsection