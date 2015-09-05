$('.envelopes')
    .on('click', '.tag', function () {
        $(this).parent().find('.colours').toggleClass('hidden');
    }).on('click', '.colour', function () {
        var $that = $(this);
        var $envelope = $that.closest('.envelope');
        var $colour = $envelope.data('colour');

        $.post('/envelopes/' + $envelope.data('id'), {
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
            $envelope.find('.amount').text(data['amount']);

            $new.insertBefore( $('.envelope.new').parent() );

            $envelope.toggleClass('template');
        })
    });