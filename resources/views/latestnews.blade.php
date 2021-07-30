   <!-- ***** Blog Area Start ***** -->
   <section class="dento-blog-area section-padding-100-0 clearfix">
    <div class="container">
        <div class="row">
            <!-- Section Heading -->
            <div class="col-12">
                <div class="section-heading text-center">
                    <h2>The Latest News</h2>
                    <div class="line"></div>
                </div>
            </div>
        </div>
        {{-- this carousel section --}}
        <div class="row">
            @if (count($posts)>=1)
                <div id="recipeCarousel" class="carousel slide w-100" data-ride="carousel">
                    <div class="carousel-inner w-100" role="listbox">
                        @foreach ($posts->chunk(3) as $three)

                            <div class="carousel-item @if ($loop->first) {{ 'active' }} @endif"">
                                @foreach ($three as $post)
                                    <!-- Single Blog Item -->
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="single-blog-item mb-100">
                                            <a href="{{ URl('posts/' . $post->id) }}">
                                                <img src="{{ asset($post->img_path) }}" alt="">
                                            </a>
                                            <!-- Blog Content -->
                                            <div class="blog-content">
                                                <a href="{{ URl('posts/' . $post->id) }}"
                                                    class="post-title">{{ $post->title }}</a>
                                                <p>{!! Str::limit($post->body, 150) !!}</p>
                                                <div class="post-meta">
                                                    <a href="{{ URl('posts/' . $post->id) }}"><i
                                                            class="icon_clock_alt"></i>
                                                        {{ $post->created_at->format('j F, Y') }}</a>
                                                    <a href="{{ URl('posts/' . $post->id) }}"><i
                                                            class="icon_chat_alt"></i> {{ $post->comments->count() }}
                                                        Comments</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev w-auto" href="#recipeCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon bg-dark border border-dark rounded-circle"
                            aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next w-auto" href="#recipeCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon bg-dark border border-dark rounded-circle"
                            aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
    @else
        <!-- Single Blog Item -->
        <div class="col-12 col-md-12 col-lg-12">
            <div class="single-blog-item mb-100">
                <h5 class="txt-center">No Post Found!</h5>
            </div>
        </div>
    </div>

    @endif
</div>
    {{-- carousel ends here --}}
</section>