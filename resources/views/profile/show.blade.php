@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>{{ $user->name }}</h1>
            <hr/>
        </div>
        <div class="row">
            <div class="auditLog">
                <h2>Audit Log</h2>

                @include('audit-log.logs', ['log' => $user->getAuditLog()])
            </div>
        </div>
    </div>
@endsection