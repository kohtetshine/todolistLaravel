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
            <form action="{{route('post#updatedata')}}" class="form" method="post" enctype="multipart/form-data">
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
                <div class="mb-3">
                    <label for="photo" class="form-label">Image</label>
                    <input type="file" id="photo" class="form-control @error('image') is-invalid @enderror" name="image">
                    @error('image')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="fee" class="form-label">Fee</label>
                    <input type="number" class="form-control @error('fee') is-invalid @enderror" id="fee" name="fee" value="{{$post['price']}}">
                    @error('fee')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{$post['address']}}">
                    @error('address')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="rate" class="form-label">Rating</label>
                    <input type="number" min="0" max="5" class="form-control @error('rate') is-invalid @enderror" id="rate" name="rate" value="{{$post['rating']}}">
                    @error('rate')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
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
