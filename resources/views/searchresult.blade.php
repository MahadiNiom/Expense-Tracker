<div class="mb-4">
    <h5>Search Results for: <em>"{{ request('query') }}"</em></h5>

    <div class="card mb-3">
        <div class="card-header bg-success text-white">
            {{ $cashins->count() }} Cash In Result{{ $cashins->count() !== 1 ? 's' : '' }}
        </div>
        <ul class="list-group list-group-flush">
            @forelse($cashins as $cashin)
                <li class="list-group-item">
                    <a href="{{ route('cashins.show', $cashin->id) }}" class="text-decoration-none">
                        <strong>{{ $cashin->description }}</strong> — ${{ number_format($cashin->amount, 2) }}
                    </a>
                </li>
            @empty
                <li class="list-group-item">No Cash In entries found.</li>
            @endforelse
        </ul>
    </div>

    <div class="card">
        <div class="card-header bg-danger text-white">
            {{ $cashouts->count() }} Cash Out Result{{ $cashouts->count() !== 1 ? 's' : '' }}
        </div>
        <ul class="list-group list-group-flush">
            @forelse($cashouts as $cashout)
                <li class="list-group-item">
                    <a href="{{ route('cashouts.show', $cashout->id) }}" class="text-decoration-none">
                        <strong>{{ $cashout->description }}</strong> — ${{ number_format($cashout->amount, 2) }}
                    </a>
                </li>
            @empty
                <li class="list-group-item">No Cash Out entries found.</li>
            @endforelse
        </ul>
    </div>
</div>
