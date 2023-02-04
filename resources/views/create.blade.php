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
            <div class="row">
                <h3 class="ms-3 col-auto">
                    Total - {{ $posts->total() }}
                </h3>
                <form action="{{route('post#createPage')}}" method="get" class="offset-4 col-auto row">
                    <div class="col-auto ms-auto">
                        <input type="text" class="form-control" id="search" placeholder="Enter Search Key" name="searchkey" value="{{ request('searchkey') }}">
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary mb-3">Search</button>
                    </div>
                </form>
            </div>
            <div class="container p-3 text-dark">
                @if (count($posts)!=0)
                    @foreach ($posts as $item )
                    <div class="bg-info p-3 rounded shadow text-end mb-3">
                        <div class="row">
                            <h3 class="text-start col-9"> {{ $item['title'] }}</h3>
                            <h5 class="col-3">{{$item['updated_at']->format("d/M/Y")}}</h5>
                        </div>
                        <p class="text-start">{{ Str::words($item['description'], 10 ,'. . . ') }}</p>

                        <div class="text-start m-0 p-0 d-flex flex-row justify-content-between">
                            <div class="">
                                <i class="fa-solid fa-money-bill-1 text-primary"></i> <small>{{ $item['price'] }} MMK</small> |
                                <i class="fa-solid fa-location-dot text-danger"></i> <small>{{ $item['address'] }}</small> |
                                <small>{{ $item['rating'] }}</small> <i class="fa-solid fa-star text-warning"></i>
                            </div>
                            <div>
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
                            </div>
                        </div>
                    </div>
                    @endforeach
                @else
                    <h3 class="text-danger text-center">There is no data</h3>
                @endif
            </div>
            {{ $posts->appends(request()->query())->links() }}
        </div>
    </div>
</div>
@endsection
