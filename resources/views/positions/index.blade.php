@extends('layouts.master')
@section('title', 'Daftar Jabatan | App Pegawai')

@section('content')
<div class="container py-4">
  <h2>Daftar Jabatan</h2>
  <a href="{{ route('positions.create') }}" class="btn btn-primary mb-3">Tambah Jabatan</a>
  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif
  <div class="table-responsive">
    <table class="table table-custom table-hover">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nama Jabatan</th>
          <th>Gaji Pokok</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse($positions as $pos)
        <tr>
          <td>{{ $pos->id }}</td>
          <td>{{ $pos->nama_jabatan }}</td> <!-- ✅ Diperbaiki di sini -->
          <td>Rp {{ number_format($pos->gaji_pokok, 0, ',', '.') }}</td>
          <td>
            <a href="{{ route('positions.show', $pos->id) }}" class="btn btn-sm btn-info">Lihat</a>
            <a href="{{ route('positions.edit', $pos->id) }}" class="btn btn-sm btn-warning">Edit</a>
            <form action="{{ route('positions.destroy', $pos->id) }}" method="POST" style="display:inline;">
              @csrf @method('DELETE')
              <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus?')">Hapus</button>
            </form>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="4" class="text-center">Belum ada jabatan.</td>
        </tr>
        @endforelse
      </tbody>
    </table>
    {{ $positions->links() }}
  </div>
</div>
@endsection