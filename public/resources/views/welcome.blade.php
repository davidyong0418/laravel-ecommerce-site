@include('layouts/header')


<div id="all">

        <div id="content">

            <div class="container">
                <div class="col-md-12">
                    <div id="main-slider">
                        <div class="item">
                            <img src="{{url('img/main-slider3.jpg')}}" alt="" class="img-responsive">
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="{{url('img/main-slider2.jpg')}}" alt="">
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="{{url('img/main-slider3.jpg')}}" alt="">
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="{{url('img/main-slider4.jpg')}}" alt4="">
                        </div>
                    </div>
                    <!-- /#main-slider -->
                </div>
            </div>

            <!-- *** ADVANTAGES HOMEPAGE *** -->
            <div id="advantages">

                <div class="container">
                    <div class="same-height-row">
                        <div class="col-sm-4">
                            <div class="box same-height clickable">
                                <div class="icon"><i class="fa fa-heart"></i>
                                </div>

                                <h3><a href="javascript:void(0);">We love our customers</a></h3>
                                <p>We are known to provide best possible service ever</p>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="box same-height clickable">
                                <div class="icon"><i class="fa fa-tags"></i>
                                </div>

                                <h3><a href="javascript:void(0);">Best prices</a></h3>
                                <p>You can check that the height of the boxes adjust when longer text like this one is used in one of them.</p>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="box same-height clickable">
                                <div class="icon"><i class="fa fa-thumbs-up"></i>
                                </div>

                                <h3><a href="javascript:void(0);">100% satisfaction guaranteed</a></h3>
                                <p>Free returns on everything for 3 months.</p>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->

                </div>
                <!-- /.container -->

            </div>
            <!-- /#advantages -->

            <!-- *** ADVANTAGES END *** -->

            <!-- *** HOT PRODUCT SLIDESHOW ***-->
            <div id="hot">

                <div class="box">
                    <div class="container">
                        <div class="col-md-12">
                            <h2>Featured Raffle Products</h2>
                        </div>
                    </div>
                </div>


                <div class="container">
                    <div class="product-slider">
                      @if(!empty($product))
                      @foreach($product as $value)  
                        <div class="item">
                            <div class="product">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="{{url('/product-detail/'.$value->id)}}">
                                                <img src="{{url('img/'.$value->image)}}" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="{{url('/product-detail/'.$value->id)}}">
                                                <img src="{{url('img/'.$value->image_back)}}" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{url('/product-detail/'.$value->id)}}" class="invisible">
                                    <img src="{{url('img/'.$value->image_back)}}" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3><a href="{{url('/product-detail/'.$value->id)}}">{{$value->description}}</a></h3>
                                    <p class="price">${{$value->price}}</p>
                                </div>
                                <!-- /.text -->
                            </div>
                            <!-- /.product -->
                        </div>
                     @endforeach
                     @endif


                    </div>
                    <!-- /.product-slider -->
                </div>
                <!-- /.container -->

            </div>
            <!-- /#hot -->

            <!-- *** HOT END *** -->

            <!-- *** GET INSPIRED *** -->
            <div class="container" data-animate="fadeInUpBig">
                <div class="col-md-12">
                    <div class="box slideshow">
                        <h3>Get Inspired</h3>
                        <p class="lead">Get the inspiration from our world class designers</p>
                        <div id="get-inspired" class="owl-carousel owl-theme">
                            <div class="item">
                                <a href="javascript:void(0);">
                                    <img src="{{url('img/getinspired1.jpg')}}" alt="Get inspired" class="img-responsive">
                                </a>
                            </div>
                            <div class="item">
                                <a href="javascript:void(0);">
                                    <img src="{{url('img/getinspired2.jpg')}}" alt="Get inspired" class="img-responsive">
                                </a>
                            </div>
                            <div class="item">
                                <a href="javascript:void(0);">
                                    <img src="{{url('img/getinspired3.jpg')}}" alt="Get inspired" class="img-responsive">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- *** GET INSPIRED END *** -->

            <!-- *** BLOG HOMEPAGE *** -->

         <!--    <div class="box text-center" data-animate="fadeInUp">
                <div class="container">
                    <div class="col-md-12">
                        <h3 class="text-uppercase">From our blog</h3>

                        <p class="lead">What's new in the world of fashion? <a href="blog.html">Check our blog!</a>
                        </p>
                    </div>
                </div>
            </div> -->

            <div class="container">

                <div class="col-md-12" data-animate="fadeInUp">

                    <div id="blog-homepage" class="row">
                        <div class="col-sm-6">
                            <div class="post">
                                <h4><a href="javascript:void(0);">Fashion now</a></h4>
                                <p class="author-category">By <a href="javascript:void(0);">John Slim</a> in <a href="javascript:void(0);">Fashion and style</a>
                                </p>
                                <hr>
                                <p class="intro">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean
                                    ultricies mi vitae est. Mauris placerat eleifend leo.</p>
                                <p class="read-more"><a href="javascript:void(0);" class="btn btn-primary">Continue reading</a>
                                </p>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="post">
                                <h4><a href="javascript:void(0);">Who is who - example blog post</a></h4>
                                <p class="author-category">By <a href="javascript:void(0);">John Slim</a> in <a href="javascript:void(0);">About Minimal</a>
                                </p>
                                <hr>
                                <p class="intro">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean
                                    ultricies mi vitae est. Mauris placerat eleifend leo.</p>
                                <p class="read-more"><a href="javascript:void(0)" class="btn btn-primary">Continue reading</a>
                                </p>
                            </div>

                        </div>

                    </div>
                    <!-- /#blog-homepage -->
                </div>
           </div>

 @include('layouts/footer')