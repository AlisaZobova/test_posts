@extends('layouts.base')
@section('title')
    New Post
@endsection
@section('content')
    @if ($errors->any())
        <section class="alert alert-danger mt-4 mb-0 w-75 mx-auto">
            <h2 class="visually-hidden">Errors</h2>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </section>
    @endif
    <form class="w-75 mx-auto pt-4 text-center" action="{{ route('posts.store') }}" method="post"
          enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="postInfo" class="form-label mb-3">Upload your json/xml file</label>
            <input required class="form-control" type="file" id="postInfo" name="post_info" accept=".xml,.json">
        </div>
        <button class="btn btn-success" type="submit">Create</button>
    </form>
@endsection
