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
                <div class="action-panel">
                    <div class="row">
                        <h4 class="heading">Actions</h4>
                        <a href="{{ route('envelope.transaction.create', [$envelope]) }}" class="col-md-6 action">
                            <span>Withdraw</span>
                            <span class="info">From Envelope</span>
                        </a>
                        <a class="col-md-6 action">
                            <span>Transfer</span>
                            <span class="info">From Envelope</span>
                        </a>
                        <a href="{{ route('envelope.edit', [$envelope]) }}" class="col-md-12 super-action">
                            <span>Edit</span>
                            <span class="info">
                                Envelope Details
                            </span>
                        </a>

                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="transaction big text-center">Transaction History</div>
                @include('audit-log.logs', ['log' => $envelope->getAuditLog()])
            </div>
        </div>
    </div>
@endsection