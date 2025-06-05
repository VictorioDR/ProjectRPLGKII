@extends('layouts.app')

@section('title', 'Jadwal Ibadah')

@section('content')
    <!-- Hero Section -->
    <div class="hero-section text-center py-5" style="background-color: #f8f9fa;">
        <h1 class="display-5 fw-bold">Jadwal Ibadah dalam Sepekan</h1>
        <p class="lead">Lihat jadwal ibadah lengkap agar Anda dapat bergabung di setiap kesempatan!</p>
    </div>

    <!-- Jadwal Ibadah Table -->
    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <h2 class="h4 mb-3 text-start">Daftar Jadwal:</h2>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped text-center">
                        <thead class="table-dark">
                        <tr>
                            <th>Tanggal</th>
                            <th>WL (Worship Leader)</th>
                            <th>Singers</th>
                            <th>Tim Musik</th>
                            <th>Pengkhotbah</th>
                            <th>Tempat</th>
                            <th>Multimedia</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($jadwal_ibadah as $jadwal)
                            <tr>
                                <td>{{ \Carbon\Carbon::parse($jadwal->tanggal)->translatedFormat('l, d M Y') }}</td>
                                <td>{{ $jadwal->wl }}</td>
                                <td>{{ implode(', ', $jadwal->singers) }}</td>
                                <td>
                                    <div class="text-start">
                                        @foreach($jadwal->tim_musik as $instrument => $musician)
                                            <strong>{{ ucfirst($instrument) }}</strong>: {{ $musician }}<br>
                                        @endforeach
                                    </div>
                                </td>
                                <td>{{ $jadwal->pengkhotbah }}</td>
                                <td>{{ $jadwal->tempat }}</td>
                                <td>{{ $jadwal->multimedia }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">Belum ada jadwal ibadah untuk minggu ini.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
