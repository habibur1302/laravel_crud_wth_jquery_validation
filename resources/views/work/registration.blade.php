<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/main.css">
</head>

<body>

    <div class="container well" style="margin-top: 50px">

        <form action="{{URL::to('/registration/insert')}}" method="POST" id="register-form" enctype="multipart/form-data">
            @csrf
            <fieldset>
                <legend>Sign up for a business account</legend>
            </fieldset>
            @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @endif
            <p>Create a login</p>

            <div class="form-group col-md-12">
                <label>Applicant's Name</label>
                <div class="error-msg">
                    <input class="form-control" name="applicant_name" id="applicant_name" placeholder="Applicant's Name" type="text">

                </div>
            </div>

            <div class="form-group col-md-12">
                <label>Email Address</label>
                <!-- <div class="error-msg"> -->
                <input class="form-control" name="email" id="email" placeholder="Email address" type="email">
                <span id="error_email"></span>
                <!--  </div> -->
            </div>
            <div class="form-group col-md-12">
                <label>Mailing Address</label>
                <input class="form-control" name="mail_address" id="mail_address" placeholder="Mailing Address" type="email">
                <span id="error_email"></span>
                <!--  </div> -->

            </div>
            <div class="form-group col-md-4">
                <label>Division</label>
                <select name="division" id="division" class="form-control">
                    <option value="">Select Division</option>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label>District</label>
                <select name="district" id="district" class="form-control ">
                    <option value="">Select District</option>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label>Upazila / Thana</label>
                <select name="thana" id="thana" class="form-control ">
                    <option value="">Select Upazila / Thana </option>
                </select>
            </div>
            <div class="form-group col-md-12">
                <label>Mailing Address</label>
                <div class="error-msg">
                    <textarea class="form-control" name="address" id="address" placeholder="Mailing Address" type="text"></textarea>

                </div>
            </div>
            <br>
            <div class="form-group col-md-12">
                <label >Language Proficiency : </label>
                <label class="checkbox-inline">
                    <input type="checkbox" name="language"  value="bangla">Bangla
                </label>
                <label class="checkbox-inline">
                    <input type="checkbox" name="language"  value="english">English
                </label>
                <label class="checkbox-inline">
                    <input type="checkbox" name="language"  value="french">French
                </label>
            </div>

            <div class="form-group col-md-12">
                <label>Education Qualification</label>
                <table class="table table-bordered" id="item_table" name
                ="education">
                    <tr>
                        <th>Exam Name</th>
                        <th>University</th>
                        <th>Board</th>
                        <th>Result</th>
                        <th>
                            <button type="button" name="add" class="btn btn-success btn-sm add"><span class="glyphicon glyphicon-plus"></span></button>
                        </th>
                    </tr>

                </table>

            </div>

            <div class="form-group col-md-6">
                <label>Photo</label>

                <input type="file" name="photo" id="photo" class="form-control" data-type='image'>
                <div>
                    <span id="error_image"></span>
                </div>

            </div>
            <div class="form-group col-md-6">
                <label>CV Attachment</label>

                <input type="file" name="cv" id="cv" class="form-control">
                <div>
                    <span id="error_cv"></span>
                </div>
            </div>

            <div class="form-group col-md-12">
                <label>Training&nbsp; &nbsp;</label>
                <input type="radio" class="radioBtn" name="radioBtn" id="yes" value="yes" /> YES &nbsp;
                <input type="radio" class="radioBtn" name="radioBtn" value="no" checked/> NO &nbsp;
                <table class="table table-bordered" id="btnhide">
                    <td>
                        <input type="text" name="training_name[]" placeholder="Training Name" class="form-control name_list" />
                    </td>
                    <td>
                        <input type="text" name="training_details[]" placeholder="Training Details" class="form-control name_list" />
                    </td>
                    <td>
                        <button type="button" name="add2" id="add2" class="btn btn-success">Add More</button>
                    </td>

                </table>
            </div>

            <div class="form-group col-md-12">
                <input class="btn btn-primary" id="submit-button" type="submit" value="Sign Up">
            </div>

        </form>
    </div>

    <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.1.3.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/additional-methods.js"></script>
    <script src="js/validation.js"></script>

</body>

