<a href="{{ route('profile.show', [$UserID]) }}">{{ $users->find($UserID)->name }}</a> asigned the envelope called <a
        href="{{ route('envelope.show', [$ObjectID]) }}">{{ $Data->Original->name }}</a> to package <a
        href="{{ route('package.show', [$Data->package->id]) }}">{{ $Data->package->name }}</a>