@extends('layouts.master')
@section('title', 'Detail Jabatan')

@section('content')
<div class="card card-custom p-4">
  <h3 class="fw-bold text-primary mb-3">Detail Jabatan</h3>

  <table class="table table-bordered">
    <tr>
      <th style="width: 30%">Nama Jabatan</th>
      <td>{{ $position->nama_jabatan }}</td>
    </tr>
    <tr>
      <th>Gaji Pokok</th>
      <td>Rp {{ number_format($position->gaji_pokok, 0, ',', '.') }}</td>
    </tr>
    <tr>
      <th>Dibuat Pada</th>
      <td>{{ $position->created_at->format('d M Y H:i') }}</td>
    </tr>
    <tr>
      <th>Diperbarui Terakhir</th>
      <td>{{ $position->updated_at->format('d M Y H:i') }}</td>
    </tr>
  </table>

  <div class="text-end mt-3">
    <a href="{{ route('positions.index') }}" class="btn btn-secondary">Kembali</a>
  </div>
</div>
@endsection
