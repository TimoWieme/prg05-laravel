$(function( $ ){
    // If Status = 1, change to 0, if status = 0, change to 1
    $('.js-switch').change(function () {
        let status = $(this).prop('checked') === true ? 1 : 0;
        let serieid = $(this).data('id');
        console.log(serieid)

        // CSRF Token
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
            dataType: "json",
            url: "/serie/changeStatus",
            data: {'status': status, 'serieid': serieid},
            success: function (data) {
                // console.log(message);
            }
        });
    });
});
