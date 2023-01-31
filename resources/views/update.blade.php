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
            <h3>{{ $post['title'] }}</h3>
            <p class="text-muted">{{ $post['description'] }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-2 offset-8">
            <a href="{{route('post#edit',$post['id'])}}" class="btn btn-secondary w-100">Edit</a>
        </div>
    </div>
</div>
@endsection
