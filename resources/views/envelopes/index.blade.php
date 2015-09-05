@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-3">
            </div>
            <div class="col-xs-9">
                <div class="row envelopes text-center">
                    @foreach(Auth::user()->envelopes as $envelope)
                        <div class="col-sm-4 col-md-3">
                            @include('envelopes.envelope')
                        </div>
                    @endforeach
                    <div class="col-sm-4 col-md-3">
                        @include('envelopes.new')
                    </div>

                    <div class="col-sm-4 col-md-3">
                        @include('envelopes.template')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
