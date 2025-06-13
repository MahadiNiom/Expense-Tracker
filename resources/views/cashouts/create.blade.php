@extends('base')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow-sm border-0">
                <div class="card-header bg-light">
                    <h5 class="mb-0 text-secondary">Create New Cash-Out Entry</h5>
                </div>

                <div class="card-body">
                    <form action="{{ route('cashouts.store') }}" method="POST">
                        @csrf
                        <!-- Description -->
                        <div class="mb-3">
                            <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
                            <input type="text" name="description" id="description" class="form-control" required>
                        </div>

                        <!-- Amount -->
                        <div class="mb-3">
                            <label for="amount" class="form-label">Amount <span class="text-danger">*</span></label>
                            <input type="number" name="amount" id="amount" class="form-control" required>
                        </div>


                        <!-- Tag -->
                        <div class="mb-4">
                            <label for="tag_id" class="form-label">Tag <span class="text-danger">*</span></label>
                            <select name="cash_out_tag_id" id="tag_id" class="form-select" required>
                                <option value="" disabled selected>Select a tag</option>
                                @foreach($tags as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Buttons -->
                        <button type="submit" class="btn btn-primary">Create Cash Out</button>
                        <a href="{{ route('cashouts.index') }}" class="btn btn-secondary ms-2">Back to List</a>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@stop
