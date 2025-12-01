@extends('layouts.master')
@section('title', 'Beranda | App Pegawai')

@section('content')
<div class="d-flex align-items-center justify-content-center vh-100">
  <div class="text-center text-white" style="max-width: 800px; padding: 20px;">
    <h1 class="display-4 fw-bold mb-3" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">
      Selamat Datang di App Pegawai
    </h1>
    <p class="lead mb-4" style="color: #dce3ec; text-shadow: 1px 1px 3px rgba(0,0,0,0.5);">
      Kelola data karyawan, absensi, dan gaji dengan mudah dan efisien
    </p>
    <a href="{{ route('employees.index') }}" class="btn btn-primary btn-lg px-4">
      Mulai Sekarang
    </a>
  </div>
</div>
@endsection