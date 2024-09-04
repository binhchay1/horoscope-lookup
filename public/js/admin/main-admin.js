$('#button-maintainer').on('change', function () {
    $.confirm({
        title: '',
        content: 'Xác nhận chuyển sang chế độ bảo trì ?',
        buttons: {
            confirm: function () {
                let url = 'change-maintenance';
                window.location.href = url;
            },
            cancel: function () {
                $('#button-maintainer').prop('checked', false);
            },
        }
    });
});

$(document).ready(function () {
    var isMobile = false;

    if (WURFL.is_mobile) {
        isMobile = true;
    }

    if(isMobile) {
        $('.text-home-page').addClass('d-none');
        $('.text-maintainer').addClass('d-none');
    }
});
