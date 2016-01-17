@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-2 hidden-xs">
                <div class="dashbar well">
                    <div class="h4 text-center">Filter Colour</div>
                    <div class="row" data-filter="colour">
                        @foreach(App\Envelope::$colours as $colour)
                            <div class="col-sm-12 col-md-6 blocks">
                                <div class="clickable block {{ $colour }}" data-colour="{{ $colour }}"></div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-10">
                <div class="row">
                    <div class="col-xs-8">
                        <div class="well">
                            <input data-filter="name" type="text" class="form-control input-lg"
                                   placeholder="Filter by name"/>
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <div class="well text-center">
                            Visible Total: {{ $Money::create('0')->currencySymbol() }}<span
                                    data-fill="total">{{ $Money::create(Auth::user()->envelopes->sum('amount'))->disableSymbol()->formatMoney() }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-10">
                <div class="row envelopes text-center">
                    @foreach(Auth::user()->envelopes as $envelope)
                        <div class="col-xs-6 col-sm-4 col-md-3">
                            @include('envelopes.envelope')
                        </div>
                    @endforeach
                    <div class="col-xs-6 col-sm-4 col-md-3">
                        @include('envelopes.new')
                    </div>

                    <div class="col-xs-6 col-sm-4 col-md-3">
                        @include('envelopes.template')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
