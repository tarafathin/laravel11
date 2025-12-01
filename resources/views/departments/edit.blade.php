@extends('layouts.master')
@section('title', 'Edit Departemen')

@section('content')
<div class="card card-custom p-4">
  <h3 class="fw-bold text-primary mb-3">Edit Departemen</h3>

  <form action="{{ route('departments.update', $department->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
      <label for="nama_departemen" class="form-label form-required">Nama Departemen</label>
      <input type="text" id="nama_departemen" name="nama_departemen"
             class="form-control @error('nama_departemen') is-invalid @enderror"
             value="{{ old('nama_departemen', $department->nama_departemen) }}">
      @error('nama_departemen')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="text-end">
      <a href="{{ route('departments.index') }}" class="btn btn-secondary">Batal</a>
      <button type="submit" class="btn btn-warning text-white">Perbarui</button>
    </div>
  </form>
</div>
@endsection
