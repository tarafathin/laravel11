@extends('layouts.master')
@section('title', 'Tambah Data Absensi')

@section('content')
<div class="card card-custom p-4">
  <h3 class="fw-bold text-primary mb-3">Tambah Data Absensi</h3>

  <form action="{{ route('attendance.store') }}" method="POST">
    @csrf
    <div class="row">
      <div class="col-md-6 mb-3">
        <label class="form-label form-required">Nama Pegawai</label>
        <select name="karyawan_id" class="form-select @error('karyawan_id') is-invalid @enderror">
          <option value="">-- Pilih Pegawai --</option>
          @foreach($employees as $emp)
            <option value="{{ $emp->id }}">{{ $emp->nama_lengkap }}</option>
          @endforeach
        </select>
        @error('karyawan_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="col-md-6 mb-3">
        <label class="form-label form-required">Tanggal</label>
        <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" value="{{ old('tanggal') }}">
        @error('tanggal') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="col-md-6 mb-3">
        <label>Waktu Masuk</label>
        <input type="time" name="waktu_masuk" class="form-control" value="{{ old('waktu_masuk') }}">
      </div>

      <div class="col-md-6 mb-3">
        <label>Waktu Keluar</label>
        <input type="time" name="waktu_keluar" class="form-control" value="{{ old('waktu_keluar') }}">
      </div>

      <div class="col-md-6 mb-3">
        <label class="form-label form-required">Status Absensi</label>
        <select name="status_absensi" class="form-select @error('status_absensi') is-invalid @enderror">
          <option value="hadir">Hadir</option>
          <option value="izin">Izin</option>
          <option value="sakit">Sakit</option>
          <option value="alpha">Alpha</option>
        </select>
        @error('status_absensi') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>
    </div>

    <div class="text-end mt-3">
      <a href="{{ route('attendance.index') }}" class="btn btn-secondary">Batal</a>
      <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
  </form>
</div>
@endsection
