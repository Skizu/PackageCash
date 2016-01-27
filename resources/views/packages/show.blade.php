@extends('app')
@section('content')
    <div class="page container">
        <div class="header">
            <h3>{{ $package->name }}</h3>
            <h6>Created: {{ $package->created_at->format('m/d/Y g:iA') }}</h6>
        </div>
        <div class="content row">
            <div class="col-xs-12 col-md-3">
                <div class="action-panel">
                    <h6 class="header default">Actions</h6>
                    <a class="col-md-12 super-action">
                        <span>Love Rachel</span><span class="info">Because it's easy</span>
                    </a>
                </div>
            </div>
            <div class="col-xs-12 col-md-4">
                {{ dump($package->envelopes) }}
            </div>
            <div class="col-xs-12 col-md-5">
                <h6 class="header default">Transaction History</h6>
                @include('audit-log.logs', ['log' => $package->getAuditLog()])
            </div>
        </div>
    </div>
@endsection