var isMobileDetected = false;
var indexImage = 0;
$(document).ready(function () {
    var defaultTransProductViewed = 0;
    var defaultTransProductRelated = 0;

    if (WURFL.is_mobile) {
        isMobileDetected = true;

        $('body').addClass("only-mobile-for-body");
        $('.global-fixed-right a').addClass('right-inherit');

        if (window.innerWidth < 650) {
            defaultTransProductViewed = window.innerWidth + 10;
            defaultTransProductRelated = window.innerWidth + 10;
        } else {
            defaultTransProductViewed = 650 + 10;
            defaultTransProductRelated = 650 + 10;
        }
    }

    $('#modalDetail').hide();
    $(".product-image-prev").addClass('d-none');

    $('#read-all-product-detail').on('click', function () {
        $('#modalDetail').show();
    });

    $('.close').click(function () {
        $('#modalDetail').hide();
    });

    $('.js-quantity-change').on('click', function () {
        let value = $(this).data('value');
        let quantity = $('.js-buy-quantity').val();
        let new_quantity = 1;
        if (value == -1) {
            if (quantity == 1) {
                return;
            } else {
                new_quantity = parseInt(quantity) + parseInt(value);

            }
        } else {
            new_quantity = parseInt(quantity) + parseInt(value);
        }

        $('.js-buy-quantity').val(new_quantity);
    });

    $('#showmenu').click(function () {
        $('.menu').slideToggle("fast");
    });

    $('.write_reply').click(function () {
        let key = $(this).attr('data-key');
        $('#reply-comment-' + key).slideToggle("fast");
    });

    $('#modal-detail-warranty-package .close').on('click', function () {
        $('#modal-detail-warranty-package').css('display', 'none');
    });

    let transProductRelated = 0;
    let defaultProductRelated = 6;
    let perTransProductRelated = 235;

    if (isMobileDetected) {
        defaultProductRelated = 1;
    }

    let listChildProductRelated = $(".swiper-product-related").children();
    if (listChildProductRelated.length > defaultProductRelated) {
        let stopProductRelated = listChildProductRelated.length - defaultProductRelated;
        let countProductRelated = 0;
        let intervalProductRelated = setInterval(function () {
            if (isMobileDetected) {
                perTransProductRelated = defaultTransProductRelated;
            }

            if (countProductRelated == stopProductRelated) {
                transProductRelated = 0;
                countProductRelated = 0;
                $('.swiper-product-related').css('transform', 'translate3d(' + transProductRelated + 'px, 0px, 0px)');
            } else {
                transProductRelated = transProductRelated - perTransProductRelated - 2;
                countProductRelated += 1;
                $('.swiper-product-related').css('transform', 'translate3d(' + transProductRelated + 'px, 0px, 0px)');
            }

        }, 3000);

        $('.swiper-button-next-product-related').on('click', function () {
            if (countProductRelated == stopProductRelated) {
                transProductRelated = 0;
                countProductRelated = 0;
                $('.swiper-product-related').css('transform', 'translate3d(' + transProductRelated + 'px, 0px, 0px)');
            } else {
                transProductRelated = transProductRelated - perTransProductRelated;
                countProductRelated += 1;
                $('.swiper-product-related').css('transform', 'translate3d(' + transProductRelated + 'px, 0px, 0px)');
            }

            clearInterval(intervalProductRelated);
        });

        $('.swiper-button-prev-product-related').on('click', function () {
            if (countProductRelated == 0) {
                transProductRelated = 0 - (perTransProductRelated * stopProductRelated);
                countProductRelated = stopProductRelated;
                $('.swiper-product-related').css('transform', 'translate3d(' + transProductRelated + 'px, 0px, 0px)');
            } else {
                transProductRelated = transProductRelated + perTransProductRelated;
                countProductRelated -= 1;
                $('.swiper-product-related').css('transform', 'translate3d(' + transProductRelated + 'px, 0px, 0px)');
            }

            clearInterval(intervalProductRelated);
        });
    } else {
        $('.swiper-button-next-product-related').addClass('d-none');
        $('.swiper-button-prev-product-related').addClass('d-none');
    }

    let transProductViewed = 0;
    let defaultProductViewed = 6;
    let perTransProductViewed = 235;

    if (isMobileDetected) {
        defaultProductViewed = 1;
        perTransProductViewed = 650 + 10;
    }

    let listChildProductViewed = $(".swiper-product-viewed").children();
    if (listChildProductViewed.length > defaultProductViewed) {
        let stopProductViewed = listChildProductViewed.length - defaultProductViewed;
        let countProductViewed = 0;
        let intervalProductViewed = setInterval(function () {
            if (isMobileDetected) {
                perTransProductViewed = defaultTransProductViewed;
            }

            if (countProductViewed == stopProductViewed) {
                transProductViewed = 0;
                countProductViewed = 0;
                $('.swiper-product-viewed').css('transform', 'translate3d(' + transProductViewed + 'px, 0px, 0px)');
            } else {
                transProductViewed = transProductViewed - perTransProductViewed - 2;
                countProductViewed += 1;
                $('.swiper-product-viewed').css('transform', 'translate3d(' + transProductViewed + 'px, 0px, 0px)');
            }

        }, 3000);

        $('.swiper-button-next-product-viewed').on('click', function () {
            if (countProductViewed == stopProductViewed) {
                transProductViewed = 0;
                countProductViewed = 0;
                $('.swiper-product-viewed').css('transform', 'translate3d(' + transProductViewed + 'px, 0px, 0px)');
            } else {
                transProductViewed = transProductViewed - perTransProductViewed;
                countProductViewed += 1;
                $('.swiper-product-viewed').css('transform', 'translate3d(' + transProductViewed + 'px, 0px, 0px)');
            }

            clearInterval(intervalProductViewed);
        });

        $('.swiper-button-prev-product-viewed').on('click', function () {
            if (countProductViewed == 0) {
                transProductViewed = 0 - (perTransProductViewed * stopProductViewed);
                countProductViewed = stopProductViewed;
                $('.swiper-product-viewed').css('transform', 'translate3d(' + transProductViewed + 'px, 0px, 0px)');
            } else {
                transProductViewed = transProductViewed + perTransProductViewed;
                countProductViewed -= 1;
                $('.swiper-product-viewed').css('transform', 'translate3d(' + transProductViewed + 'px, 0px, 0px)');
            }

            clearInterval(intervalProductViewed);
        });
    } else {
        $('.swiper-button-next-product-viewed').addClass('d-none');
        $('.swiper-button-prev-product-viewed').addClass('d-none');
    }

    $("#btn-send-data-comment").click(function () {
        $('#modal-coupon').css('display', 'block');
    });

    $('#modal-coupon .btn-close-comment').on('click', function () {
        $('#modal-coupon').css('display', 'none');
    });
});

