@extends('base')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow-sm border-0">
                <div class="card-header bg-light">
                    <h5 class="mb-0 text-secondary">Edit Cash-In Entry</h5>
                </div>

                <div class="card-body">
                    <form action="{{ route('cashins.update', $cashin->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Amount -->
                        <div class="mb-3">
                            <label for="amount" class="form-label">Amount <span class="text-danger">*</span></label>
                            <input 
                                type="number" 
                                class="form-control" 
                                id="amount" 
                                name="amount" 
                                value="{{ $cashin->amount }}" 
                                required
                            >
                        </div>

                        <!-- Description -->
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <input 
                                type="text" 
                                class="form-control" 
                                id="description" 
                                name="description" 
                                value="{{ $cashin->description }}"
                            >
                        </div>

                        <!-- Tag Selection -->
                        <div class="mb-4">
                            <label for="cash_in_tag_id" class="form-label">Tag</label>
                            <select class="form-select" id="cash_in_tag_id" name="cash_in_tag_id">
                                @foreach($tags as $tag)
                                    <option 
                                        value="{{ $tag->id }}" 
                                        {{ $tag->id == $cashin->cash_in_tag_id ? 'selected' : '' }}
                                    >
                                        {{ $tag->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Buttons -->
                        <button type="submit" class="btn btn-primary">Update Cash-In</button>
                        <a href="{{ route('cashins.index') }}" class="btn btn-secondary ms-2">Back to List</a>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@stop
