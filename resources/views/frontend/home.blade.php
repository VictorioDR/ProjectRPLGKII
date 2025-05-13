@extends('layouts.frontend')
@section('content')

    <section class="container py-6">
        <div class="row flex-lg-row-reverse align-items-center g-5">
            <div class="col-10 mx-auto col-sm-8 col-lg-6">
                <img src="https://images.unsplash.com/photo-1530435460869-d13625c69bbf?crop=entropy&amp;cs=tinysrgb&amp;fit=crop&amp;fm=jpg&amp;ixid=MnwzNzg0fDB8MXxzZWFyY2h8MTB8fHdlYnNpdGV8ZW58MHwwfHx8MTYyMTQ0NjkyNg&amp;ixlib=rb-1.2.1&amp;q=80&amp;w=1080&amp;h=768" class="d-block mx-lg-auto img-fluid" alt="" loading="lazy">
            </div>
            <div class="col-lg-6">
                <div class="lc-block mb-3">
                    <div editable="rich">
                        <h2 class="fw-bold display-5">Personal Overview</h2>
                    </div>
                </div>

                <div class="lc-block mb-3">
                    <div editable="rich">
                        <p class="lead">Website ini saya buat sebagai media untuk menyalurkan ide, kreativitas, serta dokumentasi berbagai kegiatan dan informasi penting yang saya anggap layak untuk dibagikan. Di dalamnya, kamu bisa menemukan berbagai postingan berupa berita kegiatan, dokumentasi acara, dan foto-foto menarik dari aktivitas sehari-hari maupun momen-momen spesial yang saya alami.
                        </p>
                    </div>
                </div>

                <div class="lc-block d-grid gap-2 d-md-flex justify-content-md-start"><a class="btn btn-primary px-4 me-md-2" href="#" role="button">Explore Now<i class="fa fa-arrow-circle-right ms-2"></i></a>
                </div>

            </div>
        </div>
    </section>

    <section class="container py-6">
        <div class="row">
        @foreach($posts as $post)
    <div class="card m-2" style="width: 18rem;">
        <img src="{{Storage::url('post/' . $post->image)}}" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{$post->title}}</h5>
            <p class="card-text">{{$post->description}}</p>
            <p class="card-text">{{$post->category->name}}</p>
            <a href="#" class="btn btn-outline-secondary px-4">Go somewhere</a>
        </div>
    </div>
        @endforeach
        </div>
    </section>

@endsection
