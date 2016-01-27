@extends('app')

@section('content')
    <div class="page container">
        <div class="header">Transfer</div>

        <div class="content">
            <h4>{{ $transfer->formatMoney('amount') }} from {{ $transfer->source->name }}
                to {{ $transfer->destination->name }}</h4>
        </div>
    </div>
@endsection