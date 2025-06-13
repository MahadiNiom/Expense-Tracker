@extends('base')

@section('content')
<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="text-secondary">Cash Outs</h2>
        <a href="{{ route('cashouts.create') }}" class="btn btn-primary">Add New Cash Out</a>
    </div>

    <div class="mb-3">
        <strong>Total Cash Outs:</strong> {{ $total }}
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>Amount</th>
                    <th>Description</th>
                    <th>Tag</th>
                    <th style="width: 180px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($cashouts as $cashout)
                    <tr>
                        <td>${{ number_format($cashout->amount, 2) }}</td>
                        <td>{{ $cashout->description }}</td>
                        <td>{{ $cashout->cashOutTag->name }}</td>
                        <td>
                            <a href="{{ route('cashouts.show', $cashout->id) }}" class="btn btn-sm btn-info text-white">View</a>
                            <a href="{{ route('cashouts.edit', $cashout->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('cashouts.destroy', $cashout->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this entry?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted">No cash out records found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@stop
