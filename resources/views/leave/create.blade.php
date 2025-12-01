{{-- resources/views/leave/create.blade.php --}}
@extends('layouts.master')
@section('title', 'Tambah Cuti Pegawai | App Pegawai')

@section('content')
<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-white text-shadow">Tambah Cuti Pegawai</h2>
    </div>

    <div class="glass-box p-4 rounded-4 shadow-lg">
        <form action="{{ route('leave.store') }}" method="POST">
            @csrf

            <div class="row">

                {{-- PEGAWAI --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label text-white fw-semibold">
                        Pegawai <span class="text-danger">*</span>
                    </label>

                    <select name="karyawan_id"
                            class="form-select glass-select @error('karyawan_id') is-invalid @enderror"
                            required>

                        <option value="" disabled {{ old('karyawan_id') ? '' : 'selected' }}>
                            -- Pilih Pegawai --
                        </option>

                        @foreach($employees as $emp)
                            <option value="{{ $emp->id }}"
                                {{ old('karyawan_id') == $emp->id ? 'selected' : '' }}>
                                {{ $emp->nama_lengkap }}
                            </option>
                        @endforeach
                    </select>

                    @error('karyawan_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- TANGGAL MULAI --}}
                <div class="col-md-3 mb-3">
                    <label class="form-label text-white fw-semibold">
                        Tanggal Mulai <span class="text-danger">*</span>
                    </label>
                    <input type="date"
                           name="tanggal_mulai"
                           value="{{ old('tanggal_mulai') }}"
                           class="form-control glass-input @error('tanggal_mulai') is-invalid @enderror"
                           required>
                    @error('tanggal_mulai')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- TANGGAL SELESAI --}}
                <div class="col-md-3 mb-3">
                    <label class="form-label text-white fw-semibold">
                        Tanggal Selesai <span class="text-danger">*</span>
                    </label>
                    <input type="date"
                           name="tanggal_selesai"
                           value="{{ old('tanggal_selesai') }}"
                           class="form-control glass-input @error('tanggal_selesai') is-invalid @enderror"
                           required>
                    @error('tanggal_selesai')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- JUMLAH HARI --}}
                <div class="col-md-3 mb-3">
                    <label class="form-label text-white fw-semibold">Jumlah Hari</label>
                    <input type="number"
                           name="jumlah_hari"
                           value="{{ old('jumlah_hari') }}"
                           class="form-control glass-input @error('jumlah_hari') is-invalid @enderror"
                           min="1">
                    @error('jumlah_hari')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- JENIS CUTI --}}
                <div class="col-md-3 mb-3">
                    <label class="form-label text-white fw-semibold">Jenis Cuti *</label>
                    <select name="jenis_cuti"
                            class="form-select glass-select @error('jenis_cuti') is-invalid @enderror"
                            required>
                        <option value="" disabled {{ old('jenis_cuti') ? '' : 'selected' }}>-- Pilih Jenis Cuti --</option>
                        <option value="tahunan" {{ old('jenis_cuti') == 'tahunan' ? 'selected' : '' }}>Cuti Tahunan</option>
                        <option value="sakit" {{ old('jenis_cuti') == 'sakit' ? 'selected' : '' }}>Cuti Sakit</option>
                        <option value="melahirkan" {{ old('jenis_cuti') == 'melahirkan' ? 'selected' : '' }}>Cuti Melahirkan</option>
                        <option value="lainnya" {{ old('jenis_cuti') == 'lainnya' ? 'selected' : '' }}>Cuti Lainnya</option>
                    </select>
                    @error('jenis_cuti')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- STATUS --}}
                <div class="col-md-3 mb-3">
                    <label class="form-label text-white fw-semibold">Status Pengajuan</label>
                    <select name="status_pengajuan"
                            class="form-select glass-select @error('status_pengajuan') is-invalid @enderror">
                        <option value="menunggu"  {{ old('status_pengajuan','menunggu') == 'menunggu' ? 'selected':'' }}>Menunggu</option>
                        <option value="disetujui" {{ old('status_pengajuan') == 'disetujui' ? 'selected':'' }}>Disetujui</option>
                        <option value="ditolak"   {{ old('status_pengajuan') == 'ditolak' ? 'selected':'' }}>Ditolak</option>
                    </select>
                    @error('status_pengajuan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- KETERANGAN --}}
                <div class="col-12 mb-3">
                    <label class="form-label text-white fw-semibold">Keterangan</label>
                    <textarea name="keterangan" rows="3"
                              class="form-control glass-input @error('keterangan') is-invalid @enderror"
                              placeholder="Tuliskan alasan cuti (opsional)">{{ old('keterangan') }}</textarea>
                    @error('keterangan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            <div class="text-end mt-3">
                <a href="{{ route('leave.index') }}" class="btn btn-cancel px-4">
                    <i class="bi bi-arrow-left"></i> Batal
                </a>
                <button type="submit" class="btn btn-save px-4">
                    <i class="bi bi-check2-circle"></i> Simpan
                </button>
            </div>
        </form>
    </div>
</div>

<style>
/* GLASS BOX */
.glass-box {
    background: rgba(255,255,255,0.20);
    backdrop-filter: blur(14px);
    border: 1px solid rgba(255,255,255,0.25);
    border-radius: 18px;
}

/* TEXT SHADOW */
.text-shadow { text-shadow: 0 2px 10px rgba(0,0,0,0.6); }

/* GLASS INPUT */
.glass-input {
    background: rgba(255,255,255,0.25) !important;
    border: 1px solid rgba(255,255,255,0.4);
    color: white !important;
    border-radius: 10px;
}

/* FIXED SELECT UI — SAMA SEPERTI GAJI */
.glass-select {
    background: rgba(255,255,255,0.25) !important;
    border: 1px solid rgba(255,255,255,0.4);
    color: white !important;
    border-radius: 10px;
    padding: 10px 12px;
}

.glass-select option {
    background: white;
    color: #000;
}

.glass-select:focus {
    background: rgba(255,255,255,0.45) !important;
    box-shadow: 0 0 8px rgba(255,255,255,0.5);
}

.btn-cancel, .btn-save {
    font-weight: 600;
    border-radius: 10px;
}

.btn-cancel {
    background: rgba(255,255,255,0.25);
    color: white;
    border: 1px solid rgba(255,255,255,0.4);
}

.btn-save {
    background: #1a73e8;
    color: white;
}
</style>
@endsection
