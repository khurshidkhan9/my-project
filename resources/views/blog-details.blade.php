@extends('layouts.app')
@section('content')

    <!-- ***** Breadcrumb Area Start ***** -->
    <div class="breadcumb-area bg-img bg-gradient-overlay" style="background-image: url(img/bg-img/12.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <h2 class="title">Blog Details</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="breadcumb--con">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Blog Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Breadcrumb Area End ***** -->

    <!-- ****** Blog Area Start ******* -->
    <section class="dento--blog-area mt-50">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8 mb-100">
                    <!-- Blog Details Area -->
                    <div class="blog-details-area">
                        <img src="./img/bg-img/24.jpg" alt="">
                        @foreach ($post as $object)
                            <div class="col-md-12 px-0">
                                <img src="{{ asset($object->img_path) }}" alt="" srcset="">
                            </div>

                            <h2 class="post-title"> {{ $object->title }}</h2>
                            <div class="post-meta">
                                <a href="#"><i class="icon_clock_alt"></i>
                                    {{ $object->created_at->format('j F, Y \\a\\t h:i A') }}</a>
                                <a href="#"><i class="icon_chat_alt"></i> {{ $object->comments->count() }} Comments</a>
                            </div>
                            <p>{!! $object->body !!}.</p>

                            
                            <!-- Post Share  -->
                            <div class="post-share-area mb-30">
                                @foreach ($post as $post)
                                {!! Share::page(url('/post/'. $post->slug))->facebook()->twitter()->whatsapp() !!}
                                @endforeach
                            </div>



                            <!-- Comments Area -->
                            <!-- Comments Area -->
                            <div class="comment_area clearfix">
                                <h5 class="title"> {{ $object->comments->count() }} Comments</h5>

                                {{-- @include('commentsDisplay', ['comments' => $object->comment, 'post_id' => $object->id]) --}}
                                @include('commentsDisplay',['comments' => $object->comments, 'post_id' => $object->id])

                            </div>

                            <!-- Leave A Reply -->
                            @if (Auth::user() == true)
                                <div class="contact-form mt-30">
                                    <h5 class="mb-30">Leave A Reply</h5>

                                    <!-- Form -->
                                    <form method="post" action="{{ route('comments.store') }}">
                                        @csrf
                                        <div class="row">
                                            {{-- <div class="col-lg-6">
                  <input type="text" name="message-name" class="form-control mb-30" placeholder="Your Name">
                </div>
                <div class="col-lg-6">
                  <input type="email" name="message-email" class="form-control mb-30" placeholder="Your Email">
                </div> --}}
                                            <div class="col-12">
                                                <textarea name="body" class="form-control mb-30"
                                                    placeholder="Your Message"></textarea>
                                            </div>
                                            <input type="hidden" name="post_id" value="{{ $object->id }}" />

                                            {{-- <input type="hidden" name="parent_id" value="{{ $object->id }}" /> --}}
                                            <div class="col-12">
                                                <button type="submit" class="btn dento-btn">Reply</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            @else
                                <button type="button" onclick="location.href='{{ URL('login') }}'"
                                    class="btn btn-primary mt-3">Login to comment</button>
                            @endif
                        @endforeach

                    </div>
                </div>

                <!-- Dento Sidebar Area -->
                <div class="col-12 col-lg-4">
                    <div class="dento-sidebar">

                        <!-- Single Widget Area -->
                        <div class="single-widget-area search-widget">
                            <form action="#" method="post">
                                <input type="search" name="search" class="form-control" placeholder="Search ...">
                                <button type="submit"><i class="icon_search"></i></button>
                            </form>
                        </div>

                        <!-- Single Widget Area -->
                        <div class="single-widget-area catagories-widget">
                            <h5 class="widget-title">Categories</h5>

                            <!-- catagories list -->
                            <ul class="catagories-list">
                                <li><a href="#">Articles</a></li>
                            </ul>
                        </div>

                        <!-- Single Widget Area -->
                        {{-- <div class="single-widget-area news-widget">
                                <h5 class="widget-title">Recent News</h5>

                                <!-- Single News Area -->
                                <div class="single-news-area d-flex align-items-center">
                                    <div class="blog-thumbnail">
                                        <img src="./img/bg-img/21.jpg" alt="">
                                    </div>
                                    <div class="blog-content">
                                        <a href="#" class="post-title">Tooth decay: why good dental hygiene is important</a>
                                        <span class="post-date">28 Sep 2018</span>
                                    </div>
                                </div>

                                <!-- Single News Area -->
                                <div class="single-news-area d-flex align-items-center">
                                    <div class="blog-thumbnail">
                                        <img src="./img/bg-img/22.jpg" alt="">
                                    </div>
                                    <div class="blog-content">
                                        <a href="#" class="post-title">Six reasons your breath might smell like poop</a>
                                        <span class="post-date">28 Sep 2018</span>
                                    </div>
                                </div>

                                <!-- Single News Area -->
                                <div class="single-news-area d-flex align-items-center">
                                    <div class="blog-thumbnail">
                                        <img src="./img/bg-img/23.jpg" alt="">
                                    </div>
                                    <div class="blog-content">
                                        <a href="#" class="post-title">Everything you need to know about sinus infection</a>
                                        <span class="post-date">28 Sep 2018</span>
                                    </div>
                                </div>
                            </div> --}}

                        <!-- Single Widget Area -->
                        <div class="single-widget-area adds-widget">
                            <a href="#"><img class="w-100" src="./img/bg-img/adds.png" alt=""></a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ****** Blog Area End ******* -->


@endsection
