@include('layouts/header')
    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a>
                        </li>
                        <li>Checkout - Order review</li>
                    </ul>
                </div>

                <div class="col-md-12" id="checkout">

                    <div class="box">
                        <form method="post" action="https://www.sandbox.paypal.com/cgi-bin/webscr">
                                    <input type="hidden" name="business" value="jatin12@gmail.com"> 
                                    <input type="hidden" name="cmd" value="_xclick"> 
                                    <input type="hidden" name="item_name" value="{{Request::segment(3)}}"> 
                                    <input type="hidden" name="item_number" value="{{$data[0]->id}}">
                                    <input type="hidden" name="amount" value="{{$data[0]->price - $data[0]->discount_price}}">   
                                    <input type="hidden" name="currency_code" value="USD">   
                                    <input type="hidden" name="cancel_return" value="{{ route('payment-success') }}"> 
                                    <input type="hidden" name="return" value="{{ route('payment-success') }}">
                            <h1>Checkout - Order review</h1>
                            <ul class="nav nav-pills nav-justified">
                                <li><a href="{{url('checkout/'.Request::segment(2).'/'.Request::segment(3))}}"><i class="fa fa-map-marker"></i><br>Address</a>
                                </li>
                           <!--      <li><a href="checkout2.html"><i class="fa fa-truck"></i><br>Delivery Method</a>
                                </li>
                                <li><a href="checkout3.html"><i class="fa fa-money"></i><br>Payment Method</a>
                                </li> -->
                                <li class="active"><a href="{{url('order-review/'.Request::segment(2).'/'.Request::segment(3))}}"><i class="fa fa-eye"></i><br>Order Review</a>
                                </li>
                            </ul>

                            <div class="content">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th colspan="2">Product</th>
                                              
                                                <th>Unit price</th>
                                                <th>Discount</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                   @if(!empty($data))     
                                            <tr>
                                                <td><img src="{{url('img/'.$data[0]->image)}}" alt="Product Img"></td>
                                                <td>{{$data[0]->product_name}}</td>
                                                <td>$ {{$data[0]->price}}</td>
                                                <td>$ {{$data[0]->discount_price}}</td>
                                                <td>$ {{$data[0]->price - $data[0]->discount_price}}</td>
                                            </tr>
                                   @else  
                                   <tr>
                                                <td colspan="4">No data found</td>
                                             
                                                 
                                            </tr> 
                                   @endif
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="5">Total</th>
                                                <th>$ {{$data[0]->price - $data[0]->discount_price}}</th>
                                            </tr>
                                        </tfoot>
                                    </table>

                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.content -->

                            <div class="box-footer">
                                <div class="pull-left">
                                    <a href="{{url('checkout/'.Request::segment(2).'/'.Request::segment(3))}}" class="btn btn-default"><i class="fa fa-chevron-left"></i>Back to address</a>
                                </div>
                                <div class="pull-right">
                                    <input type="submit" class="btn btn-primary" value="Checkout Paypal"/>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.box -->


                </div>
                <!-- /.col-md-9 -->

            <!--     <div class="col-md-3">

                    <div class="box" id="order-summary">
                        <div class="box-header">
                            <h3>Order summary</h3>
                        </div>
                        <p class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</p>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Order subtotal</td>
                                        <th>$446.00</th>
                                    </tr>
                                    <tr>
                                        <td>Shipping and handling</td>
                                        <th>$10.00</th>
                                    </tr>
                                    <tr>
                                        <td>Tax</td>
                                        <th>$0.00</th>
                                    </tr>
                                    <tr class="total">
                                        <td>Total</td>
                                        <th>$456.00</th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div> -->
                <!-- /.col-md-3 -->

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->


@include('layouts/footer')