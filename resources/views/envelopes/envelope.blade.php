<div class="envelope clickable" data-id="{{ $envelope->id }}"
     data-colour="{{ $envelope->colour }}"
     data-amount="{{ $envelope->disableSymbol()->formatMoney('amount') }}">
    <div class="background"></div>
    <div class="flap"></div>
    <div class="details text-center">
        <div class="title">
            <span class="tag glyphicon glyphicon-tag"></span>
            <span class="name" data-name="{{ strtolower($envelope->name) }}">{{ $envelope->name }}</span>

            <div class="colours hidden">
                @foreach($envelope->colourOptions() as $colour)
                    <div class="colour" data-colour="{{ $colour }}"></div>
                @endforeach
            </div>
        </div>
        <div class="amount text-center">{{ $envelope->enableSymbol()->formatMoney('amount') }}</div>
    </div>
</div>