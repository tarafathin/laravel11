@extends('layouts.master')
@section('title', 'Edit Data Gaji')

@section('content')
<div class="card card-custom p-4">
  <h3 class="fw-bold text-primary mb-3">Edit Data Gaji Pegawai</h3>

  <form action="{{ route('salaries.update', $salary->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row">
      <div class="col-md-6 mb-3">
        <label class="form-label">Nama Pegawai</label>
        <select name="karyawan_id" class="form-select">
          @foreach($employees as $emp)
            <option value="{{ $emp->id }}" {{ $salary->karyawan_id == $emp->id ? 'selected' : '' }}>
              {{ $emp->nama_lengkap }}
            </option>
          @endforeach
        </select>
      </div>

      <div class="col-md-6 mb-3">
        <label>Periode Gaji</label>
        <input type="month" name="periodic" class="form-control" value="{{ $salary->periodic }}">
      </div>

      <div class="col-md-6 mb-3">
        <label>Total Gaji</label>
        <input type="number" name="total_gaji" class="form-control" value="{{ $salary->total_gaji }}">
      </div>

      <div class="col-md-6 mb-3">
        <label>Status Pembayaran</label>
        <select name="status_pembayaran" class="form-select">
          <option value="belum" {{ $salary->status_pembayaran == 'belum' ? 'selected' : '' }}>Belum</option>
          <option value="lunas" {{ $salary->status_pembayaran == 'lunas' ? 'selected' : '' }}>Lunas</option>
        </select>
      </div>

      <div class="col-12 mb-3">
        <label>Keterangan</label>
        <textarea name="keterangan" class="form-control" rows="2">{{ $salary->keterangan }}</textarea>
      </div>
    </div>

    <div class="text-end mt-3">
      <a href="{{ route('salaries.index') }}" class="btn btn-secondary">Batal</a>
      <button type="submit" class="btn btn-warning text-white">Perbarui</button>
    </div>
  </form>
</div>
@endsection
