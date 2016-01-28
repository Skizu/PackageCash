<a href="{{ route('profile.show', [$UserID]) }}">{{ $users->find($UserID)->name }}</a> unasigned the envelope called <a
        href="{{ route('envelope.show', [$ObjectID]) }}">{{ $Data->Original->name }}</a> from the package <a
        href="{{ route('package.show', [$Data->OriginalPackage->id]) }}">{{ $Data->OriginalPackage->name }}</a>