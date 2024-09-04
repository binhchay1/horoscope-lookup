@extends('layouts.page')

@section('title')
<title>{{ __('Bảo mật thông tin khách hàng') }} | Kattech PC</title>
@endsection

@section('description', __('Bảo mật thông tin khách hàng với Kattech PC'))
@section('keywords', 'secure customer information, secure, customer information kattechpc, kattech')
@section('breadcrumb', __('Bảo mật thông tin khách hàng'))

@section('css')
<link rel="stylesheet" href="{{ asset('css/page/security-customer.css') }}" />
@endsection

@section('content')
<div class="container">
    <div class="footer-container">
        <div class="">
            <div class="policy-step ">
                <div class=" ml-100px">
                    <h1>{{__('CHÍNH SÁCH')}}</h1>
                    <h1>{{__('BẢO MẬT THÔNG TIN KHÁCH HÀNG')}}</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="row top">
        <div class="" id="bill">
            <h2>{{__('CHÍNH SÁCH BẢO MẬT')}}</h2>
            <p>{{__(' Khi sử dụng các sản phẩm và dịch vụ của Kattech, Quý khách đã cung cấp thông tin cho chúng tôi và hãy tin rằng chúng tôi luôn hết mình và định ra nguyên tắc bảo mật thông tin riêng tư, nghiêm ngặt. Quý khách vui lòng đọc bản “Chính sách bảo mật thông tin” dưới đây để hiểu hơn những cam kết mà chúng tôi thực hiện, nhằm tôn trọng và bảo vệ quyền lợi của người dùng. ')}}</p>
            <span>
                {{__('1. Mục đích và phạm vi thu thập')}}
            </span>
            <p>
                {{__('Chúng tôi thu thập, lưu trữ và xử lý thông tin của bạn cho quá trình thực hiện giao dịch, cho những thông báo sau này, hoặc để cung cấp dịch vụ. Chúng tôi không giới hạn các loại thông tin cá nhân thu thập: danh hiệu, tên, giới tính, ngày sinh, email, địa chỉ, số điện thoại, fax, chi tiết thanh toán, chi tiết thanh toán bằng thẻ hoặc chi tiết tài khoản ngân hàng.')}}
            </p>
            <p>
                {{__('Chúng tôi sẽ dùng thông tin quý khách đã cung cấp để xử lý đơn đặt hàng, cung cấp các dịch vụ và thông tin yêu cầu thông qua website và theo yêu cầu của bạn. Hơn nữa, chúng tôi sẽ sử dụng các thông tin đó để quản lý tài khoản của bạn; xác minh và thực hiện giao dịch trực tuyến, kiểm toán việc tải dữ liệu từ web; cải thiện bố cục và nội dung trang web và điều chỉnh cho phù hợp với người dùng; nhận diện khách vào web. Nếu Quý khách không muốn nhận bất cứ thông tin tiếp thị của chúng tôi thì có thể từ chối bất cứ lúc nào.')}}
            </p>
            <p>
                {{__('Các khoản thanh toán trực tuyến sẽ được xử lý bởi các đại lý Mạng lưới Quốc tế của chúng tôi. Quý khách chỉ đưa cho chúng tôi hoặc Đại lý hoặc website những thông tin chính xác, không gây nhầm lẫn và phải thông báo cho chúng tôi nếu có thay đổi.')}}
            </p>
            <p>
                {{__('Chi tiết đơn đặt hàng của Quý khách sẽ được chúng tôi lưu giữ, nhưng vì lý do bảo mật nên chúng tôi sẽ không công khai trực tiếp. Tuy nhiên, người sử dụng có thể tiếp cận thông tin bằng cách đăng nhập tài khoản trên website của Kattech. Tại đây, bạn sẽ thấy chi tiết đơn đặt hàng của mình, mọi chi tiết được gửi qua email. Quý khách hiểu và cam kết sẽ bảo mật dữ liệu cá nhân của mình và không được phép tiết lộ cho bên thứ ba. Chúng tôi không chịu bất kỳ trách nhiệm nào cho việc dùng sai mật khẩu nếu đây không phải lỗi của chúng tôi.')}}
            </p>
            <span>
                {{__('2. Phạm vi sử dụng thông tin')}}
            </span>
            <p>
                {{__('Thông tin của Khách hàng chỉ được sử dụng trong hoạt động quản lý và kinh doanh của website, cũng như cung cấp cho các bên liên kết với công ty. Chúng tôi cũng có thể dùng những thông tin chúng tôi tập hợp được để thông báo đến Khách hàng những sản phẩm hoặc chương trình ưu đãi đang có trên Website. Ngoài ra, chúng tôi có thể liên hệ với Khách hàng để nhận đánh giá, ý kiến và quan điểm về những sản phẩm và những dịch vụ hiện tại hoặc những sản phẩm mới sẽ được ra mắt. Thông tin cá nhân của Khách hàng có thể bị chia sẻ với những công ty khác, nhưng chỉ trong trường hợp cần thiết để đáp ứng các yêu cầu của Khách hàng, hoặc sử dụng cho những mục đích liên quan.')}}
            </p>
            <span>
                {{__('3. Thời gian lưu trữ thông tin')}}
            </span>
            <p>
                {{__('Công ty có hệ thống máy chủ có khả năng lưu trữ thông tin khách hàng tối thiểu là 02 năm và tối đa là 10 năm. Trong quá trình hoạt động, công ty có thể nâng cao khả năng lưu trữ thông tin nếu cần thiết, chúng tôi sẽ xóa đi dữ liệu này nếu Khách hàng có yêu cầu')}}
            </p>
            <span>
                {{__('4. Phương tiện và công cụ để người dùng tiếp cận và chỉnh sửa dữ liệu cá nhân của mình.')}}
            </span>
            <p>
                {{__('Người dùng có thể tiếp cận và chỉnh sửa trực tiếp dữ liệu cá nhân của mình thông qua website bằng cách đăng nhập vào tài khoản mà mình đã đăng ký và sửa lại các thông tin, dữ liệu cá nhân của mình.

Việc đăng nhập có thể thực hiện trên máy tính, điện thoại, hay các công cụ khác có tính năng truy cập vào website.')}}
            </p>
            <span>
                {{__('5. Cam kết bảo mật thông tin cá nhân Khách hàng')}}
            </span>
            <p>
                {{__('Chúng tôi chỉ tập hợp lại các thông tin cá nhân trong phạm vi phù hợp và cần thiết cho mục đích thương mại đúng đắn của chúng tôi. Và chúng tôi duy trì các biện pháp thích hợp nhằm đảm bảo tính an toàn, nguyên vẹn, độ chính xác, và tính bảo mật của những thông tin mà người sử dụng đã cung cấp. Ngoài ra, chúng tôi cũng có những biện pháp thích hợp để đảm bảo rằng bên thứ ba cũng sẽ đảm bảo an toàn cho các thông tin mà chúng tôi cung cấp cho họ.')}}
            </p>
            <p>
                {{__('Thông tin cá nhân, thông tin riêng của người sử dụng được thu thập, lưu trữ và bảo vệ một cách nghiêm túc, chính xác và bảo mật.')}}
            </p>
            <p>
                {{__('Chúng tôi thiết lập những phần mềm thu thập, lưu trữ thông tin riêng biệt và được thực hiện duy nhất bởi hệ thống máy chủ và hệ thống máy chủ dự phòng của chúng tôi.')}}
            </p>
            <p>
                {{__('Việc bảo mật các thông tin cá nhân, thông tin riêng của người sử dụng là tuyệt đối và sẽ không bị xuất trình cho bên thứ ba bất kỳ trừ khi có yêu cầu từ phía cơ quan Nhà nước có thẩm quyền.')}}
            </p>

            <span>
                {{__('6. Cơ chế tiếp nhận và giải quyết khiếu nại liên quan đến việc thông tin cá nhân khách hàng')}}
            </span>
            <p>
                {{__('Thành viên có quyền gửi khiếu nại về việc bị lộ thông tin cá nhân cho bên thứ 3 đến Kattech qua Hotline của chúng tôi: Miền Bắc: 0927 884 885 Miền Nam: 0915 373 527 hoặc qua email: contact@kattech.com.vn')}}
            </p>
            <p>
                {{__('Công ty có trách nhiệm thực hiện các biện pháp kỹ thuật, nghiệp vụ để xác minh các nội dung được phản ánh.')}}
            </p>
            <p>
                {{__('Thời gian xử lý phản ánh liên quan đến thông tin cá nhân Khách hàng là 20 ngày.')}}
            </p>


        </div>
    </div>
</div>

@endsection

@section('js')
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
@endsection
