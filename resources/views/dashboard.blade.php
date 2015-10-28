@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-md-4">
                <div class="dashbar well">
                    <div class="h4 text-center">Recent Transactions</div>
                </div>
            </div>
            <div class="col-xs-6 col-md-2">
                <div class="well text-center">
                    <div><strong>Current Balance</strong></div>
                    <strong>{{ $total }}</strong>
                </div>
            </div>
            <div class="col-xs-6 col-md-6">
                <div class="well">
                    <input type="text" class="form-control input-lg" placeholder="Search transactions"/>
                </div>
            </div>
        </div>
    </div>
@endsection
