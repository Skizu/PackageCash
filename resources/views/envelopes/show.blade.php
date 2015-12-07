@extends('app')
@section('content')
    <div id="envelope" class="container {{$envelope->colour}}">
        <div class="row">
            <div class="col-xs-12 col-sm-8">
                <div class="header well">
                    <span class="glyphicon glyphicon-envelope icon"></span> {{ $envelope->name }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-4">
                <div class="well text-center">
                    <div class="row">
                        <div class="col-sm-12 big"><strong>Balance: {{ $envelope->formatMoney('amount') }}</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <div class="well well-sm">
                    <div class="big"><strong>I want to:</strong></div>
                    <ul class="list-unstyled">
                        <li><a href="#"><span class="big glyphicon glyphicon-export"></span> Withdraw</a></li>
                        <li><a href="#"><span class="big glyphicon glyphicon-import"></span> Deposit</a></li>
                        <li><a href="#"><span class="big glyphicon glyphicon-transfer"></span> Transfer</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-8">
                <div class="transaction big text-center">Transaction History</div>
                @include('transactions.transfer')
                @include('transactions.withdrawal')
                @include('transactions.deposit')
            </div>
        </div>
    </div>
@endsection