@extends('app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Transfer Money From Envelope: {{ $envelope->name }}</div>
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

                        <form class="form-horizontal" role="form" method="POST"
                              action="{{ route('envelope.transfer.store', [$envelope->id]) }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group">
                                <label class="col-md-4 control-label">Balance</label>

                                <div class="col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-addon">{{ $envelope->currencySymbol() }}</div>
                                        <input type="text" class="form-control" name="amount"
                                               value="{{ $envelope->disableSymbol()->formatMoney('amount') }}"
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
                                        <div class="input-group-addon">{{ $envelope->currencySymbol() }}</div>
                                        <input type="text" class="form-control" name="amount" placeholder="Amount">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Description</label>

                                <div class="col-md-6">
                                    <textarea class="form-control" name="description"
                                              placeholder="Description" rows="5">{{ old('description') }}</textarea>
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