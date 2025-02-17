@extends('posts.layout')
  
@section('content')

<div class="card mt-5">
  <h2 class="card-header">Show Post</h2>
  <div class="card-body">
  
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-primary btn-sm" href="{{ route('posts.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
    </div>
  
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>ID</strong> <br/>
            {{ $post->id }}
        </div>
            <div class="form-group">
                <strong>Name:</strong> <br/>
                {{ $post->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
            <div class="form-group">
                <strong>Details:</strong> <br/>
                {{ $post->detail }}
            </div>
        </div>
        <div class="form-group">
            <strong>Image:</strong> <br/>
            @if($post->image)
                <img src="{{ asset('storage/'.$post->image) }}" width="200" alt="Post Image">
            @else
                <p>No image uploaded</p>
            @endif
        </div>
    </div>
  
  </div>
</div>
@endsection