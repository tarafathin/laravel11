@extends('layouts.master')
@section('title', 'Edit Data Gaji Pegawai')

@section('content')
<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-white text-shadow">Edit Data Gaji Pegawai</h2>
    </div>

    <div class="glass-box p-4 rounded-4 shadow-lg">

        <form action="{{ route('salaries.update', $salary->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">

                {{-- Pegawai --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label text-white fw-semibold">Nama Pegawai</label>
                    <select name="karyawan_id" class="form-select glass-input">
                        @foreach($employees as $emp)
                            <option value="{{ $emp->id }}" 
                                {{ $salary->karyawan_id == $emp->id ? 'selected' : '' }}>
                                {{ $emp->nama_lengkap }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Bulan --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label text-white fw-semibold">Bulan Gaji</label>
                    <input type="month" name="bulan" 
                        class="form-control glass-input"
                        value="{{ $salary->bulan }}">
                </div>

                {{-- Gaji Pokok --}}
                <div class="col-md-4 mb-3">
                    <label class="form-label text-white fw-semibold">Gaji Pokok</label>
                    <input type="number" id="gaji_pokok"
                        name="gaji_pokok" step="0.01"
                        class="form-control glass-input"
                        value="{{ $salary->gaji_pokok }}">
                </div>

                {{-- Tunjangan --}}
                <div class="col-md-4 mb-3">
                    <label class="form-label text-white fw-semibold">Tunjangan</label>
                    <input type="number" id="tunjangan"
                        name="tunjangan" step="0.01"
                        class="form-control glass-input"
                        value="{{ $salary->tunjangan }}">
                </div>

                {{-- Potongan --}}
                <div class="col-md-4 mb-3">
                    <label class="form-label text-white fw-semibold">Potongan</label>
                    <input type="number" id="potongan"
                        name="potongan" step="0.01"
                        class="form-control glass-input"
                        value="{{ $salary->potongan }}">
                </div>

                {{-- Total Gaji --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label text-white fw-semibold">Total Gaji</label>
                    <input type="number" readonly
                        id="total_gaji" name="total_gaji"
                        value="{{ $salary->total_gaji }}"
                        class="form-control glass-input bg-opacity-50">
                    <small class="text-light opacity-75">
                        Otomatis dihitung dari (gaji pokok + tunjangan - potongan)
                    </small>
                </div>

                {{-- Status Pembayaran --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label text-white fw-semibold">Status Pembayaran</label>
                    <select name="status_pembayaran" class="form-select glass-input">
                        <option value="Belum" {{ $salary->status_pembayaran == 'Belum' ? 'selected' : '' }}>Belum</option>
                        <option value="Sudah" {{ $salary->status_pembayaran == 'Sudah' ? 'selected' : '' }}>Sudah</option>
                    </select>
                </div>

                {{-- Keterangan --}}
                <div class="col-md-12 mb-3">
                    <label class="form-label text-white fw-semibold">Keterangan</label>
                    <textarea name="keterangan" class="form-control glass-input" rows="2">{{ $salary->keterangan }}</textarea>
                </div>

            </div>

            <div class="text-end mt-3">
                <a href="{{ route('salaries.index') }}" class="btn btn-cancel px-4">
                    <i class="bi bi-arrow-left"></i> Batal
                </a>
                <button type="submit" class="btn btn-save-warning px-4">
                    <i class="bi bi-save"></i> Perbarui
                </button>
            </div>
        </form>

    </div>
</div>

{{-- AUTO HITUNG --}}
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

<style>
/* Glass Box */
.glass-box {
    background: rgba(255, 255, 255, 0.20);
    backdrop-filter: blur(14px);
    border: 1px solid rgba(255, 255, 255, 0.25);
}

/* Text shadow */
.text-shadow {
    text-shadow: 0 2px 10px rgba(0,0,0,0.7);
}

/* Inputs */
.glass-input {
    background: rgba(255,255,255,0.25) !important;
    border: 1px solid rgba(255,255,255,0.4);
    color: white !important;
    border-radius: 10px;
}

.glass-input:focus {
    background: rgba(255,255,255,0.45) !important;
    border-color: white;
    box-shadow: 0 0 6px rgba(255,255,255,0.6);
}

/* Buttons */
.btn-cancel {
    background: rgba(255,255,255,0.25);
    color: white;
    border-radius: 10px;
    border: 1px solid rgba(255,255,255,0.4);
    font-weight: 600;
}

.btn-cancel:hover {
    background: rgba(255,255,255,0.4);
}

.btn-save-warning {
    background: #f0ad4e;
    color: white;
    border-radius: 10px;
    font-weight: 600;
}

.btn-save-warning:hover {
    background: #d98a1f;
}
</style>

@endsection
