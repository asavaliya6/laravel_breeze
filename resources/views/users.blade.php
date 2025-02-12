<!DOCTYPE html>
<html>
<head>
    <title>Scout Search</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
</head>
<body>
        
<div class="container">
    <div class="card mt-5">
        <h3 class="card-header p-3"></i> Scout Search</h3>
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
      
            <table class="table table-bordered mt-3">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                </tr>
                @endforeach
            </table>
      
        </div>
    </div>
</div>
         
</body>
</html>
