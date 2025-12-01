@extends('layouts.master')
@section('title', 'Tambah Data Gaji Pegawai | App Pegawai')

@section('content')
<div class="container py-4">
  <h2>Tambah Data Gaji Pegawai</h2>

  <form action="{{ route('salaries.store') }}" method="POST">
    @csrf

    <div class="row">
      <div class="col-md-6 mb-3">
        <label class="form-label">Nama Pegawai <span class="text-danger">*</span></label>
        <select name="karyawan_id" class="form-select @error('karyawan_id') is-invalid @enderror">
          <option value="">-- Pilih Pegawai --</option>
          @foreach($employees as $emp)
            <option value="{{ $emp->id }}" {{ old('karyawan_id') == $emp->id ? 'selected' : '' }}>
              {{ $emp->nama_lengkap }}
            </option>
          @endforeach
        </select>
        @error('karyawan_id')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <div class="col-md-6 mb-3">
        <label class="form-label">Periode <span class="text-danger">*</span></label>
        <input type="text" name="periodic" class="form-control @error('periodic') is-invalid @enderror" value="{{ old('periodic') }}" placeholder="Contoh: Januari 2025">
        @error('periodic')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <div class="col-md-6 mb-3">
        <label class="form-label">Total Gaji <span class="text-danger">*</span></label>
        <input type="number" name="total_gaji" class="form-control @error('total_gaji') is-invalid @enderror" value="{{ old('total_gaji') }}" min="0" step="0.01" placeholder="Masukkan jumlah gaji">
        @error('total_gaji')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <div class="col-md-6 mb-3">
        <label class="form-label">Status Pembayaran <span class="text-danger">*</span></label>
        <select name="status_pembayaran" class="form-select @error('status_pembayaran') is-invalid @enderror">
          <option value="Belum" {{ old('status_pembayaran') == 'Belum' ? 'selected' : '' }}>Belum</option>
          <option value="Sudah" {{ old('status_pembayaran') == 'Sudah' ? 'selected' : '' }}>Sudah</option>
        </select>
        @error('status_pembayaran')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <div class="col-md-12 mb-3">
        <label class="form-label">Keterangan</label>
        <textarea name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" rows="3" placeholder="Catatan tambahan (opsional)">{{ old('keterangan') }}</textarea>
        @error('keterangan')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
    </div>

    <div class="text-end mt-3">
      <a href="{{ route('salaries.index') }}" class="btn btn-secondary">Batal</a>
      <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
  </form>
</div>
@endsection