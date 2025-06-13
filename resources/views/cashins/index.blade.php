@extends('base')

@section('content')
<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="text-secondary">Cash-In Records</h4>
        <a href="{{ route('cashins.create') }}" class="btn btn-primary">Create New Cash-In</a>
    </div>

    <div class="mb-3">
        <strong>Total Value:</strong> {{ $total }}
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <table class="table table-hover table-striped mb-0">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Amount</th>
                        <th>Description</th>
                        <th>Tag</th>
                        <th>Created</th>
                        <th>Updated</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($cashins as $cashin)
                        <tr>
                            <td>{{ $cashin->id }}</td>
                            <td>{{ $cashin->amount }}</td>
                            <td>{{ $cashin->description }}</td>
                            <td>{{ $cashin->cashInTag->name }}</td>
                            <td>{{ $cashin->created_at->format('Y-m-d H:i') }}</td>
                            <td>{{ $cashin->updated_at->format('Y-m-d H:i') }}</td>
                            <td>
                                <a href="{{ route('cashins.edit', $cashin->id) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                                <form action="{{ route('cashins.destroy', $cashin->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to delete this entry?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted">No cash-in records found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop
