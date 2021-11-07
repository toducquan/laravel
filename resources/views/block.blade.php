@extends('template')
@section('content')
    <form action="/block" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">User Id</label>
            <input class="form-control"  name="user_id">
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
@endsection
