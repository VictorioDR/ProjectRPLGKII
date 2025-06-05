@extends('layouts.app')

@section('title', 'Tentang Gereja - GKII Tanjung Selor')

@section('styles')
    <style>
        .church-section {
            margin-top: 3rem;
        }

        .frame-box {
            background-color: #f8f9fa;
            border: 1px solid #ddd;
            padding: 1.5rem;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            margin-bottom: 2rem;
        }

        .logo-img {
            width: 100%;
            max-width: 250px;
            height: auto;
            display: block;
            margin: 0 auto;
        }

        .church-overview-title {
            font-weight: bold;
            font-size: 2rem;
            color: #2c3e50;
        }

        .church-description {
            font-size: 1.1rem;
            line-height: 1.8;
            color: #555;
            text-align: justify;
        }

        .google-maps {
            width: 100%;
            border: 0;
            border-radius: 10px;
            height: 400px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .struktur-box {
            background-color: #f0f3f5;
            padding: 2rem;
            border-radius: 10px;
            border-left: 5px solid #3498db;
        }

        @media (max-width: 768px) {
            .church-overview-title {
                text-align: center;
            }
            .logo-img {
                margin-bottom: 1rem;
            }
        }
    </style>
@endsection

@section('content')
    <section class="container church-section">
        {{-- Frame: Logo dan Deskripsi --}}
        <div class="row frame-box align-items-center">
            <div class="col-md-4 text-center">
                <img src="{{ asset('assets/images/Logo-GKII.png') }}" alt="Logo GKII" class="logo-img">
            </div>
            <div class="col-md-8">
                <h2 class="church-overview-title mb-3">Tentang GKII Tanjung Selor</h2>
                <p class="church-description">
                    GKII (Gereja Kemah Injili Indonesia) adalah gereja Kristen Protestan di Indonesia yang berakar dari Sulawesi Selatan dan berpusat di Palembang. GKII didirikan oleh seorang misionaris Pdt.
                    Hubert Mitchael dari CMA (Christian and Missionary Alliance) pada tahun 1938 di Lubuk Linggau,
                    dilanjutkan oleh Ferdinand Lumbantobing. Pelayanan ini kemudian diserahkan ke WEC (World Evangelical Conference),
                    dan dari situ berkembang ke Curup Bengkulu dan membentuk Persekutuan Injili Internasional.
                    Pada tahun 1967, gereja ini diubah namanya menjadi Gereja Kristen Injili Indonesia (GKII
                </p>
            </div>
        </div>

        {{-- Frame: Google Maps --}}
        <div class="mb-4">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.930810772113!2d117.36137507501749!3d2.8362807971404833!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3213ce1e4489e24f%3A0xec5523c0a3d07282!2sGereja%20Kemah%20Injil%20Indonesia%20Jemaat%20Tanjung%20Selor!5e0!3m2!1sid!2sid!4v1743856647742!5m2!1sid!2sid"
                class="google-maps"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>

        {{-- Frame: Struktur Pengurus --}}
        <div class="struktur-box">
            <h4 class="mb-3">Struktur Pengurus Gereja</h4>
            <ul>
                <li><strong>Gembala Jemaat:</strong> Pdt. Yohanes Markus</li>
                <li><strong>Penatua:</strong> Ibu Maria, Bapak Simon</li>
                <li><strong>Seksi Pelayanan Musik:</strong> Ibu Lidia</li>
                <li><strong>Seksi Anak & Remaja:</strong> Bapak Daniel</li>
                <li><strong>Seksi Multimedia:</strong> Sdr. Alex</li>
                <!-- Tambahkan data lainnya sesuai kebutuhan -->
            </ul>
        </div>
    </section>
@endsection
