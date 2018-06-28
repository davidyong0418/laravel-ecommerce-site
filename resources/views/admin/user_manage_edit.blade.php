@include('admin/header') 
@include('admin/sidebar')
<section id="main-content">
    <section class="wrapper">
        <div class="table-agile-info">
            <div class="panel panel-default">
                <div class="panel-heading">
                    users
                </div>
                <div class="row w3-res-tb user-detail-cotent">

                    <div class="table-responsive">

                        <div class="col-md-12">
                            <div class="box box-info">
                                <div class="box-header with-border">
                                    <div class="box-tools">
                                       
                                        <div class="btn-group pull-right" style="margin-right: 10px">
                                        </div>
                                    </div>
                                </div>
                                <!-- /.box-header -->
                                <!-- form start -->
                                <form action="<?php echo url('admin/user-manage') ?>/edit/{{$user->id}}" method="post" accept-charset="UTF-8" class="form-horizontal" pjax-container="">

                                    <div class="box-body">

                                        <div class="nav-tabs-custom">

                                            <div class="tab-content fields-group">

                                                <div class="tab-pane active" id="tab-form-1">
                                                    <div class="form-group ">
                                                        <label class="col-sm-2 control-label">Id</label>
                                                        <div class="col-sm-8 control-user-label">
                                                            <div class="box box-solid box-default no-margin">
                                                                <!-- /.box-header -->
                                                                <div class="box-body">
                                                                    {{$user->id}}
                                                                </div>
                                                                <!-- /.box-body -->
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="form-group  ">

                                                        <label for="name" class="col-sm-2 control-label">Name</label>

                                                        <div class="col-sm-8">

                                                            <div class="input-group">

                                                                <span class="input-group-addon"><i class="fa fa-pencil"></i></span>

                                                                <input type="text" id="name" name="name" value="{{$user->name}}" class="form-control name" placeholder="Input Name">
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="form-group  ">

                                                        <label for="email" class="col-sm-2 control-label">Email</label>

                                                        <div class="col-sm-8">

                                                            <div class="input-group">

                                                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>

                                                                <input type="email" id="email" name="email" value="{{$user->email}}" class="form-control email" placeholder="Input Email">
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label class="col-sm-2 control-label">Created at</label>
                                                        <div class="col-sm-8 control-user-label">
                                                            <div class="box box-solid box-default no-margin">
                                                                <!-- /.box-header -->
                                                                <div class="box-body">
                                                                    {{$user->created_at}}
                                                                </div>
                                                                <!-- /.box-body -->
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label class="col-sm-2 control-label">Updated at</label>
                                                        <div class="col-sm-8 control-user-label">
                                                            <div class="box box-solid box-default no-margin">
                                                                <!-- /.box-header -->
                                                                <div class="box-body">
                                                                    {{$user->updated_at}}
                                                                </div>
                                                                <!-- /.box-body -->
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.box-body -->
                                    <div class="box-footer row">

                                        {{ csrf_field() }}
                                        <div class="col-md-2">

                                        </div>
                                        <div class="col-md-8">

                                            <div class="btn-group pull-right ">
                                                <button type="submit" class="btn btn-info pull-right" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Submit">Save</button>
                                            </div>

                                            <div class="btn-group pull-right">
                                                <a href="<?php echo url('admin/user-manage') ?>/edit/{{$user->id}}" class="btn btn-warning">Reset</a>
                                            </div>
                                            <div class="btn-group pull-right">
                                                <a class="btn btn-default form-history-back" href="{{url('admin/user-manage')}}"><i class="fa fa-arrow-left"></i>&nbsp;Back</a>
                                            </div>
                                        </div>

                                    </div>

                                    <input type="hidden" name="_previous_" value="http://laravel-admin.org/demo/users" class="_previous_">
                                    <!-- /.box-footer -->
                                </form>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>
    

@include('admin/footer')