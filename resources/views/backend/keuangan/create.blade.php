@extends('layouts.app')

@section('title', 'Tambah Laporan Keuangan')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-plus mr-2"></i>
                        Tambah Laporan Keuangan
                    </h3>
                    <div class="card-tools">
                        <a href="{{ route('keuangan.index') }}" class="btn btn-secondary btn-sm">
                            <i class="fas fa-arrow-left mr-1"></i>
                            Kembali
                        </a>
                    </div>
                </div>
                
                <form action="{{ route('keuangan.store') }}" method="POST" enctype="multipart/form-data" id="formLaporan">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <!-- Judul Laporan -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="judul" class="form-label required">
                                        <i class="fas fa-heading mr-1"></i>
                                        Judul Laporan
                                    </label>
                                    <input type="text" 
                                           class="form-control @error('judul') is-invalid @enderror" 
                                           id="judul" 
                                           name="judul" 
                                           value="{{ old('judul') }}" 
                                           placeholder="Masukkan judul laporan"
                                           required>
                                    @error('judul')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Tanggal -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tanggal" class="form-label required">
                                        <i class="fas fa-calendar mr-1"></i>
                                        Tanggal
                                    </label>
                                    <input type="date" 
                                           class="form-control @error('tanggal') is-invalid @enderror" 
                                           id="tanggal" 
                                           name="tanggal" 
                                           value="{{ old('tanggal', date('Y-m-d')) }}"
                                           required>
                                    @error('tanggal')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Jenis Transaksi -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jenis" class="form-label required">
                                        <i class="fas fa-exchange-alt mr-1"></i>
                                        Jenis Transaksi
                                    </label>
                                    <select class="form-control @error('jenis') is-invalid @enderror" 
                                            id="jenis" 
                                            name="jenis" 
                                            required>
                                        <option value="">Pilih Jenis Transaksi</option>
                                        <option value="pemasukan" {{ old('jenis') == 'pemasukan' ? 'selected' : '' }}>
                                            Pemasukan
                                        </option>
                                        <option value="pengeluaran" {{ old('jenis') == 'pengeluaran' ? 'selected' : '' }}>
                                            Pengeluaran
                                        </option>
                                    </select>
                                    @error('jenis')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Jumlah -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jumlah" class="form-label required">
                                        <i class="fas fa-money-bill mr-1"></i>
                                        Jumlah (Rp)
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Rp</span>
                                        </div>
                                        <input type="text" 
                                               class="form-control @error('jumlah') is-invalid @enderror" 
                                               id="jumlah" 
                                               name="jumlah" 
                                               value="{{ old('jumlah') }}" 
                                               placeholder="0"
                                               required>
                                        @error('jumlah')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <small class="form-text text-muted">
                                        Masukkan angka tanpa titik atau koma
                                    </small>
                                </div>
                            </div>
                        </div>

                        <!-- Keterangan -->
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="keterangan" class="form-label">
                                        <i class="fas fa-sticky-note mr-1"></i>
                                        Keterangan
                                    </label>
                                    <textarea class="form-control @error('keterangan') is-invalid @enderror" 
                                              id="keterangan" 
                                              name="keterangan" 
                                              rows="4" 
                                              placeholder="Masukkan keterangan atau deskripsi transaksi">{{ old('keterangan') }}</textarea>
                                    @error('keterangan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- File Upload -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="file_path" class="form-label">
                                        <i class="fas fa-paperclip mr-1"></i>
                                        Lampiran File
                                    </label>
                                    <div class="custom-file">
                                        <input type="file" 
                                               class="custom-file-input @error('file_path') is-invalid @enderror" 
                                               id="file_path" 
                                               name="file_path"
                                               accept=".pdf,.doc,.docx,.xls,.xlsx,.jpg,.jpeg,.png">
                                        <label class="custom-file-label" for="file_path">Pilih file...</label>
                                        @error('file_path')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <small class="form-text text-muted">
                                        Format yang didukung: PDF, DOC, DOCX, XLS, XLSX, JPG, JPEG, PNG (Max: 5MB)
                                    </small>
                                </div>
                            </div>

                            <!-- Status -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status" class="form-label required">
                                        <i class="fas fa-toggle-on mr-1"></i>
                                        Status
                                    </label>
                                    <select class="form-control @error('status') is-invalid @enderror" 
                                            id="status" 
                                            name="status" 
                                            required>
                                        <option value="aktif" {{ old('status', 'aktif') == 'aktif' ? 'selected' : '' }}>
                                            Aktif
                                        </option>
                                        <option value="non-aktif" {{ old('status') == 'non-aktif' ? 'selected' : '' }}>
                                            Non-Aktif
                                        </option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Preview Section -->
                        <div class="row mt-3" id="previewSection" style="display: none;">
                            <div class="col-12">
                                <div class="card card-outline card-info">
                                    <div class="card-header">
                                        <h5 class="card-title">
                                            <i class="fas fa-eye mr-2"></i>
                                            Preview Laporan
                                        </h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <strong>Judul:</strong> <span id="preview-judul">-</span><br>
                                                <strong>Tanggal:</strong> <span id="preview-tanggal">-</span><br>
                                                <strong>Jenis:</strong> <span id="preview-jenis">-</span>
                                            </div>
                                            <div class="col-md-6">
                                                <strong>Jumlah:</strong> <span id="preview-jumlah">-</span><br>
                                                <strong>Status:</strong> <span id="preview-status">-</span><br>
                                                <strong>File:</strong> <span id="preview-file">-</span>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-12">
                                                <strong>Keterangan:</strong><br>
                                                <span id="preview-keterangan">-</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-6">
                                <button type="button" class="btn btn-info" onclick="showPreview()">
                                    <i class="fas fa-eye mr-1"></i>
                                    Preview
                                </button>
                                <button type="button" class="btn btn-warning" onclick="resetForm()">
                                    <i class="fas fa-undo mr-1"></i>
                                    Reset
                                </button>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="{{ route('keuangan.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-times mr-1"></i>
                                    Batal
                                </a>
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-save mr-1"></i>
                                    Simpan
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
.required::after {
    content: " *";
    color: red;
}

.form-label {
    font-weight: 600;
}

.input-group-text {
    font-weight: 600;
}

.preview-section {
    border: 1px solid #dee2e6;
    border-radius: 0.375rem;
    padding: 1rem;
    background-color: #f8f9fa;
}
</style>
@endpush

@push('scripts')
<script>
$(document).ready(function() {
    // Format number input
    $('#jumlah').on('input', function() {
        let value = $(this).val().replace(/[^\d]/g, '');
        $(this).val(formatNumber(value));
    });

    // Custom file input label
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).siblings('.custom-file-label').addClass('selected').html(fileName);
    });

    // Form validation
    $('#formLaporan').on('submit', function(e) {
        e.preventDefault();
        
        if (validateForm()) {
            // Convert formatted number back to raw number
            let jumlah = $('#jumlah').val().replace(/[^\d]/g, '');
            $('#jumlah').val(jumlah);
            
            this.submit();
        }
    });
});

