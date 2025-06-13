@extends('base')

@section('content')

<div class="container my-5">
    <div class="row mb-4">
        <!-- CashIn Tags -->
        <div class="col-md-6">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-light d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 text-secondary">Cash-In Tags</h5>
                    <a href="{{ route('cashintags.create') }}" class="btn btn-sm btn-outline-primary">Create Tag</a>
                </div>
                <div class="card-body p-0">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($cashintags as $tag)
                                <tr>
                                    <td>{{ $tag->id }}</td>
                                    <td>{{ $tag->name }}</td>
                                    <td>{{ $tag->description }}</td>
                                    <td>
                                        <a href="{{ route('cashintags.edit', $tag->id) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                                        <form action="{{ route('cashintags.destroy', $tag->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="4" class="text-center text-muted">No tags available.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- CashOut Tags -->
        <div class="col-md-6">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-light d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 text-secondary">Cash-Out Tags</h5>
                    <a href="{{ route('cashouttags.create') }}" class="btn btn-sm btn-outline-primary">Create Tag</a>
                </div>
                <div class="card-body p-0">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($cashouttags as $tag)
                                <tr>
                                    <td>{{ $tag->id }}</td>
                                    <td>{{ $tag->name }}</td>
                                    <td>{{ $tag->description }}</td>
                                    <td>
                                        <a href="{{ route('cashouttags.edit', $tag->id) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                                        <form action="{{ route('cashouttags.destroy', $tag->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="4" class="text-center text-muted">No tags available.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
@stop
