@extends('layouts.app')

@section('title', 'Laporan Keuangan')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">
                        <i class="fas fa-chart-line mr-2"></i>
                        Laporan Keuangan
                    </h3>
                    <div class="card-tools">
                        <a href="{{ route('keuangan.create') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus mr-1"></i>
                            Tambah Laporan
                        </a>
                    </div>
                </div>
                
                <div class="card-body">
                    <!-- Filter Section -->
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="filter-tanggal">Filter Tanggal:</label>
                                <input type="date" id="filter-tanggal" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="filter-jenis">Filter Jenis:</label>
                                <select id="filter-jenis" class="form-control form-control-sm">
                                    <option value="">Semua Jenis</option>
                                    <option value="pemasukan">Pemasukan</option>
                                    <option value="pengeluaran">Pengeluaran</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>&nbsp;</label>
                                <div>
                                    <button type="button" class="btn btn-info btn-sm" onclick="filterData()">
                                        <i class="fas fa-search mr-1"></i>
                                        Filter
                                    </button>
                                    <button type="button" class="btn btn-secondary btn-sm ml-1" onclick="resetFilter()">
                                        <i class="fas fa-undo mr-1"></i>
                                        Reset
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>&nbsp;</label>
                                <div>
                                    <button type="button" class="btn btn-success btn-sm" onclick="exportData()">
                                        <i class="fas fa-download mr-1"></i>
                                        Export
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Summary Cards -->
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3 id="total-pemasukan">Rp 0</h3>
                                    <p>Total Pemasukan</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-arrow-up"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3 id="total-pengeluaran">Rp 0</h3>
                                    <p>Total Pengeluaran</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-arrow-down"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3 id="saldo-bersih">Rp 0</h3>
                                    <p>Saldo Bersih</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-balance-scale"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Data Table -->
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="laporanTable">
                            <thead class="thead-dark">
                                <tr>
                                    <th width="5%">No</th>
                                    <th width="12%">Tanggal</th>
                                    <th width="20%">Judul</th>
                                    <th width="12%">Jenis</th>
                                    <th width="15%">Jumlah</th>
                                    <th width="20%">Keterangan</th>
                                    <th width="8%">Status</th>
                                    <th width="8%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($laporan as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d/m/Y') }}</td>
                                    <td>
                                        <strong>{{ $item->judul }}</strong>
                                        @if($item->file_path)
                                            <br><small class="text-muted">
                                                <i class="fas fa-paperclip"></i> File terlampir
                                            </small>
                                        @endif
                                    </td>
                                    <td>
                                        @if($item->jenis == 'pemasukan')
                                            <span class="badge badge-success">
                                                <i class="fas fa-arrow-up mr-1"></i>
                                                Pemasukan
                                            </span>
                                        @else
                                            <span class="badge badge-danger">
                                                <i class="fas fa-arrow-down mr-1"></i>
                                                Pengeluaran
                                            </span>
                                        @endif
                                    </td>
                                    <td class="text-right">
                                        <strong class="{{ $item->jenis == 'pemasukan' ? 'text-success' : 'text-danger' }}">
                                            {{ $item->jenis == 'pemasukan' ? '+' : '-' }}
                                            Rp {{ number_format($item->jumlah, 0, ',', '.') }}
                                        </strong>
                                    </td>
                                    <td>
                                        <small>{{ Str::limit($item->keterangan, 50) }}</small>
                                    </td>
                                    <td>
                                        @if($item->status == 'aktif')
                                            <span class="badge badge-success">Aktif</span>
                                        @else
                                            <span class="badge badge-secondary">Non-Aktif</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn btn-info btn-xs" 
                                                    onclick="viewDetail({{ $item->id }})" 
                                                    title="Lihat Detail">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <a href="{{ route('keuangan.edit', $item->id) }}" 
                                               class="btn btn-warning btn-xs" 
                                               title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button type="button" 
                                                    class="btn btn-danger btn-xs" 
                                                    onclick="deleteItem({{ $item->id }})" 
                                                    title="Hapus">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center py-4">
                                        <div class="empty-state">
                                            <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                                            <h5 class="text-muted">Belum ada data laporan keuangan</h5>
                                            <p class="text-muted">Silakan tambahkan laporan keuangan pertama Anda</p>
                                            <a href="{{ route('keuangan.create') }}" class="btn btn-primary">
                                                <i class="fas fa-plus mr-1"></i>
                                                Tambah Laporan
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Detail -->
<div class="modal fade" id="detailModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Laporan Keuangan</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modalDetailContent">
                <!-- Content will be loaded here -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
