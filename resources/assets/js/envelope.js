$('.envelopes')
    .on('click', '.tag', function (e) {
        e.stopPropagation();
        $(this).parent().find('.colours').toggleClass('hidden');
    }).on('click', '.envelope.clickable', function () {
        var $that = $(this);
        window.location.href = '/envelope/' + $that.data('id');
    }).on('click', '.colour', function (e) {
        e.stopPropagation();
        var $that = $(this);
        var $envelope = $that.closest('.envelope');
        var $colour = $envelope.data('colour');

        $.post('/envelope/' + $envelope.data('id'), {
            _method: "put",
            colour: $that.data('colour')
        }, function (data) {
            $envelope.data('colour', $that.data('colour'));
            $envelope.attr('data-colour', $that.data('colour'));

            $that.data('colour', $colour);
            $that.attr('data-colour', $colour);

            $that.parent().toggleClass('hidden');
        });
    }).on('click', '.add', function () {
        var $that = $(this);
        var $nameCtrl = $that.closest('.envelope').find('[name="name"]');
        var $name = $nameCtrl.val();

        $.post('/envelope/', {
            name: $name
        }, function (data) {
            $nameCtrl.val('');

            $new = $('.envelope.template').parent().clone();
            $envelope = $new.find('.envelope');

            $envelope.attr('data-id', data['id']);
            $envelope.data('id', data['id']);
            $envelope.attr('data-colour', data['colour']);
            $envelope.data('colour', data['colour']);
            $envelope.find('.name').text(data['name']);
            $envelope.find('.amount').text(data['currencyAmount']);

            $new.insertBefore( $('.envelope.new').parent() );

            $envelope.toggleClass('template');
        })
    });
$('[data-filter]').on('click', '[data-colour]', function () {
    var $that = $(this);
    $that.toggleClass('active');

    filterEnvelopes();
}).on('keyup', function() {
    filterEnvelopes();
});

function filterEnvelopes() {
    var $active = $('[data-filter] [data-colour].active');
    var $query = $('[data-filter="name"]').val().toLowerCase();

    if($active.length == 0){
        $active = $('[data-filter] [data-colour]');
    }
    $active = $active.map(function() {
        return $(this).data('colour');
    }).get();

    $total = 0;

    $('.envelopes').find('[data-colour].envelope').each(function(id, envelope) {
        colour = $(envelope).data('colour');
        name = $(envelope).find('[data-name]').data('name');
        active = $.inArray(colour, $active) > -1;
        queryMatch = $(envelope).has('[data-name*="' + $query + '"]').length ? true : $query.length ? false : true;
        hide = (active && queryMatch) == false;

        if(hide == false) {
            $total+= Number($(envelope).data('amount'));
        }
        $(envelope).parent('div').toggleClass('hide', hide);
    });

    $('[data-fill="total"]').text(parseFloat($total).toFixed(2));
}