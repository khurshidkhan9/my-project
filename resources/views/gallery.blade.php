  <section class="dento-pricing-table-area section-padding-100">
      <div class="container">
          <div class="row">
              <!-- Section Heading -->
              <div class="col-12">
                  <div class="section-heading text-center">
                      <h2>Gellary</h2>
                      <div class="line"></div>
                  </div>
              </div>
          </div>

          <div class="row">
              <div id="blogCarousel" class="carousel slide" data-ride="carousel">

                  <ol class="carousel-indicators">
                      <li class="btn btn-success active" data-target="#blogCarousel" data-slide-to="0"></li>
                      <li class="btn btn-success" data-target="#blogCarousel" data-slide-to="1"></li>
                  </ol>

                  <!-- Carousel items -->
                  <div class="carousel-inner">
                      @if (count($photos) >= 1)
                          @foreach ($photos->chunk(3) as $three)
                              <div class="carousel-item @if ($loop->first) {{ 'active' }} @endif"">
                                  @foreach ($three as $photo)
                                      <div class="col-12 col-sm-6 col-md-4">
                                          <div class="single-dentist-area mb-100">
                                              <img src="{{ asset($photo->photo_path) }}" alt="{{ $photo->name }}">
                                          </div>
                                      </div>
                                  @endforeach
                              </div>
                          @endforeach

                      @else
                          <div class="col-12">
                              <div class="single-blog-item mb-100">
                                  <h5 class="txt-center">No Post Found!</h5>
                              </div>
                          </div>
                      @endif
                  </div>
                  <!--.row-->
              </div>

          </div>
          <!--.carousel-inner-->
      </div>
      <!-- row Carousel-->

      </div>
  </section>
