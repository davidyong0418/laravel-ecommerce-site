@include('layouts/header')

    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">

                    <ul class="breadcrumb">
                        <li><a href="{{url('/')}}">Home</a>
                        </li>
                        <li>My Raffle booked Detail
                        </li>
                        <!-- <li>Order # 1735</li> -->
                    </ul>

                </div>

                <div class="col-md-3">
                    <!-- *** CUSTOMER MENU *** -->
                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">Customer section</h3>
                        </div>

                        <div class="panel-body">

                            <ul class="nav nav-pills nav-stacked">
                                <li class="active">
                                    <a href="{{url('raffle-order')}}"><i class="fa fa-list"></i> Raffle Booked Details</a>
                                </li>
                               <!--  <li>
                                    <a href="customer-wishlist.html"><i class="fa fa-heart"></i> My wishlist</a>
                                </li> -->
                                <li>
                                    <a href="{{url('/user-detail/'.Auth::user()->id)}}"><i class="fa fa-user"></i> My account</a>
                                </li>
                                <li>
                                    <a href="{{url('/logout')}}"><i class="fa fa-sign-out"></i> Logout</a>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <!-- /.col-md-3 -->

                    <!-- *** CUSTOMER MENU END *** -->
                </div>

                <div class="col-md-9" id="customer-order">
                    <div class="box">
                      <h1 style="text-align:center;">My Raffle Details</h1>

                       <!-- <p class="lead">Order #1735 was placed on <strong>22/06/2013</strong> and is currently <strong>Being prepared</strong>.</p>
                        <p class="text-muted">If you have any questions, please feel free to <a href="contact.html">contact us</a>, our customer service center is working for you 24/7.</p> -->

                        <hr>

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th colspan="2">Product</th>
                                        <th>Amount Paid</th>
                                        <th>Ticket No.</th>
                                        <th>Raffle Status </th>
                                       
                                    </tr>
                                </thead>
                                <tbody>

                            @if(!empty($order))  

                            @foreach($order as $value)   

                                    <tr>
                                        <td><img src="{{url('/img/'.$value->Pdetail->image)}}" alt="White Blouse Armani"></td>
                                        <td>{{$value->Pdetail->product_name}}</td>                                      
                                        <td>{{$value->amount}}</td>
                                       <td>{{$value->order_number}}</td>
                                        <td>Pending</td>

                                    </tr>
                            @endforeach        
                            @else 
                                    <tr>                                       
                                        <td colspan="3"> No data found</td>
                                    </tr>
                            @endif       
                                  
                                </tbody>
                             <!--    <tfoot>
                                    <tr>
                                        <th colspan="5" class="text-right">Order subtotal</th>
                                        <th>$446.00</th>
                                    </tr>
                                    <tr>
                                        <th colspan="5" class="text-right">Shipping and handling</th>
                                        <th>$10.00</th>
                                    </tr>
                                    <tr>
                                        <th colspan="5" class="text-right">Tax</th>
                                        <th>$0.00</th>
                                    </tr>
                                    <tr>
                                        <th colspan="5" class="text-right">Total</th>
                                        <th>$456.00</th>
                                    </tr>
                                </tfoot> -->
                            </table>

                        </div>
                        <!-- /.table-responsive -->

                        <div class="row addresses">
                           <!--  <div class="col-md-6">
                                <h2>Invoice address</h2>
                                <p>John Brown
                                    <br>13/25 New Avenue
                                    <br>New Heaven
                                    <br>45Y 73J
                                    <br>England
                                    <br>Great Britain</p>
                            </div> -->
                            <div class="col-md-12">
                                <h3>Shipping address if Raffle Win</h3>
                @if(!empty($order[0]))  
                
                                <p>{{$order[0]->Udetail->address}}
                                    
                                    <br>{{$order[0]->Udetail->city}}
                                    <br>{{$order[0]->Udetail->state}}
                                    <br>{{$order[0]->Udetail->country}}
                                    <br>Contact:{{$order[0]->Udetail->telephone}}
                                    <br>Pin:{{$order[0]->Udetail->zip}}</p>
                   
              @else 
                         <p> Address not Found
                         </p>         
             @endif       

                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->
@include('layouts/footer')
