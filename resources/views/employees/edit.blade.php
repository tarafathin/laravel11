@extends('layouts.master')
@section('title', 'Edit Pegawai')

@section('content')
<div class="card card-custom p-4">
  <h3 class="fw-bold text-primary mb-3">Edit Data Pegawai</h3>

  <form action="{{ route('employees.update', $employee->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row">
      <div class="col-md-6 mb-3">
        <label class="form-label">Nama Lengkap</label>
        <input type="text" name="nama_lengkap" class="form-control" value="{{ old('nama_lengkap', $employee->nama_lengkap) }}">
      </div>

      <div class="col-md-6 mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" value="{{ old('email', $employee->email) }}">
      </div>

      <div class="col-md-6 mb-3">
        <label>Nomor Telepon</label>
        <input type="text" name="nomor_telepon" class="form-control" value="{{ old('nomor_telepon', $employee->nomor_telepon) }}">
      </div>

      <div class="col-md-6 mb-3">
        <label>Tanggal Lahir</label>
        <input type="date" name="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir', $employee->tanggal_lahir) }}">
      </div>

      <div class="col-md-12 mb-3">
        <label>Alamat</label>
        <textarea name="alamat" class="form-control" rows="2">{{ old('alamat', $employee->alamat) }}</textarea>
      </div>

      <div class="col-md-6 mb-3">
        <label>Tanggal Masuk</label>
        <input type="date" name="tanggal_masuk" class="form-control" value="{{ old('tanggal_masuk', $employee->tanggal_masuk) }}">
      </div>

      <div class="col-md-6 mb-3">
        <label>Status</label>
        <select name="status" class="form-select">
          <option value="aktif" {{ $employee->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
          <option value="nonaktif" {{ $employee->status == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
        </select>
      </div>

      <div class="col-md-6 mb-3">
        <label>Departemen</label>
        <select name="departemen_id" class="form-select">
          @foreach($departments as $d)
            <option value="{{ $d->id }}" {{ $employee->departemen_id == $d->id ? 'selected' : '' }}>
              {{ $d->nama_departemen }}
            </option>
          @endforeach
        </select>
      </div>

      <div class="col-md-6 mb-3">
        <label>Jabatan</label>
        <select name="jabatan_id" class="form-select">
          @foreach($positions as $p)
            <option value="{{ $p->id }}" {{ $employee->jabatan_id == $p->id ? 'selected' : '' }}>
              {{ $p->nama_jabatan }}
            </option>
          @endforeach
        </select>
      </div>
    </div>

    <div class="text-end mt-3">
      <a href="{{ route('employees.index') }}" class="btn btn-secondary">Batal</a>
      <button type="submit" class="btn btn-warning text-white">Perbarui</button>
    </div>
  </form>
</div>
@endsection
