@extends('base')

@section('content')
<div class="container my-5">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-light">
            <h5 class="mb-0 text-secondary">Cash-In Details</h5>
        </div>

        <div class="card-body">
            <div class="mb-3">
                <strong>Amount:</strong>
                <span class="ms-2">{{ $cashin->amount }}</span>
            </div>

            <div class="mb-3">
                <strong>Description:</strong>
                <span class="ms-2">{{ $cashin->description ?? 'N/A' }}</span>
            </div>

            <div class="mb-3">
                <strong>Tag:</strong>
                <span class="ms-2">{{ $cashin->cashInTag->name }}</span>
            </div>

            <a href="{{ route('cashins.index') }}" class="btn btn-secondary mt-3">Back to Cash-In List</a>
        </div>
    </div>
</div>
@stop
