<div class="modal" tabindex="-1" role="dialog" id="modal-detail-warranty-package">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table>
                    <tbody class="list" id="table-body-detail">
                        <tr>
                            <th colspan="2" class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort" style="font-size: 18px; text-align: center;" data-sort="name">{{ __('Mô tả') }}</th>
                        </tr>
                        <tr>
                            <td>{{ __('Thiết bị') }}</td>
                            <td id="modal-warranty-device"></td>
                        </tr>

                        <tr>
                            <td>{{ __('Mô tả dịch vụ') }}</td>
                            <td id="modal-warranty-description"></td>
                        </tr>

                        <tr>
                            <td>{{ __('Loại hình') }}</td>
                            <td id="modal-warranty-type"></td>
                        </tr>

                        <tr>
                            <td>{{ __('Thời gian áp dụng') }}</td>
                            <td id="modal-warranty-time-on"></td>
                        </tr>

                        <tr>
                            <td>{{ __('Gía') }}</td>
                            <td id="modal-warranty-price"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
