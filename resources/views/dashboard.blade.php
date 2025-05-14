@extends('layouts.main')
@section('title', 'Dashboard')
@section('content')
    <!-- [ Main Content ] start -->
    <div class="row">
        <div class="col-12">
            <h2 class="mb-4">Beranda</h2>
        </div>

        <!-- [ Jemaat Terdaftar ] start -->
        <div class="col-md-6 col-xl-4">
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-4">Jemaat Terdaftar</h6>
                    <div class="row d-flex align-items-center">
                        <div class="col-9">
                            <h3 class="f-w-300 d-flex align-items-center m-b-0">{{ $jemaatCount }}</h3>
                        </div>
                        <div class="col-3 text-end">
                            <i class="feather icon-users f-28"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ Jemaat Terdaftar ] end -->

        <!-- [ Absensi Jemaat Masuk ] start -->
        <div class="col-md-6 col-xl-4">
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-4">Absensi Jemaat Masuk</h6>
                    <div class="row d-flex align-items-center">
                        <div class="col-9">
                            <h3 class="f-w-300 d-flex align-items-center m-b-0">{{ $absensiCount }}</h3>
                        </div>
                        <div class="col-3 text-end">
                            <i class="feather icon-user-check f-28"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ Absensi Jemaat Masuk ] end -->

        <!-- [ Jadwal Ibadah Minggu Ini ] start -->
        <div class="col-md-6 col-xl-4">
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-4">Jadwal Ibadah Minggu Ini</h6>
                    <div class="row d-flex align-items-center">
                        <div class="col-9">
                            <h3 class="f-w-300 d-flex align-items-center m-b-0">{{ $jadwalIbadahCount }}</h3>
                        </div>
                        <div class="col-3 text-end">
                            <i class="feather icon-calendar f-28"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ Jadwal Ibadah Minggu Ini ] end -->

        <!-- [ Jadwal Pelayanan Minggu Ini ] start -->
        <div class="col-md-6 col-xl-4">
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-4">Jadwal Pelayanan Minggu Ini</h6>
                    <div class="row d-flex align-items-center">
                        <div class="col-9">
                            <h3 class="f-w-300 d-flex align-items-center m-b-0">{{ $jadwalPelayananCount }}</h3>
                        </div>
                        <div class="col-3 text-end">
                            <i class="feather icon-clock f-28"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ Jadwal Pelayanan Minggu Ini ] end -->

        <!-- [ Laporan Keuangan Terunggah ] start -->
        <div class="col-md-6 col-xl-4">
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-4">Laporan Keuangan Terunggah</h6>
                    <div class="row d-flex align-items-center">
                        <div class="col-9">
                            <h3 class="f-w-300 d-flex align-items-center m-b-0">{{ $laporanKeuanganCount }}</h3>
                        </div>
                        <div class="col-3 text-end">
                            <i class="feather icon-file-text f-28"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ Laporan Keuangan Terunggah ] end -->

        <!-- [ Pengumuman Aktif ] start -->
        <div class="col-md-6 col-xl-4">
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-4">Pengumuman Aktif</h6>
                    <div class="row d-flex align-items-center">
                        <div class="col-9">
                            <h3 class="f-w-300 d-flex align-items-center m-b-0">{{ $pengumumanCount }}</h3>
                        </div>
                        <div class="col-3 text-end">
                            <i class="feather icon-bell f-28"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ Pengumuman Aktif ] end -->

        <!-- [ Jadwal Pelayanan Mingguan Terdekat ] start -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Jadwal Pelayanan Mingguan Terdekat</h5>
                </div>
                <div class="card-body px-0 py-0">
                    <div class="table-responsive">
                        <table class="table table-hover m-b-0">
                            <thead>
                            <tr>
                                <th>Jenis</th>
                                <th>WL</th>
                                <th>Singers</th>
                                <th>Firman Tuhan</th>
                                <th>Multimedia</th>
                                <th>Musik & Sound</th>
                                <th>Koordinator Ibadah</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($jadwalPelayananMingguan as $jadwal)
                                <tr>
                                    <td>{{ $jadwal->jenis }}</td>
                                    <td>{{ $jadwal->wl }}</td>
                                    <td>{{ $jadwal->singers }}</td>
                                    <td>{{ $jadwal->firman_tuhan }}</td>
                                    <td>{{ $jadwal->multimedia }}</td>
                                    <td>{{ $jadwal->musik_sound }}</td>
                                    <td>{{ $jadwal->koordinator_ibadah }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">Tidak ada data jadwal pelayanan mingguan</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ Jadwal Pelayanan Mingguan Terdekat ] end -->

        <!-- [ Jadwal Pelayanan Kategorial Terdekat ] start -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Jadwal Pelayanan Kategorial Terdekat</h5>
                </div>
                <div class="card-body px-0 py-0">
                    <div class="table-responsive">
                        <table class="table table-hover m-b-0">
                            <thead>
                            <tr>
                                <th>Jenis</th>
                                <th>Tempat</th>
                                <th>WL</th>
                                <th>Singers</th>
                                <th>Firman Tuhan</th>
                                <th>Multimedia</th>
                                <th>Musik</th>
                                <th>Sifat</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($jadwalPelayananKategorial as $jadwal)
                                <tr>
                                    <td>{{ $jadwal->jenis }}</td>
                                    <td>{{ $jadwal->tempat }}</td>
                                    <td>{{ $jadwal->wl }}</td>
                                    <td>{{ $jadwal->singers }}</td>
                                    <td>{{ $jadwal->firman_tuhan }}</td>
                                    <td>{{ $jadwal->multimedia }}</td>
                                    <td>{{ $jadwal->musik }}</td>
                                    <td>{{ $jadwal->sifat }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">Tidak ada data jadwal pelayanan kategorial</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ Jadwal Pelayanan Kategorial Terdekat ] end -->
    </div>
    <!-- [ Main Content ] end -->
@endsection
