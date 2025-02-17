@foreach ($loads as $load)
<div class="card mb-2"> 
    <div class="card-body">{{ $load->id }} 
        <h5 class="card-title">{{ $load->title }}</h5>
        {!! $load->body !!}
    </div>
</div>
@endforeach
