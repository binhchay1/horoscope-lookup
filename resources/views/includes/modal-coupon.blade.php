<div class="modal" tabindex="-1" role="dialog" id="modal-coupon">
    <div class="modal-dialog" role="document" style="margin: auto;">
        <div class="modal-content" style="width: auto">
            <div class="modal-header">
                <div class="title-header-map">
                    <p>{{ __('Chọn mã khuyến mãi') }}</p>
                </div>
            </div>
            <div class="modal-body popup-showrom-container modal-coupon-content">
                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                <div class="d-flex justify-content-center align-items-center">
                    <label style="margin: 0;">{{ __('Mã khuyến mãi') }}</label>
                    <input type="text" class="input-with-validator ml-10px" placeholder="{{ __('Nhập mã khuyến mãi') }}">
                    <a type="button" class="btn-submit before-submit promo-code-cta ml-10px">{{ __('Áp dụng') }}</a>
                </div>
                <div>
                    <p class="error_msg_modal" style="color: red"></p>
                </div>

                <hr>

                <div class="modal-coupon-area">
                    <div class="modal-coupon-area" id="modal-coupon-area-active">

                    </div>
                    <div class="modal-coupon-area" id="modal-coupon-area-de-active">

                    </div>
                </div>

                <hr>

                <div class="modal-button-coupon-area">
                    <a type="button" class="btn-submit after-submit submit-disable promo-code-cta">{{ __('Áp dụng') }}</a>
                    <a type="button" class="btn-close ml-10px">{{ __('Đóng') }}</a>
                </div>

            </div>
        </div>
    </div>
</div>
