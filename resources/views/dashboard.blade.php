@extends('layouts.app')

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
                    <strong>{{ $Total }}</strong>
                </div>
            </div>
        </div>
        <div class="content row">
            @if($TutorialComplete == false)
                <div class="col-xs-12">
                    <div class="header">
                        <h4>Tutorial</h4>
                    </div>
                    <div class="content button-group stages text-center">
                        @if($Tutorial->getState())
                            <div class="help"><span class="h5">Why does this do?</span>

                                <p>Please click the current option to follow instructions.</p></div>

                            <div id="tutorial" class="btn-group" role="group">
                                @foreach ($Steps as $step => $data)
                                    <button type="button" class="btn btn-default"
                                            data-current="{{ $Tutorial->can($step) }}"
                                            data-step="{{ $step }}"
                                            data-menu="{{ $data['in_menu'] }}"
                                            title="{{ $data['name'] }}">{{ $data['step'] }}<span
                                                class="hidden-xs">. {{ $data['name'] }}</span>
                                    </button>
                                @endforeach
                            </div>
                        @else
                            <p class="alert alert-info">Would you like to take the tutorial to help you find your way
                                around the application?</p>

                            <form class="form-horizontal" role="form" method="POST"
                                  action="{{ route('profile.tutorial.store', [Auth::id()]) }}">
                                {{ csrf_field() }}
                                <input type="submit" class="btn btn-success" name="tutorial_transition" value="Start" />
                                <input type="submit" class="btn btn-warning" name="tutorial_transition" value="Skip" />
                            </form>
                        @endif
                    </div>
                </div>
            @endif
            <div class="col-xs-12 col-md-push-6 col-md-6">
                @if($UnsortedCheques->isEmpty() == false)
                    <div class="header" data-container="body" data-placement="top" data-title="Creating a Package"
                         data-content="Packages are a way to group your envelopes."
                         data-tutorial="{{ $TutorialState::DISTRIBUTE_CHEQUE }}">
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
                    <div class="header" data-container="body" data-placement="top"
                         data-title="Assigning Envelopes to a Package"
                         data-content="Not only does this visually assist in managing money, but you are also able to use some more advanced features on packages."
                         data-tutorial="{{ $TutorialState::ASSIGN_PACKAGE }}">
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
                    @forelse($packages as $package)
                        <tr>
                            <td class="text-left"><a
                                        href="{{ route('package.show', [$package->id]) }}">{{ $package->name }}</a></td>
                            <td class="text-right">
                                <a href="{{ route('package.show', [$package->id]) }}">{{ $package->formatMoney('amount') }}</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-left" colspan="2">You currently have no packages.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
            <div class="col-xs-12 col-md-pull-6 col-md-6">
                <div class="header">
                    <div class="titles">
                        <h4>Recent Activity</h4>
                    </div>
                </div>
                @include('audit-log.logs', ['log' => Auth::user()->getAuditLog()])
            </div>
        </div>
    </div>
@endsection
