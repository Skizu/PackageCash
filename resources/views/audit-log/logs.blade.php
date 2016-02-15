<div class="timeline">
    <span class="bar"></span>
    @forelse($log as $entry)
        <div class="date">{{ $AuditLogDateHandler->generate($entry->created_at) }}</div>
        <div class="entry">
            <div class="icon"></div>
            <div>{!! $entry->view()->parse() !!}</div>
            <div class="details">
                {{ $users->find($entry->data->UserID)->name }} &middot;
                <time datetime="{{ $entry->created_at }}"
                      title="{{ $entry->created_at->format('m/d/Y g:iA') }}">
                    {{ $entry->created_at->diffForHumans() }}</time>
                &middot;
                <a class="text-muted" role="button" data-toggle="collapse" href="#entry_{{ $entry->id }}"
                   aria-expanded="false" aria-controls="entry_{{ $entry->id }}">
                    More <span class="caret"></span>
                </a>

                <div class="table-responsive collapse" id="entry_{{ $entry->id }}">
                    <table class="table table-striped">
                        <tbody>
                        @foreach($entry->data->Data as $key => $value)
                            <tr>
                                <td>{{ $key }}</td>
                                <td>{{ dump($value) }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @empty
        <div class="date">Today</div>
        <div class="entry">
            <div class="icon"></div>
            <div>There are no entries.</div>
            <div class="details">
                System &middot;
                <time datetime="{{ $now = \Carbon\Carbon::now() }}">
                    {{ $now->format('m/d/Y g:iA') }}</time>
            </div>
        </div>
    @endforelse
</div>