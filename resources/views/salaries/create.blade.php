@extends('layouts.master')
@section('title', 'Tambah Data Gaji Pegawai | App Pegawai')

@section('content')
<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-white text-shadow">Tambah Data Gaji Pegawai</h2>
    </div>

    <!-- GANTI BARIS INI -->
    <div class="glass-box">

        <form action="{{ route('salaries.store') }}" method="POST">
            @csrf

            <div class="row">

                {{-- NAMA PEGAWAI --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Nama Pegawai <span class="text-danger">*</span></label>
                    <select name="karyawan_id" 
                            class="form-select shadow-sm @error('karyawan_id') is-invalid @enderror">
                        <option value="">-- Pilih Pegawai --</option>
                        @foreach($employees as $emp)
                            <option value="{{ $emp->id }}" {{ old('karyawan_id') == $emp->id ? 'selected' : '' }}>
                                {{ $emp->nama_lengkap }}
                            </option>
                        @endforeach
                    </select>
                    @error('karyawan_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- BULAN --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Bulan Gaji <span class="text-danger">*</span></label>
                    <input type="month" name="bulan" 
                        value="{{ old('bulan') }}"
                        class="form-control shadow-sm @error('bulan') is-invalid @enderror">
                    @error('bulan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- GAJI POKOK --}}
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-semibold">Gaji Pokok <span class="text-danger">*</span></label>
                    <input type="number" step="0.01" min="0" id="gaji_pokok" 
                           name="gaji_pokok" value="{{ old('gaji_pokok') }}"
                           class="form-control shadow-sm @error('gaji_pokok') is-invalid @enderror">
                    @error('gaji_pokok')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- TUNJANGAN --}}
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-semibold">Tunjangan</label>
                    <input type="number" step="0.01" min="0" id="tunjangan"
                           name="tunjangan" value="{{ old('tunjangan') }}"
                           class="form-control shadow-sm @error('tunjangan') is-invalid @enderror">
                    @error('tunjangan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- POTONGAN --}}
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-semibold">Potongan</label>
                    <input type="number" step="0.01" min="0" id="potongan"
                           name="potongan" value="{{ old('potongan') }}"
                           class="form-control shadow-sm @error('potongan') is-invalid @enderror">
                    @error('potongan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- TOTAL GAJI --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Total Gaji <span class="text-danger">*</span></label>
                    <input type="number" readonly step="0.01" 
                           id="total_gaji" name="total_gaji" 
                           value="{{ old('total_gaji') }}"
                           class="form-control shadow-sm bg-light">
                    <small class="text-muted">Otomatis dari gaji pokok + tunjangan - potongan.</small>
                </div>

                {{-- STATUS --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Status Pembayaran <span class="text-danger">*</span></label>
                    <select name="status_pembayaran" 
                            class="form-select shadow-sm @error('status_pembayaran') is-invalid @enderror">
                        <option value="Belum" {{ old('status_pembayaran') == 'Belum' ? 'selected' : '' }}>Belum</option>
                        <option value="Sudah" {{ old('status_pembayaran') == 'Sudah' ? 'selected' : '' }}>Sudah</option>
                    </select>
                    @error('status_pembayaran')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- KETERANGAN --}}
                <div class="text-end mt-3">
                <a href="{{ route('salaries.index') }}" class="btn btn-secondary px-4">
                    <i class="bi bi-arrow-left"></i> Batal
                </a>
                <button type="submit" class="btn btn-primary px-4">
                    <i class="bi bi-save"></i> Simpan
                </button>
            </div>

        </form>

    </div>
</div>

<style>
/* Container Glass */
.glass-box {
    background: rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    padding: 30px;
    border-radius: 18px;
    border: 1px solid rgba(255, 255, 255, 0.25);
    box-shadow: 0 8px 28px rgba(0, 0, 0, 0.25);
}

/* Label */
.form-label {
    font-weight: 600;
    color: #fff;
}

/* Glass Input */
.form-control, .form-select, select {
    background: rgba(255, 255, 255, 0.25) !important;
    border: 1px solid rgba(255, 255, 255, 0.4);
    color: #fff !important;
    font-weight: 500;
    border-radius: 10px;
}

/* Placeholder putih */
.form-control::placeholder {
    color: rgba(255, 255, 255, 0.7) !important;
}

/* Saat fokus */
.form-control:focus, .form-select:focus {
    background: rgba(255,255,255,0.45) !important;
    border-color: #ffffff;
    box-shadow: 0 0 6px rgba(255,255,255,0.6);
    color: #fff;
}

/* Dropdown icon putih */
.form-select option {
    color: #000; 
}

/* Tombol */
.btn-modern {
    padding: 10px 25px;
    border-radius: 10px;
    font-weight: 600;
}

.btn-cancel {
    background: rgba(255,255,255,0.2);
    color: #fff;
    border: 1px solid rgba(255,255,255,0.3);
}

.btn-cancel:hover {
    background: rgba(255,255,255,0.35);
}

.btn-save {
    background: #1a73e8;
    color: white;
}

.btn-save:hover {
    background: #155dc2;
}

</style>


{{-- AUTO HITUNG TOTAL --}}
<script>
function hitungTotal() {
    let gaji = parseFloat(document.getElementById('gaji_pokok').value) || 0;
    let tunj = parseFloat(document.getElementById('tunjangan').value) || 0;
    let pot = parseFloat(document.getElementById('potongan').value) || 0;

    document.getElementById('total_gaji').value = (gaji + tunj - pot).toFixed(2);
}

document.getElementById('gaji_pokok').addEventListener('input', hitungTotal);
document.getElementById('tunjangan').addEventListener('input', hitungTotal);
document.getElementById('potongan').addEventListener('input', hitungTotal);
</script>
@endsection
