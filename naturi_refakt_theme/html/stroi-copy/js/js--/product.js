
if ( $('.checkbox-action').length > 0 ) {

    $('.checkbox-action').click(function() {
        var id = $(this).data('id');
        var count = $('.checkbox-action:checked').length;
        $(".list li[data-id-line='"+ id +"']").toggleClass('show');

        console.log('Cxtnxbr: ' + count);

        if (count > 0) {
            if (!$('.modal-calculate-list').hasClass('show')) {
                $('.modal-calculate-list').addClass('show');
            }
        } else {
            $('.modal-calculate-list').removeClass('show');
        }


    });

}