.small-box {
    border-radius: 0.25rem;
    box-shadow: 0 0 1px rgba(0,0,0,.125), 0 1px 3px rgba(0,0,0,.2);
    display: block;
    margin-bottom: 20px;
    position: relative;
}

.small-box > .inner {
    padding: 10px;
}

.small-box > .small-box-footer {
    background-color: rgba(0,0,0,.1);
    color: rgba(255,255,255,.8);
    display: block;
    padding: 3px 0;
    position: relative;
    text-align: center;
    text-decoration: none;
    z-index: 10;
}

.small-box > .icon {
    color: rgba(0,0,0,.15);
    z-index: 0;
}

.small-box > .icon > i {
    font-size: 70px;
    position: absolute;
    right: 15px;
    top: 15px;
    transition: transform .3s linear;
}

.small-box:hover > .icon > i {
    transform: scale(1.1);
}

.empty-state {
    padding: 40px 20px;
}

.btn-xs {
    padding: 2px 5px;
    font-size: 11px;
    line-height: 1.5;
    border-radius: 3px;
}
</style>
@endpush

@push('scripts')
<script>
$(document).ready(function() {
    // Initialize DataTable
    $('#laporanTable').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Indonesian.json"
        },
        "pageLength": 25,
        "ordering": true,
        "searching": true,
        "info": true,
        "responsive": true
    });

    // Calculate and display totals
    calculateTotals();
});

function calculateTotals() {
    let totalPemasukan = 0;
    let totalPengeluaran = 0;

    @foreach($laporan as $item)
        @if($item->jenis == 'pemasukan')
            totalPemasukan += {{ $item->jumlah }};
        @else
            totalPengeluaran += {{ $item->jumlah }};
        @endif
    @endforeach

    let saldoBersih = totalPemasukan - totalPengeluaran;

    $('#total-pemasukan').text('Rp ' + numberFormat(totalPemasukan));
    $('#total-pengeluaran').text('Rp ' + numberFormat(totalPengeluaran));
    $('#saldo-bersih').text('Rp ' + numberFormat(saldoBersih));
    
    // Change color based on positive/negative
    if (saldoBersih >= 0) {
        $('#saldo-bersih').removeClass('text-danger').addClass('text-success');
    } else {
        $('#saldo-bersih').removeClass('text-success').addClass('text-danger');
    }
}

function numberFormat(num) {
    return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.');
}

function viewDetail(id) {
    $.ajax({
        url: `/keuangan/${id}`,
        type: 'GET',
        success: function(response) {
            $('#modalDetailContent').html(response);
            $('#detailModal').modal('show');
        },
        error: function(xhr) {
            Swal.fire('Error!', 'Terjadi kesalahan saat memuat detail.', 'error');
        }
    });
}

function deleteItem(id) {
    Swal.fire({
        title: 'Apakah Anda yakin?',
        text: "Data yang dihapus tidak dapat dikembalikan!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: `/keuangan/${id}`,
                type: 'DELETE',
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                success: function(response) {
                    Swal.fire('Berhasil!', 'Data berhasil dihapus.', 'success')
                        .then(() => {
                            location.reload();
                        });
                },
                error: function(xhr) {
                    Swal.fire('Error!', 'Terjadi kesalahan saat menghapus data.', 'error');
                }
            });
        }
    });
}

function filterData() {
    let tanggal = $('#filter-tanggal').val();
    let jenis = $('#filter-jenis').val();
    
    let url = new URL(window.location.href);
    if (tanggal) url.searchParams.set('tanggal', tanggal);
    if (jenis) url.searchParams.set('jenis', jenis);
    
    window.location.href = url.toString();
}

function resetFilter() {
    window.location.href = '{{ route("keuangan.index") }}';
}

function exportData() {
    let url = '{{ route("keuangan.index") }}';
    let params = new URLSearchParams(window.location.search);
    params.set('export', 'excel');
    
    window.open(url + '?' + params.toString());
}

// Success/Error messages
@if(session('success'))
    Swal.fire('Berhasil!', '{{ session("success") }}', 'success');
@endif

@if(session('error'))
    Swal.fire('Error!', '{{ session("error") }}', 'error');
@endif
</script>
@endpush