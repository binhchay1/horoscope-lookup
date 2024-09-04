<div id="js-modal-popup">
    <div class="mask-popup active">
    </div>
    <div class="popup-select active">
        <div class="row header" id="form-header">
            <div class="col-lg-4 title-popup">
                <h4>{{ __('Chọn linh kiện') }}</h4>
            </div>
            <div class="col-lg-6 no-max-flex-none">
                <div class="wrap">
                    <div class="search">
                        <input type="text" class="searchTerm" placeholder="{{ __('Bạn cần link kiện gì?') }}" id="search-in-modal">
                        <button type="submit" class="searchButton" id="btn-search-in-modal">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-lg-2" style="text-align: right; color: white; font-size: 35px">
                <span class="close-popup"><i class="fa fa-times"></i></span>
            </div>
        </div>

        <div class="row popup-main" id="popup-main">
            <div class="col-lg-4 popup-main_filter w-30 float_l">
                <h4>{{ __('Lọc sản phẩm theo') }}</h4>
                <div class="list-filter">
                    <div class="gr-filter brand">
                        <h5 class="title-filter">{{ __('Hãng sản xuất') }} </h5>
                        <ul id="js-brand-filter" class="ul-filter">

                        </ul>
                    </div>

                    <div class="gr-filter">
                        <h5 class="title-filter">{{ __('Khoảng giá') }} </h5>
                        <ul id="js-price-filter" class="ul-filter">
                            <li id="choice-price-under-1m">
                                <label>
                                    <input type="checkbox" id="input-price-under-1m" onclick="handleSortPrice('price-under-1m')">
                                    <span class="value-filter">{{ ('Dưới 1 triệu') }} (<span id="price-under-1m"> 0 </span>)</span>
                                </label>
                            </li>

                            <li id="choice-price-1m-to-10m">
                                <label>
                                    <input type="checkbox" id="input-price-1m-to-10m" onclick="handleSortPrice('price-1m-to-10m')">
                                    <span class="value-filter">{{ ('1 triệu - 10 triệu') }} (<span id="price-1m-to-10m"> 0 </span>)</span>
                                </label>
                            </li>

                            <li id="choice-price-10m-to-15m">
                                <label>
                                    <input type="checkbox" id="input-price-10m-to-15m" onclick="handleSortPrice('price-10m-to-15m')">
                                    <span class="value-filter">{{ __('10 triệu - 15 triệu') }} (<span id="price-10m-to-15m"> 0 </span>)</span>
                                </label>
                            </li>

                            <li id="choice-price-15m-to-20m">
                                <label>
                                    <input type="checkbox" id="input-price-15m-to-20m" onclick="handleSortPrice('price-15m-to-20m')">
                                    <span class="value-filter">{{ __('15 triệu - 20 triệu') }} (<span id="price-15m-to-20m"> 0 </span>)</span>
                                </label>
                            </li>

                            <li id="choice-price-20m-to-30m">
                                <label>
                                    <input type="checkbox" id="input-price-20m-to-30m" onclick="handleSortPrice('price-20m-to-30m')">
                                    <span class="value-filter">{{ __('20 triệu - 30 triệu') }} (<span id="price-20m-to-30m"> 0 </span>)</span>
                                </label>
                            </li>

                            <li id="choice-price-30m-to-50m">
                                <label>
                                    <input type="checkbox" id="input-price-30m-to-50m" onclick="handleSortPrice('price-30m-to-50m')">
                                    <span class="value-filter">{{ __('30 triệu - 50 triệu') }} (<span id="price-30m-to-50m"> 0 </span>)</span>
                                </label>
                            </li>

                            <li id="choice-price-50m-to-100m">
                                <label>
                                    <input type="checkbox" id="input-price-50m-to-100m" onclick="handleSortPrice('price-50m-to-100m')">
                                    <span class="value-filter">{{ __('50 triệu - 100 triệu') }} (<span id="price-50m-to-100m"> 0 </span>)</span>
                                </label>
                            </li>

                            <li id="choice-price-over-100m">
                                <label>
                                    <input type="checkbox" id="input-price-over-100m" onclick="handleSortPrice('price-over-100m')">
                                    <span class="value-filter">{{ __('Trên 100 triệu') }} (<span id="price-over-100m"> 0 </span>)</span>
                                </label>
                            </li>
                        </ul>
                    </div>

                    <!-- <div class="gr-filter" id="gr-filter">

                    </div> -->
                </div>
            </div>

            <div class=" col-lg-8 popup-main_content w-70 float_r">
                <div class="sort-paging clear">
                    <div class="sort-block float_l">
                        <span>{{ __('Sắp xếp') }}: </span>
                        <select onchange="handelSortProduct(this.value)" id="js-sort-holder">
                            <option value="newest">{{ __('Mới nhất') }}</option>
                            <option value="price-asc">{{ __('Gía từ thấp đến cao') }}</option>
                            <option value="price-desc">{{ __('Gía từ cao đến thấp') }}</option>
                        </select>
                    </div>
                </div>

                <div class="list-product-select" id="js-holder-p_item">

                </div>
            </div>
        </div>
    </div>
</div>
