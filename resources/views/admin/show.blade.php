@extends('admin.master') 
@section('content') 

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>


<div class="container">
	
<h4 style="text-align: center;">ALL STUDENT DATA</h4>
<div>
<input type="text" class="form-control" name="search" id="search" placeholder="search">

</div>
          @if (session('UpdateMesg'))
        <div class="alert alert-success">
        {{ session('UpdateMesg') }}
         </div>
        @endif
<table class="table">
    <thead>
      <tr>
               
                <th>Applicant Name</th>
                <th>Email</th>
                <th>Division</th>
                <th>District </th>
                <th>Upazila / Thana</th>
                <th>Insert Date</th>
                <th>Action</th>
      </tr>
    </thead>
    <tbody>
    	@foreach($data_obj as $data)
      <tr>
        <td>{{$data['applicant_name']}}</td>
        <td>{{$data['email']}}</td>
        <td>{{$data['division']}}</td>
        <td>{{$data['district']}}</td>
        <td>{{$data['thana']}}</td>
        <td>{{$data['created_at']}}</td>
        <td><a href="{{URL::to('/admin/edit/'.$data['id'])}}" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i>Edit</a></td>
        
      </tr>
      @endforeach
      
    </tbody>
  </table>
  {!!$data_obj ->render() !!}	
		</div>
		<script type="text/javascript">
			$('#search').on('keyup',function(){
				$value=$(this).val();
				$.ajax({
					type:'get',
					url :'{{URL::to('search')}}',
					data:{'search':$value},
					success:function(data){
						$('tbody').html(data);
					}
				})

			});
		</script>




@endsection