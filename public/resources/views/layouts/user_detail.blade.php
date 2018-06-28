@include('layouts/header')
    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">

                    <ul class="breadcrumb">
                        <li><a href="#">Home</a>
                        </li>
                        <li>My account</li>
                    </ul>

                </div>

                <div class="col-md-3">
                    <!-- *** CUSTOMER MENU ***-->
                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">Customer section</h3>
                        </div>

                        <div class="panel-body">

                            <ul class="nav nav-pills nav-stacked">
                                <li class="@if(Request::is('/')) active @endif">
                                    <a href="javascript:void(0);"><i class="fa fa-list"></i> My orders</a>
                                </li>
                                <li class="@if(Request::is('/')) active @endif">
                                    <a href="javascript:void(0);"><i class="fa fa-heart"></i> My wishlist</a>
                                </li>
                                <li class="@if(Request::is('user-detail/*')) active @endif">
                                    <a href="{{url('user-detail/'.Auth::user()->id)}}"><i class="fa fa-user"></i> My account</a>
                                </li>
                                <li class="@if(Request::is('/')) active @endif">
                                    <a href="{{url('logout')}}"><i class="fa fa-sign-out"></i> Logout</a>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <!-- /.col-md-3 -->

                    <!-- *** CUSTOMER MENU END *** -->
                </div>

                <div class="col-md-9">
                    <div class="box">
                        <h1>My account</h1>  @if(Session::has('message'))
        <div class="alert alert-success"> {{Session::get('message')}} </div>
      @endif
                        <p class="lead">Change your personal details here.</p>
                        <p class="text-muted">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>

                       <!--  <h3>Change password</h3> -->

                   <!--      <form>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="password_old">Old password</label>
                                        <input type="password" class="form-control" id="password_old">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="password_1">New password</label>
                                        <input type="password" class="form-control" id="password_1">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="password_2">Retype new password</label>
                                        <input type="password" class="form-control" id="password_2">
                                    </div>
                                </div>
                            </div>
                       

                            <div class="col-sm-12 text-center">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save new password</button>
                            </div>
                        </form> -->

                        <hr>

                        <h3>Personal details</h3>
                @if(!empty($data))       
                        <form action="" method="post">
                            <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="firstname">Name</label>
                                        <input name ="fname" type="text" value="@if(!empty($data->name)){{$data->name}}@endif" class="form-control" id="name">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" name="email" value="@if(!empty($data->email)){{$data->email}}@endif" class="form-control" id="email">
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="company">address</label>
                                       <textarea name ="address" class="form-control">@if(!empty($data->address)){{$data->address}}@endif</textarea>
                                    </div>
                                </div>
                               
                            </div>
                            <!-- /.row -->

                            <div class="row">
                                <div class="col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label for="city">city</label>
                                        <input type="text" name ="city" class="form-control" value="@if(!empty($data->city)){{$data->city}}@endif" id="city">
                                    </div>
                                </div>
                                
                                <div class="col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label for="state">state</label>
                                       <input type="text" class="form-control" name="state" value="@if(!empty($data->city)){{$data->city}}@endif" />
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label for="country">country</label>
                                       <input type="text" class="form-control" name="country" value="@if(!empty($data->country)){{$data->country}}@endif" value=""/>
                                    </div>
                                </div>
                               

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="phone">Telephone</label>
                                        <input type="text" name="phone" value="@if(!empty($data->telephone)){{$data->telephone}}@endif" class="form-control" id="phone">
                                    </div>
                                </div>
                                   <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="phone">ZIP</label>
                                        <input type="text" name="zip" value="@if(!empty($data->zip)){{$data->zip}}@endif" class="form-control" id="phone">
                                    </div>
                                </div>
                                
                                <div class="col-sm-12 text-center">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save changes</button>

                                </div>
                            </div>
                        </form>
                        @endif
                    </div>
                </div>

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->
        @include('layouts/footer')
