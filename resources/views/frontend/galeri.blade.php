@extends('layouts.app')

@section('title', 'Galeri')

@section('content')
    <div class="container my-5">
        <h1 class="text-center">Galeri</h1>
        <p class="text-center">Kumpulan Dokumentasi</p>

        <!-- Form Filter Tanggal -->
        <div class="filter-section my-4">
            <form method="GET" action="{{ route('galeri.public') }}">
                <div class="row justify-content-center">
                    <div class="col-md-3">
                        <label for="start_date" class="form-label">Tanggal Mulai</label>
                        <input type="date" class="form-control" id="start_date" name="start_date" value="{{ request('start_date') }}">
                    </div>
                    <div class="col-md-3">
                        <label for="end_date" class="form-label">Tanggal Akhir</label>
                        <input type="date" class="form-control" id="end_date" name="end_date" value="{{ request('end_date') }}">
                    </div>
                    <div class="col-md-2 align-self-end">
                        <button type="submit" class="btn btn-primary w-100">Filter</button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Galeri -->
        <div class="gallery-section row">
            @forelse ($galeri as $item)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <!-- Cek jika gambar tersedia -->
                        @if ($item->gambar && file_exists(public_path('uploads/galeri/' . $item->gambar)))
                            <img src="{{ asset('uploads/galeri/' . $item->gambar) }}" class="card-img-top" alt="{{ $item->judul }}">
                        @else
                            <img src="{{ asset('images/default.jpg') }}" class="card-img-top" alt="Default Image">
                        @endif

                        <div class="card-body">
                            <h5 class="card-title">{{ $item->judul }}</h5>
                            <p class="card-text">
                                {{ \Illuminate\Support\Str::limit($item->deskripsi, 100, '...') }}
                            </p>
                            <p class="card-text">
                                <small class="text-muted">
                                    Diupload pada: {{ optional($item->created_at)->format('d M Y') ?? 'Tanggal tidak tersedia' }}
                                </small>
                            </p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-center">Tidak ada dokumentasi ditemukan.</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if ($galeri->hasPages())
            <div class="d-flex justify-content-center mt-4">
                {{ $galeri->withQueryString()->links() }}
            </div>
        @endif
    </div>
@endsection
