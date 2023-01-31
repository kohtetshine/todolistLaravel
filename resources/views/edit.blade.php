@extends('main')

@section('content')
<div class="container">
    <div class="row mt-5">
        <div class="col-6 offset-3">
            <div class="mb-5">
                <a href="{{route('post#update', $post['id'])}}" class="text-decoration-none text-white">
                    <i class="fa-solid fa-arrow-left"></i>
                    back
                </a>
            </div>
            <form action="{{route('post#updatedata')}}" class="form" method="post">
                @csrf
                <input type="hidden" name="id" value="{{$post['id']}}">
                <div class="mb-5">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="postTitle" class="form-control @error('postTitle') is-invalid @enderror" value=" {{ $post['title']}}">
                    @error('postTitle')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="des" class="form-label">Description</label>
                    <textarea id="des" cols="30" rows="10" name="postDes" class="form-control @error('postDes') is-invalid @enderror">{{$post['description']}}</textarea>
                    @error('postDes')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <input type="submit" class="btn btn-primary float-end">
            </form>
        </div>
    </div>
    <!-- <div class=" row">
        <div class="col-2 offset-8">
            <button type="button" class="btn btn-primary w-100">Update</button>
        </div>
    </div> -->
</div>
@endsection
