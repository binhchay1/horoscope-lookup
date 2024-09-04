@extends('layouts.page')

@section('title')
<title>{{ __('Chính sách, quy định chung') }} | Kattech PC</title>
@endsection

@section('description', __('Chính sách, quy định chung với Kattech PC'))
@section('keywords', 'policy, regulations, kattechpc, kattech')
@section('breadcrumb', __('Chính sách, quy định chung'))

@section('css')
<link rel="stylesheet" href="{{ asset('css/page/rule.css') }}" />
@endsection

@section('content')
<div class="container">
    <div class="footer-container">
        <div class="">
            <div class="policy-step ">
                <div class=" ml-100px">
                    <h1>{{ __('CHÍNH SÁCH, QUY ĐỊNH CHUNG') }}</h1>
                    <h1>{{ __('KATTECH PC')}}</h1>
                </div>
            </div>
        </div>

    </div>
    <div class="row top">
        <div class="" id="condition">
            <div style="padding: 15px">
            <h2>{{ __('1. CHẤP THUẬN CÁC ĐIỀU KIỆN SỬ DỤNG') }}</h2>
            <p class="policy-title">{{ __('● Khi sử dụng Website của KATTECH:')}}</p>
            <p class="policy-title">{{ __('● Quý khách đã mặc nhiên chấp thuận các điều khoản và điều kiện sử dụng được quy định dưới đây. Để biết được các sửa đổi mới nhất, Quý khách nên thường xuyên kiểm tra lại “Điều Kiện Sử Dụng”.') }}</p>
            <p class="policy-title">{{ __('● KATTECH có quyền thay đổi, điều chỉnh, thêm hay bớt các nội dung của “Điều Kiện Sử dụng” tại bất kỳ thời điểm nào. Nếu Quý khách vẫn tiếp tục sử dụng Website sau khi có các thay đổi như vậy thì có nghĩa là Quý khách đã chấp thuận các thay đổi đó.') }}</p>
            </div>
        </div>
        <div class="" id="condition2">
            <div style="padding: 15px">
            <h2>{{__('2. TÍNH CHẤT CỦA THÔNG TIN HIỂN THỊ')}}</h2>
            <p class="policy-title">{{ __('● Các thông tin khác liên quan nhằm phục vụ nhu cầu tìm hiểu của khách hàng đều được ghi rõ nguồn cung cấp.') }}</p>
            <p class="policy-title">{{ __('● Các nội dung hiển thị trên Website nhằm mục đích cung cấp thông tin về KATTECH, về thông tin sản phẩm và dịch vụ mà mà KATTECH đang cung cấp.') }}</p>
            </div>
            </div>
    </div>

    <div class="row top">
        <div class="" id="condition">
            <div style="padding: 15px">
            <h2>{{ __('3. LIÊN KẾT ĐẾN WEBSITE KHÁC') }}</h2>
            <p class="policy-title">{{ __('● Website cung cấp một số liên kết tới trang Web hoặc nguồn dữ liệu khác. Quý khách tự chịu trách nhiệm khi sử dụng các liên kết này. KATTECH không tiến hành thẩm định hay xác thực nội dung, tính chính xác, quan điểm thể hiện tại các trang Web và nguồn dữ liệu liên kết này.')}}</p>
            <p class="policy-title">{{ __('● KATTECH từ chối bất cứ trách nhiệm pháp lý nào liên quan tới tính chính xác, nội dung thể hiện, mức độ an toàn và việc cho hiển thị hay che đi các thông tin trên các trang Web và nguồn dữ liệu nói trên.')}}</p>
            </div>
        </div>
        <div class="" id="condition2">
            <div style="padding: 15px">
            <h2>{{ __('4. LIÊN KẾT TỪ WEBSITE KHÁC') }}</h2>
            <p class="policy-title">{{ __('KATTECH không cho phép bất kỳ nhà cung cấp dịch vụ internet nào được phép “đặt toàn bộ” hay “nhúng” bất kỳ thành tố nào của Website này sang một trang khác hoặc sử dụng các kỹ thuật làm thay đổi giao diện / hiển thị mặc định của Website mà chưa có sự đồng ý của KATTECH.')}}</p>
            </div>
        </div>
    </div>

    <div class="row top">
        <div class="" id="condition">
            <div style="padding: 15px">
            <h2>{{ __('5. MIỄN TRỪ TRÁCH NHIỆM') }}</h2>
            <p class="policy-title">{{ __('Khi truy cập vào website này, quý khách mặc nhiên đồng ý rằng KATTECH, các nhà cung cấp khác cùng với đối tác liên kết, nhân viên của họ không chịu bất cứ trách nhiệm nào liên quan đến thương tật, mất mát, khiếu kiện, thiệt hại trực tiếp hoặc gián tiếp do không lường trước hoặc do hậu quả để lại dưới bất cứ hình thức nào phát sinh từ việc:') }}</p>
            <p class="policy-title">{{ __('● KATTECH từ chối trách nhiệm hay đưa ra đảm bảo rằng website sẽ không có lỗi vận hành, an toàn, không bị gián đoạn hay tính chính xác, đầy đủ và đúng hạn của các thông tin hiển thị. Thông tin hiển thị tại website này không đi kèm bất kỳ đảm bảo hay cam kết trách nhiệm từ phía KATTECH về sự phù hợp của sản phẩm, dịch vụ mà người mua đã lựa chọn.') }}</p>
            <p class="policy-title">{{ __('● Các điều kiện và hạn chế nêu trên chỉ có hiệu lực trong khuôn khổ pháp luật hiện hành.')}}</p>

            </div>
        </div>
        <div class="" id="condition2">
            <div style="padding: 15px">
            <h2>{{__('6. QUYỀN SỞ HỮU TRÍ TUỆ')}}</h2>
            <p class="policy-title">{{ __(' ● Website này và mọi nội dung xếp đặt, hiển thị đều thuộc sở hữu và là tài sản độc quyền khai thác của KATTECH và các nhà cung cấp có liên quan khác.')}}</p>
            <p class="policy-title">{{ __('● Tất cả các nội dung được cung cấp tại Website này không được phép nhân bản, hiển thị, công bố, phổ biến, đưa tin tức hay lưu hành cho bất cứ ai, dưới bất kỳ hình thức nào, kể cả trên các Website độc lập khác mà không được sự chấp thuận của KATTECH.') }}</p>
            </div>
            </div>
    </div>

    <div class="row top rule7">
        <div class="" id="condition">
            <div style="padding: 15px">
            <h2>{{ __('7. ĐIỀU CHỈNH VÀ SỬA ĐỔI') }}</h2>
            <p class="policy-title">{{ __('● KATTECH bảo lưu quyền thay đổi, chỉnh sửa hoặc chấm dứt hoạt động của Website này vào bất cứ thời điểm nào.') }}</p>
        </div>
        </div>
    </div>
</div>
@endsection
