@extends('app')

@section('content')
    <div id="envelope" class="container red">
        <div class="row">
            <div class="col-xs-12">
                <div class="header well">
                    Packages
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <table class="table table-hover table-striped">
                    <thead>
                    <tr>
                        <th>Package</th>
                        <th class="text-right">Balance</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach(Auth::user()->envelopes as $envelope)
                        <tr>
                            <td>{{ $envelope->name }}</td>
                            <td class="text-right">{{ $envelope->formatMoney('amount') }}</td>
                        </tr>
                        @if($envelope->id == 3)
                            <tr>
                                <td colspan="2">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="action-panel">
                                                <div class="row">
                                                    <h4 class="heading">Actions</h4>
                                                    <a href="#" class="col-md-6 action">
                                                        <span>???</span>
                                                        <span class="info">???</span>
                                                    </a>
                                                    <a href="#" class="col-md-6 action">
                                                        <span>???</span>
                                                        <span class="info">???</span>
                                                    </a>
                                                    <a href="#" class="col-md-6 action">
                                                        <span>???</span>
                                                        <span class="info">???</span>
                                                    </a>
                                                    <a href="#" class="col-md-6 action">
                                                        <span>???</span>
                                                        <span class="info">???</span>
                                                    </a>
                                                    <a href="#" class="col-md-12 super-action">
                                                        <span>Edit</span>
                                                        <span class="info">
                                                            Package
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="transaction big text-center">Transaction History</div>
                                            @include('audit-log.logs', ['log' => Auth::user()->getAuditLog(5)])
                                        </div>
                                        <div class="col-md-2">
                                            <table class="table table-hover table-striped">
                                                <thead>
                                                <tr>
                                                    <th>Envelope</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach(Auth::user()->envelopes as $envelope)
                                                    <tr>
                                                        <td>{{ $envelope->name }}
                                                            <div>{{ $envelope->formatMoney('amount') }}</div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection