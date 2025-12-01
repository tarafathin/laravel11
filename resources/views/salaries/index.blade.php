@extends('layouts.master')
@section('title', 'Daftar Gaji | App Pegawai')

@section('content')
<div class="container py-4">
  <h2>Daftar Gaji</h2>
  <a href="{{ route('salaries.create') }}" class="btn btn-primary mb-3">Tambah Gaji</a>
  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif
  <div class="table-responsive">
    <table class="table table-custom table-hover">
      <thead>
        <tr>
          <th>ID</th>
          <th>Pegawai</th>
          <th>Jumlah</th>
          <th>Bulan</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse($salaries as $sal)
        <tr>
          <td>{{ $sal->id }}</td>
          <td>{{ $sal->employee?->nama_lengkap ?? '-' }}</td>
          <td>Rp {{ number_format($sal->total_gaji, 0, ',', '.') }}</td>
          <td>{{ $sal->periodic }}</td>
          <td>
            <a href="{{ route('salaries.show', $sal->id) }}" class="btn btn-sm btn-info">Lihat</a>
            <a href="{{ route('salaries.edit', $sal->id) }}" class="btn btn-sm btn-warning">Edit</a>
            <form action="{{ route('salaries.destroy', $sal->id) }}" method="POST" style="display:inline;">
              @csrf @method('DELETE')
              <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus data gaji ini?')">Hapus</button>
            </form>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="5" class="text-center">Belum ada data gaji.</td>
        </tr>
        @endforelse
      </tbody>
    </table>
    {{ $salaries->links() }}
  </div>
</div>
@endsection