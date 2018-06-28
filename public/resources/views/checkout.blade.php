@include('layouts/header')
    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a>
                        </li>
                        <li>Checkout - Address</li>
                    </ul>
                </div>

                <div class="col-md-9" id="checkout">

                    <div class="box">
                        <form method="post" action="">
                               <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                            <h1>Checkout</h1>
                            <ul class="nav nav-pills nav-justified">
                                <li class="active"><a href="#"><i class="fa fa-map-marker"></i><br>Address</a>
                                </li>
                                <li class="disabled"><a href="#"><i class="fa fa-truck"></i><br>Delivery Method</a>
                                </li>
                                <li class="disabled"><a href="#"><i class="fa fa-money"></i><br>Payment Method</a>
                                </li>
                                <li class="disabled"><a href="#"><i class="fa fa-eye"></i><br>Order Review</a>
                                </li>
                            </ul>

                            <div class="content">
                                 <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="firstname">Name</label>
                                        <input name ="fname" type="text" value="@if(!empty(Auth::user()->name)){{Auth::user()->name}}@endif" class="form-control" id="name">
                                        @if ($errors->has('name'))
                                  <div class="error">{{ $errors->first('name') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" name="email" value="@if(!empty(Auth::user()->email)){{Auth::user()->email}}@endif" class="form-control" id="email">
                                        @if ($errors->has('email'))
                                  <div class="error">{{ $errors->first('email') }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                                <!-- /.row -->

                              <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="company">address</label>
                                       <textarea name ="address" class="form-control">@if(!empty(Auth::user()->address)){{Auth::user()->address}}@endif</textarea>
                                       @if ($errors->has('address'))
                                     <div class="error">{{ $errors->first('address') }}</div>
                                        @endif
                                    </div>
                                </div>
                               
                            </div>
                                <!-- /.row -->

                                 <div class="row">
                                <div class="col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label for="city">city</label>
                                        <input type="text" name ="city" class="form-control" value="@if(!empty(Auth::user()->city)){{Auth::user()->city}}@endif" id="city">
                                        @if ($errors->has('city'))
                                  <div class="error">{{ $errors->first('city') }}</div>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label for="state">state</label>
                                       <input type="text" class="form-control" name="state" value="@if(!empty(Auth::user()->state)){{Auth::user()->state}}@endif" />
                                       @if ($errors->has('state'))
                                  <div class="error">{{ $errors->first('state') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label for="country">country</label>
                                       <input type="text" class="form-control" name="country" value="@if(!empty(Auth::user()->country)){{Auth::user()->country}}@endif" value=""/>
                                       @if ($errors->has('country'))
                                  <div class="error">{{ $errors->first('country') }}</div>
                                        @endif
                                    </div>
                                </div>
                               

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="phone">Telephone</label>
                                        <input type="text" name="phone" value="@if(!empty(Auth::user()->telephone)){{Auth::user()->telephone}}@endif" class="form-control" id="phone">
                                        @if ($errors->has('phone'))
                                  <div class="error">{{ $errors->first('phone') }}</div>
                                        @endif
                                    </div>
                                </div>
                                   <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="phone">ZIP</label>
                                        <input type="text" name="zip" value="@if(!empty(Auth::user()->zip)){{Auth::user()->zip}}@endif" class="form-control" id="phone">
                                        @if ($errors->has('zip'))
                                  <div class="error">{{ $errors->first('zip') }}</div>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="col-sm-12 text-center">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save changes</button>

                                </div>
                            </div>
                                <!-- /.row -->
                            </div>

                            <div class="box-footer">
                                <div class="pull-left">
                                    <a href="{{url('/product-detail')}}" class="btn btn-default"><i class="fa fa-chevron-left"></i>Back</a>
                                </div>
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-primary">Continue to Checkout<i class="fa fa-chevron-right"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.box -->


                </div>
                <!-- /.col-md-9 -->

                <div class="col-md-3">

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

                </div>
                <!-- /.col-md-3 -->

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->
@include('layouts/footer')