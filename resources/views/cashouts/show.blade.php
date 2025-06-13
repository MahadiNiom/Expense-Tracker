@extends('base')

@section('content')
<div class="container my-5">
    <div class="card shadow rounded">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Cash Out Details</h4>
        </div>
        <div class="card-body">
            <p><strong>Cash Out ID:</strong> {{ $cashout->id }}</p>
            <p><strong>Amount:</strong> ${{ number_format($cashout->amount, 2) }}</p>
            <p><strong>Description:</strong> {{ $cashout->description }}</p>
            <p><strong>Tag:</strong> {{ $cashout->cashOutTag->name }}</p>
            <p><strong>Created At:</strong> {{ $cashout->created_at->format('F j, Y, g:i a') }}</p>
            <p><strong>Updated At:</strong> {{ $cashout->updated_at->format('F j, Y, g:i a') }}</p>
        </div>
        <div class="card-footer text-end">
            <a href="{{ route('cashouts.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </div>
</div>
@stop
