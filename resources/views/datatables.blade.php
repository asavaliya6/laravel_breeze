<!DOCTYPE html>
<html>
<head>
    <title>Yajra Datatables</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="card">
        <h3 class="card-header">Yajra Datatables</h3>
        <div class="card-body">
            <table class="table table-bordered data-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>

<script type="text/javascript">
  $(function () {
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('datatables') }}",
        columns: [
            {data: 'id', name: 'id'},        
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'role.name', name: 'role.name'} 
        ]
    });
  });
</script>

</body>
</html>
