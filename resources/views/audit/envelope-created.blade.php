<a href="{{ route('profile.show', [$UserID]) }}">{{ $users->find($UserID)->name }}</a> created a new envelope called <a
    href="{{ route('envelope.show', [$ObjectID]) }}">{{ $Data->name }}</a>