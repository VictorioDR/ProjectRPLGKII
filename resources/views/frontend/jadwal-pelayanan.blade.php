<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Pelayanan Gereja</title>

    {{-- Styling Sederhana Langsung di dalam Blade --}}
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f2f5; /* Latar belakang abu-abu muda */
            color: #333;
        }

        .container {
            max-width: 1200px; /* Lebar maksimum konten */
            margin: 30px auto; /* Margin atas/bawah 30px, auto untuk horizontal (pusat) */
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08); /* Sedikit bayangan */
        }

        h1, h2 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 25px;
        }

        .header-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 1px solid #e0e6ea;
        }

        .header-section .title {
            margin: 0;
            font-size: 1.8em;
            color: #34495e;
        }

        /* Styling untuk bagian filter */
        .filter-section {
            display: flex;
            flex-wrap: wrap; /* Agar responsif */
            gap: 15px;
            margin-bottom: 25px;
            align-items: flex-end; /* Sejajarkan item filter di bagian bawah */
            padding: 20px;
            background-color: #eef2f5;
            border-radius: 8px;
            border: 1px solid #e0e6ea;
        }

        .filter-group {
            display: flex;
            flex-direction: column;
            flex: 1; /* Fleksibel untuk mengambil ruang */
            min-width: 150px; /* Lebar minimum untuk setiap filter group */
        }

        .filter-group label {
            font-weight: bold;
            color: #555;
            margin-bottom: 5px;
        }

        .filter-section input[type="date"],
        .filter-section select,
        .filter-section input[type="text"] {
            padding: 10px 12px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            font-size: 0.95em;
            width: 100%; /* Lebar penuh di dalam filter-group */
            box-sizing: border-box; /* Include padding and border in the element's total width */
        }

        /* Styling untuk tombol */
        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
            font-weight: bold;
            transition: background-color 0.3s ease, transform 0.1s ease;
            text-decoration: none; /* Hapus underline untuk link sebagai tombol */
            display: inline-block; /* Agar padding dan margin berfungsi dengan baik */
            text-align: center;
            line-height: 1.2; /* Menjaga teks di tengah secara vertikal */
        }

        .btn-primary {
            background-color: #007bff; /* Biru */
            color: white;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            transform: translateY(-1px);
        }

        .btn-secondary {
            background-color: #6c757d; /* Abu-abu gelap */
            color: white;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
            transform: translateY(-1px);
        }

        /* Styling untuk tabel */
        .table-responsive {
            overflow-x: auto; /* Agar tabel bisa discroll secara horizontal jika terlalu lebar */
            margin-top: 25px;
            border: 1px solid #e9ecef;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
        }

        .table th, .table td {
            border: 1px solid #e9ecef; /* Border tipis */
            padding: 12px 15px;
            text-align: left;
            vertical-align: middle;
        }

        .table thead th {
            background-color: #eef2f5;
            font-weight: bold;
            color: #495057;
            text-transform: uppercase;
            font-size: 0.9em;
        }

        .table tbody tr:nth-child(even) { /* Warna baris genap */
            background-color: #f9f9f9;
        }

        .table tbody tr:hover {
            background-color: #e0e7ed; /* Hover baris */
        }

        /* Pesan jika tidak ada data */
        .no-data-message {
            text-align: center;
            color: #888;
            margin-top: 30px;
            padding: 25px;
            border: 1px dashed #ced4da;
            background-color: #fefefe;
            border-radius: 8px;
            font-size: 1.1em;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .container {
                margin: 15px;
                padding: 20px;
            }
            .filter-section {
                flex-direction: column;
                align-items: stretch;
            }
            .filter-group {
                width: 100%;
            }
            .filter-section button {
                width: 100%;
            }
            .header-section {
                flex-direction: column;
                align-items: flex-start;
            }
            .header-section .title {
                margin-bottom: 15px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header-section">
            <h1 class="title">Jadwal Pelayanan Umum Gereja</h1>
            {{-- Tombol atau navigasi tambahan jika diperlukan --}}
            {{-- <a href="#" class="btn btn-primary">Kembali ke Beranda</a> --}}
        </div>

        {{-- Bagian Filter (Opsional, Anda bisa implementasi di sini) --}}
        <div class="filter-section">
            <div class="filter-group">
                <label for="filterJenis">Jenis Pelayanan:</label>
                <input type="text" id="filterJenis" placeholder="Cari Jenis...">
            </div>
            <div class="filter-group">
                <label for="filterTanggalMulai">Dari Tanggal:</label>
                <input type="date" id="filterTanggalMulai">
            </div>
            <div class="filter-group">
                <label for="filterTanggalSelesai">Sampai Tanggal:</label>
                <input type="date" id="filterTanggalSelesai">
            </div>
            <div style="flex-grow: 1;"></div> {{-- Spacer --}}
            <div>
                <button class="btn btn-primary" id="applyFilter">Filter</button>
                <button class="btn btn-secondary" id="resetFilter">Reset</button>
            </div>
        </div>

        {{-- Tabel Daftar Jadwal --}}
        {{-- Asumsi bahwa variabel $jadwalMendatang datang dari controller (misal: PelayananController@jadwalPublic) --}}
        @if ($jadwalMendatang->isEmpty())
            <p class="no-data-message">Tidak ada jadwal pelayanan umum yang akan datang.</p>
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
                            <th>WL</th>
                            <th>Pengkhotbah</th>
                            <th>Sifat</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jadwalMendatang as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->jenis }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->waktu_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($item->waktu_selesai)->format('H:i') }}</td>
                                <td>{{ $item->tempat }}</td>
                                <td>{{ $item->wl ?? '-' }}</td>
                                <td>{{ $item->firman_tuhan ?? '-' }}</td>
                                <td>
                                    <span style="text-transform: capitalize;">{{ $item->sifat }}</span>
                                </td>
                                <td>
                                    @if($item->status == 'active')
                                        <span style="color: green; font-weight: bold;">Aktif</span>
                                    @elseif($item->status == 'cancelled')
                                        <span style="color: red; font-weight: bold;">Dibatalkan</span>
                                    @else
                                        <span style="color: gray; font-weight: bold;">Selesai</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

    {{-- Script JavaScript untuk Filter Klien-Side --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const jadwalTable = document.getElementById('jadwalTable');
            if (!jadwalTable) return;

            const rows = jadwalTable.querySelectorAll('tbody tr');
            const applyFilterBtn = document.getElementById('applyFilter');
            const resetFilterBtn = document.getElementById('resetFilter');
            const filterJenis = document.getElementById('filterJenis');
            const filterTanggalMulai = document.getElementById('filterTanggalMulai');
            const filterTanggalSelesai = document.getElementById('filterTanggalSelesai');

            function applyFilters() {
                const selectedJenis = filterJenis.value.toLowerCase();
                const selectedTanggalMulai = filterTanggalMulai.value ? new Date(filterTanggalMulai.value) : null;
                const selectedTanggalSelesai = filterTanggalSelesai.value ? new Date(filterTanggalSelesai.value) : null;

                rows.forEach(row => {
                    const jenis = row.children[1].textContent.toLowerCase();
                    const tanggalText = row.children[2].textContent; // Format: dd-mm-yyyy
                    const [day, month, year] = tanggalText.split('-');
                    const rowDate = new Date(`${year}-${month}-${day}`); // Konversi ke format YYYY-MM-DD

                    const matchesJenis = jenis.includes(selectedJenis);

                    let matchesTanggal = true;
                    if (selectedTanggalMulai && rowDate < selectedTanggalMulai) {
                        matchesTanggal = false;
                    }
                    if (selectedTanggalSelesai && rowDate > selectedTanggalSelesai) {
                        matchesTanggal = false;
                    }

                    if (matchesJenis && matchesTanggal) {
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
                applyFilters(); // Terapkan filter kosong untuk menampilkan semua
            });

            // Jalankan filter saat halaman dimuat pertama kali
            applyFilters();
        });
    </script>
</body>
</html>