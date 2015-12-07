@extends('app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-8">
                <div class="header well">
                    <span class="glyphicon glyphicon-envelope icon"></span> {{ $cheque->name }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-4">
                <div class="well text-center">
                    <div class="row">
                        <div class="col-sm-12 big"><strong>Balance: {{ $cheque->formatMoney('amount') }}</strong></div>
                        <div class="col-sm-12"><a href="{{ route('cheque.edit', [$cheque->id]) }}" class="btn btn-default btn-small">Distribute</a></div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="transaction big text-center">Transaction History</div>
            @include('transactions.withdrawal')
            @include('transactions.deposit')
            @include('transactions.transfer')
        </div>
    </div>
@endsection