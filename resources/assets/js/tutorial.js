$(function () {
    $('[data-toggle="popover"]').popover();
    $('#tutorial').on('click', '[data-current="1"]', function () {
        var $that = $(this);

        if ($that.data('menu') == true) {
            $('#navbar').collapse(true);
        }
        $('[data-tutorial="' + $that.data('step') + '"]').popover('show')
    });
});