function formatNumber(num) {
    return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.');
}

function validateForm() {
    let isValid = true;
    
    // Required fields
    const requiredFields = ['judul', 'tanggal', 'jenis', 'jumlah', 'status'];
    
    requiredFields.forEach(function(field) {
        const element = $('#' + field);
        const value = element.val().trim();
        
        if (!value) {
            element.addClass('is-invalid');
            isValid = false;
        } else {
            element.removeClass('is-invalid');
        }
    });
    
    // Validate jumlah is numeric
    const jumlah = $('#jumlah').val().replace(/[^\d]/g, '');
    if (!jumlah || jumlah <= 0) {
        $('#jumlah').addClass('is-invalid');
        Swal.fire('Error!', 'Jumlah harus lebih dari 0', 'error');
        isValid = false;
    }
    
    // Validate file size if file is selected
    const fileInput = document.getElementById('file_path');
    if (fileInput.files.length > 0) {
        const fileSize = fileInput.files[0].size / 1024 / 1024; // Convert to MB
        if (fileSize > 5) {
            $('#file_path').addClass('is-invalid');
            Swal.fire('Error!', 'Ukuran file maksimal 5MB', 'error');
            isValid = false;
        }
    }
    
    return isValid;
}

function showPreview() {
    const judul = $('#judul').val();
    const tanggal = $('#tanggal').val();
    const jenis = $('#jenis').val();
    const jumlah = $('#jumlah').val();
    const keterangan = $('#keterangan').val();
    const status = $('#status').val();
    const fileName = $('#file_path').val().split('\\').pop();
    
    if (!judul || !tanggal || !jenis || !jumlah) {
        Swal.fire('Error!', 'Mohon lengkapi data yang diperlukan untuk preview', 'error');
        return;
    }
    
    // Update preview
    $('#preview-judul').text(judul);
    $('#preview-tanggal').text(formatDate(tanggal));
    $('#preview-jenis').html(getJenisBadge(jenis));
    $('#preview-jumlah').html(getJumlahFormatted(jenis, jumlah));
    $('#preview-keterangan').text(keterangan || '-');
    $('#preview-status').html(getStatusBadge(status));
    $('#preview-file').text(fileName || 'Tidak ada file');
    
    // Show preview section
    $('#previewSection').fadeIn();
}

