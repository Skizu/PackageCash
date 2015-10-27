@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-4">
                <div class="dashbar well">
                    <div class="h4">Recent Transactions</div>
                </div>
            </div>
            <div class="col-xs-2">
                <div class="well">
                    <div>Current Money</div>
                    {{ Auth::user()->envelopes->sum('amount') }}
                </div>
            </div>
            <div class="col-xs-6">
                <div class="well">
                    <input type="text" class="form-control input-lg" placeholder="Search transactions"/>
                </div>
            </div>
        </div>
    </div>
@endsection
