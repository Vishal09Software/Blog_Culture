@extends('frontend.layouts.main')
@section('main-container')
    <div id="colorlib-main">
        <section class="ftco-section ftco-no-pt ftco-no-pb">
            <div class="container">
                <div class="row d-flex">
                    <div class="col-xl-12 px-md-5 py-5">
                        @foreach ($category as $cate)
                            <h1>Category : {{ $cate->category_name }}</h1>
                        @endforeach
                        <div class="row pt-md-4">
                            @foreach ($blog as $data)
                                <div class="col-md-12">
                                    <div class="blog-entry-2 ftco-animate">
                                        <a href="{{ '/single/' . $data->id }}" class="img"
                                            style="background-image: url({{ asset('backend/images/' . $data->image) }})"></a>
                                        <div class="text pt-4">
                                            <h3 class="mb-2"><a
                                                    href="{{ '/single/' . $data->id }}">{{ $data->heading }}</a>
                                            </h3>
                                            <p class="mb-4">{!! Str::limit($data->paragraph, 150) !!}</p>
                                            <div class="author mb-4 d-flex align-items-center">
                                                <a href="#" class="img"
                                                    style="background-image: url(images/person_1.jpg);"></a>
                                                <div class="ml-3 info">
                                                    <span>Written by</span>
                                                    <h3><a href="#">Admin</a>, <span>{{ $data->date }}</span>
                                                    </h3>
                                                </div>
                                            </div>
                                            <div class="meta-wrap d-md-flex align-items-center">
                                                <div class="half order-md-last text-md-right">
                                                    <p class="meta">
                                                        <span><i class="icon-eye"></i>100</span>
                                                    </p>
                                                </div>
                                                <div class="half">
                                                    <p><a href="{{ '/single/' . $data->id }}"
                                                            class="btn btn-primary p-3 px-xl-4 py-xl-3">Continue
                                                            Reading</a></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="block-27">
                                    <ul>
                                        <div class="col">
                                            <div class="block-27">
                                                {{ $blog->onEachSide(1)->links() }}
                                            </div>
                                        </div>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    </div>

    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke-miterlimit="10" stroke="#F96D00" />
        </svg></div>
@endsection

