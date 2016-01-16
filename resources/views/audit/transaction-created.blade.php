<a href="{{ route('profile.show', [$UserID]) }}">{{ $users->find($UserID)->name }}</a> withdrew
{{ $Money::create($Data->amount)->formatMoney() }} for the following reason(s):
<div>{{ $Data->description }}</div>