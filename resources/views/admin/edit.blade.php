@extends('admin.master') 
@section('content')         


<form class="form-horizontal" action="{{URL::to('/admin/update/'.$data['id'])}}" method="post">
    @csrf
    <div class="form-group">
        <label class="control-label col-sm-2" for="email">Applicant's Name:</label>
        <div class="col-sm-10">
            <input name="applicant_name" type="text" class="form-control" value="{{$data['applicant_name']}}">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="pwd">Email Address:</label>
        <div class="col-sm-10">
            <input type="email" name="email" class="form-control" value="{{$data['email']}}">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2">Division:</label>
        <div class="col-sm-10">
            <select name="division" id="division" class="form-control">
                <option value="{{$data['division']}}">{{$data['division']}}</option>

            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="email">District:</label>
        <div class="col-sm-10">
            <select name="district" id="district" class="form-control ">
                <option value="{{$data['division']}}">{{$data['division']}}</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="email">Upazila / Thana:</label>
        <div class="col-sm-10">
            <select name="thana" id="thana" class="form-control ">
                <option value="{{$data['thana']}}">{{$data['thana']}}</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
</div>

  <script type="text/javascript">
  $(document).ready(function(){

   load_json_data('division');

 function load_json_data(id, parent_id)
 {
  var html_code = '';
  $.getJSON('country_state_city.json', function(data){

   html_code += '<option value="">Select '+id+'</option>';
   $.each(data, function(key, value){
    if(id == 'division')
    {
     if(value.parent_id == '0')
     {
      html_code += '<option value="'+value.id+'">'+value.name+'</option>';
     }
    }
    else
    {
     if(value.parent_id == parent_id)
     {
      html_code += '<option value="'+value.id+'">'+value.name+'</option>';
     }
    }
   });
   $('#'+id).html(html_code);
  });

 }

 $(document).on('change', '#division', function(){
  var division_id = $(this).val();
  if(division_id != '')
  {
   load_json_data('district', division_id);
  }
  else
  {
   $('#district').html('<option value="">Select district</option>');
   $('#thana').html('<option value="">Select thana</option>');
  }
 });
 $(document).on('change', '#district', function(){
  var state_id = $(this).val();
  if(state_id != '')
  {
   load_json_data('thana', state_id);
  }
  else
  {
   $('#thana').html('<option value="">Select city</option>');
  }
 });
});
</script>

@endsection
