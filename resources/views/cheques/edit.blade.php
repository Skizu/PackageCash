@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Distribute Cheque</div>
                    <div class="panel-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif


                            <div class="help text-center"><span class="h5">What does this do?</span>

                                <p>Distributing the content of your cheques to one or multiple envelopes to help manage
                                    your money.</p></div>

                        <form class="form-horizontal" role="form" method="POST"
                              action="{{ route('cheque.update', [$cheque->id]) }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="PUT">

                            <div class="form-group">
                                <label class="col-md-4 control-label">Balance</label>

                                <div class="col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-addon">{{ $cheque->currencySymbol() }}</div>
                                        <input type="text" class="form-control" name="amount"
                                               value="{{ $cheque->disableSymbol()->formatMoney('amount') }}"
                                               placeholder="Amount" disabled>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Destination</label>

                                <div class="col-md-6">
                                    <select class="form-control" name="envelope">
                                        <option>Please Select</option>
                                        @foreach($envelopes as $envelope)
                                            <option value="{{ $envelope->id }}">{{ $envelope->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Amount</label>

                                <div class="col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-addon">{{ $cheque->currencySymbol() }}</div>
                                        <input type="text" class="form-control" name="amount" placeholder="Amount">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">Transfer</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection