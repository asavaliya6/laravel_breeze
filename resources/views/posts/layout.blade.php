<!DOCTYPE html>
<html>
<head>
    <title>CRUD Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    
    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body>
      
<div class="container">
    @yield('content')
</div>

<!-- jQuery (Required for Toastr) -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    toastr.options = {
        "closeButton": true,          
        "progressBar": true,          
        "positionClass": "toast-top-right", 
        "timeOut": "3000",             
        "extendedTimeOut": "1000",     
        "showEasing": "swing",         
        "hideEasing": "linear",       
        "showMethod": "fadeIn",        
        "hideMethod": "fadeOut"        
    };

    @if(session('success'))
        toastr.success("{{ session('success') }}");
    @endif

    @if(session('error'))
        toastr.error("{{ session('error') }}");
    @endif

    @if(session('warning'))
        toastr.warning("{{ session('warning') }}");
    @endif

    @if(session('info'))
        toastr.info("{{ session('info') }}");
    @endif
</script>
      
</body>
</html>
