@include('admin/header')
@include('admin/sidebar')
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
    User Management
    </div>
    <div class="row w3-res-tb">
     
    <div class="table-responsive">
     <table class="table" id="user-manage-table">
    <thead>
    
        <tr>
            <th class="text-center">Sr.No.</th>
            <th class="text-center">User Name</th>
            <th class="text-center">E-mail</th>
            <!-- <th class="text-center">Password</th> -->
            <th class="text-center">Created at</th>
            <th class="text-center">Updated at</th>
            <th class="text-center">Actions</th>
        </tr>

    </thead>
    <tbody>
      @if(!empty($users))
      @php($a = 1)
    @foreach($users as $value)
        <tr>
            <td style="text-align:center;">{{$a++}}</td>
            <td style="text-align:center;">{{$value->name}}</td>
            <td style="text-align:center;">{{$value->email}}</td>
            <!-- <td style="text-align:center;">1</td> -->
            <td style="text-align:center;">{{$value->created_at}}</td>
            <td style="text-align:center;">{{$value->updated_at}}</td>
            <td style="text-align:center;">
                    <a href="<?php echo url('admin/user-manage') ?>/edit/{{$value->id}}"  class="user-manage-actions">
                        <i class="fa fa-edit"></i>
                    </a>
                    <!-- <a href="">
                        <i class="fa fa-eye"></i>
                    </a> -->
                    <a data-id="{{$value->id}}" class="grid-row-delete user-manage-actions"  data-toggle="modal" data-target="#DeleteModal" >
                        <i class="fa fa-trash"></i>
                    </a>
                                    
            </td>
        </tr>
            @endforeach
    @else
    <tr>
            <td class="text-center" colspan="7">No data found</td>
          
        </tr>

    @endif
    </tbody>
</table>
    </div>
 
  </div>
</div>
</section>

<div class="modal fade" id="DeleteModal" role="dialog">
        <div class="modal-dialog ">
        
        <!-- Modal content-->
            <div class="modal-content modal-user-delete">
                <form action="{{url('admin/user-manage')}}" method="post" accept-charset="UTF-8"pjax-container="">
                    {{ csrf_field() }}
                    <input type="hidden" name="delete_id" class="delete_modal_id" />
                    <div class="modal-header custom-modal-header">
                        <button type="submit" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Delete User</h4>
                    </div>
                    <div class="modal-body">
                            <div class="text-center">
                                <i class="fa fa-check fa-4x mb-3 animated rotateIn"></i>
                                <p>Are you sure to delete this user?
                                </p>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success waves-effect waves-light">Confirm
                            <i class="fa fa-diamond ml-1"></i>
                        </button>
                        <a type="button" class="btn btn-default" data-dismiss="modal">Cancel</a>
                    
                    </div>
                </form>
            </div>
        
        </div>
  </div>
<script>
    
  $(document).ready(function() {
    $('#user-manage-table').DataTable();
    $('.grid-row-delete').click(function() {
        $('.delete_modal_id').val($(this).data('id'));
        $('.delete_modal_id').val($(this).data('id'));
    });
});
 
</script>
@include('admin/footer')
