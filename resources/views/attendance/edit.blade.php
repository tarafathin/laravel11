@extends('layouts.master')
@section('title', 'Edit Data Absensi | App Pegawai')

@section('content')
<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-white text-shadow">Edit Data Absensi</h2>
    </div>

    <div class="glass-box p-4 rounded-4 shadow-lg">

        <form action="{{ route('attendance.update', $attendance->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">

                {{-- PEGAWAI --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label text-white fw-semibold">Nama Pegawai <span class="text-danger">*</span></label>
                    <select name="karyawan_id" 
                        class="form-select glass-input @error('karyawan_id') is-invalid @enderror">

                        <option value="">-- Pilih Pegawai --</option>
                        @foreach($employees as $emp)
                            <option value="{{ $emp->id }}" 
                                {{ old('karyawan_id', $attendance->karyawan_id) == $emp->id ? 'selected' : '' }}>
                                {{ $emp->nama_lengkap }}
                            </option>
                        @endforeach
                    </select>

                    @error('karyawan_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- TANGGAL --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label text-white fw-semibold">Tanggal</label>
                    <input type="date" 
                        name="tanggal" 
                        value="{{ old('tanggal', $attendance->tanggal) }}"
                        class="form-control glass-input @error('tanggal') is-invalid @enderror">
                    @error('tanggal')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- WAKTU MASUK --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label text-white fw-semibold">Waktu Masuk</label>
                    <input type="time" 
                        name="waktu_masuk" 
                        value="{{ old('waktu_masuk', $attendance->waktu_masuk) }}"
                        class="form-control glass-input @error('waktu_masuk') is-invalid @enderror">
                    @error('waktu_masuk')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- WAKTU KELUAR --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label text-white fw-semibold">Waktu Keluar</label>
                    <input type="time" 
                        name="waktu_keluar"
                        value="{{ old('waktu_keluar', $attendance->waktu_keluar) }}"
                        class="form-control glass-input @error('waktu_keluar') is-invalid @enderror">
                    @error('waktu_keluar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- STATUS --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label text-white fw-semibold">Status Absensi</label>
                    <select name="status_absensi" 
                        class="form-select glass-input @error('status_absensi') is-invalid @enderror">

                        <option value="hadir"  {{ old('status_absensi', $attendance->status_absensi) == 'hadir' ? 'selected' : '' }}>Hadir</option>
                        <option value="izin"   {{ old('status_absensi', $attendance->status_absensi) == 'izin' ? 'selected' : '' }}>Izin</option>
                        <option value="sakit"  {{ old('status_absensi', $attendance->status_absensi) == 'sakit' ? 'selected' : '' }}>Sakit</option>
                        <option value="alpha"  {{ old('status_absensi', $attendance->status_absensi) == 'alpha' ? 'selected' : '' }}>Alpha</option>
                    </select>

                    @error('status_absensi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            {{-- BUTTON --}}
            <div class="text-end mt-3">
                <a href="{{ route('attendance.index') }}" class="btn btn-cancel px-4">
                    <i class="bi bi-arrow-left"></i> Batal
                </a>

                <button type="submit" class="btn btn-save-warning px-4">
                    <i class="bi bi-arrow-repeat"></i> Perbarui
                </button>
            </div>

        </form>

    </div>
</div>

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
    background: rgba(255, 255, 255, 0.25) !important;
    border: 1px solid rgba(255,255,255,0.4);
    color: #fff !important;
    border-radius: 10px;
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
