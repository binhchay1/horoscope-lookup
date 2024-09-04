var storeName = new Array();
var storeFile = new DataTransfer();
var lengthPreview = 0;

$(document).ready(function () {
    $("#add-detail").click(function () {
        let detail_item = '<li class="item-detail"><input name="detail_key[]" class="form-input" value="" placeholder="Nhập tên trường"/><input name="detail_value[]" class="form-input ml-3" placeholder="Nhập tên giá trị"><span class="btn-x">X</span></li><script>$(`.btn-x`).click(function () {$(this).parent().remove();});</script>';
        $("#area-detail").append(detail_item);
    });

    $("#add-detail-tech").click(function () {
        let detail_item_tech = '<li class="item-detail"><input name="detail_tech_key[]" class="form-input" value="" placeholder="Nhập tên trường"/><textarea name="detail_tech_value[]" class="form-input ml-3" placeholder="Nhập tên giá trị"></textarea><span class="btn-x">X</span></li><script>$(`.btn-x`).click(function () {$(this).parent().remove();});</script>';
        $("#area-detail-tech").append(detail_item_tech);
    });

    $(`.btn-x`).click(function () { $(this).parent().remove(); });

    if (status_product == 'edit') {
        lengthPreview = $('#imgPreview li').length;
        let listLiPreview = $('#imgPreview li');
        for (let k = 0; k < listLiPreview.length; k++) {
            storeName.push(listLiPreview.attr('data-id'));
        }
    }

    var multiImgPreview = function (input) {
        if (input.files) {
            for (let i = 0; i < input.files.length; i++) {
                var reader = new FileReader();

                if (status_product == 'create') {
                    reader.onload = function (event) {
                        $('#imgPreview').append('<li data-id="' + input.files[i].name + '" class="ui-sortable-handle"><img id="img-review-' + (i + 1) + '" src="' + event.target.result + '" class="p-2"><button id="button-review-' + (i + 1) + '" type="button" class="btn-delete-image" onclick="deleteImagePreview(this, `' + input.files[i].name + '`)"/>Delete</button></li>');
                    }
                    reader.readAsDataURL(input.files[i]);
                } else {
                    reader.onload = function (event) {
                        $('#imgPreview').append('<li data-id="' + input.files[i].name + '" class="ui-sortable-handle"><img id="img-review-' + (lengthPreview + 1) + '" src="' + event.target.result + '" class="p-2"><button id="button-review-' + (lengthPreview + 1) + '" type="button" class="btn-delete-image" onclick="deleteImagePreview(this, `' + input.files[i].name + '`)"/>Delete</button></li>');
                        lengthPreview++;
                    }
                    reader.readAsDataURL(input.files[i]);
                }

                storeName.push(input.files[i].name);
                storeFile.items.add(input.files[i]);
            }

            input.files = storeFile.files;
        }
    };

    $('#images').on('change', function () {

        if (status_product == 'create') {
            multiImgPreview(this);
        } else {
            let images = $('#images');
            multiImgPreview(images[0]);
        }

        $('#imgPreview').sortable('refresh');
        $('#input-review').val(storeName.join());
    });

    $('#imgPreview').sortable({
        items: 'li',
        cursor: '-webkit-grabbing',
        scrollSensitivity: 40,

        stop: function () {
            let sort = new Array();
            let container = $(this);

            container.find('li').each(function () {
                sort.push($(this).attr('data-id'));
            });
            storeName = sort;

            $('#input-review').val(storeName.join());
        }
    });

    if ($('#productPrice').val() != null || $('#productPrice').val() != '') {
        let input = document.getElementById('productPrice');
        let v = input.value.replace(/\D+/g, '');
        input.value = v.replace(/(^\d{1,3}|\d{3})(?=(?:\d{3})+(?:,|$))/g, '$1.');
    }

    if ($('#productNewPrice').val() != null || $('#productNewPrice').val() != '') {
        let input = document.getElementById('productNewPrice');
        let v = input.value.replace(/\D+/g, '');
        input.value = v.replace(/(^\d{1,3}|\d{3})(?=(?:\d{3})+(?:,|$))/g, '$1.');
    }
});

function deleteImagePreview(button, imgName) {
    let idButton = $(button).attr('id');
    let split = idButton.split('-');
    let id = split[2];
    let idImageReview = '#img-review-' + id;
    let idInputReview = '#input-review-' + id;
    let idButtonReview = '#button-review-' + id;
    let images = $('#images');
    let imgPreview = new Array();

    $(idImageReview).remove();
    $(idInputReview).remove();
    $(idButtonReview).remove();
    storeFile = new DataTransfer();

    for (let i = 0; i < images[0].files.length; i++) {
        if (images[0].files[i].name != imgName) {
            storeFile.items.add(images[0].files[i]);
            imgPreview.push(images[0].files[i].name);
        } else {
            imgName = '';
        }
    }

    storeName = imgPreview;
    images[0].files = storeFile.files;
    lengthPreview = lengthPreview - 1;

    $('#input-review').val(storeName.join());
    $('#imgPreview').sortable('refresh');
}

function onlyNumberAmount(input) {
    let v = input.value.replace(/\D+/g, '');
    input.value = v.replace(/(^\d{1,3}|\d{3})(?=(?:\d{3})+(?:,|$))/g, '$1.');
}
