@extends('layouts.frontend')
@section('content')

    <section class="container py-6">
        <div class="row flex-lg-row-reverse align-items-center g-5">
            <div class="col-10 mx-auto col-sm-8 col-lg-6">
                <img src="{{asset('assets/images/Logo-GKII.png')}}" class="d-block mx-lg-auto img-fluid" alt="" loading="lazy">
            </div>
            <div class="col-lg-6">
                <div class="lc-block mb-3">
                    <div editable="rich">
                        <h2 class="fw-bold display-5">Church Overview</h2>
                    </div>
                </div>

                <div class="lc-block mb-3">
                    <div editable="rich">
                        <p class="lead">Gereja Kemah Injil Indonesia (GKII) merupakan salah satu denominasi gereja Protestan di Indonesia yang memiliki akar pelayanan misi sejak awal abad ke-20. GKII lahir dari pelayanan para misionaris asing, khususnya dari The Christian and Missionary Alliance (C&MA), sebuah organisasi penginjilan yang berbasis di Amerika Serikat.
                        </p>
                    </div>
                </div>

                <div class="lc-block d-grid gap-2 d-md-flex justify-content-md-start mb-3"><a class="btn btn-primary px-4 me-md-2" href="#" role="button">Explore More<i class="fa fa-arrow-circle-right ms-2"></i></a>
                </div>
                <div class="mb-4">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.930810772113!2d117.36137507501749!3d2.8362807971404833!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3213ce1e4489e24f%3A0xec5523c0a3d07282!2sGereja%20Kemah%20Injil%20Indonesia%20Jemaat%20Tanjung%20Selor!5e0!3m2!1sid!2sid!4v1743856647742!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                </div>
        </div>
    </section>

{{--    <section class="container py-6">--}}
{{--        <div class="row">--}}
{{--            @foreach($posts as $post)--}}
{{--                <div class="card m-2" style="width: 18rem;">--}}
{{--                    <img src="{{Storage::url('post/' . $post->image)}}" class="card-img-top" alt="...">--}}
{{--                    <div class="card-body">--}}
{{--                        <h5 class="card-title">{{$post->title}}</h5>--}}
{{--                        <p class="card-text">{{$post->description}}</p>--}}
{{--                        <p class="card-text">{{$post->category->name}}</p>--}}
{{--                        <a href="#" class="btn btn-outline-secondary px-4">Go somewhere</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--    </section>--}}

@endsection

