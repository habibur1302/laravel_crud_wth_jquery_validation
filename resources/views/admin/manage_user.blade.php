
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>       
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mark.js/8.0.0/jquery.mark.min.js"></script>

</head>
<body>
	<div class="container">
	    <br />
    <h3 align="center">Datatables Server Side Processing in Laravel</h3>
    <br />
    <table id="student_table" class="table table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name333</th>
            </tr>
        </thead>
    </table>
    </div>
</div>
</body>
</html>




<script type="text/javascript">
$(document).ready(function() {
	// alert('kkk');
     $('#student_table').Datatable({
        "processing": true,
        "serverSide": true,
        "ajax": "{{ route('admin.data') }}",
        "columns":[
            { "data": "applicant_name" },
            { "data": "email" }

        ]
     });
});
</script>

