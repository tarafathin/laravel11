@extends('layouts.master')
@section('title', 'Tambah Departemen')

@section('content')
<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-white text-shadow">Tambah Departemen Baru</h2>
    </div>

    <div class="glass-box p-4 rounded-4 shadow-lg">

        <form action="{{ route('departments.store') }}" method="POST">
            @csrf

            {{-- NAMA DEPARTEMEN --}}
            <div class="mb-3">
                <label class="form-label text-white fw-semibold">Nama Departemen <span class="text-danger">*</span></label>
                <input type="text"
                       name="nama_departemen"
                       class="form-control glass-input @error('nama_departemen') is-invalid @enderror"
                       placeholder="Masukkan nama departemen"
                       value="{{ old('nama_departemen') }}">
                @error('nama_departemen')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- BUTTON --}}
            <div class="text-end mt-3">
                <a href="{{ route('departments.index') }}" class="btn btn-cancel px-4">
                    <i class="bi bi-arrow-left"></i> Batal
                </a>

                <button type="submit" class="btn btn-save px-4">
                    <i class="bi bi-check2-circle"></i> Simpan
                </button>
            </div>

        </form>

    </div>
</div>

{{-- ===========================
     GLASS UI STYLE
=========================== --}}
<style>

.glass-box {
    background: rgba(255, 255, 255, 0.20);
    backdrop-filter: blur(14px);
    -webkit-backdrop-filter: blur(14px);
    border: 1px solid rgba(255, 255, 255, 0.25);
}

.text-shadow {
    text-shadow: 0 2px 10px rgba(0,0,0,0.6);
}

/* INPUT + SELECT */
.glass-input {
    background: rgba(255,255,255,0.25) !important;
    border: 1px solid rgba(255,255,255,0.4);
    color: white !important;
    border-radius: 10px;
}

.glass-input:focus {
    background: rgba(255,255,255,0.45) !important;
    border-color: #fff;
    box-shadow: 0 0 8px rgba(255,255,255,0.5);
}

/* BUTTONS */
.btn-cancel {
    background: rgba(255,255,255,0.25);
    color: white;
    border: 1px solid rgba(255,255,255,0.4);
    border-radius: 10px;
    font-weight: 600;
}
.btn-cancel:hover {
    background: rgba(255,255,255,0.4);
}

.btn-save {
    background: #1a73e8;
    color: white;
    font-weight: 600;
    border-radius: 10px;
}
.btn-save:hover {
    background: #0f56b3;
}

</style>

@endsection
