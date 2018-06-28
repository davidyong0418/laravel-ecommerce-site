@include('admin/header')
@include('admin/sidebar')
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
    Raffle Details
    </div>
    <div class="row w3-res-tb">
     
    <div class="table-responsive">
     <table class="table" id="table">
    <thead>
    
        <tr>
            <th class="text-center">Sr.No.</th>
            <th class="text-center">Product Name</th>
            <th class="text-center">Image</th>
            <th class="text-center">Price</th>
            <th class="text-center">Total Tickets</th>
            <th class="text-center">Booked Tickets</th>
            <th class="text-center">Raffle End Date</th>
            <th class="text-center">Status</th>
            <th class="text-center">Actions</th>
        </tr>

    </thead>
    <tbody>
      @if(!empty($data))
      @php($a = 1)
    @foreach($data as $value)
        <tr>
            <td style="text-align:center;">{{$a++}}</td>
            <td style="text-align:center;">{{$value->product_name}}</td>
            <td style="text-align:center;"><img style="width:50px;" src="{{url('img/'.$value->image)}}" alt="Product Img"/></td>
            <td style="text-align:center;">{{$value->price}}</td>
            <td style="text-align:center;">{{$value->total_ticket}}</td>
            <td style="text-align:center;">{{ $value->booked}}</td>
            <td style="text-align:center;">{{date('g:ia \o\n l jS F Y',strtotime($value->raffle_end))}}</td>
            @if($value->raffle_end < date('Y-m-d H:i:s'))
            <td style="text-align:center;color:red;">Date Over</td>
            @elseif($value->total_ticket <= $value->booked)
            <td style="text-align:center;color:blue;">Ready to Run Raffle</td>
            @else
            <td style="text-align:center;color:green;">Running</td>
            @endif
            @if($value->total_ticket <= $value->booked)
            <td style="text-align:center;"><a title="Run Ruffle" href="javascript:void(0);"><img width="25px" src="{{url('admin/images/mario.gif')}}"/>&nbsp;<a title="View Tickets" href="javascript:void(0);"><i class="fa fa-search"></i></a></td>
          
            @else
            <td style="text-align:center;"><a href="javascript:void(0);"><i class="fa fa-search"></i></a></td>
            @endif
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
<script>
    
  $(document).ready(function() {
    $('#table').DataTable();
});

</script>
@include('admin/footer')
