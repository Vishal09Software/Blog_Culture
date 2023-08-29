@extends('frontend.layouts.main')
@section('main-container')
    <div id="colorlib-main">
        <section class="ftco-section ftco-no-pt ftco-no-pb">
            <div class="container">
                <div class="row d-flex">
                    <div class="col-xl-8 py-5 px-md-5">
                        <div class="row pt-md-4">
                            @foreach ($blog as $data)
                                <div class="col-md-12">
                                    <div class="blog-entry ftco-animate d-md-flex">
                                        <a href="{{ '/single/' . $data->id }}" class="img img-2"
                                            style="background-image: url({{ asset('backend/images/' . $data->image) }})"></a>
                                        <div class="text text-2 pl-md-4">
                                            <h3 class="mb-2"><a
                                                    href="{{ '/single/' . $data->id }}">{{ $data->heading }}</a>
                                            </h3>
                                            <div class="meta-wrap">
                                                <p class="meta">
                                                    <span><i class="icon-calendar mr-2"></i>{{ $data->date }}</span>
                                                    <span><a href="{{'/category/' .$data->id}}"><i
                                                                class="icon-folder-o mr-2"></i>{{ $data->category_name }}</a></span>
                                                    {{-- <span><i class="icon-comment2 mr-2"></i>5 Comment</span> --}}
                                                </p>
                                            </div>
                                            <p class="mb-4">{!! Str::limit($data->paragraph, 150) !!}</p>
                                            <p><a href="{{ '/single/' . $data->id }}" class="btn-custom">Read More <span
                                                        class="ion-ios-arrow-forward"></span></a></p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="block-27">
                                    {{ $blog->onEachSide(1)->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 sidebar ftco-animate bg-light pt-5">
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
                                    <li><a href="{{'/category/' .$data->id}}">{{ $data->category_name }} <span>({{ $data->posts_count }})</span></a></li>
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
            $("#search").on('keyup',function(){
                var value = $(this).val();
                $.ajax({
                    url:"{{ route('search') }}",
                    type:"GET",
                    data:{'heading':value},
                    success:function(data){
                        $("#blog_list").html(data);
                    }
                });
            });
            $(document).on('click','li',function(){
                var value = $(this).text();
                $("#search").val(value);
                $("#blog_list").html("");
            });
        });
    </script>
@endsection
