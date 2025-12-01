@extends('layouts.master')
@section('title', 'Edit Pegawai | App Pegawai')

@section('content')
<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-white text-shadow">Edit Data Pegawai</h2>
    </div>

    <div class="glass-box p-4 rounded-4 shadow-lg">

        <form action="{{ route('employees.update', $employee->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">

                {{-- NAMA --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label text-white fw-semibold">Nama Lengkap <span class="text-danger">*</span></label>
                    <input type="text" name="nama_lengkap"
                        value="{{ old('nama_lengkap', $employee->nama_lengkap) }}"
                        class="form-control glass-input @error('nama_lengkap') is-invalid @enderror">
                    @error('nama_lengkap') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                {{-- EMAIL --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label text-white fw-semibold">Email <span class="text-danger">*</span></label>
                    <input type="email" name="email"
                        value="{{ old('email', $employee->email) }}"
                        class="form-control glass-input @error('email') is-invalid @enderror">
                    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                {{-- TELEPON --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label text-white fw-semibold">Nomor Telepon</label>
                    <input type="text" name="nomor_telepon"
                        value="{{ old('nomor_telepon', $employee->nomor_telepon) }}"
                        class="form-control glass-input">
                </div>

                {{-- TANGGAL LAHIR --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label text-white fw-semibold">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir"
                        value="{{ old('tanggal_lahir', $employee->tanggal_lahir) }}"
                        class="form-control glass-input">
                </div>

                {{-- ALAMAT --}}
                <div class="col-md-12 mb-3">
                    <label class="form-label text-white fw-semibold">Alamat</label>
                    <textarea name="alamat" rows="2"
                        class="form-control glass-input">{{ old('alamat', $employee->alamat) }}</textarea>
                </div>

                {{-- TANGGAL MASUK --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label text-white fw-semibold">Tanggal Masuk</label>
                    <input type="date" name="tanggal_masuk"
                        value="{{ old('tanggal_masuk', $employee->tanggal_masuk) }}"
                        class="form-control glass-input">
                </div>

                {{-- STATUS --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label text-white fw-semibold">Status Pegawai</label>
                    <select name="status"
                        class="form-select glass-input @error('status') is-invalid @enderror">
                        <option value="aktif" {{ $employee->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="nonaktif" {{ $employee->status == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                    </select>
                    @error('status') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                {{-- DEPARTEMEN --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label text-white fw-semibold">Departemen</label>
                    <select name="departemen_id" class="form-select glass-input">
                        @foreach($departments as $d)
                            <option value="{{ $d->id }}" {{ $employee->departemen_id == $d->id ? 'selected' : '' }}>
                                {{ $d->nama_departemen }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- JABATAN --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label text-white fw-semibold">Jabatan</label>
                    <select name="jabatan_id" class="form-select glass-input">
                        @foreach($positions as $p)
                            <option value="{{ $p->id }}" {{ $employee->jabatan_id == $p->id ? 'selected' : '' }}>
                                {{ $p->nama_jabatan }}
                            </option>
                        @endforeach
                    </select>
                </div>

            </div>

            <div class="text-end mt-3">
                <a href="{{ route('employees.index') }}" class="btn btn-cancel px-4">
                    <i class="bi bi-arrow-left"></i> Batal
                </a>

                <button type="submit" class="btn btn-save-warning px-4">
                    <i class="bi bi-arrow-repeat"></i> Perbarui
                </button>
            </div>

        </form>

    </div>
</div>

{{-- GLASS STYLE --}}
<style>
.glass-box {
    background: rgba(255, 255, 255, 0.20);
    backdrop-filter: blur(14px);
    border: 1px solid rgba(255, 255, 255, 0.25);
}

.text-shadow {
    text-shadow: 0 2px 10px rgba(0,0,0,0.6);
}

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
}

.btn-cancel {
    background: rgba(255,255,255,0.25);
    color: white;
    border-radius: 10px;
    font-weight: 600;
}
.btn-cancel:hover {
    background: rgba(255,255,255,0.4);
}

.btn-save-warning {
    background: #f0ad4e;
    border-radius: 10px;
    font-weight: 600;
    color: white;
}
.btn-save-warning:hover {
    background: #d98a1f;
}
</style>

@endsection
