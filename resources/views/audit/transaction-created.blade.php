<a href="{{ route('profile.show', [$UserID]) }}">{{ $users->find($UserID)->name }}</a> withdrew
{{ $Money::create($Data->amount)->formatMoney() }} from <a
        href="{{ route('envelope.show', [$Data->envelope->id]) }}">{{ $Data->envelope->name }}</a> for the following reason(s):
<div>{{ $Data->description }}</div>