<!DOCTYPE html>
<html>
<head>
    <title>Scout Search with Delete</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
        
<div class="container">
    <div class="card mt-5">
        <h3 class="card-header p-3">Scout Search with Delete</h3>
        <div class="card-body">
    
            <form method="GET">
                <div class="input-group mb-3">
                  <input 
                    type="text" 
                    name="search" 
                    value="{{ request()->get('search') }}" 
                    class="form-control" 
                    placeholder="Search..." 
                    aria-label="Search" 
                    aria-describedby="button-addon2">
                  <button class="btn btn-success" type="submit" id="button-addon2">Search</button>
                </div>
            </form>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <table class="table table-bordered mt-3">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <form method="POST" action="{{ route('users.destroy', $user->id) }}" class="delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center">No users found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
      
        </div>
    </div>
</div>

<script type="text/javascript">
    $(".delete-form").on("submit", function(e){
        e.preventDefault();
        var form = this;

        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });
</script>

</body>
</html>
