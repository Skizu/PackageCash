@extends('app')

@section('content')
    <div class="page container">
        <div class="header">
            <div class="row">
                <div class="titles col-md-6">
                    <h3>Dashboard</h3>
                    <h6>Manage your money</h6>
                </div>
                <div class="data col-md-6 text-right">
                    <h4>Current Balance</h4>
                    <strong>{{ $total }}</strong>
                </div>
            </div>
        </div>
        <div class="content row">
            <div class="col-xs-12 col-md-push-6 col-md-6">
                @if($UnsortedCheques->isEmpty() == false)
                    <div class="header">
                        <h4>Unsorted Cheques</h4>
                    </div>
                    <table class="table table-hover table-striped content">
                        <thead>
                        <tr>
                            <th>Cheque</th>
                            <th class="text-right">Balance</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($UnsortedCheques as $cheque)
                            <tr>
                                <td><a href="{{ route('cheque.show', [$cheque->id]) }}">{{ $cheque->name }}</a></td>
                                <td class="text-right">
                                    <a href="{{ route('cheque.show', [$cheque->id]) }}">{{ $cheque->formatMoney('amount') }}</a>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
                @if($UnsortedEnvelopes->isEmpty() == false)
                    <div class="header">
                        <h4>Unsorted Envelopes</h4>
                    </div>
                    <table class="table table-hover table-striped content">
                        <thead>
                        <tr>
                            <th>Envelope</th>
                            <th class="text-right">Balance</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($UnsortedEnvelopes as $envelope)
                            <tr>
                                <td><a href="{{ route('envelope.show', [$envelope->id]) }}">{{ $envelope->name }}</a>
                                </td>
                                <td class="text-right">
                                    <a href="{{ route('envelope.show', [$envelope->id]) }}">{{ $envelope->formatMoney('amount') }}</a>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
                <div class="header">
                    <h4>Package Summary</h4>
                </div>
                <table class="table table-hover table-striped">
                    <thead>
                    <tr>
                        <th>Package</th>
                        <th class="text-right">Balance</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Total</th>
                        <th class="text-right">{{ $Money::create($packages->sum('amount'))->formatMoney() }}</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($packages as $package)
                        <tr>
                            <td class="text-left"><a
                                        href="{{ route('package.show', [$package->id]) }}">{{ $package->name }}</a></td>
                            <td class="text-right"><a
                                        href="{{ route('package.show', [$package->id]) }}">{{ $package->formatMoney('amount') }}</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-xs-12 col-md-pull-6 col-md-6">
                <div class="header">
                    <div class="titles">
                        <h4>Recent Activity</h4>
                    </div>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control basic input-md" placeholder="Search History"/>
                    <span class="glyphicon glyphicon-search form-control-feedback"></span>
                </div>
                @include('audit-log.logs', ['log' => Auth::user()->getAuditLog()])
            </div>
        </div>
    </div>
@endsection
