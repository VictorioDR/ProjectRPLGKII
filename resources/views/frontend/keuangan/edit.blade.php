@extends('layouts.app')

@section('title', 'Edit Laporan Keuangan')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-edit mr-2"></i>
                        Edit Laporan Keuangan
                    </h3>
                    <div class="card-tools">
                        <a href="{{ route('keuangan.index') }}" class="btn btn-secondary btn-sm">
                            <i class="fas fa-arrow-left mr-1"></i>
                            Kembali
                        </a>
                    </div>
                </div>
                
                <form action="{{ route('keuangan.update', $laporan->id) }}" method="POST" enctype="multipart/form-data" id="formLaporan">
                    @csrf
                    @method('PUT')
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
                                           value="{{ old('judul', $laporan->judul) }}" 
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
                                           value="{{ old('tanggal', $laporan->tanggal) }}"
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
                                        <option value="pemasukan" {{ old('jenis', $laporan->jenis) == 'pemasukan' ? 'selected' : '' }}>
                                            Pemasukan
                                        </option>
                                        <option value="pengeluaran" {{ old('jenis', $laporan->jenis) == 'pengeluaran' ? 'selected' : '' }}>
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
                                               value="{{ old('jumlah', number_format($laporan->jumlah, 0, ',', '.')) }}" 
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
                                              placeholder="Masukkan keterangan atau deskripsi transaksi">{{ old('keterangan', $laporan->keterangan) }}</textarea>
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
                                    
                                    @if($laporan->file_path)
                                    <div class="mb-2">
                                        <div class="alert alert-info">
                                            <i class="fas fa-file mr-1"></i>
                                            File saat ini: 
                                            <a href="{{ Storage::url($laporan->file_path) }}" target="_blank" class="alert-link">
                                                {{ basename($laporan->file_path) }}
                                            </a>
                                            <button type="button" class="btn btn-sm btn-outline-danger ml-2" onclick="removeCurrentFile()">
                                                <i class="fas fa-trash"></i> Hapus
                                            </button>
                                        </div>
                                    </div>
                                    @endif
                                    
                                    <div class="custom-file">
                                        <input type="file" 
                                               class="custom-file-input @error('file_path') is-invalid @enderror" 
                                               id="file_path" 
                                               name="file_path"
                                               accept=".pdf,.doc,.docx,.xls,.xlsx,.jpg,.jpeg,.png">
                                        <label class="custom-file-label" for="file_path">
                                            {{ $laporan->file_path ? 'Ganti file...' : 'Pilih file...' }}
                                        </label>
                                        @error('file_path')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <small class="form-text text-muted">
                                        Format yang didukung: PDF, DOC, DOCX, XLS, XLSX, JPG, JPEG, PNG (Max: 5MB)
                                        <br>Kosongkan jika tidak ingin mengubah file
                                    </small>
                                    
                                    <!-- Hidden input for file removal -->
                                    <input type="hidden" name="remove_file" id="remove_file" value="0">
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
                                        <option value="aktif" {{ old('status', $laporan->status) == 'aktif' ? 'selected' : '' }}>
                                            Aktif
                                        </option>
                                        <option value="non-aktif" {{ old('status', $laporan->status) == 'non-aktif' ? 'selected' : '' }}>
                                            Non-Aktif
                                        </option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Informasi Tambahan -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card card-outline card-secondary">
                                    <div class="card-header">
                                        <h5 class="card-title">
                                            <i class="fas fa-info-circle mr-2"></i>
                                            Informasi Laporan
                                        </h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <small class="text-muted">
                                                    <strong>Dibuat:</strong> 
                                                    {{ $laporan->created_at->format('d/m/Y H:i') }}
                                                </small>
                                            </div>
                                            <div class="col-md-6">
                                                <small class="text-muted">
                                                    <strong>Terakhir Diubah:</strong> 
                                                    {{ $laporan->updated_at->format('d/m/Y H:i') }}
                                                </small>
                                            </div>
                                        </div>
                                    </div>
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
                                <button type="button" class="btn btn-warning" onclick="resetChanges()">
                                    <i class="fas fa-undo mr-1"></i>
                                    Reset Perubahan
                                </button>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="{{ route('keuangan.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-times mr-1"></i>
                                    Batal
                                </a>
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-save mr-1"></i>
                                    Update
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

.alert-info {
    border: 1px solid #bee5eb;
    background-color: #d1ecf1;
}

.alert-link {
    font-weight: 600;
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
    const currentFile = '{{ $laporan->file_path ? basename($laporan->file_path) : "" }}';
    
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
    
    // Handle file preview
    let fileDisplay = '';
    if (fileName) {
        fileDisplay = 'File baru: ' + fileName;
    } else if (currentFile && $('#remove_file').val() == '0') {
        fileDisplay = 'File saat ini: ' + currentFile;
    } else {
        fileDisplay = 'Tidak ada file';
    }
    $('#preview-file').text(fileDisplay);
    
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

function resetChanges() {
    Swal.fire({
        title: 'Reset Perubahan?',
        text: "Semua perubahan akan dikembalikan ke data asli!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, Reset!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            // Reset form to original values
            $('#judul').val('{{ $laporan->judul }}');
            $('#tanggal').val('{{ $laporan->tanggal }}');
            $('#jenis').val('{{ $laporan->jenis }}');
            $('#jumlah').val('{{ number_format($laporan->jumlah, 0, ",", ".") }}');
            $('#keterangan').val('{{ $laporan->keterangan }}');
            $('#status').val('{{ $laporan->status }}');
            $('#remove_file').val('0');
            
            // Reset file input
            $('#file_path').val('');
            $('.custom-file-label').removeClass('selected').html('{{ $laporan->file_path ? "Ganti file..." : "Pilih file..." }}');
            
            $('#previewSection').fadeOut();
            $('.is-invalid').removeClass('is-invalid');
            
            Swal.fire('Berhasil!', 'Perubahan telah direset.', 'success');
        }
    });
}

function removeCurrentFile() {
    Swal.fire({
        title: 'Hapus File?',
        text: "File saat ini akan dihapus dari laporan!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            $('#remove_file').val('1');
            $('.alert-info').fadeOut();
            $('.custom-file-label').html('Pilih file...');
            
            Swal.fire('Berhasil!', 'File akan dihapus saat form disimpan.', 'success');
        }
    });
}
</script>
@endpush