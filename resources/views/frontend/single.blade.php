@extends('frontend.layouts.main')
@section('main-container')
    <div id="colorlib-main">
        <section class="ftco-section ftco-no-pt ftco-no-pb">
            <div class="container">
                <div class="row d-flex">
                    <div class="col-lg-8 px-md-5 py-5">
                        <div class="row pt-md-4">

                            @foreach ($blog as $data)
                                <h1 class="mb-3">{{ $data->heading }}</h1>
                                <p>
                                    <img src="{{ asset('backend/images/' . $data->image) }}" alt="" class="img-fluid">
                                </p>
                                <p>{!! $data->paragraph !!}</p>
                            @endforeach
                            {{-- <div class="about-author d-flex p-4 bg-light">
                                    <div class="bio mr-5">
                                        <img src="images/person_1.jpg" alt="Image placeholder" class="img-fluid mb-4">
                                    </div>
                                    <div class="desc">
                                        <h3>George Washington</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque,
                                            autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam
                                            vero culpa sapiente consectetur similique, inventore eos fugit cupiditate
                                            numquam!</p>
                                    </div>
                                </div> --}}
                        </div>
                    </div>
                    <div class="col-lg-4 sidebar ftco-animate bg-light pt-5">
                        <div class="sidebar-box pt-md-4">
                            <div class="form-group">
                                <input type="search" name="search" id="search" class="form-control"
                                    placeholder="Type a keyword and hit enter">
                                <div id="blog_list">
                                </div>
                            </div>
                    </div>
                        <div class="sidebar-box ftco-animate">
                            <h3 class="sidebar-heading">Categories</h3>
                            <ul class="categories">
                                @foreach ($category as $data)
                                    <li><a href="="{{'/category/' .$data->id}}">{{ $data->category_name }} <span>(6)</span></a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="sidebar-box ftco-animate">
                            <h3 class="sidebar-heading">Popular Articles</h3>
                            @foreach ($blog as $data)
                                <div class="block-21 mb-4 d-flex">
                                    <a class="blog-img mr-4"
                                        style="background-image: url({{ asset('backend/images/' . $data->image) }})"></a>
                                    <div class="text">
                                        <h3 class="heading"><a
                                                href="{{ '/single/' . $data->id }}">{{ $data->heading }}</a></h3>
                                        <div class="meta">
                                            <span><i class="icon-calendar mr-2"></i>{{ $data->date }}</span>
                                            <div><span class="icon-person"></span> The Blog Cultures</div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="sidebar-box ftco-animate">
                            <h3 class="sidebar-heading">Paragraph</h3>
                            <p>Blogs can serve various purposes, such as personal journals, educational resources, marketing
                                tools, or entertainment platforms. Regardless of the purpose, the real value of blogging
                                lies in its ability to foster communication, learning, and connection among individuals and
                                communities.</p>
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
@section('scripts')
    <script>
        $(document).ready(function() {
            $("#search").on('keyup', function() {
                var value = $(this).val();
                $.ajax({
                    url: "{{ route('search') }}",
                    type: "GET",
                    data: {
                        'heading': value
                    },
                    success: function(data) {
                        $("#blog_list").html(data);
                    }
                });
            });
            $(document).on('click', 'li', function() {
                var value = $(this).text();
                $("#search").val(value);
                $("#blog_list").html("");
            });
        });
    </script>
@endsection
