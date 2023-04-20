@extends('layouts.base')
@section('title')
    Download
@endsection
@section('content')
    <section class="text-center">
        <h4 class="mt-4">Choose dates for posts filtering and file type</h4>
        <form action="{{ route('posts.download') }}" method="get" class="w-75 mx-auto mt-4">
            <div class="d-flex justify-content-between">
                <div class="w-25">
                    <label for="start" class="pb-2">Start date</label>
                    <input required type="date" class="form-control" id="start" name="start_date">
                </div>
                <div class="w-25">
                    <label for="end" class="pb-2">End date</label>
                    <input required type="date" class="form-control" id="end" name="end_date">
                </div>
                <div class="w-25">
                    <label for="ext" class="pb-2">File type</label>
                    <select class="form-select" name="file_type" id="ext">
                        <option selected value="json">json</option>
                        <option value="xml">xml</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-4">Download</button>
        </form>
    </section>
@endsection
