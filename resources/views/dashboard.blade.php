@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-6">
                <div class="well">
                    <div class="h4 text-center">Recent Activity</div>
                </div>
                @include('audit-log.logs', ['log' => Auth::user()->getAuditLog()])
            </div>
            @if($UnsortedCheques->isEmpty() == false)
            <div class="col-xs-12 col-md-6">
                <div class="well well-muted">
                    <div class="h4 text-center text-muted">Unsorted Cheques</div>
                    <div class="btn-collection">
                        @foreach($UnsortedCheques as $cheque)
                            <a href="{{ route('cheque.show', [$cheque->id]) }}" class="btn btn-primary">{{ $cheque->name }} <div class="badge">{{ $cheque->formatMoney('amount') }}</div></a>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
            <div class="col-xs-12 col-md-4">
                <div class="well">
                    <input type="text" class="form-control input-md" placeholder="Search History"/>
                </div>
            </div>
            <div class="col-xs-12 col-md-2">
                <div class="well text-center">
                    <div><strong>Current Balance</strong></div>
                    <strong>{{ $total }}</strong>
                </div>
            </div>
        </div>
    </div>
@endsection
