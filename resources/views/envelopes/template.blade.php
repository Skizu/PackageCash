<div class="envelope clickable template">
    <div class="background"></div>
    <div class="flap"></div>
    <div class="details text-center">
        <div class="title">
            <span class="tag glyphicon glyphicon-tag"></span>
            <span class="name"></span>

            <div class="colours hidden">
                @foreach($colours as $colour)
                    <div class="colour" data-colour="{{ $colour }}"></div>
                @endforeach
            </div>
        </div>
        <div class="amount text-center"></div>
    </div>
</div>