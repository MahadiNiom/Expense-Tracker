@extends('base')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow-sm border-0">
                <div class="card-header bg-light">
                    <h5 class="mb-0 text-secondary">Edit Cash-Out Entry</h5>
                </div>

                <div class="card-body">
                    <form action="{{ route('cashouts.update', $cashout->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Amount -->
                        <div class="mb-3">
                            <label for="amount" class="form-label">Amount <span class="text-danger">*</span></label>
                            <input type="number" name="amount" id="amount" class="form-control" value="{{ $cashout->amount }}" required>
                        </div>

                        <!-- Description -->
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <input type="text" name="description" id="description" class="form-control" value="{{ $cashout->description }}">
                        </div>

                        <!-- Tag -->
                        <div class="mb-4">
                            <label for="cash_out_tag_id" class="form-label">Tag</label>
                            <select id="cash_out_tag_id" name="cash_out_tag_id" class="form-select">
                                @foreach($tags as $tag)
                                    <option value="{{ $tag->id }}" {{ $tag->id == $cashout->cash_out_tag_id ? 'selected' : '' }}>
                                        {{ $tag->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Buttons -->
                        <button type="submit" class="btn btn-primary">Update Cash Out</button>
                        <a href="{{ route('cashouts.index') }}" class="btn btn-secondary ms-2">Back to List</a>
                    </form>
                </div>

            </div>

        </div>
    </div>
</div>
@stop
