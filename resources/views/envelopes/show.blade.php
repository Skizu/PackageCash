@extends('app')
@section('content')
    <div id="envelope" class="page container {{$envelope->colour}}">
        <div class="header">
            <div class="row">
                <div class="titles col-xs-12 col-md-6">
                    <h3><span class="glyphicon glyphicon-envelope icon"></span> {{ $envelope->name }}</h3>
                    @if($envelope->package)
                        <h6>Belongs to <a
                                    href="{{ route('package.show', [$envelope->package]) }}">{{ $envelope->package->name }}</a>
                        </h6>
                    @endif
                </div>
                <div class="data col-md-6 text-right">
                    <h4>Current Balance</h4>
                    <strong>{{ $envelope->formatMoney('amount') }}</strong>
                </div>
            </div>
        </div>
        <div class="content row">
            <div class="col-xs-12 col-md-3">
                <div class="action-panel">
                    <h6 class="header default">Actions</h6>
                    <a href="{{ route('envelope.transaction.create', [$envelope]) }}" class="col-md-6 action">
                        <span>Withdraw</span><span class="info">From Envelope</span>
                    </a>
                    <a href="{{ route('envelope.transfer.create', [$envelope]) }}" class="col-md-6 action">
                        <span>Transfer</span><span class="info">From Envelope</span>
                    </a>
                    <a href="{{ route('envelope.edit', [$envelope]) }}" class="col-md-12 super-action">
                        <span>Edit</span><span class="info">Envelope Details</span>
                    </a>
                </div>
            </div>
            <div class="col-xs-12 col-md-9">
                <h6 class="header default">Transaction History</h6>
                @include('audit-log.logs', ['log' => $envelope->getAuditLog()])
            </div>
        </div>
    </div>
@endsection