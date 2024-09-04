$(document).ready(function () {
    var id = '';
    $('.btn_chooseImg').on('click', function () {
        let parent = $(this).parent();
        let getAttr = parent.attr('id');
        let slice = getAttr.split('-');
        id = slice[1];
        $('#image' + id).click();
    });

    $('input').change(function () {
        readURL(this, id);
    });

    $("#add-product-flash-sale").click(function () {
        let detail_item = '<li class="item-product-flash-sale"><input name="product_id[]" class="form-input" value="" placeholder="Nhập mã sản phẩm"/><input name="quantity[]" class="form-input ml-3" value="" placeholder="Nhập số lượng"/><input name="new_price[]" class="form-input ml-3" value="" placeholder="Nhập giá mới"/><input name="stock[]" class="form-input ml-3" value="" placeholder="Số lượng tồn kho" /><span class="btn-x">X</span></li><script>$(`.btn-x`).click(function () {$(this).parent().remove();});</script>';
        $("#area-product-flash-sale").append(detail_item);
    });

    $("#add-product-hot-sale").click(function () {
        let detail_item = '<li class="item-product-hot-sale"><input name="product_id[]" class="form-input" value="" placeholder="Nhập mã sản phẩm"/><span class="btn-x">X</span></li><script>$(`.btn-x`).click(function () {$(this).parent().remove();});</script>';
        $("#area-product-hot-sale").append(detail_item);
    });

    $(`.btn-x`).click(function () { $(this).parent().remove(); });

    var multiImgPreview = function (input, imgPreviewPlaceholder) {
        if (input.files) {
            var filesAmount = input.files.length;
            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();
                reader.onload = function (event) {
                    $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
                }
                reader.readAsDataURL(input.files[i]);
            }
        }
    };

    $('#images').on('change', function () {
        multiImgPreview(this, 'div.imgPreview');
    });
});

function readURL(input, id) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#showImage' + id).attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

function deleteThumb(idThumb) {
    let urlDelete = '/admin/layout/delete-thumb-layout?id=' + idThumb;
    window.location.href = urlDelete;
}

function handleHideInput(idInput) {
    let inputValue = '0';
    if ($('#' + idInput).is(":checked")) {
        inputValue = '1';
    }

    $('input[name="' + idInput + '"]').val(inputValue);
}
