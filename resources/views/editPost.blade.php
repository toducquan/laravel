@extends('template')
@section('content')
    <form action="/edit/{{ $post['id'] }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input class="form-control" name="title" value="{{ $post['title'] }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Content</label>
            <input class="form-control" name="contents">
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
@endsection
