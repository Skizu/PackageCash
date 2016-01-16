<a href="{{ route('profile.show', [$UserID]) }}">{{ $users->find($UserID)->name }}</a> transfered <a
        href="{{ route('transfer.show', [$ObjectID]) }}">{{ $Money::create($Data->amount)->formatMoney() }}
    from {{ $Data->source->name }} into {{ $Data->destination->name }}</a>