@extends('layouts.base')
@section('title')
    Posts
@endsection
@section('content')
    <section class="posts-section">
        <h2 class="visually-hidden">Posts</h2>
        <ul class="posts-section__actions">
            <li><a href="{{ route('posts.create') }}">Create new post</a></li>
        </ul>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Category</th>
                    <th scope="col">Tag</th>
                    <th scope="col">Description</th>
                    <th scope="col">Publication date</th>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->category->category_name  }}</td>
                        <td>{{ $post->tag?->title }}</td>
                        <td>{{ $post->description }}</td>
                        <td>{{ $post->publication_date }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <footer class="d-flex justify-content-between align-items-center mt-2">
            <form method="GET" action="{{ route('posts.index') }}">
                <select class="form-select mb-3" name="per_page" onchange="this.form.submit()">
                    @php($currentPerPage = request()->query('per_page') ?: 10)
                    <option selected value="{{ $currentPerPage }}">{{ $currentPerPage }}</option>
                    @php($optionPerPage = $currentPerPage === '10' ? '20' : '10')
                    <option value="{{ $optionPerPage }}">{{ $optionPerPage }}</option>
                </select>
            </form>
            {{ $posts->links("pagination::bootstrap-5") }}
        </footer>
    </section>
@endsection
