@extends('layouts.app')
@section('content')
    <div class="page container">
        <div class="header">
            <h3>{{ $cheque->name }}</h3>
            <h6>Created: {{ $cheque->created_at->format('m/d/Y g:iA') }}</h6>
        </div>
        <div class="content row">
            @if($cheque->amount > 0)
                <div class="col-xs-12 col-md-3">
                    <div class="action-panel">
                        <h6 class="header default">Actions</h6>
                        <a href="{{ route('cheque.edit', [$cheque]) }}" class="col-md-12 super-action">
                            <span>Distribute</span><span class="info">Into Envelopes</span>
                        </a>
                    </div>
                </div>
            @endif
            <div class="col-xs-12 @if($cheque->amount > 0) col-md-9 @endif">
                <h6 class="header default">Transaction History</h6>
                @include('audit-log.logs', ['log' => $cheque->getAuditLog()])
            </div>
        </div>
    </div>
@endsection