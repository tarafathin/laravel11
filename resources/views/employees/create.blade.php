@extends('layouts.master')
@section('title', 'Tambah Pegawai | App Pegawai')

@section('content')
<div class="container py-4">
  <h2>Tambah Pegawai</h2>

  <form action="{{ route('employees.store') }}" method="POST">
    @csrf

    <div class="row">
      <div class="col-md-6">
        <div class="mb-3">
          <label class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
          <input type="text" name="nama_lengkap" class="form-control" value="{{ old('nama_lengkap') }}" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Email <span class="text-danger">*</span></label>
          <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Nomor Telepon</label>
          <input type="text" name="nomor_telepon" class="form-control" value="{{ old('nomor_telepon') }}">
        </div>

        <div class="mb-3">
          <label class="form-label">Tanggal Lahir <span class="text-danger">*</span></label>
          <input type="date" name="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir') }}" required>
        </div>
      </div>

      <div class="col-md-6">
        <div class="mb-3">
          <label class="form-label">Alamat <span class="text-danger">*</span></label>
          <textarea name="alamat" class="form-control" rows="3" required>{{ old('alamat') }}</textarea>
        </div>

        <div class="mb-3">
          <label class="form-label">Tanggal Masuk <span class="text-danger">*</span></label>
          <input type="date" name="tanggal_masuk" class="form-control" value="{{ old('tanggal_masuk') }}" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Status <span class="text-danger">*</span></label>
          <select name="status" class="form-select" required>
            <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
            <option value="nonaktif" {{ old('status') == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
          </select>
        </div>

        <div class="mb-3">
          <label class="form-label">Departemen <span class="text-danger">*</span></label>
          <select name="departemen_id" class="form-select" required>
            <option value="">-- Pilih Departemen --</option>
            @foreach($departments as $dept)
              <option value="{{ $dept->id }}" {{ old('departemen_id') == $dept->id ? 'selected' : '' }}>
                {{ $dept->nama_departemen }}
              </option>
            @endforeach
          </select>
        </div>

        <div class="mb-3">
          <label class="form-label">Jabatan <span class="text-danger">*</span></label>
          <select name="jabatan_id" class="form-select" required>
            <option value="">-- Pilih Jabatan --</option>
            @foreach($positions as $pos)
              <option value="{{ $pos->id }}" {{ old('jabatan_id') == $pos->id ? 'selected' : '' }}>
                {{ $pos->nama_jabatan }}
              </option>
            @endforeach
          </select>
        </div>
      </div>
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('employees.index') }}" class="btn btn-secondary">Batal</a>
  </form>
</div>
@endsection