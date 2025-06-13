@extends('base')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
        
            <div class="card shadow-sm border-0">
                <div class="card-header bg-light">
                    <h5 class="mb-0 text-secondary">Create New Cash-In Tag</h5>
                </div>

                <div class="card-body">
                    <form action="{{ route('cashintags.store') }}" method="POST">
                        @csrf

                        <!-- Tag Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Tag Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>

                        <!-- Description -->
                        <div class="mb-4">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>

                        <!-- Buttons -->
                        <button type="submit" class="btn btn-primary">Create Tag</button>
                        <a href="{{ route('tags') }}" class="btn btn-secondary ms-2">Back to Tag List</a>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</div>
@stop
