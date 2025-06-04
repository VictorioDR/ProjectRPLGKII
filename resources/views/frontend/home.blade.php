@extends('layouts.app')

@section('title', 'Beranda - GKI Tanjung Selor')

@section('styles')
<style>
    /* Hero Section */
    .hero {
        background: linear-gradient(135deg, #2c3e50 0%, #3498db 100%);
        color: white;
        padding: 4rem 0;
        text-align: center;
    }

    .hero h1 {
        font-size: 2.5rem;
        margin-bottom: 1rem;
        font-weight: 300;
    }

    .hero p {
        font-size: 1.2rem;
        margin-bottom: 2rem;
        opacity: 0.9;
    }

    /* Info Section */
    .info-section {
        background: white;
        padding: 3rem 0;
        margin: 2rem 0;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }

    .info-content {
        display: flex;
        align-items: center;
        gap: 3rem;
    }

    .info-text {
        flex: 1;
    }

    .info-text h2 {
        color: #2c3e50;
        margin-bottom: 1rem;
        font-size: 1.8rem;
    }

    .info-text p {
        color: #666;
        margin-bottom: 1.5rem;
        line-height: 1.8;
    }

    .info-image {
        flex: 1;
        text-align: center;
    }

    .church-logo {
        width: 200px;
        height: 200px;
        background: #275fae;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto;
        color: white;
        font-size: 3rem;
    }

    .church-name {
        margin-top: 1rem;
        font-weight: bold;
        color: #2c3e50;
    }

    .church-event {
        color: #e74c3c;
        font-size: 1.5rem;
        font-weight: bold;
        margin-top: 0.5rem;
    }

    .church-date {
        color: #666;
        margin-top: 0.5rem;
    }

    /* Cards Section */
    .cards-section {
        padding: 3rem 0;
    }

    .cards-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
        margin-top: 2rem;
    }

    .card {
        background: white;
        border-radius: 10px;
        padding: 2rem;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.15);
    }

    .card-image {
        width: 100%;
        height: 150px;
        background: #ecf0f1;
        border-radius: 5px;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #bdc3c7;
        font-size: 2rem;
    }

    .card-title {
        font-size: 1.3rem;
        font-weight: bold;
        color: #2c3e50;
        margin-bottom: 1rem;
    }

    .card-content {
        color: #666;
        margin-bottom: 1.5rem;
        line-height: 1.6;
    }

    .card-list {
        list-style: none;
        margin-bottom: 1.5rem;
    }

    .card-list li {
        padding: 0.5rem 0;
        border-bottom: 1px solid #ecf0f1;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .card-list li:last-child {
        border-bottom: none;
    }

    .date-badge {
        background: #3498db;
        color: white;
        padding: 0.2rem 0.5rem; 
        border-radius: 3px;
        font-size: 0.8rem;
    }

    .amount {
        font-weight: bold;
        color: #2768ae;
    }

    /* Black bars */
    .black-bar {
        width: 100%;
        height: 40px;
        background: #000;
        margin: 2rem 0;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .hero h1 {
            font-size: 2rem;
        }

        .info-content {
            flex-direction: column;
            text-align: center;
        }

        .church-logo {
            width: 150px;
            height: 150px;
            font-size: 2rem;
        }

        .cards-grid {
            grid-template-columns: 1fr;
        }
    }
</style>
@endsection

@section('content')

<div class="container">
    <div class="info-section">
        <div class="info-content">
            <div class="info-text">
                <h2>GKI Tanjung Selor</h2>
                <p>Visi "Keluarga Bagi Allah"</p>
                <p>Versi 18.0</p>
                <a href="" class="btn btn-secondary">Lihat Galeri</a>
            </div>
            <div class="info-image">
                {{-- <img src="{{ asset('images/logo-gki.png') }}" alt="Logo GKI" class="church-logo"> --}}
                <img src="{{ asset('assets/images/Logo-GKII.png') }}" alt="Logo GKII" style="height: 60px">
                <div class="church-name">GKI TANJUNG SELOR</div>
                <div class="church-event">IBADAH UMUM</div>
                <div class="church-date">Minggu 29 Maret 2020</div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="cards-section">
        <div class="cards-grid">
            <!-- Jadwal Ibadah Card -->
            <div class="card">
                <div class="card-image">📅</div>
                <h3 class="card-title">Jadwal Ibadah Dalam Sepekan</h3>
                <div class="card-content">
                    @if(isset($jadwalIbadah) && count($jadwalIbadah) > 0)
                        <ul class="card-list">
                            @foreach($jadwalIbadah as $jadwal)
                            <li>
                                <span>{{ $jadwal['nama'] ?? 'Ibadah' }}</span>
                                <span class="date-badge">{{ $jadwal['tanggal'] ?? 'TBA' }}</span>
                            </li>
                            @endforeach
                        </ul>
                    @else
                        <p>Belum ada jadwal ibadah yang tersedia.</p>
                    @endif
                </div>
                <a href="#" class="btn btn-secondary">Lihat Semua</a>
            </div>

            <!-- Jadwal Pelayanan Card -->
            <div class="card">
                <div class="card-image">🤝</div>
                <h3 class="card-title">Jadwal Pelayanan Dalam Sepekan</h3>
                <div class="card-content">
                    @if(isset($jadwalPelayanan) && count($jadwalPelayanan) > 0)
                        <ul class="card-list">
                            @foreach($jadwalPelayanan as $pelayanan)
                            <li>
                                <span>{{ $pelayanan['nama'] ?? 'Pelayanan' }}</span>
                                <span class="date-badge">{{ $pelayanan['tanggal'] ?? 'TBA' }}</span>
                            </li>
                            @endforeach
                        </ul>
                    @else
                        <p>Belum ada jadwal pelayanan yang tersedia.</p>
                    @endif
                </div>
                <a href="#" class="btn btn-secondary">Lihat Semua</a>
            </div>

            <!-- Laporan Keuangan Card -->
            <div class="card">
                <div class="card-image">💰</div>
                <h3 class="card-title">Laporan Keuangan Dalam Sepekan</h3>
                <div class="card-content">
                    @if(isset($laporanKeuangan) && count($laporanKeuangan) > 0)
                        <ul class="card-list">
                            @foreach($laporanKeuangan as $laporan)
                            <li>
                                <span>{{ $laporan['keterangan'] ?? 'Transaksi' }}</span>
                                <span class="amount">Rp {{ number_format($laporan['jumlah'] ?? 0, 0, ',', '.') }}</span>
                            </li>
                            @endforeach
                        </ul>
                    @else
                        <p>Belum ada laporan keuangan yang tersedia.</p>
                    @endif
                </div>
                <a href="#" class="btn btn-secondary">Lihat Semua</a>
            </div>
        </div>
    </div>
</div>
@endsection