function formatDate(dateString) {
    const date = new Date(dateString);
    return date.toLocaleDateString('id-ID', {
        weekday: 'long',
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    });
}

function getJenisBadge(jenis) {
    if (jenis === 'pemasukan') {
        return '<span class="badge badge-success"><i class="fas fa-arrow-up mr-1"></i>Pemasukan</span>';
    } else {
        return '<span class="badge badge-danger"><i class="fas fa-arrow-down mr-1"></i>Pengeluaran</span>';
    }
}

function getJumlahFormatted(jenis, jumlah) {
    const formatted = 'Rp ' + formatNumber(jumlah.replace(/[^\d]/g, ''));
    const prefix = jenis === 'pemasukan' ? '+' : '-';
    const colorClass = jenis === 'pemasukan' ? 'text-success' : 'text-danger';
    
    return `<strong class="${colorClass}">${prefix} ${formatted}</strong>`;
}

function getStatusBadge(status) {
    if (status === 'aktif') {
        return '<span class="badge badge-success">Aktif</span>';
    } else {
        return '<span class="badge badge-secondary">Non-Aktif</span>';
    }
}

function resetForm() {
    Swal.fire({
        title: 'Reset Form?',
        text: "Semua data yang telah diisi akan dihapus!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, Reset!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('formLaporan').reset();
            $('.custom-file-label').removeClass('selected').html('Pilih file...');
            $('#previewSection').fadeOut();
            $('.is-invalid').removeClass('is-invalid');
            
            Swal.fire('Berhasil!', 'Form telah direset.', 'success');
        }
    });
}

// Auto-save to localStorage (optional feature)
function autoSave() {
    const formData = {
        judul: $('#judul').val(),
        tanggal: $('#tanggal').val(),
        jenis: $('#jenis').val(),
        jumlah: $('#jumlah').val(),
        keterangan: $('#keterangan').val(),
        status: $('#status').val()
    };
    
    localStorage.setItem('laporan_keuangan_draft', JSON.stringify(formData));
}

// Load auto-saved data
function loadAutoSave() {
    const savedData = localStorage.getItem('laporan_keuangan_draft');
    if (savedData) {
        const data = JSON.parse(savedData);
        
        Swal.fire({
            title: 'Data Tersimpan Ditemukan',
            text: "Apakah Anda ingin memuat data yang tersimpan sebelumnya?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Ya, Muat Data',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.isConfirmed) {
                $('#judul').val(data.judul);
                $('#tanggal').val(data.tanggal);
                $('#jenis').val(data.jenis);
                $('#jumlah').val(data.jumlah);
                $('#keterangan').val(data.keterangan);
                $('#status').val(data.status);
            }
            localStorage.removeItem('laporan_keuangan_draft');
        });
    }
}

// Auto-save every 30 seconds
setInterval(autoSave, 30000);

// Load auto-saved data on page load
$(document).ready(function() {
    setTimeout(loadAutoSave, 1000);
});
</script>
@endpush