@extends('main')

@section('content')
<div class="container">
    <!-- <a href=""><i class="fa-solid fa-arrow-left"></i></a>
    <div>
        <form action="" class="form">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control">
        </form>
    </div> -->
    <div class="row mt-5">
        <div class="col-6 offset-3">
            <div class="mb-3">
                <a href="{{route('post#home')}}" class="text-decoration-none text-white">
                    <i class="fa-solid fa-arrow-left"></i>
                    back
                </a>
            </div>
            <h3 class="mb-3">{{ $post[0]['title'] }}</h3>
            <div>
                <span class="badge bg-light text-dark p-2 mx-1"><i class="fa-solid fa-money-bill-1"></i> {{ $post[0]['price']}}</span>
                <span class="badge bg-light text-dark p-2 mx-1"><i class="fa-solid fa-location-dot "></i> {{ $post[0]['address']}}</span>
                <span class="badge bg-light text-dark p-2 mx-1">{{ $post[0]['rating']}} <i class="fa-solid fa-star "></i></span>
                <span class="badge bg-light text-dark p-2 mx-1"><i class="fa-solid fa-calendar-day"></i> {{ $post[0]['updated_at']->format("d/M/Y")}} </span>
                <span class="badge bg-light text-dark p-2 mx-1"><i class="fa-solid fa-clock"></i> {{ $post[0]['updated_at']->format("h:m")}} </span>
            </div>
            <div class="container my-3">
                @if ( @isset($post[0]['image']))
                <img src="{{ asset('storage/'.$post[0]['image']) }}" alt="" class="img-thumbnail">
                @else
                <img src="{{ asset('error.jpg') }}" alt="" class="img-thumbnail">
                @endif

            </div>
            <p class="text-muted mt-3">{{ $post[0]['description'] }}</p>
            <a href="{{route('post#edit',$post[0]['id'])}}" class="btn btn-secondary float-end w-25">Edit</a>
        </div>
    </div>


</div>
@endsection
