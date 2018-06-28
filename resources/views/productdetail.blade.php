@include('layouts/header')

<style>



#clockdiv{

    font-family: sans-serif;

    color: #fff;

    display: inline-block;

    font-weight: 100;

    text-align: center;

    font-size: 30px;

}



#clockdiv > div{

    padding: 10px;

    border-radius: 3px;

    background: #00BF96;

    display: inline-block;

}



#clockdiv div > span{

    padding: 15px;

    border-radius: 3px;

    background: #00816A;

    display: inline-block;

}



.smalltext{

    padding-top: 5px;

    font-size: 16px;

}

</style>



    <div id="all">



        <div id="content">

            <div class="container">



               <!--  <div class="col-md-12">

                    <ul class="breadcrumb">

                        <li><a href="{{url('/')}}">Home</a>

                        </li>

                        <li><a href="{{url('/products')}}">Ladies</a>

                        </li>

                        <li><a href="javascript:void(0);">Tops</a>

                        </li>

                        <li>White Blouse Armani</li>

                    </ul>



                </div> -->



                <div class="col-md-3">

                    <!-- *** MENUS AND FILTERS *** -->

                    <div class="panel panel-default sidebar-menu">



                        <div class="panel-heading">

                            <h3 class="panel-title">Categories</h3>

                        </div>



                        <div class="panel-body">

                            <ul class="nav nav-pills nav-stacked category-menu">

                                <li>

                                    <a href="category.html">Men <span class="badge pull-right">42</span></a>

                                    <ul>

                                        <li><a href="{{url('/products')}}">T-shirts</a>

                                        </li>

                                        <li><a href="{{url('/products')}}">Shirts</a>

                                        </li>

                                        <li><a href="{{url('/products')}}">Pants</a>

                                        </li>

                                        <li><a href="{{url('/products')}}">Accessories</a>

                                        </li>

                                    </ul>

                                </li>

                                <li class="active">

                                    <a href="category.html">Ladies  <span class="badge pull-right">123</span></a>

                                    <ul>

                                        <li><a href="{{url('/products')}}">T-shirts</a>

                                        </li>

                                        <li><a href="{{url('/products')}}">Skirts</a>

                                        </li>

                                        <li><a href="{{url('/products')}}">Pants</a>

                                        </li>

                                        <li><a href="{{url('/products')}}">Accessories</a>

                                        </li>

                                    </ul>

                                </li>

                                <li>

                                    <a href="category.html">Kids  <span class="badge pull-right">11</span></a>

                                    <ul>

                                        <li><a href="{{url('/products')}}">T-shirts</a>

                                        </li>

                                        <li><a href="{{url('/products')}}">Skirts</a>

                                        </li>

                                        <li><a href="{{url('/products')}}">Pants</a>

                                        </li>

                                        <li><a href="{{url('/products')}}">Accessories</a>

                                        </li>

                                    </ul>

                                </li>



                            </ul>



                        </div>

                    </div>



                    <!-- <div class="panel panel-default sidebar-menu">



                        <div class="panel-heading">

                            <h3 class="panel-title">Brands <a class="btn btn-xs btn-danger pull-right" href="#"><i class="fa fa-times-circle"></i> Clear</a></h3>

                        </div>



                        <div class="panel-body">



                            <form>

                                <div class="form-group">

                                    <div class="checkbox">

                                        <label>

                                            <input type="checkbox">Armani (10)

                                        </label>

                                    </div>

                                    <div class="checkbox">

                                        <label>

                                            <input type="checkbox">Versace (12)

                                        </label>

                                    </div>

                                    <div class="checkbox">

                                        <label>

                                            <input type="checkbox">Carlo Bruni (15)

                                        </label>

                                    </div>

                                    <div class="checkbox">

                                        <label>

                                            <input type="checkbox">Jack Honey (14)

                                        </label>

                                    </div>

                                </div>



                                <button class="btn btn-default btn-sm btn-primary"><i class="fa fa-pencil"></i> Apply</button>



                            </form>



                        </div>

                    </div>

 -->

      <!--               <div class="panel panel-default sidebar-menu">



                        <div class="panel-heading">

                            <h3 class="panel-title">Colours <a class="btn btn-xs btn-danger pull-right" href="#"><i class="fa fa-times-circle"></i> Clear</a></h3>

                        </div>



                        <div class="panel-body">



                            <form>

                                <div class="form-group">

                                    <div class="checkbox">

                                        <label>

                                            <input type="checkbox"> <span class="colour white"></span> White (14)

                                        </label>

                                    </div>

                                    <div class="checkbox">

                                        <label>

                                            <input type="checkbox"> <span class="colour blue"></span> Blue (10)

                                        </label>

                                    </div>

                                    <div class="checkbox">

                                        <label>

                                            <input type="checkbox"> <span class="colour green"></span> Green (20)

                                        </label>

                                    </div>

                                    <div class="checkbox">

                                        <label>

                                            <input type="checkbox"> <span class="colour yellow"></span> Yellow (13)

                                        </label>

                                    </div>

                                    <div class="checkbox">

                                        <label>

                                            <input type="checkbox"> <span class="colour red"></span> Red (10)

                                        </label>

                                    </div>

                                </div>



                                <button class="btn btn-default btn-sm btn-primary"><i class="fa fa-pencil"></i> Apply</button>



                            </form>



                        </div>

                    </div>

 -->

                    <!-- *** MENUS AND FILTERS END *** -->



                    <!-- <div class="banner">

                        <a href="#">

                            <img src="img/banner.jpg" alt="sales 2014" class="img-responsive">

                        </a>

                    </div> -->

                </div>



                <div class="col-md-9">

