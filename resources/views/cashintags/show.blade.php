@extends('base')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow-sm border-0">
                <div class="card-header bg-light">
                    <h5 class="mb-0 text-secondary">Cash-In Tag Details</h5>
                </div>

                <div class="card-body">
                    <div class="mb-3">
                        <strong>Tag Name:</strong>
                        <span class="ms-2">{{ $tag->name }}</span>
                    </div>

                    <div class="mb-3">
                        <strong>Tag Description:</strong>
                        <span class="ms-2">{{ $tag->description ?? 'N/A' }}</span>
                    </div>

                    <div class="mb-3">
                        <strong>Created At:</strong>
                        <span class="ms-2">{{ $tag->created_at->format('F j, Y g:i A') }}</span>
                    </div>

                    <div class="mb-3">
                        <strong>Updated At:</strong>
                        <span class="ms-2">{{ $tag->updated_at->format('F j, Y g:i A') }}</span>
                    </div>

                    <a href="{{ route('tags') }}" class="btn btn-secondary mt-3">Back to Tag List</a>
                </div>
            </div>

        </div>
    </div>
</div>
@stop