function getImageCenter(image) {
    let src = image.src;
    let maxIndex = $('.swiper-slide-image').length;
    indexImage = image.getAttribute('data-index');
    $('.swiper-image').find('.border-image').removeClass('border-image');
    $("[data-index=" + indexImage + "]").addClass('border-image');
    $('#featured-image').attr('src', src);

    if (parseInt(indexImage) != 0) {
        $(".product-image-prev").removeClass('d-none');
    } else {
        $(".product-image-prev").addClass('d-none');
    }

    if (parseInt(indexImage) > maxIndex - 2) {
        $(".product-image-next").addClass('d-none');
    } else {
        $(".product-image-next").removeClass('d-none');
    }
}

function handleSlideImage(status) {
    let maxIndex = $('.swiper-slide-image').length;
    if (status == 'next') {
        if (parseInt(indexImage) < maxIndex) {
            let nextIndex = parseInt(indexImage) + 1;
            $("[data-index=" + indexImage + "]").removeClass('border-image');
            $("[data-index=" + nextIndex + "]").addClass('border-image');
            $("[data-index=" + nextIndex + "]").click();
        }

        if (indexImage > maxIndex - 2) {
            $(".product-image-next").addClass('d-none');
        } else {
            $(".product-image-next").removeClass('d-none');
        }

        if (indexImage > 0) {
            $(".product-image-prev").removeClass('d-none');
        }
    } else {
        if (parseInt(indexImage) > 0) {
            let prevIndex = parseInt(indexImage) - 1;
            $("[data-index=" + indexImage + "]").removeClass('border-image');
            $("[data-index=" + prevIndex + "]").addClass('border-image');
            $("[data-index=" + prevIndex + "]").click();
        }

        if (indexImage > 0) {
            $(".product-image-prev").removeClass('d-none');
        } else {
            $(".product-image-prev").addClass('d-none');
        }

        if (indexImage < maxIndex) {
            $(".product-image-next").removeClass('d-none');
        }
    }
}

function detailWarrantyPackage(warranty) {
    let price = warranty.getAttribute('data-price');
    let type = warranty.getAttribute('data-type');
    let description = warranty.getAttribute('data-description');
    let time_on = warranty.getAttribute('data-time-on');
    let device = warranty.getAttribute('data-device');

    $('#modal-detail-warranty-package').css('display', 'flex');
    $('#modal-warranty-price').html(price);
    $('#modal-warranty-type').html(type);
    $('#modal-warranty-description').html(description);
    $('#modal-warranty-time-on').html(time_on);
    $('#modal-warranty-device').html(device);
}

setTimeout(function () {
    $('.alert-add').remove();
}, 5000);

function loadMore(id) {
    var moreText = document.getElementById("more-detail-product");
    if (moreText.style.display === "none") {
        moreText.style.display = "inline";
        $('#hide-all-product').removeClass('d-none');
        $('#read-all-product').addClass('d-none');
    } else {
        moreText.style.display = "none";
        $('#read-all-product').removeClass('d-none');
        $('#hide-all-product').addClass('d-none');
    }
}

function updateCart(quantity, id) {
    $.get(
        '{{ asset("/cart/update-cart") }}', {
        quantity: quantity,
        id: id
    },
        function () {
            location.reload()
        }
    )
}

function addToCart() {
    let slug = $('#product-to-cart').val();
    let total = $('#quantity-to-cart').val();
    let warranty = $('#warranty-package-check').is(":checked");

    let baseUrl = '/cart/add-to-cart/' + slug + '?total=' + total + '&warranty=' + warranty;

    window.location.href = baseUrl;
}

function buyNowHandle(aTag) {
    let warranty = $('#warranty-package-check').is(":checked");
    let slug = aTag.getAttribute('data-slug');

    let baseUrl = '/cart/add-cart/' + slug + '?warranty=' + warranty;

    window.location.href = baseUrl;
}

function handleReply(input) {
    let id = input.attr('id');
    let split = id.split('_');
    let idElement = '#user-rep-comment-' + split[3];

    $(idElement).css('display', 'block');
}