</html>
<script type="text/javascript">
  $(document).ready(function(){
    //........Education Qulification........

    $(document).on('click', '.add', function(){
  var html = '';
  html += '<tr>';
  html += '<td><select name="exam[]" class="form-control"  ><option value="">Select Exam Name</option><option value="hsc">HSC</option><option value="ssc">SSC</option><option value="psc">PSC</option></select></td>';
  html += '<td><select name="university[]" class="form-control"  ><option value="">Select University</option><option value="a">A</option><option value="b">B</option><option value="c">C</option></select></td>';
  html += '<td><select name="board[]" class="form-control"  ><option value="">Select Board</option><option value="dhaka">Dhaka</option><option value="barisal">Barisal</option><option value="khulna">Khulna</option></select></td>';
   html += '<td><input type="text" name="result[]" placeholder="Result" class="form-control name_list" /></td>';
  html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><span class="glyphicon glyphicon-minus"></span></button></td></tr>';
  $('#item_table').append(html);
 });
 
 $(document).on('click', '.remove', function(){
  $(this).closest('tr').remove();
 });
 
 $('#insert_form').on('submit', function(event){
  event.preventDefault();
  var error = '';
  $('.item_name').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Enter Item Name at "+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });
  
  $('.item_quantity').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Enter Item Quantity at "+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });
  
  $('.item_unit').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Select Unit at "+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });
  var form_data = $(this).serialize();
  if(error == '')
  {
   $.ajax({
    url:"insert.php",
    method:"POST",
    data:form_data,
    success:function(data)
    {
     if(data == 'ok')
     {
      $('#item_table').find("tr:gt(0)").remove();
      $('#error').html('<div class="alert alert-success">Item Details Saved</div>');
     }
    }
   });
  }
  else
  {
   $('#error').html('<div class="alert alert-danger">'+error+'</div>');
  }
 });


    //................email already check.......

 $('#email').blur(function(){
  var error_email = '';
  var email = $('#email').val();
  var _token = $('input[name="_token"]').val();
  var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  if(!filter.test(email))
  {    
   $('#error_email').html('<label class="text-danger">Invalid Email</label>');
   // $('#email').addClass('has-error');
   // $('#submit-button').attr('disabled', 'disabled');
  }
  else
  {
   $.ajax({
    url:"{{ route('registration.check') }}",
    method:"POST",
    data:{email:email, _token:_token},
    success:function(result)
    {
     if(result == 'unique')
     {
      $('#error_email').html('<label class="text-success">Email Available</label>');
      $('#email').removeClass('has-error');
      $('#submit-button').attr('disabled', false);
     }
     else
     {
      $('#error_email').html('<label class="text-danger">Email not Available</label>');
      $('#email').addClass('has-error');
      $('#submit-button').attr('disabled', 'disabled');
     }
    }
   })
  }
 });
 //.........division json...........

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


      // //......image validation
      // $('#photo').change(function(){
      //   var filetype=["jpg","png",'gif'];
      //   if($.inArray($(this).val().split('.').pop().toLowerCase(),filetype)==-1){

      //     $('#error_image').text("Upload only image type");
      //     $('#error_image').css('color','red');
      //     $("#photo").val("");
      //   } else{
      //     $('#error_image').text("");
      //   }

      //   });

      // //......cv validation.........

      // $('#cv').change(function(){
      //   var filetype2=["pdf","docx","doc"];
      //   if($.inArray($(this).val().split('.').pop().toLowerCase(),filetype2)==-1){

      //     $('#error_cv').text("Upload only cv type");
      //     $('#error_cv').css('color','red');
      //     $("#cv").val("");
      //   } else{
      //     $('#error_cv').text("");
      //   }

      //   });


            //......training.....
      {
        
      }
      $(function() {
    $('input[name=radioBtn]').on('click init-post-format', function() {
        $('#btnhide').toggle($('#yes').prop('checked'));
    }).trigger('init-post-format');
});
      var i=1;  
      $('#add2').click(function(){  
           i++;  
           $('#btnhide').append('<tr id="row'+i+'"><td> <input type="text" name="training_name[]" placeholder="Training Name" class="form-control name_list" /><td><input type="text" name="training_details[]" placeholder="Training Details" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      });  
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  
      $('#submit').click(function(){            
           $.ajax({  
                url:"name.php",  
                method:"POST",  
                data:$('#add_name').serialize(),  
                success:function(data)  
                {  
                     alert(data);  
                     $('#add_name')[0].reset();  
                }  
           });  
      });

      });





 


</script>