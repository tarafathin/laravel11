@extends('layouts.master')
@section('title', 'Detail Absensi')

@section('content')
<div class="card card-custom p-4">
  <h3 class="fw-bold text-primary mb-3">Detail Absensi Pegawai</h3>

  <table class="table table-bordered">
    <tr><th>Nama Pegawai</th><td>{{ $attendance->employee->nama_lengkap ?? '-' }}</td></tr>
    <tr><th>Tanggal</th><td>{{ \Carbon\Carbon::parse($attendance->tanggal)->format('d M Y') }}</td></tr>
    <tr><th>Waktu Masuk</th><td>{{ $attendance->waktu_masuk ?? '-' }}</td></tr>
    <tr><th>Waktu Keluar</th><td>{{ $attendance->waktu_keluar ?? '-' }}</td></tr>
    <tr><th>Status Absensi</th><td>{{ ucfirst($attendance->status_absensi) }}</td></tr>
  </table>

  <div class="text-end mt-3">
    <a href="{{ route('attendance.index') }}" class="btn btn-secondary">Kembali</a>
  </div>
</div>
@endsection
