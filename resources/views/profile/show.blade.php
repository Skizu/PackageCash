@extends('app')

@section('content')
    <div class="page container">
        <div class="header">
            <div class="titles">
                <h3>
                    {{ $user->name }}
                </h3>
            </div>
        </div>
        <div class="content row">
            <div class="auditLog col-xs-6">
                <h2>Audit Log</h2>

                @include('audit-log.logs', ['log' => $user->getAuditLog()])
            </div>
        </div>
    </div>
@endsection