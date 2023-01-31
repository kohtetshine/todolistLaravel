@extends('main')

@section('content')
<div class="container">
    <div class="row mt-3">
        <div class="col-5">
            <div class="p-3">
                @if (session('insert'))
                <div>
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                        <strong>{{session('insert')}}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
                @endif
                @if ($errors->all())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form action="{{route('post#create')}}" method="post" class="form">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control @error('postTitle') is-invalid @enderror" id="title" name="postTitle" value="{{old('postTitle')}}">
                        @error('postTitle')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="des" class="form-label">Description</label>
                        <textarea id="des" cols="30" rows="10" class="form-control @error('postDes') is-invalid @enderror"" name=" postDes">{{old('postDes')}}</textarea>
                        @error('postDes')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                        @enderror
                    </div>
                    <input type="submit" value="Create" class="btn btn-success">
                </form>
            </div>
        </div>
        <div class="col-7">
            <h3 class="ms-3">
                Total - {{ $posts->total() }}
            </h3>
            <div class="container p-3 text-dark">
                @foreach ($posts as $item )
                <div class="bg-info p-3 rounded shadow text-end mb-3">
                    <div class="row">
                        <h3 class="text-start col-9"> {{ $item['title'] }}</h3>
                        <h5 class="col-3">{{$item['updated_at']->format("d/M/Y")}}</h5>
                    </div>
                    <p class="text-start">{{ Str::words($item['description'], 10 ,'. . . ') }}</p>
                    <span>
                        <a href="{{route('post#delete',$item['id'])}}" class="text-decoration-none">
                            <button class="btn btn-danger">
                                <i class="fa-solid fa-trash"></i> Delete
                            </button>
                        </a>
                        <a href="{{route('post#update',$item['id'])}}" class="text-decoration-none">
                            <button class="btn btn-primary">
                                <i class="fa-solid fa-file-lines"></i> See More
                            </button>
                        </a>
                    </span>
                </div>
                @endforeach
            </div>
            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection
