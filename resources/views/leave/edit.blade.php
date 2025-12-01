{{-- resources/views/leave/edit.blade.php --}}
@extends('layouts.master')
@section('title', 'Edit Data Cuti | App Pegawai')

@section('content')
<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-white text-shadow">Edit Data Cuti Pegawai</h2>
    </div>

    <div class="glass-box p-4 rounded-4 shadow-lg">

        <form action="{{ route('leave.update', $leave->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">

                {{-- PEGAWAI --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label text-white fw-semibold">
                        Pegawai <span class="text-danger">*</span>
                    </label>

                    <select name="karyawan_id"
                            class="form-select glass-input @error('karyawan_id') is-invalid @enderror"
                            required>

                        <option value="" disabled>-- Pilih Pegawai --</option>

                        @foreach($employees as $emp)
                            <option value="{{ $emp->id }}"
                                {{ old('karyawan_id', $leave->karyawan_id) == $emp->id ? 'selected' : '' }}>
                                {{ $emp->nama_lengkap }}
                            </option>
                        @endforeach
                    </select>
                    @error('karyawan_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                {{-- TANGGAL MULAI --}}
                <div class="col-md-3 mb-3">
                    <label class="form-label text-white fw-semibold">
                        Tanggal Mulai <span class="text-danger">*</span>
                    </label>
                    <input type="date"
                           name="tanggal_mulai"
                           value="{{ old('tanggal_mulai', $leave->tanggal_mulai) }}"
                           class="form-control glass-input @error('tanggal_mulai') is-invalid @enderror"
                           required>
                    @error('tanggal_mulai') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                {{-- TANGGAL SELESAI --}}
                <div class="col-md-3 mb-3">
                    <label class="form-label text-white fw-semibold">
                        Tanggal Selesai <span class="text-danger">*</span>
                    </label>
                    <input type="date"
                           name="tanggal_selesai"
                           value="{{ old('tanggal_selesai', $leave->tanggal_selesai) }}"
                           class="form-control glass-input @error('tanggal_selesai') is-invalid @enderror"
                           required>
                    @error('tanggal_selesai') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                {{-- JUMLAH HARI --}}
                <div class="col-md-3 mb-3">
                    <label class="form-label text-white fw-semibold">
                        Jumlah Hari
                    </label>
                    <input type="number"
                           name="jumlah_hari"
                           min="1"
                           value="{{ old('jumlah_hari', $leave->jumlah_hari) }}"
                           class="form-control glass-input @error('jumlah_hari') is-invalid @enderror">
                    @error('jumlah_hari') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                {{-- JENIS CUTI --}}
                <div class="col-md-3 mb-3">
                    <label class="form-label text-white fw-semibold">Jenis Cuti</label>

                    <select name="jenis_cuti"
                            class="form-select glass-input @error('jenis_cuti') is-invalid @enderror">

                        <option value="tahunan"     {{ $leave->jenis_cuti == 'tahunan' ? 'selected' : '' }}>Cuti Tahunan</option>
                        <option value="sakit"        {{ $leave->jenis_cuti == 'sakit' ? 'selected' : '' }}>Cuti Sakit</option>
                        <option value="melahirkan"   {{ $leave->jenis_cuti == 'melahirkan' ? 'selected' : '' }}>Cuti Melahirkan</option>
                        <option value="lainnya"      {{ $leave->jenis_cuti == 'lainnya' ? 'selected' : '' }}>Cuti Lainnya</option>

                    </select>

                    @error('jenis_cuti') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                {{-- STATUS PENGAJUAN --}}
                <div class="col-md-3 mb-3">
                    <label class="form-label text-white fw-semibold">Status Pengajuan</label>

                    <select name="status_pengajuan"
                            class="form-select glass-input">

                        <option value="menunggu"  {{ $leave->status_pengajuan == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                        <option value="disetujui" {{ $leave->status_pengajuan == 'disetujui' ? 'selected' : '' }}>Disetujui</option>
                        <option value="ditolak"   {{ $leave->status_pengajuan == 'ditolak' ? 'selected' : '' }}>Ditolak</option>

                    </select>
                </div>

                {{-- KETERANGAN --}}
                <div class="col-12 mb-3">
                    <label class="form-label text-white fw-semibold">Keterangan</label>

                    <textarea name="keterangan"
                              rows="3"
                              class="form-control glass-input">{{ old('keterangan', $leave->keterangan) }}</textarea>
                </div>

            </div>

            {{-- BUTTON --}}
            <div class="text-end mt-3">
                <a href="{{ route('leave.index') }}" class="btn btn-cancel px-4">
                    <i class="bi bi-arrow-left"></i> Batal
                </a>

                <button type="submit" class="btn btn-save-warning px-4">
                    <i class="bi bi-arrow-repeat"></i> Perbarui
                </button>
            </div>

        </form>

    </div>
</div>

{{-- GLASS UI STYLE --}}
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

/* Buttons */
.btn-cancel {
    background: rgba(255,255,255,0.25);
    color: white;
    border-radius: 10px;
    font-weight: 600;
}
.btn-cancel:hover { background: rgba(255,255,255,0.4); }

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
