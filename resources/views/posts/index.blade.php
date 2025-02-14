@extends('posts.layout')
   
@section('content')
  
<div class="card mt-5">
  <h2 class="card-header">CRUD</h2>
  <div class="card-body">
  
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-success btn-sm" href="{{ route('posts.create') }}"> <i class="fa fa-plus"></i> Create New Post</a>
        </div>
  
        <table class="table table-bordered table-striped mt-4">
            <thead>
                <tr>
                    <th width="80px">No</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
  
            <tbody>
            @forelse ($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->name }}</td>
                    <td>{{ $post->detail }}</td>
                    <td>
                        <form action="{{ route('posts.destroy',$post->id) }}" method="POST">
             
                            <a class="btn btn-info btn-sm" href="{{ route('posts.show',$post->id) }}">Show</a>
              
                            <a class="btn btn-primary btn-sm" href="{{ route('posts.edit',$post->id) }}">Edit</a>
             
                            @csrf
                            @method('DELETE')
                
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">There are no data.</td>
                </tr>
            @endforelse
            </tbody>
  
        </table>
        
        {!! $posts->links() !!}
  
  </div>
</div>  
@endsection