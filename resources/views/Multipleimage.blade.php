<!DOCTYPE html>
<html>
<head>
    <title>Multiple Image Upload</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
</head>
<body>
<div class="container">
  
    <div class="card mt-5">
        <h3 class="card-header p-3">Multiple Image Upload</h3>
        <div class="card-body">

            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>

                @foreach(session('images') as $image)
                    <img src="{{ asset('images/' . $image['name']) }}" width="300px" alt="Uploaded Image">
                @endforeach
            @endif

            <form action="{{ route('image.store') }}" method="POST" enctype="multipart/form-data" class="mt-2">
                @csrf
       
                <div class="mb-3">
                    <label class="form-label" for="inputImage">Select Images:</label>
                    <input 
                        type="file" 
                        name="images[]" 
                        id="inputImage"
                        multiple 
                        class="form-control @error('images') is-invalid @enderror">
      
                    @error('images')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
         
                <div class="mb-3">
                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Upload</button>
                </div>
             
            </form>
        </div>
    </div>
</div>
</body>
</html>
