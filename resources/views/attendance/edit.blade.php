@extends('layouts.master')
@section('title', 'Edit Data Absensi | App Pegawai')

@section('content')
<div class="container py-4">
  <h2>Edit Data Absensi</h2>

  <form action="{{ route('attendance.update', $attendance->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row">
      <div class="col-md-6 mb-3">
        <label class="form-label">Nama Pegawai</label>
        <select name="karyawan_id" class="form-select @error('karyawan_id') is-invalid @enderror">
          <option value="">-- Pilih Pegawai --</option>
          @foreach($employees as $emp)
            <option value="{{ $emp->id }}" {{ $attendance->karyawan_id == $emp->id ? 'selected' : '' }}>
              {{ $emp->nama_lengkap }}
            </option>
          @endforeach
        </select>
        @error('karyawan_id')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <div class="col-md-6 mb-3">
        <label class="form-label">Tanggal</label>
        <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" value="{{ old('tanggal', $attendance->tanggal) }}">
        @error('tanggal')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <div class="col-md-6 mb-3">
        <label class="form-label">Waktu Masuk</label>
        <input type="time" name="waktu_masuk" class="form-control @error('waktu_masuk') is-invalid @enderror" value="{{ old('waktu_masuk', $attendance->waktu_masuk) }}">
        @error('waktu_masuk')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <div class="col-md-6 mb-3">
        <label class="form-label">Waktu Keluar</label>
        <input type="time" name="waktu_keluar" class="form-control @error('waktu_keluar') is-invalid @enderror" value="{{ old('waktu_keluar', $attendance->waktu_keluar) }}">
        @error('waktu_keluar')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <div class="col-md-6 mb-3">
        <label class="form-label">Status Absensi</label>
        <select name="status_absensi" class="form-select @error('status_absensi') is-invalid @enderror">
          <option value="hadir" {{ $attendance->status_absensi == 'hadir' ? 'selected' : '' }}>Hadir</option>
          <option value="izin" {{ $attendance->status_absensi == 'izin' ? 'selected' : '' }}>Izin</option>
          <option value="sakit" {{ $attendance->status_absensi == 'sakit' ? 'selected' : '' }}>Sakit</option>
          <option value="alpha" {{ $attendance->status_absensi == 'alpha' ? 'selected' : '' }}>Alpha</option>
        </select>
        @error('status_absensi')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
    </div>

    <div class="text-end mt-3">
      <a href="{{ route('attendance.index') }}" class="btn btn-secondary">Batal</a>
      <button type="submit" class="btn btn-warning text-white">Perbarui</button>
    </div>
  </form>
</div>
@endsection