@extends('app')

@section('content')
    <div class="page container">
        <div class="header">
            <div class="titles">
                <h3>
                    Envelopes
                </h3>
                <h6>
                    Manage your envelopes
                </h6>
            </div>
            <div class="data">
                <h4>Visible Total:
                    <strong>{{ $Money::create('0')->currencySymbol() }}<span
                                data-fill="total">{{ $Money::create(Auth::user()->envelopes->sum('amount'))->disableSymbol()->formatMoney() }}</span></strong>
                </h4>
            </div>
        </div>
        <div class="content row">
            <div class="col-sm-2 hidden-xs text-center">
                <div class="header"><h6>Filter Colour</h6></div>
                <div class="" data-filter="colour">
                    @foreach(App\Envelope::$colours as $colour)
                        <div class="blocks">
                            <div class="clickable block {{ $colour }}" data-colour="{{ $colour }}"></div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-xs-12 col-md-10">
                <div class="form-group">
                    <input data-filter="name" type="text" class="form-control basic input-lg"
                           placeholder="Filter by name"/>
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
