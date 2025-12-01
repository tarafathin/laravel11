@extends('layouts.master')
@section('title', 'Daftar Departemen | App Pegawai')

@section('content')
<div class="container py-4">
  <h2>Daftar Departemen</h2>
  <a href="{{ route('departments.create') }}" class="btn btn-primary mb-3">Tambah Departemen</a>
  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif
  <div class="table-responsive">
    <table class="table table-custom table-hover">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nama Departemen</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse($departments as $dept)
        <tr>
          <td>{{ $dept->id }}</td>
          <td>{{ $dept->nama_departemen }}</td>
          <td>
            <a href="{{ route('departments.show', $dept->id) }}" class="btn btn-sm btn-info">Lihat</a>
            <a href="{{ route('departments.edit', $dept->id) }}" class="btn btn-sm btn-warning">Edit</a>
            <form action="{{ route('departments.destroy', $dept->id) }}" method="POST" style="display:inline;">
              @csrf @method('DELETE')
              <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus?')">Hapus</button>
            </form>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="3" class="text-center">Belum ada departemen.</td>
        </tr>
        @endforelse
      </tbody>
    </table>
    {{ $departments->links() }}
  </div>
</div>
@endsection