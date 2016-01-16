<a href="{{ route('profile.show', [$UserID]) }}">{{ $users->find($UserID)->name }}</a> renamed the envelope called <a
        href="{{ route('envelope.show', [$ObjectID]) }}">{{ $Data->Original->name }}</a> to <a
        href="{{ route('envelope.show', [$ObjectID]) }}">{{ $Data->name }}</a>