@extends('base')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow-sm border-0">
                <div class="card-header bg-light">
                    <h5 class="mb-0 text-secondary">Edit Cash-In Tag</h5>
                </div>

                <div class="card-body">
                    <form action="{{ route('cashintags.update', $cashintag->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Tag Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Tag Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ $cashintag->name }}" required>
                        </div>

                        <!-- Description -->
                        <div class="mb-4">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="description" class="form-control" rows="3">{{ $cashintag->description }}</textarea>
                        </div>

                        <!-- Buttons -->
                        <button type="submit" class="btn btn-primary">Update Tag</button>
                        <a href="{{ route('tags') }}" class="btn btn-secondary ms-2">Cancel</a>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@stop
