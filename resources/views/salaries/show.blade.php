@extends('layouts.master')
@section('title', 'Detail Gaji Pegawai')

@section('content')
<div class="card card-custom p-4">
  <h3 class="fw-bold text-primary mb-3">Detail Gaji Pegawai</h3>

  <table class="table table-bordered">
    <tr><th>Nama Pegawai</th><td>{{ $salary->employee->nama_lengkap ?? '-' }}</td></tr>
    <tr><th>Periode</th><td>{{ \Carbon\Carbon::parse($salary->periode)->format('F Y') }}</td></tr>
    <tr><th>Total Gaji</th><td>Rp {{ number_format($salary->total_gaji, 0, ',', '.') }}</td></tr>
    <tr><th>Status Pembayaran</th><td>{{ ucfirst($salary->status_pembayaran) }}</td></tr>
    <tr><th>Keterangan</th><td>{{ $salary->keterangan ?? '-' }}</td></tr>
  </table>

  <div class="text-end mt-3">
    <a href="{{ route('salaries.index') }}" class="btn btn-secondary">Kembali</a>
  </div>
</div>
@endsection
