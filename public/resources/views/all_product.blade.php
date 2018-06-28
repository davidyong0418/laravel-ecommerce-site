@include('layouts/header')
    <!-- /#navbar -->

    <!-- *** NAVBAR END *** -->

    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
<!-- 
                    <ul class="breadcrumb">
                        <li><a href="{{url('/')}}">Home</a>
                        </li>
                        <li>Ladies</li>
                    </ul> -->

                    <!-- <div class="box">
                        <h1>Ladies</h1>
                        <p>In our Ladies department we offer wide selection of the best products we have found and carefully selected worldwide.</p>
                    </div> -->

                    <div class="box info-bar">
                        <div class="row">
                            <div class="col-sm-12 col-md-4 products-showing">
                                Showing <strong>{{count($product)}}</strong> of <strong>{{count($product)}}</strong> products
                            </div>

                         <!--    <div class="col-sm-12 col-md-8  products-number-sort">
                                <div class="row">
                                    <form class="form-inline">
                                        <div class="col-md-6 col-sm-6">
                                            <div class="products-number">
                                                <strong>Show</strong>  <a href="#" class="btn btn-default btn-sm btn-primary">12</a>  <a href="#" class="btn btn-default btn-sm">24</a>  <a href="#" class="btn btn-default btn-sm">All</a> products
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="products-sort-by">
                                                <strong>Sort by</strong>
                                                <select name="sort-by" class="form-control">
                                                    <option>Price</option>
                                                    <option>Name</option>
                                                    <option>Sales first</option>
                                                </select>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div> -->
                        </div>
                    </div>

                    <div class="row products">

@if(!empty($product))
@foreach($product as $value)


                        <div class="col-md-3 col-sm-4">
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
                                    <h3><a href="{{url('/product-detail/'.$value->id)}}">{{$value->product_name}}</a></h3>
                                    <p class="price">${{$value->price}}</p>
                                    <p class="buttons">
                                       <!--  <a href="{{url('/product-detail/'.$value->id)}}" class="btn btn-default">View detail</a> -->
                              
                                        <a href="{{url('/product-detail/'.$value->id)}}" class="btn btn-primary"><i class="fa fa-ticket"></i>Buy Ticket</a>
                                    </p>
                                </div>
                                <!-- /.text -->
                            </div>
                            <!-- /.product -->
                        </div>

@endforeach
@endif           

                    </div>
                    <!-- /.products -->

                    <div class="pages">

                        <p class="loadMore">
                            <a href="#" class="btn btn-primary btn-lg"><i class="fa fa-chevron-down"></i> Load more</a>
                        </p>

                        <ul class="pagination">
                            <li><a href="#">&laquo;</a>
                            </li>
                            <li class="active"><a href="#">1</a>
                            </li>
                            <li><a href="#">2</a>
                            </li>
                            <li><a href="#">3</a>
                            </li>
                            <li><a href="#">4</a>
                            </li>
                            <li><a href="#">5</a>
                            </li>
                            <li><a href="#">&raquo;</a>
                            </li>
                        </ul>
                    </div>


                </div>
                <!-- /.col-md-9 -->

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->


        <!-- *** FOOTER *** -->
      @include('layouts/footer')