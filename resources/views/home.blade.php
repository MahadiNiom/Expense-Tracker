@extends('base')

@section('content')
<div class="container my-5">
    <h1 class="mb-4 text-center text-primary fw-bold">📊 Financial Overview</h1>
    <form action="{{ route('home.filter') }}" method="POST">
        @csrf
        <label for="start">Start Datetime:</label>
        <input type="datetime-local" id="start" name="start_datetime" required>
        <label for="end">End Datetime:</label>
        <input type="datetime-local" id="end" name="end_datetime" required>
        <button type="submit">Filter</button>
    </form>

    <!-- Summary Section -->
    <div id="summary" class="mt-4">
        <div class="row mb-5">
        <div class="col-12">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-light">
                    <h5 class="text-secondary mb-0">Summary</h5>
                </div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-md-4 mb-3">
                            <h6>Total Cash-ins</h6>
                            <span class="badge bg-success fs-5">{{ $cashins->count() }}</span>
                        </div>
                        <div class="col-md-4 mb-3">
                            <h6>Total Cash-outs</h6>
                            <span class="badge bg-danger fs-5">{{ $cashouts->count() }}</span>
                        </div>
                        <div class="col-md-4 mb-3">
                            <h6>Net Revenue</h6>
                            <span class="badge bg-info text-dark fs-5">{{ $revenew }}</span>
                        </div>
                    </div>
                    <div class="row text-center">
                        <div class="col-md-6 mb-3">
                            <h6>Cash-in Amount</h6>
                            <span class="text-success fw-semibold">{{ $cashins->sum('amount') }}</span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <h6>Cash-out Amount</h6>
                            <span class="text-danger fw-semibold">{{ $cashouts->sum('amount') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Detailed Reports -->
    <div class="row">
        <!-- Cash In by Tag -->
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">💰 Cash-in Breakdown by Category</h5>
                </div>
                <div class="card-body">
                    @foreach($cashintags as $tag)
    <div class="mb-4">
        <h6 class="fw-bold text-dark">{{ $tag->name }}</h6>
        <ul class="list-unstyled">
            <li><strong>Transactions:</strong> {{ $tag->cashIns->count() }}</li>
            <li><strong>Total:</strong> {{ $tag->cashIns->sum('amount') }}</li>
            <li><strong>Average:</strong> {{ $tag->cashIns->avg('amount') }}</li>
            <li><strong>Min:</strong> {{ $tag->cashIns->min('amount') }}</li>
            <li><strong>Max:</strong> {{ $tag->cashIns->max('amount') }}</li>
        </ul>
        <button class="btn btn-outline-success btn-sm mb-2" type="button" data-bs-toggle="collapse" data-bs-target="#cashin-table-{{ $tag->id }}">
            Toggle Table
        </button>
        <div class="collapse" id="cashin-table-{{ $tag->id }}">
            <div class="table-responsive">
                <table class="table table-sm table-striped table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Amount</th>
                            <th>Description</th>
                            <th>Created</th>
                            <th>Updated</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tag->cashIns as $cashin)
                            <tr>
                                <td>{{ $cashin->id }}</td>
                                <td>{{ $cashin->amount }}</td>
                                <td>{{ $cashin->description }}</td>
                                <td>{{ $cashin->created_at->format('Y-m-d H:i') }}</td>
                                <td>{{ $cashin->updated_at->format('Y-m-d H:i') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <hr>
@endforeach

                </div>
            </div>
        </div>

        <!-- Cash Out by Tag -->
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-header bg-danger text-white">
                    <h5 class="mb-0">💸 Cash-out Breakdown by Category</h5>
                </div>
                <div class="card-body">
                    @foreach($cashouttags as $tag)
    <div class="mb-4">
        <h6 class="fw-bold text-dark">{{ $tag->name }}</h6>
        <ul class="list-unstyled">
            <li><strong>Transactions:</strong> {{ $tag->cashOuts->count() }}</li>
            <li><strong>Total:</strong> {{ $tag->cashOuts->sum('amount') }}</li>
            <li><strong>Average:</strong> {{ $tag->cashOuts->avg('amount') }}</li>
            <li><strong>Min:</strong> {{ $tag->cashOuts->min('amount') }}</li>
            <li><strong>Max:</strong> {{ $tag->cashOuts->max('amount') }}</li>
        </ul>
        <button class="btn btn-outline-danger btn-sm mb-2" type="button" data-bs-toggle="collapse" data-bs-target="#cashout-table-{{ $tag->id }}">
            Toggle Table
        </button>
        <div class="collapse" id="cashout-table-{{ $tag->id }}">
            <div class="table-responsive">
                <table class="table table-sm table-striped table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Amount</th>
                            <th>Description</th>
                            <th>Created</th>
                            <th>Updated</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tag->cashOuts as $cashout)
                            <tr>
                                <td>{{ $cashout->id }}</td>
                                <td>{{ $cashout->amount }}</td>
                                <td>{{ $cashout->description }}</td>
                                <td>{{ $cashout->created_at->format('Y-m-d H:i') }}</td>
                                <td>{{ $cashout->updated_at->format('Y-m-d H:i') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <hr>
@endforeach

                </div>
            </div>
        </div>
    </div>
    </div>
</div>

<script>
    // $.ajax({
    //     url: "{{ route('home.filter') }}",
    //     type: "POST",
    //     data: {
    //         start_datetime: $('#start').val(),
    //         end_datetime: $('#end').val(),
    //         _token: '{{ csrf_token() }}'
    //     },
    //     success: function(response) {
    //         // Handle the response data
    //         $('#summary').html(response);
    //     },
    //     error: function(xhr, status, error) {
    //         // Handle errors
    //         console.error(error);
    //     }
    // });
</script>
@stop
