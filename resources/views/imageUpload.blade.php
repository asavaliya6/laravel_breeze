<!DOCTYPE html>
<html>
<head>
    <title>Generate Thumbnail Image</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
</head>
        
<body>
<div class="container">
  
    <div class="card mt-5">
        <h3 class="card-header p-3">Generate Thumbnail Image</h3>
        <div class="card-body">

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
  
            @if(session('success'))
                <div class="alert alert-success" role="alert"> 
                    {{ session('success') }}
                </div>

                <div class="row mt-3">
                    <div class="col-md-6">
                        <strong>Original Image:</strong>
                        <br/>
                        <img src="/images/{{ session('imageName') }}" width="300px" />
                    </div>
                    <div class="col-md-6">
                        <strong>Thumbnail Image:</strong>
                        <br/>
                        <img src="/images/{{ session('thumbnailName') }}" />
                    </div>
                </div>
            @endif

            
            <form action="{{ route('image.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
        
                <div class="mb-3">
                    <label class="form-label" for="inputImage">Image:</label>
                    <input 
                        type="file" 
                        name="image" 
                        id="inputImage"
                        class="form-control @error('image') is-invalid @enderror">
        
                    @error('image')
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