@if(!empty($product))

                    <div class="row" id="productMain">

                        <div class="col-sm-6">

                            <div id="mainImage">

                                <img src="{{url('img/'.$product[0]->image)}}" alt="" class="img-responsive">

                            </div>



                            <div class="ribbon sale">

                                <div class="theribbon">SALE</div>

                                <div class="ribbon-background"></div>

                            </div>

                            <!-- /.ribbon -->



                            <div class="ribbon new">

                                <div class="theribbon">NEW</div>

                                <div class="ribbon-background"></div>

                            </div>

                            <!-- /.ribbon -->



                        </div>

<?php 

            $start_date  = strtotime($product[0]->raffle_end);

            $get_raffel =   date('r', $start_date);



?>







                        <div class="col-sm-6">

                            <div class="box">

                                <h1 class="text-center">{{$product[0]->product_name}}</h1>

                                <p class="goToDescription"><a href="#details" class="scroll-to">Scroll to product details, material & care and sizing</a>

                                </p>

                                <p>

                                @if($start_date > strtotime(date('Y-m-d h:i:s')))

                                    <div id="clockdiv">

                                      <div>

                                        <span class="days"></span>

                                        <div class="smalltext">Days</div>

                                      </div>

                                      <div>

                                        <span class="hours"></span>

                                        <div class="smalltext">Hours</div>

                                      </div>

                                      <div>

                                        <span class="minutes"></span>

                                        <div class="smalltext">Minutes</div>

                                      </div>

                                      <div>

                                        <span class="seconds"></span>

                                        <div class="smalltext">Seconds</div>

                                      </div>

                                    </div>

                                @endif

                                </p>

                                <p class="price">${{$product[0]->price}}</p>

                               @if($start_date > strtotime(date('Y-m-d h:i:s')))

                              <label for="price-min"><b>Total Tickets:{{$product[0]->total_ticket}}</b></label><span style="float:right;"> <b>Ticket Left: 2 </b></span>



                                <p class="text-center buttons">

                             

                               

                                 <a href="{{url('/checkout/'.$product[0]->id.'/'.Auth::user()->id)}}" class="btn btn-primary"><i class="fa fa-ticket"></i> Buy Ticket</a> 

                               </p>  

                                @else

                                <p class="text-center buttons">

                                   <a href="javascript:void(0);" class="btn btn-primary"><i class="fa fa-ticket"></i> Raffel End See Winner</a> 

                                    <!-- <a href="basket.html" class="btn btn-default"><i class="fa fa-heart"></i> Add to wishlist</a> -->

                                  </p>

                                @endif

                             





                            </div>



                            <div class="row" id="thumbs">

                                <div class="col-xs-4">

                                    <a href="{{url('img/'.$product[0]->image)}}" class="thumb">

                                        <img src="{{url('img/'.$product[0]->image)}}" alt="" class="img-responsive">

                                    </a>

                                </div>

                                <div class="col-xs-4">

                                    <a href="{{url('img/'.$product[0]->image)}}" class="thumb">

                                        <img src="{{url('img/'.$product[0]->image)}}" alt="" class="img-responsive">

                                    </a>

                                </div>

                                <div class="col-xs-4">

                                    <a href="{{url('img/'.$product[0]->image)}}" class="thumb">

                                        <img src="{{url('img/'.$product[0]->image)}}" alt="" class="img-responsive">

                                    </a>

                                </div>

                            </div>

                        </div>

                        <script type="text/javascript">



function getTimeRemaining(endtime) {

  var t = Date.parse(endtime) - Date.parse(new Date());

  var seconds = Math.floor((t / 1000) % 60);

  var minutes = Math.floor((t / 1000 / 60) % 60);

  var hours = Math.floor((t / (1000 * 60 * 60)) % 24);

  var days = Math.floor(t / (1000 * 60 * 60 * 24));

  return {

    'total': t,

    'days': days,

    'hours': hours,

    'minutes': minutes,

    'seconds': seconds

  };

}



function initializeClock(id, endtime) {

  var clock = document.getElementById(id);

  var daysSpan = clock.querySelector('.days');

  var hoursSpan = clock.querySelector('.hours');

  var minutesSpan = clock.querySelector('.minutes');

  var secondsSpan = clock.querySelector('.seconds');



  function updateClock() {

    var t = getTimeRemaining(endtime);



    daysSpan.innerHTML = t.days;

    hoursSpan.innerHTML = ('0' + t.hours).slice(-2);

    minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);

    secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);



    if (t.total <= 0) {

      clearInterval(timeinterval);

    }

  }



  updateClock();

  var timeinterval = setInterval(updateClock, 1000);

}



var deadline = new Date('<?php echo $get_raffel ; ?>');

initializeClock('clockdiv', deadline);</script>

@endif



                    </div>





                    <div class="box" id="details">

                        <p>

                            <h4>Product details</h4>

                            <p>White lace top, woven, has a round neck, short sleeves, has knitted lining attached</p>

                          

                          



                            <hr>

                            <div class="social">

                                <h4>Show it to your friends</h4>

                                <p>

                                    <a href="#" class="external facebook" data-animate-hover="pulse"><i class="fa fa-facebook"></i></a>

                                    <a href="#" class="external gplus" data-animate-hover="pulse"><i class="fa fa-google-plus"></i></a>

                                    <a href="#" class="external twitter" data-animate-hover="pulse"><i class="fa fa-twitter"></i></a>

                                    <a href="#" class="email" data-animate-hover="pulse"><i class="fa fa-envelope"></i></a>

                                </p>

                            </div>

                    </div>



                 



                



                </div>

                <!-- /.col-md-9 -->

            </div>

            <!-- /.container -->

        </div>

 @include('layouts/footer')





       