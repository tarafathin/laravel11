@extends('layouts.master')
@section('title', 'Edit Jabatan')

@section('content')
<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-white text-shadow">Edit Jabatan</h2>
    </div>

    <div class="glass-box p-4 rounded-4 shadow-lg">

        <form action="{{ route('positions.update', $position->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- NAMA JABATAN --}}
            <div class="mb-3">
                <label for="nama_jabatan" class="form-label text-white fw-semibold">
                    Nama Jabatan <span class="text-danger">*</span>
                </label>

                <input type="text" id="nama_jabatan"
                       name="nama_jabatan"
                       class="form-control glass-input @error('nama_jabatan') is-invalid @enderror"
                       value="{{ old('nama_jabatan', $position->nama_jabatan) }}"
                       placeholder="Masukkan nama jabatan">

                @error('nama_jabatan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- GAJI POKOK --}}
            <div class="mb-3">
                <label for="gaji_pokok" class="form-label text-white fw-semibold">
                    Gaji Pokok <span class="text-danger">*</span>
                </label>

                <input type="number" id="gaji_pokok"
                       name="gaji_pokok"
                       class="form-control glass-input @error('gaji_pokok') is-invalid @enderror"
                       value="{{ old('gaji_pokok', $position->gaji_pokok) }}"
                       placeholder="Masukkan gaji pokok">

                @error('gaji_pokok')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- BUTTON --}}
            <div class="text-end mt-3">

                <a href="{{ route('positions.index') }}" class="btn btn-cancel px-4">
                    <i class="bi bi-arrow-left"></i> Batal
                </a>

                <button type="submit" class="btn btn-save-warning px-4">
                    <i class="bi bi-arrow-repeat"></i> Perbarui
                </button>

            </div>
        </form>

    </div>
</div>

{{-- ===========================
     GLASS UI STYLING
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

/* INPUT GLASS */
.glass-input {
    background: rgba(255, 255, 255, 0.25) !important;
    border: 1px solid rgba(255,255,255,0.4);
    color: #fff !important;
    border-radius: 10px;
}

.glass-input:focus {
    background: rgba(255,255,255,0.45) !important;
    border-color: #fff;
    box-shadow: 0 0 8px rgba(255,255,255,0.5);
    color: #fff;
}

/* CANCEL BUTTON */
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

/* SAVE BUTTON */
.btn-save-warning {
    background: #f0ad4e;
    color: white;
    font-weight: 600;
    border-radius: 10px;
}
.btn-save-warning:hover {
    background: #d98a1f;
}
</style>

@endsection
