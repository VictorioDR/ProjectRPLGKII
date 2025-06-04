<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Keuangan - GKI Tanjung Selor</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            color: #333;
        }

        .back-button-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem 2rem 0 2rem;
        }

        .back-button {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 50px;
            text-decoration: none;
            color: #4a5568;
            font-weight: 500;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            border: 2px solid rgba(66, 153, 225, 0.2);
        }

        .back-button:hover {
            background: #4299e1;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 8px 32px rgba(66, 153, 225, 0.3);
        }

        .btn {
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-primary {
            background: #4299e1;
            color: white;
        }

        .btn-primary:hover {
            background: #3182ce;
            transform: translateY(-2px);
        }

        .btn-secondary {
            background: transparent;
            color: #4a5568;
            border: 2px solid #e2e8f0;
        }

        .btn-secondary:hover {
            background: #f7fafc;
        }

        .btn-success {
            background: #48bb78;
            color: white;
        }

        .btn-success:hover {
            background: #38a169;
        }

        .btn-warning {
            background: #ed8936;
            color: white;
        }

        .btn-warning:hover {
            background: #dd6b20;
        }

        .btn-danger {
            background: #f56565;
            color: white;
        }

        .btn-danger:hover {
            background: #e53e3e;
        }

        .container {
            max-width: 1200px;
            margin: 1rem auto 2rem auto;
            padding: 0 2rem;
        }

        .card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .card-header {
            background: linear-gradient(135deg, #4299e1, #667eea);
            color: white;
            padding: 2rem;
            text-align: center;
        }

        .card-header h2 {
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }

        .card-header .btn {
            margin-top: 1rem;
        }

        .card-body {
            padding: 2rem;
        }

        .filters {
            display: flex;
            gap: 1rem;
            margin-bottom: 2rem;
            flex-wrap: wrap;
            align-items: end;
        }

        .filter-group {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .filter-group label {
            font-weight: 500;
            color: #4a5568;
        }

        .form-control {
            padding: 0.75rem;
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: #4299e1;
        }

        .summary-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .summary-card {
            background: linear-gradient(135deg, rgba(66, 153, 225, 0.1), rgba(102, 126, 234, 0.1));
            border: 1px solid rgba(66, 153, 225, 0.2);
            border-radius: 12px;
            padding: 1.5rem;
            text-align: center;
        }

        .summary-card h3 {
            color: #4a5568;
            font-size: 1rem;
            margin-bottom: 0.5rem;
        }

        .summary-card .amount {
            font-size: 1.5rem;
            font-weight: bold;
            color: #2d3748;
        }

        .table-container {
            overflow-x: auto;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }

        th {
            background: linear-gradient(135deg, #4299e1, #667eea);
            color: white;
            padding: 1rem;
            text-align: left;
            font-weight: 600;
        }

        td {
            padding: 1rem;
            border-bottom: 1px solid #e2e8f0;
        }

        tr:hover {
            background: rgba(66, 153, 225, 0.05);
        }

        .status-active {
            background: #c6f6d5;
            color: #22543d;
            padding: 0.25rem 0.5rem;
            border-radius: 4px;
            font-size: 0.875rem;
            font-weight: 500;
        }

        .status-inactive {
            background: #fed7d7;
            color: #742a2a;
            padding: 0.25rem 0.5rem;
            border-radius: 4px;
            font-size: 0.875rem;
            font-weight: 500;
        }

        .action-buttons {
            display: flex;
            gap: 0.5rem;
        }

        .btn-sm {
            padding: 0.25rem 0.5rem;
            font-size: 0.875rem;
        }

        .empty-state {
            text-align: center;
            padding: 3rem;
            color: #718096;
        }

        .empty-state img {
            width: 120px;
            opacity: 0.5;
            margin-bottom: 1rem;
        }

        @media (max-width: 768px) {
            .container {
                padding: 0 1rem;
            }
            
            .back-button-container {
                padding: 1rem 1rem 0 1rem;
            }
            
            .filters {
                flex-direction: column;
                align-items: stretch;
            }
            
            .card-header {
                padding: 1rem;
            }
            
            .card-body {
                padding: 1rem;
            }
        }
    </style>
</head>
<body>
    <!-- Back Button -->
    <div class="back-button-container">
        <a href="/" class="back-button">
            ← Kembali ke Beranda
        </a>
    </div>

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>Laporan Keuangan</h2>
                <a href="{{ route('keuangan.create') }}" class="btn btn-success">
                    ➕ Tambah Laporan
                </a>
            </div>

            <div class="card-body">
                <!-- Filter Section -->
                <form method="GET" action="{{ route('keuangan.index') }}" id="filterForm">
                    <div class="filters">
                        <div class="filter-group">
                            <label for="tanggal">Filter Tanggal:</label>
                            <input type="date" id="tanggal" name="tanggal" class="form-control" 
                                   value="{{ request('tanggal') }}">
                        </div>
                        <div class="filter-group">
                            <label for="jenis">Filter Jenis:</label>
                            <select id="jenis" name="jenis" class="form-control">
                                <option value="">Semua Jenis</option>
                                <option value="pemasukan" {{ request('jenis') == 'pemasukan' ? 'selected' : '' }}>Pemasukan</option>
                                <option value="pengeluaran" {{ request('jenis') == 'pengeluaran' ? 'selected' : '' }}>Pengeluaran</option>
                            </select>
                        </div>
                        <div class="filter-group">
                            <a href="{{ route('keuangan.index') }}" class="btn btn-secondary">🔄 Reset</a>
                        </div>
                        <div class="filter-group">
                            <a href="{{ route('keuangan.export') }}" class="btn btn-success">
                                📄 Export Excel
                            </a>
                        </div>
                    </div>
                </form>

                <!-- Summary Cards -->
                <div class="summary-cards">
                    <div class="summary-card">
                        <h3>Total Pemasukan</h3>
                        <div class="amount">Rp {{ number_format($totalPemasukan ?? 0, 0, ',', '.') }}</div>
                    </div>
                    <div class="summary-card">
                        <h3>Total Pengeluaran</h3>
                        <div class="amount">Rp {{ number_format($totalPengeluaran ?? 0, 0, ',', '.') }}</div>
                    </div>
                    <div class="summary-card">
                        <h3>Saldo Bersih</h3>
                        <div class="amount">Rp {{ number_format(($totalPemasukan ?? 0) - ($totalPengeluaran ?? 0), 0, ',', '.') }}</div>
                    </div>
                </div>

                <!-- Table -->
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Judul</th>
                                <th>Jenis</th>
                                <th>Jumlah</th>
                                <th>Keterangan</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($laporan as $index => $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d/m/Y') }}</td>
                                    <td>{{ $item->judul }}</td>
                                    <td>
                                        <span class="status-{{ $item->jenis == 'pemasukan' ? 'active' : 'inactive' }}">
                                            {{ ucfirst($item->jenis) }}
                                        </span>
                                    </td>
                                    <td>Rp {{ number_format($item->jumlah, 0, ',', '.') }}</td>
                                    <td>{{ Str::limit($item->keterangan, 50) }}</td>
                                    <td>
                                        <span class="status-{{ $item->status == 'aktif' ? 'active' : 'inactive' }}">
                                            {{ ucfirst($item->status) }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="action-buttons">
                                            <a href="{{ route('keuangan.edit', $item->id) }}" 
                                               class="btn btn-warning btn-sm">✏️ Edit</a>
                                            <form action="{{ route('keuangan.destroy', $item->id) }}" 
                                                  method="POST" style="display: inline;"
                                                  onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">🗑️ Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="empty-state">
                                        <div>
                                            <h3>Belum ada data laporan keuangan</h3>
                                            <p>Silakan tambahkan laporan keuangan pertama Anda</p>
                                            <a href="{{ route('keuangan.create') }}" class="btn btn-primary">
                                                ➕ Tambah Laporan Pertama
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination (jika menggunakan pagination) -->
                @if(method_exists($laporan, 'links'))
                    <div style="margin-top: 2rem; display: flex; justify-content: center;">
                        {{ $laporan->links() }}
                    </div>
                @endif
            </div>
        </div>

        <!-- Detail Section -->
        <div class="card" style="margin-top: 2rem;">
            <div class="card-header">
                <h2>Detail Laporan Keuangan</h2>
            </div>
            <div class="card-body">
                <p style="text-align: center; color: #718096;">
                    Klik pada salah satu baris tabel di atas untuk melihat detail laporan keuangan.
                </p>
            </div>
        </div>
    </div>

    <script>
        // Add some interactivity
        document.addEventListener('DOMContentLoaded', function() {
            // Highlight table rows on hover
            const tableRows = document.querySelectorAll('tbody tr');
            tableRows.forEach(row => {
                row.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateX(4px)';
                    this.style.transition = 'transform 0.2s ease';
                });
                
                row.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateX(0)';
                });
            });

            // Auto-submit form when filter changes
            const filterForm = document.getElementById('filterForm');
            const filterInputs = document.querySelectorAll('#tanggal, #jenis');
            
            filterInputs.forEach(input => {
                input.addEventListener('change', function() {
                    // Add loading effect
                    showLoading();
                    
                    // Submit form automatically
                    setTimeout(() => {
                        filterForm.submit();
                    }, 300);
                });
            });

            // Loading effect function
            function showLoading() {
                const tableBody = document.querySelector('tbody');
                if (tableBody) {
                    tableBody.style.opacity = '0.6';
                    tableBody.style.pointerEvents = 'none';
                    
                    // Add loading indicator
                    const loadingRow = document.createElement('tr');
                    loadingRow.innerHTML = `
                        <td colspan="8" style="text-align: center; padding: 2rem;">
                            <div style="display: inline-flex; align-items: center; gap: 0.5rem; color: #4299e1;">
                                <div style="width: 20px; height: 20px; border: 2px solid #e2e8f0; border-top: 2px solid #4299e1; border-radius: 50%; animation: spin 1s linear infinite;"></div>
                                Sedang memuat data...
                            </div>
                        </td>
                    `;
                    loadingRow.id = 'loading-row';
                    
                    // Add spinning animation
                    const style = document.createElement('style');
                    style.textContent = `
                        @keyframes spin {
                            0% { transform: rotate(0deg); }
                            100% { transform: rotate(360deg); }
                        }
                    `;
                    document.head.appendChild(style);
                    
                    tableBody.appendChild(loadingRow);
                }
            }

            // Add smooth transitions to filter inputs
            filterInputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.style.borderColor = '#4299e1';
                    this.style.boxShadow = '0 0 0 3px rgba(66, 153, 225, 0.1)';
                });
                
                input.addEventListener('blur', function() {
                    this.style.borderColor = '#e2e8f0';
                    this.style.boxShadow = 'none';
                });
            });
        });
    </script>
</body>
</html>