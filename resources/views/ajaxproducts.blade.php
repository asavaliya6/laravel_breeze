<!DOCTYPE html>
<html>
<head>
    <title>Ajax CRUD</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" ></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
</head>
<body>
      
<div class="container">
    <div class="card mt-5">
        <h2 class="card-header"></i>Ajax Yajra CRUD</h2>
        <div class="card-body">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
                <a class="btn btn-success btn-sm" href="javascript:void(0)" id="createNewAjaxproduct"></i> Create New Ajaxproduct</a>
            </div>

            <table class="table table-bordered data-table">
            <thead>
                <tr>
                    <th>ID</th> 
                    <th>Name</th>
                    <th>Details</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    
</div>
     
<div class="modal fade" id="ajaxModel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
            </div>
            <div class="modal-body">
                <form id="ajaxproductForm" name="ajaxproductForm" class="form-horizontal">
                   <input type="hidden" name="ajaxproduct_id" id="ajaxproduct_id">
                   @csrf

                    <div class="alert alert-danger print-error-msg" style="display:none">
                        <ul></ul>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Name:</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="" maxlength="50">
                        </div>
                    </div>
       
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Details:</label>
                        <div class="col-sm-12">
                            <textarea id="detail" name="detail" placeholder="Enter Details" class="form-control"></textarea>
                        </div>
                    </div>
        
                    <div class="col-sm-offset-2 col-sm-10">
                     <button type="submit" class="btn btn-success mt-2" id="saveBtn" value="create"></i> Submit
                     </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="showModel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></i> Show Ajaxproduct</h4>
            </div>
            <div class="modal-body">
                <p><strong>Name:</strong> <span class="show-name"></span></p>
                <p><strong>Detail:</strong> <span class="show-detail"></span></p>
            </div>
        </div>
    </div>
</div>
      
</body>
      
<script type="text/javascript">
  $(function () {

    $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('ajaxproducts.index') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'detail', name: 'detail'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

    $('#createNewAjaxproduct').click(function () {
        $('#saveBtn').val("create-ajaxproduct");
        $('#ajaxproduct_id').val('');
        $('#ajaxproductForm').trigger("reset");
        $('#modelHeading').html("</i> Create New Ajaxproduct");
        $('#ajaxModel').modal('show');
    });

    $('body').on('click', '.showAjaxproduct', function () {
      var ajaxproduct_id = $(this).data('id');
      $.get("{{ route('ajaxproducts.index') }}" +'/' + ajaxproduct_id, function (data) {
          $('#showModel').modal('show');
          $('.show-name').text(data.name);
          $('.show-detail').text(data.detail);
      })
    });

    $('body').on('click', '.editAjaxproduct', function () {
      var ajaxproduct_id = $(this).data('id');
      $.get("{{ route('ajaxproducts.index') }}" +'/' + ajaxproduct_id +'/edit', function (data) {
          $('#modelHeading').html("Edit Ajaxproduct");
          $('#saveBtn').val("edit-user");
          $('#ajaxModel').modal('show');
          $('#ajaxproduct_id').val(data.id);
          $('#name').val(data.name);
          $('#detail').val(data.detail);
      })
    });

    $('#ajaxproductForm').submit(function(e) {
        e.preventDefault();
 
        let formData = new FormData(this);
        $('#saveBtn').html('Sending...');
  
        $.ajax({
                type:'POST',
                url: "{{ route('ajaxproducts.store') }}",
                data: formData,
                contentType: false,
                processData: false,
                success: (response) => {
                      $('#saveBtn').html('Submit');
                      $('#ajaxproductForm').trigger("reset");
                      $('#ajaxModel').modal('hide');
                      table.draw();
                },
                error: function(response){
                    $('#saveBtn').html('Submit');
                    $('#ajaxproductForm').find(".print-error-msg").find("ul").html('');
                    $('#ajaxproductForm').find(".print-error-msg").css('display','block');
                    $.each( response.responseJSON.errors, function( key, value ) {
                        $('#ajaxproductForm').find(".print-error-msg").find("ul").append('<li>'+value+'</li>');
                    });
                }
           });
      
    });

    $('body').on('click', '.deleteAjaxproduct', function () {
     
        var ajaxproduct_id = $(this).data("id");
        confirm("Are You sure want to delete?");
        
        $.ajax({
            type: "DELETE",
            url: "{{ route('ajaxproducts.store') }}"+'/'+ajaxproduct_id,
            success: function (data) {
                table.draw();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
       
  });
</script>
</html>
