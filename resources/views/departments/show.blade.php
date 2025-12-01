@extends('layouts.master')
@section('title', 'Detail Departemen')

@section('content')
<div class="card card-custom p-4">
  <h3 class="fw-bold text-primary mb-3">Detail Departemen</h3>

  <table class="table table-bordered">
    <tr>
      <th style="width: 30%">Nama Departemen</th>
      <td>{{ $department->nama_departemen }}</td>
    </tr>
    <tr>
      <th>Dibuat Pada</th>
      <td>{{ $department->created_at->format('d M Y H:i') }}</td>
    </tr>
    <tr>
      <th>Diperbarui Terakhir</th>
      <td>{{ $department->updated_at->format('d M Y H:i') }}</td>
    </tr>
  </table>

  <div class="text-end mt-3">
    <a href="{{ route('departments.index') }}" class="btn btn-secondary">Kembali</a>
  </div>
</div>
@endsection
