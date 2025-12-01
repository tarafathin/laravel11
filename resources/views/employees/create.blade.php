@extends('layouts.master')
@section('title', 'Tambah Pegawai | App Pegawai')

@section('content')
<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-white text-shadow">Tambah Data Pegawai</h2>
    </div>

    <div class="glass-box p-4 rounded-4 shadow-lg">

        <form action="{{ route('employees.store') }}" method="POST">
            @csrf

            <div class="row">

                {{-- NAMA LENGKAP --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label text-white fw-semibold">
                        Nama Lengkap <span class="text-danger">*</span>
                    </label>
                    <input type="text" 
                           name="nama_lengkap" 
                           class="form-control glass-input @error('nama_lengkap') is-invalid @enderror"
                           value="{{ old('nama_lengkap') }}" required>
                    @error('nama_lengkap') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                {{-- EMAIL --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label text-white fw-semibold">
                        Email <span class="text-danger">*</span>
                    </label>
                    <input type="email" 
                           name="email" 
                           class="form-control glass-input @error('email') is-invalid @enderror"
                           value="{{ old('email') }}" required>
                    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                {{-- NOMOR TELEPON --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label text-white fw-semibold">Nomor Telepon</label>
                    <input type="text" 
                           name="nomor_telepon" 
                           class="form-control glass-input"
                           value="{{ old('nomor_telepon') }}">
                </div>

                {{-- TANGGAL LAHIR --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label text-white fw-semibold">
                        Tanggal Lahir <span class="text-danger">*</span>
                    </label>
                    <input type="date" 
                           name="tanggal_lahir" 
                           class="form-control glass-input @error('tanggal_lahir') is-invalid @enderror"
                           value="{{ old('tanggal_lahir') }}" required>
                    @error('tanggal_lahir') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                {{-- ALAMAT --}}
                <div class="col-md-12 mb-3">
                    <label class="form-label text-white fw-semibold">
                        Alamat <span class="text-danger">*</span>
                    </label>
                    <textarea name="alamat" 
                              class="form-control glass-input @error('alamat') is-invalid @enderror"
                              rows="3" required>{{ old('alamat') }}</textarea>
                    @error('alamat') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                {{-- TANGGAL MASUK --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label text-white fw-semibold">
                        Tanggal Masuk <span class="text-danger">*</span>
                    </label>
                    <input type="date" 
                           name="tanggal_masuk" 
                           class="form-control glass-input @error('tanggal_masuk') is-invalid @enderror"
                           value="{{ old('tanggal_masuk') }}" required>
                    @error('tanggal_masuk') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                {{-- STATUS --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label text-white fw-semibold">
                        Status <span class="text-danger">*</span>
                    </label>
                    <select name="status" 
                            class="form-select glass-input @error('status') is-invalid @enderror" required>
                        <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="nonaktif" {{ old('status') == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                    </select>
                    @error('status') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                {{-- DEPARTEMEN --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label text-white fw-semibold">
                        Departemen <span class="text-danger">*</span>
                    </label>
                    <select name="departemen_id" 
                            class="form-select glass-input @error('departemen_id') is-invalid @enderror" required>
                        <option value="">-- Pilih Departemen --</option>
                        @foreach($departments as $dept)
                            <option value="{{ $dept->id }}" {{ old('departemen_id') == $dept->id ? 'selected' : '' }}>
                                {{ $dept->nama_departemen }}
                            </option>
                        @endforeach
                    </select>
                    @error('departemen_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                {{-- JABATAN --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label text-white fw-semibold">
                        Jabatan <span class="text-danger">*</span>
                    </label>
                    <select name="jabatan_id" 
                            class="form-select glass-input @error('jabatan_id') is-invalid @enderror" required>
                        <option value="">-- Pilih Jabatan --</option>
                        @foreach($positions as $pos)
                            <option value="{{ $pos->id }}" {{ old('jabatan_id') == $pos->id ? 'selected' : '' }}>
                                {{ $pos->nama_jabatan }}
                            </option>
                        @endforeach
                    </select>
                    @error('jabatan_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

            </div>

            <div class="text-end mt-3">
                <a href="{{ route('employees.index') }}" class="btn btn-cancel px-4">
                    <i class="bi bi-arrow-left"></i> Batal
                </a>

                <button type="submit" class="btn btn-save px-4">
                    <i class="bi bi-save"></i> Simpan
                </button>
            </div>

        </form>

    </div>
</div>


{{-- ============================
         GLASS UI STYLE
============================ --}}
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

.glass-input {
    background: rgba(255,255,255,0.25) !important;
    border: 1px solid rgba(255,255,255,0.4);
    color: #fff !important;
    border-radius: 10px;
}
.glass-input::placeholder {
    color: rgba(255,255,255,0.7) !important;
}
.glass-input:focus {
    background: rgba(255,255,255,0.45) !important;
    border-color: #fff;
    box-shadow: 0 0 8px rgba(255,255,255,0.5);
    color: #fff !important;
}

.form-select option {
    color: #000;
}

/* BUTTON */
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
    border-radius: 10px;
    font-weight: 600;
}
.btn-save:hover {
    background: #0f56b3;
}
</style>

@endsection
