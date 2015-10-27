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
                <div class="well well-sm big">
                    <div><strong>I want to:</strong></div>
                    <ul class="list-unstyled">
                        <li><a href="#"><span class="glyphicon glyphicon-export"></span> Withdraw</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-import"></span> Deposit</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-transfer"></span> Transfer</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-8">
                <div class="transaction big text-center">Transaction History</div>
                <div class="transaction withdrawal">
                    <span class="action"><span class="glyphicon glyphicon-export"></span> Withdrawal</span> of
                    <span class="amount">$30.00</span> for <span class="details">Train ticket</span>.
                    <span class="hidden-xs text-muted small pull-right" title="time stamp">1 minute ago</span>
                </div>
                <div class="transaction deposit">
                    <span class="action"><span class="glyphicon glyphicon-import"></span> Deposit</span> of
                    <span class="amount">$50.00</span> from <a class="btn btn-sm btn-primary">Monthly Cheque</a>
                    <span class="hidden-xs text-muted small pull-right">3 hours ago</span>
                </div>
                <div class="transaction">
                    <span class="action"><span class="glyphicon glyphicon-transfer"></span> Transfer</span> of
                    <span class="amount">$1000.00</span> from <a class="btn btn-sm btn-primary"><span
                                class="glyphicon glyphicon-envelope"></span> Boobs</a>
                    <span class="hidden-xs text-muted small pull-right">1 week ago</span>
                </div>
            </div>
        </div>
    </div>
@endsection