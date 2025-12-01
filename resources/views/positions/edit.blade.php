@extends('layouts.master')
@section('title', 'Edit Jabatan')

@section('content')
<div class="card card-custom p-4">
  <h3 class="fw-bold text-primary mb-3">Edit Jabatan</h3>

  <form action="{{ route('positions.update', $position->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
      <label for="nama_jabatan" class="form-label form-required">Nama Jabatan</label>
      <input type="text" id="nama_jabatan" name="nama_jabatan"
             class="form-control @error('nama_jabatan') is-invalid @enderror"
             value="{{ old('nama_jabatan', $position->nama_jabatan) }}">
      @error('nama_jabatan')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="mb-3">
      <label for="gaji_pokok" class="form-label form-required">Gaji Pokok</label>
      <input type="number" id="gaji_pokok" name="gaji_pokok"
             class="form-control @error('gaji_pokok') is-invalid @enderror"
             value="{{ old('gaji_pokok', $position->gaji_pokok) }}">
      @error('gaji_pokok')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="text-end">
      <a href="{{ route('positions.index') }}" class="btn btn-secondary">Batal</a>
      <button type="submit" class="btn btn-warning text-white">Perbarui</button>
    </div>
  </form>
</div>
@endsection
