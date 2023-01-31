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
            <div class="mb-5">
                <a href="{{route('post#home')}}" class="text-decoration-none text-white">
                    <i class="fa-solid fa-arrow-left"></i>
                    back
                </a>
            </div>
            <h3>{{ $post[0]['title'] }}</h3>
            <p class="text-muted">{{ $post[0]['description'] }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-6 offset-3">
            {{ $post[0]['updated_at']->format("d/M/Y")}}
        </div>
        <div class="col-2">
            <a href="{{route('post#edit',$post[0]['id'])}}" class="btn btn-secondary w-100">Edit</a>
        </div>
    </div>
</div>
@endsection
