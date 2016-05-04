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
            <div class="auditLog col-md-8">
                <h6 class="header default">Audit Log</h6>

                @include('audit-log.logs', ['log' => $user->getAuditLog()])
            </div>
            <div class="col-md-4">
                <div class="action-panel">
                    <h6 class="header default">Actions</h6>
                    <a href="#" class="col-md-6 action">
                        <span>Edit</span><span class="info">User Details</span>
                    </a>
                    <div class="col-md-6 super-action">
                        <span>Version</span><span class="info">{{ env('VERSION') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection