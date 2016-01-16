<div class="timeline">
    <span class="bar"></span>
    @if($log->isEmpty())
        <div class="entry">
            <div class="icon"></div>
            <div>There are no entries.</div>
            <div class="details">
                System ·
                <time datetime="{{ $now = \Carbon\Carbon::now() }}">
                    {{ $now->format('m/d/Y g:iA') }}</time>
            </div>
        </div>
    @else
        @foreach($log as $entry)
            <div class="entry">
                <div class="icon"></div>
                <div>{!! $entry->view()->parse() !!}</div>
                <div class="details">
                    {{ $users->find($entry->data->UserID)->name }} ·
                    <time datetime="{{ $entry->created_at }}"
                          title="{{ $entry->created_at->format('m/d/Y g:iA') }}">
                        {{ $entry->created_at->diffForHumans() }}</time>
                </div>
            </div>
        @endforeach
    @endif
</div>