@extends('base')

@section('content')
<div class="container my-5">
    <div class="card shadow rounded">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Create Cash Out Tag</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('cashouttags.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Tag Name:</label>
                    <input type="text" id="name" name="name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description:</label>
                    <textarea id="description" name="description" class="form-control" rows="3"></textarea>
                </div>

                <button type="submit" class="btn btn-success">Create Tag</button>
                <a href="{{ route('tags') }}" class="btn btn-secondary ms-2">Back to Cash Out Tags</a>
            </form>
        </div>
    </div>
</div>
@stop
