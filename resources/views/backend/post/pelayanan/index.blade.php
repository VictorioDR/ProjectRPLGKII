@extends('layouts.app') {{-- Menggunakan layout utama --}}

@section('content')
<div class="container">
    <h2>Manajemen Jadwal Pelayanan Mingguan</h2>

    {{-- Pesan Sukses/Gagal --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    {{-- Bagian Filter --}}
    <div class="filter-section">
        <div class="filter-group">
            <label for="filterJenis">Jenis Pelayanan:</label>
            <select id="filterJenis">
                <option value="">Semua Jenis</option>
                <option value="Kebaktian Umum">Kebaktian Umum</option>
                <option value="Persekutuan Doa">Persekutuan Doa</option>
                <option value="Sekolah Minggu">Sekolah Minggu</option>
                {{-- Tambahkan opsi jenis lainnya sesuai data Anda --}}
            </select>
        </div>
        <div class="filter-group">
            <label for="filterTanggalMulai">Tanggal Mulai:</label>
            <input type="date" id="filterTanggalMulai">
        </div>
        <div class="filter-group">
            <label for="filterTanggalSelesai">Tanggal Selesai:</label>
            <input type="date" id="filterTanggalSelesai">
        </div>
        <div class="filter-group">
            <label for="filterTempat">Tempat:</label>
            <input type="text" id="filterTempat" placeholder="Cari tempat...">
        </div>
        <div>
            <button class="btn btn-primary" id="applyFilter">Filter</button>
            <button class="btn btn-secondary" id="resetFilter">Reset</button>
        </div>
    </div>

    {{-- Tombol Tambah --}}
    <div style="margin-bottom: 20px; text-align: right;">
        <a href="{{ route('jadwal-pelayanan-mingguan.create') }}" class="btn btn-success">Tambah Jadwal Baru</a>
    </div>

    {{-- Tabel Daftar Jadwal --}}
    @if ($jadwal->isEmpty())
        <p class="no-data-message">Belum ada data jadwal pelayanan mingguan.</p>
    @else
        <div class="table-responsive">
            <table class="table" id="jadwalTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jenis</th>
                        <th>Tanggal</th>
                        <th>Waktu</th>
                        <th>Tempat</th>
                        <th>Petugas</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jadwal as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->jenis }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                            <td>{{ $item->waktu_mulai }} - {{ $item->waktu_selesai }}</td>
                            <td>{{ $item->tempat }}</td>
                            <td>{{ $item->petugas ?? '-' }}</td>
                            <td>
                                @if($item->status == 'active')
                                    <span style="color: green; font-weight: bold;">Aktif</span>
                                @elseif($item->status == 'cancelled')
                                    <span style="color: red; font-weight: bold;">Dibatalkan</span>
                                @else
                                    <span style="color: gray; font-weight: bold;">Selesai</span>
                                @endif
                            </td>
                            <td class="action-buttons">
                                <a href="{{ route('jadwal-pelayanan-mingguan.show', $item->id) }}" class="btn btn-info">Detail</a>
                                <a href="{{ route('jadwal-pelayanan-mingguan.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('jadwal-pelayanan-mingguan.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus jadwal ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>

{{-- Script untuk filter (opsional, jika Anda ingin filter sisi klien) --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const jadwalTable = document.getElementById('jadwalTable');
        if (!jadwalTable) return; // Keluar jika tabel tidak ditemukan

        const rows = jadwalTable.querySelectorAll('tbody tr');
        const applyFilterBtn = document.getElementById('applyFilter');
        const resetFilterBtn = document.getElementById('resetFilter');
        const filterJenis = document.getElementById('filterJenis');
        const filterTanggalMulai = document.getElementById('filterTanggalMulai');
        const filterTanggalSelesai = document.getElementById('filterTanggalSelesai');
        const filterTempat = document.getElementById('filterTempat');

        function applyFilters() {
            const selectedJenis = filterJenis.value.toLowerCase();
            const selectedTanggalMulai = filterTanggalMulai.value ? new Date(filterTanggalMulai.value) : null;
            const selectedTanggalSelesai = filterTanggalSelesai.value ? new Date(filterTanggalSelesai.value) : null;
            const searchTermTempat = filterTempat.value.toLowerCase();

            rows.forEach(row => {
                const jenis = row.children[1].textContent.toLowerCase();
                const tanggalText = row.children[2].textContent; // Format: dd-mm-yyyy
                const tempat = row.children[4].textContent.toLowerCase();

                const [day, month, year] = tanggalText.split('-');
                const rowDate = new Date(`${year}-${month}-${day}`); // Konversi ke format YYYY-MM-DD untuk perbandingan

                const matchesJenis = selectedJenis === '' || jenis.includes(selectedJenis);
                const matchesTempat = tempat.includes(searchTermTempat);

                let matchesTanggal = true;
                if (selectedTanggalMulai && rowDate < selectedTanggalMulai) {
                    matchesTanggal = false;
                }
                if (selectedTanggalSelesai && rowDate > selectedTanggalSelesai) {
                    matchesTanggal = false;
                }

                if (matchesJenis && matchesTanggal && matchesTempat) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }

        applyFilterBtn.addEventListener('click', applyFilters);
        resetFilterBtn.addEventListener('click', function() {
            filterJenis.value = '';
            filterTanggalMulai.value = '';
            filterTanggalSelesai.value = '';
            filterTempat.value = '';
            applyFilters(); // Terapkan filter kosong untuk menampilkan semua
        });

        // Initial filter application on page load
        applyFilters();
    });
</script>
@endsection