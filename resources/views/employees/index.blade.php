@extends('layouts.master')
@section('title', 'Daftar Pegawai | App Pegawai')

@section('content')
<div class="container py-4">
  <h2>Daftar Pegawai</h2>
  <a href="{{ route('employees.create') }}" class="btn btn-primary mb-3">Tambah Pegawai</a>
  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif
  <div class="table-responsive">
    <table class="table table-custom table-hover">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nama Lengkap</th>
          <th>Email</th>
          <th>Jabatan</th>
          <th>Departemen</th>
          <th>Status</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse($employees as $emp)
        <tr>
          <td>{{ $emp->id }}</td>
          <td>{{ $emp->nama_lengkap }}</td>
          <td>{{ $emp->email }}</td>
          <td>{{ $emp->position?->nama_jabatan ?? '-' }}</td>
          <td>{{ $emp->department?->nama_departemen ?? '-' }}</td>
          <td>
            <span class="badge bg-{{ $emp->status == 'aktif' ? 'success' : 'secondary' }}">
              {{ $emp->status }}
            </span>
          </td>
          <td>
            <a href="{{ route('employees.show', $emp->id) }}" class="btn btn-sm btn-info">Lihat</a>
            <a href="{{ route('employees.edit', $emp->id) }}" class="btn btn-sm btn-warning">Edit</a>
            <form action="{{ route('employees.destroy', $emp->id) }}" method="POST" style="display:inline;">
              @csrf @method('DELETE')
              <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus pegawai ini?')">Hapus</button>
            </form>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="7" class="text-center">Belum ada data pegawai.</td>
        </tr>
        @endforelse
      </tbody>
    </table>
    {{ $employees->links() }}
  </div>
</div>
@endsection