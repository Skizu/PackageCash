<div class="row">
    <div class="col-xs-12 col-md-3">
        <div class="action-panel">
            <h5 class="header">Actions</h5>
            <a class="col-md-12 super-action">
                <span>Edit</span><span class="info">Package details</span>
            </a>
        </div>
    </div>
    <div class="col-xs-12 col-md-4">
        <h5 class="header">Envelopes</h5>

        <div class="envelopes text-center">
            @forelse($package->envelopes as $envelope)
                @include('envelopes.envelope')
            @empty
                <em>No Envelopes</em>
            @endforelse
        </div>
    </div>
    <div class="col-xs-12 col-md-5">
        <h5 class="header">Transaction History</h5>
        @include('audit-log.logs', ['log' => $package->getAuditLog()])
    </div>
</div>