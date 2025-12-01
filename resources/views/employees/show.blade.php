@extends('layouts.master')
@section('title', 'Detail Pegawai')

@section('content')
<div class="card card-custom p-4">
  <h3 class="fw-bold text-primary mb-3">Detail Pegawai</h3>

  <table class="table table-bordered">
    <tr><th>Nama Lengkap</th><td>{{ $employee->nama_lengkap }}</td></tr>
    <tr><th>Email</th><td>{{ $employee->email }}</td></tr>
    <tr><th>Nomor Telepon</th><td>{{ $employee->nomor_telepon ?? '-' }}</td></tr>
    <tr><th>Tanggal Lahir</th><td>{{ \Carbon\Carbon::parse($employee->tanggal_lahir)->format('d M Y') }}</td></tr>
    <tr><th>Alamat</th><td>{{ $employee->alamat }}</td></tr>
    <tr><th>Tanggal Masuk</th><td>{{ \Carbon\Carbon::parse($employee->tanggal_masuk)->format('d M Y') }}</td></tr>
    <tr><th>Status</th><td><span class="badge {{ $employee->status == 'aktif' ? 'bg-success' : 'bg-secondary' }}">{{ ucfirst($employee->status) }}</span></td></tr>
    <tr><th>Departemen</th><td>{{ $employee->department->nama_departemen ?? '-' }}</td></tr>
    <tr><th>Jabatan</th><td>{{ $employee->position->nama_jabatan ?? '-' }}</td></tr>
  </table>

  <div class="text-end mt-3">
    <a href="{{ route('employees.index') }}" class="btn btn-secondary">Kembali</a>
  </div>
</div>
@endsection
