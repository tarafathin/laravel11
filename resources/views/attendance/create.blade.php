@extends('layouts.master')
@section('title', 'Tambah Data Absensi')

@section('content')
<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-white text-shadow">Tambah Data Absensi</h2>
    </div>

    <div class="glass-box p-4 rounded-4 shadow-lg">

        <form action="{{ route('attendance.store') }}" method="POST">
            @csrf

            <div class="row">

                {{-- NAMA PEGAWAI --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label text-white fw-semibold">Nama Pegawai <span class="text-danger">*</span></label>
                    <select name="karyawan_id" 
                        class="form-select glass-input @error('karyawan_id') is-invalid @enderror">
                        <option value="">-- Pilih Pegawai --</option>
                        @foreach($employees as $emp)
                            <option value="{{ $emp->id }}">{{ $emp->nama_lengkap }}</option>
                        @endforeach
                    </select>
                    @error('karyawan_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                {{-- TANGGAL --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label text-white fw-semibold">Tanggal <span class="text-danger">*</span></label>
                    <input type="date" 
                        name="tanggal" 
                        value="{{ old('tanggal') }}"
                        class="form-control glass-input @error('tanggal') is-invalid @enderror">
                    @error('tanggal') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                {{-- WAKTU MASUK --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label text-white fw-semibold">Waktu Masuk</label>
                    <input type="time" 
                        name="waktu_masuk" 
                        value="{{ old('waktu_masuk') }}"
                        class="form-control glass-input">
                </div>

                {{-- WAKTU KELUAR --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label text-white fw-semibold">Waktu Keluar</label>
                    <input type="time" 
                        name="waktu_keluar"
                        value="{{ old('waktu_keluar') }}"
                        class="form-control glass-input">
                </div>

                {{-- STATUS --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label text-white fw-semibold">Status Absensi <span class="text-danger">*</span></label>
                    <select name="status_absensi" 
                        class="form-select glass-input @error('status_absensi') is-invalid @enderror">
                        <option value="hadir">Hadir</option>
                        <option value="izin">Izin</option>
                        <option value="sakit">Sakit</option>
                        <option value="alpha">Alpha</option>
                    </select>
                    @error('status_absensi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            {{-- BUTTON --}}
            <div class="text-end mt-3">
                <a href="{{ route('attendance.index') }}" class="btn btn-cancel px-4">
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

/* INPUT & SELECT */
.glass-input {
    background: rgba(255, 255, 255, 0.25) !important;
    border: 1px solid rgba(255,255,255,0.4);
    color: #fff !important;
    border-radius: 10px;
    box-shadow: 0 0 8px rgba(255,255,255,0.15);
}

.glass-input::placeholder {
    color: rgba(255,255,255,0.7) !important;
}

.glass-input:focus {
    background: rgba(255,255,255,0.45) !important;
    box-shadow: 0 0 8px rgba(255,255,255,0.5);
    border-color: #fff;
    color: white !important;
}

/* OPTIONS */
.form-select option {
    color: #000;
}

/* BUTTONS */
.btn-cancel {
    background: rgba(255,255,255,0.25);
    color: white;
    border: 1px solid rgba(255,255,255,0.4);
    font-weight: 600;
    border-radius: 10px;
}

.btn-cancel:hover {
    background: rgba(255,255,255,0.4);
}

.btn-save {
    background: #1a73e8;
    border-radius: 10px;
    color: white;
    font-weight: 600;
}

.btn-save:hover {
    background: #0f56b3;
}

</style>

@endsection
