var url = location.href;
var arrayParam = [];

if (url.indexOf('?') != -1) {
    var ary = url.split('?')[1].split('&');
    for (i = 0; i <= ary.length - 1; i++) {
        var val = ary[i].split('=')[1];
        var param = ary[i].split('=')[0];
        arrayParam[param] = val;
    }
}

for (let g in arrayParam) {
    if (g == 'brand' || g == 'category' || g == 'price' || g == 'sort' || g == 'page') {
        continue;
    }

    $("[data-slug=" + g + "]").val(arrayParam[g]);
}

if (arrayParam['brand'] != undefined) {
    $('#brand-in-product-category').val(arrayParam['brand']);
}

if (arrayParam['category'] != undefined) {
    $('#category-in-product-category').val(arrayParam['category']);
}

$(document).ready(function () {
    var keyPrice = 'price';
    var keySort = 'sort';

    if (keyPrice in arrayParam) {
        let priceCurrent = $("div").find("[data-id='" + arrayParam[keyPrice] + "']");
        priceCurrent.append('<span class="btn-xmark-by-url">x</span>');
        let btnPriceCurrent = priceCurrent.find("button");
        btnPriceCurrent.addClass('border-btn-red');
        btnPriceCurrent.prop("disabled", true);
    }

    if (keySort in arrayParam) {
        let sortCurrent = $("div").find("[data-id='" + arrayParam[keySort] + "']");
        sortCurrent.removeClass("button-filter");
        sortCurrent.append('<span class="btn-xmark-by-url">x</span>');
        let btnSortCurrent = sortCurrent.find("button");
        btnSortCurrent.addClass('border-btn-red');
        btnSortCurrent.prop("disabled", true);
    }

    $('#select-price div button').click(function (event) {
        event.preventDefault();
        let type = $(this).parent().data('type');
        let id = $(this).parent().data('id');
        let url = location.protocol + '//' + location.host + location.pathname;

        if (type == 'price') {
            arrayParam['price'] = id;
        }

        if (type == 'sort') {
            arrayParam['sort'] = id;
        }

        for (var k in arrayParam) {
            if (arrayParam.hasOwnProperty(k)) {
                if (k == Object.keys(arrayParam)[0]) {
                    url += '?' + k + '=' + arrayParam[k];
                } else {
                    url += '&' + k + '=' + arrayParam[k];
                }
            }
        }

        window.location.href = url;
    });

    $('#select-sort div button').click(function (event) {
        event.preventDefault();
        let type = $(this).parent().data('type');
        let id = $(this).parent().data('id');
        let url = location.protocol + '//' + location.host + location.pathname;

        if (type == 'price') {
            arrayParam['price'] = id;
        }

        if (type == 'sort') {
            arrayParam['sort'] = id;
        }

        for (var k in arrayParam) {
            if (arrayParam.hasOwnProperty(k)) {
                if (k == Object.keys(arrayParam)[0]) {
                    url += '?' + k + '=' + arrayParam[k];
                } else {
                    url += '&' + k + '=' + arrayParam[k];
                }
            }
        }

        window.location.href = url;
    });

    $('#select-price').on('click', '.btn-xmark-by-url', function (e) {
        e.preventDefault();

        let url = location.protocol + '//' + location.host + location.pathname;
        let count = 0;
        for (var k in arrayParam) {
            if (k != 'price') {
                if (arrayParam.hasOwnProperty(k)) {
                    if (count == 0) {
                        url += '?' + k + '=' + arrayParam[k];
                        count++;
                    } else {
                        url += '&' + k + '=' + arrayParam[k];
                    }
                }
            }
        }

        window.location.href = url;
    });

    $('#select-sort').on('click', '.btn-xmark-by-url', function (e) {
        e.preventDefault();

        let url = location.protocol + '//' + location.host + location.pathname;
        let count = 0;
        for (var k in arrayParam) {
            if (k != 'sort') {
                if (arrayParam.hasOwnProperty(k)) {
                    if (count == 0) {
                        url += '?' + k + '=' + arrayParam[k];
                        count++;
                    } else {
                        url += '&' + k + '=' + arrayParam[k];
                    }
                }
            }
        }

        window.location.href = url;
    });
});

function sortByKeyWord() {
    let listKeyWord = $('.select-keyword');
    let listValKeyWord = {};
    for (let i = 0; i < listKeyWord.length; i++) {
        let valKeyWord = listKeyWord[i].value;
        let slug = listKeyWord[i].getAttribute('data-slug');
        listValKeyWord[slug] = valKeyWord;
    }

    arrayParam['keyword'] = listValKeyWord;

    let url = location.protocol + '//' + location.host + location.pathname;
    let count = 0;

    if (arrayParam.length == 0) {
        for (var h in arrayParam['keyword']) {
            if (arrayParam['keyword'].hasOwnProperty(h)) {
                if (count == 0) {
                    url += '?' + h + '=' + arrayParam['keyword'][h];
                    count++;
                } else {
                    url += '&' + h + '=' + arrayParam['keyword'][h];
                }
            }
        }
    } else {
        for (var h in arrayParam['keyword']) {
            if (arrayParam['keyword'].hasOwnProperty(h)) {
                url += '&' + h + '=' + arrayParam['keyword'][h];
            }
        }
    }

    let fixUrl = new URL(url)
    window.location.href = fixUrl.href;
}

function sortByCategoryChild(select) {
    let valueCategoryChild = select.val();
    arrayParam['category'] = valueCategoryChild;

    let url = location.protocol + '//' + location.host + location.pathname;
    let count = 0;
    for (var k in arrayParam) {
        if (k != 'price') {
            if (arrayParam.hasOwnProperty(k)) {
                if (count == 0) {
                    url += '?' + k + '=' + arrayParam[k];
                    count++;
                } else {
                    url += '&' + k + '=' + arrayParam[k];
                }
            }
        }
    }

    window.location.href = url;
}

function sortByBrand(select) {
    let valueBrand = select.attr('data-id');
    arrayParam['brand'] = valueBrand;

    let url = location.protocol + '//' + location.host + location.pathname;
    let count = 0;
    for (var k in arrayParam) {
        if (k != 'price') {
            if (arrayParam.hasOwnProperty(k)) {
                if (count == 0) {
                    url += '?' + k + '=' + arrayParam[k];
                    count++;
                } else {
                    url += '&' + k + '=' + arrayParam[k];
                }
            }
        }
    }

    window.location.href = url;
}

function dropMenuHandle(id) {
    let idSVGDown = '.' + id + '-drop-down';
    let idSVGUp = '.' + id + '-drop-up';
    let idArea = '#' + id;

    console.log(idSVGDown, idSVGUp, idArea, $(idArea).css('display') == 'none');
    if ($(idArea).hasClass('d-none-in-mobile')) {
        $(idArea).removeClass('d-none-in-mobile');
        $(idSVGUp).css('display', 'block');
        $(idSVGDown).css('display', 'none');
    } else {
        $(idArea).addClass('d-none-in-mobile');
        $(idSVGUp).css('display', 'none');
        $(idSVGDown).css('display', 'block');
    }
}
