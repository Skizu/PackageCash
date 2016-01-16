@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>Transfer</h1>

            <h4>{{ $transfer->formatMoney('amount') }} from {{ $transfer->source->name }}
                to {{ $transfer->destination->name }}</h4>
            <hr/>
        </div>
    </div>
@endsection