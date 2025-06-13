@extends('base')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
        
            <div class="card shadow-sm border-0">
                <div class="card-header bg-light">
                    <h5 class="mb-0 text-secondary">Create Cash-In Entry</h5>
                </div>

                <div class="card-body">
                    <form action="{{ route('cashins.store') }}" method="POST">
                        @csrf

                        <!-- Description -->
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <input 
                                type="text" 
                                class="form-control" 
                                id="description" 
                                name="description" 
                                placeholder="Enter a brief description"
                            >
                        </div>

                        <!-- Amount -->
                        <div class="mb-3">
                            <label for="amount" class="form-label">Amount <span class="text-danger">*</span></label>
                            <input 
                                type="number" 
                                class="form-control" 
                                id="amount" 
                                name="amount" 
                                required 
                                placeholder="Enter amount"
                            >
                        </div>

                        <!-- Tag Selection -->
                        <div class="mb-4">
                            <label for="tags" class="form-label">Tag</label>
                            <select 
                                class="form-select" 
                                id="tags" 
                                name="cash_in_tag_id"
                            >
                                @foreach($tags as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary">Create Cash-In</button>
                        <a href="{{ route('cashins.index') }}" class="btn btn-secondary ms-2">Back to List</a>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@stop
