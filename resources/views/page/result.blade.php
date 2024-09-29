@extends('layouts.page')

@section('title')
<title>Kết quả</title>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/page/auth.css') }}" />
@endsection

@section('content')
<div id="result-content">
    <div class="content-container p-10" id="content-more" style="">
        <div class="text-center m-t-10" style="background: #f6f6f6;padding: 10px;border-radius: 10px;">
            <p class="text-danger m-b-8">Để xem luận giải chi tiết về lá số, vui lòng đăng ký tài khoản VIP!</p>
            <a href="purchase" target="_blank"><button class="btn btn-success" style="padding: 2px 4px;font-size:13px;"><i class="fas fa-external-link-alt"></i> Tới trang đăng ký VIP</button></a>
        </div>
        <div id="TUVI_LASO" style="margin:auto; margin-top:10px; max-width: 700px;max-height: 1026px;overflow: hidden;position: relative;">
            <div class="m-b-10 pdf-app" style="height:calc(142vw); overflow: scroll;">
                <div class="pdf-toolbar">LÁ SỐ TỬ VI CỦA BẠN <a href="pdf/laso_pdf?c=0DWMQSwkPBSOR4TgjgCH" target="_blank"><button class="btn btn-primary" style="padding: 1px 4px;font-size:12px;"><i class="fas fa-download"></i> Tải lá số</button></a></div>
                <div class="pdf-viewport-container">
                    <div role="main" id="viewport" class="pdf-viewport">
                        <div style="width:100%"><canvas height="1892" width="1338"></canvas></div>
                    </div>
                </div>
            </div>
            <div id="pdf-view-yinyang" style="position: absolute; width: 300px; height: 300px; top: 363px; left: 200px;">
                <div class="yinyang"></div>
            </div>
        </div>
        <div class="text-left m-t-10 box-bg">
            <p class="font-weight-bold m-b-1" style="font-size:15px">1. LUẬN GIẢI TỔNG QUAN CỦA BẠN</p>
            <p class="font-italic m-b-8 m-t-1 description">Phần này luận giải thiên bàn trong lá số và đem đến thông tin tổng quát về lá số của bạn.</p>
            <p class="content"><em class="font-weight-bold">- Bản mệnh của bạn</em><br><span class="text-left text-danger" style="font-size: 12px;">Bạn cần nâng cấp Vip để xem được luận giải của mục này!</span><br><br><em class="font-weight-bold">- Cục mệnh của bạn</em><br><span class="text-left text-danger" style="font-size: 12px;">Bạn cần nâng cấp Vip để xem được luận giải của mục này!</span><br><br><em class="font-weight-bold">- Chủ mệnh của bạn</em><br><span class="text-left text-danger" style="font-size: 12px;">Bạn cần nâng cấp Vip để xem được luận giải của mục này!</span><br><br><em class="font-weight-bold">- Chủ thân của bạn</em><br><span class="text-left text-danger" style="font-size: 12px;">Bạn cần nâng cấp Vip để xem được luận giải của mục này!</span><br><br><em class="font-weight-bold">- Lai nhân</em><br><span class="text-left text-danger" style="font-size: 12px;">Bạn cần nâng cấp Vip để xem được luận giải của mục này!</span><br><br><em class="font-weight-bold">- Cân lượng của bạn</em><br><span class="text-left text-danger" style="font-size: 12px;">Bạn cần nâng cấp Vip để xem được luận giải của mục này!</span><br><br><em class="font-weight-bold">- Thân cư</em><br><span class="text-left text-danger" style="font-size: 12px;">Bạn cần nâng cấp Vip để xem được luận giải của mục này!</span><br></p>
        </div>
        <div class="text-left m-t-10 box-bg">
            <p class="font-weight-bold m-b-1" style="font-size:15px">2. Luận về cung Mệnh</p>
            <p class="font-italic m-b-8 m-t-1 description">Đây là cung quan trọng nhất trong 12 cung, là trọng tâm của toàn bộ mệnh bàn, là điểm then chốt của mệnh vận đời người, việc hoặc vật xung quanh nó của một đời người. Trong lúc luận đoán 12 cung đều phải lấy cung Mệnh làm chuẩn, để nhìn ra dung mạo, tính cách, tài năng, tư tưởng, mức độ phát triển, vận thế tiên thiên, gặp cơ hội tốt hay xấu, tiền đồ quyết định một đời người. Đây chính là then chốt của cát hung thành bại của một người. Lúc luận mệnh số, lấy cung Mệnh là chính, cung tam phương tứ chính là phụ, cùng quyết định mức độ thành tựu cao nhất của một đời người và cách cục mệnh vận một đời cao hay thấp, đây là mệnh số tiên thiên. Nếu mệnh số tiên thiên tốt, nhưng vận thế hậu thiên (tức đại vận và lưu niên) kém, khi gặp khốn khó sẽ được trời phù hộ, người giúp đỡ mà vượt qua. Nếu mệnh số tiên thiên kém, mà vận thế hậu thiên tốt, thì trải qua nỗ lực dốc hết sức để giành lấy, bạn có thể sửa đổi được mệnh số tiên thiên, nhưng chỉ với một độ tương đối, do bị mệnh số tiên thiên hạn chế.</p>
            <div class="content">
                <div style="text-align:center;margin: auto;width: 100px;height: 100px;
            border-radius:50px;border: 5px solid rgb(40,167,69);
            color:rgb(40,167,69);">
                    <p class="font-weight-bold fs-24 m-t-10 m-b-5">82</p>
                    <p class="font-italic fs-16">điểm</p>
                </div>
                <p class="text-center m-b-0 m-t-5 fs-14 font-weight-bold">Đánh giá chung về cung Mệnh của bạn: RẤT TỐT (82/100 điểm)</p><br><em class="text-danger">Bạn cần nâng cấp Vip để xem được luận giải của mục này!</em>
            </div>
        </div>
        <div class="text-left m-t-10 box-bg">
            <p class="font-weight-bold m-b-1" style="font-size:15px">3. Luận về Công danh, sự nghiệp</p>
            <p class="font-italic m-b-8 m-t-1 description">Ở mục này, chúng tôi sử dụng cung Quan Lộc của bạn làm chính cung để luận giải về công danh và sự nghiệp.<br>Cung Quan Lộc đại biểu cho công danh lợi lộc, chức vị, thái độ làm việc, năng lực lập nên sự nghiệp, nghề nghiệp thích hợp, tình hình phát triển sự nghiệp của mệnh chủ. Trong thời kỳ còn đi học, có thể xem về tình trạng học lực, thi cử, nếu gặp cung Quan Lộc có Văn Xương, Văn Khúc, Thiên Khôi, Thiên Việt, mà không gặp sát tinh xung phá, thì rất tốt, thi cử ắt đỗ đạt. Người trưởng thành nếu cung Quan Lộc gặp Hóa Kị, sẽ hay thay đổi công việc, người làm quan gặp Hóa Lộc và Hóa Quyền, thì sẽ thăng chức, thăng tiến, và nắm được quyền lớn. Còn có thể xem lối suy nghĩ và thái độ của người phối ngẫu đối với mệnh chủ.</p>
            <div class="content">
                <div style="text-align:center;margin: auto;width: 100px;height: 100px;
            border-radius:50px;border: 5px solid #000;">
                    <p class="font-weight-bold fs-24 m-t-10 m-b-5"><i class="fas fa-eye-slash text-danger"></i></p>
                    <p class="font-italic fs-16">điểm</p>
                </div>
                <p class="text-center m-b-0 m-t-5 fs-14 font-weight-bold">Đánh giá chung về cung Quan lộc của bạn: <i class="fas fa-eye-slash text-danger"></i> (<i class="fas fa-eye-slash text-danger"></i>/100 điểm)</p><br><em class="text-danger">Bạn cần nâng cấp Vip để xem được điểm đánh giá và luận giải của mục này!</em>
            </div>
        </div>
        <div class="text-left m-t-10 box-bg">
            <p class="font-weight-bold m-b-1" style="font-size:15px">4. Luận về Tiền tài</p>
            <p class="font-italic m-b-8 m-t-1 description">Ở mục này, chúng tôi sử dụng cung Tài bạch của bạn làm chính cung để luận giải về vấn đề tiền tài.<br>Cung Tài Bạch dùng để xem năng lực hoạt động kinh tế và quản lý tiền bạc của mệnh chủ, cách vận dụng tiền tài và vận dụng vào đâu, khuynh hướng phát triển tài vận, thu nhập cao hay thấp, năng lực kiếm tiền và kiếm tiền bằng kiểu gì, là thu nhập theo con đường chính hay là nhờ hoạnh tài mà trở nên giàu có, hưởng thụ vật chất có được ổn định và sung túc hay không. Ta lấy cung này để xem phương vị cầu tài.</p>
            <div class="content">
                <div style="text-align:center;margin: auto;width: 100px;height: 100px;
            border-radius:50px;border: 5px solid #000;">
                    <p class="font-weight-bold fs-24 m-t-10 m-b-5"><i class="fas fa-eye-slash text-danger"></i></p>
                    <p class="font-italic fs-16">điểm</p>
                </div>
                <p class="text-center m-b-0 m-t-5 fs-14 font-weight-bold">Đánh giá chung về cung Tài bạch của bạn: <i class="fas fa-eye-slash text-danger"></i> (<i class="fas fa-eye-slash text-danger"></i>/100 điểm)</p><br><em class="text-danger">Bạn cần nâng cấp Vip để xem được điểm đánh giá và luận giải của mục này!</em>
            </div>
        </div>
        <div class="text-left m-t-10 box-bg">
            <p class="font-weight-bold m-b-1" style="font-size:15px">5. Luận về Tình duyên, hôn nhân</p>
            <p class="font-italic m-b-8 m-t-1 description">Ở mục này, chúng tôi sử dụng cung Phu thê của bạn làm chính cung để luận giải về tình duyên và hôn nhân.<br>Cung Phu Thê đại biểu cho người phối ngẫu, có thể biểu thị dung mạo, tính tình, tài năng, tình huống thành tựu của người bạn đời. Cũng có thể dùng để xem tình trạng yêu đương và hôn nhân, sự khắc hợp của mệnh chủ, xem quan hệ tình cảm và duyên phận giữa vợ chồng, cũng đại biểu cho thái độ của mệnh chủ đối với người phối ngẫu.</p>
            <div class="content">
                <div style="text-align:center;margin: auto;width: 100px;height: 100px;
            border-radius:50px;border: 5px solid #000;">
                    <p class="font-weight-bold fs-24 m-t-10 m-b-5"><i class="fas fa-eye-slash text-danger"></i></p>
                    <p class="font-italic fs-16">điểm</p>
                </div>
                <p class="text-center m-b-0 m-t-5 fs-14 font-weight-bold">Đánh giá chung về cung Phu thê của bạn: <i class="fas fa-eye-slash text-danger"></i> (<i class="fas fa-eye-slash text-danger"></i>/100 điểm)</p><br><em class="text-danger">Bạn cần nâng cấp Vip để xem được điểm đánh giá và luận giải của mục này!</em>
            </div>
        </div>
        <div class="text-left m-t-10 box-bg">
            <p class="font-weight-bold m-b-1" style="font-size:15px">6. Luận về Cha mẹ</p>
            <p class="font-italic m-b-8 m-t-1 description">Ở mục này, chúng tôi sử dụng cung Phụ mẫu của bạn làm chính cung để luận giải về gia đình và các vấn đề với cha mẹ.<br>Cung Phụ Mẫu đại biểu cho tính tình, tài năng, sự nghiệp, tình hình cát hung của cha mẹ (chủ yếu là cha); duyên phận, tình cảm giữa mệnh chủ với cha mẹ, và tình hình được hưởng ân huệ từ cha mẹ, xem mệnh chủ có phải dựa vào bản thân tay trắng lập nghiệp, cũng đại biểu cho trưởng bối, thầy, thượng cấp, cũng chính là xem có chỗ dựa hay không. Cho nên lúc đi làm, cung Phụ Mẫu cũng dùng để xem về thượng cấp hoặc ông chủ, và mối quan hệ giữa họ với mệnh chủ có hòa hợp hay không. Cung Phụ Mẫu còn gọi là cung tướng mạo, lúc xem tướng mạo của mệnh chủ, lấy cung Mệnh là chính, còn phải xem kèm cung Phụ Mẫu, cung Phụ Mẫu biểu thị tình trạng tru liệt về di truyền, còn gọi là tuyến đầu óc. Xem ảnh hưởng của cha mẹ đối với mệnh chủ, như sự thông minh tài trí và tư tưởng, phương thức tư duy, học thức, trình độ văn hóa... có liên quan rất lớn với cung này.
                Khi xem vận lúc bé và vận lúc trẻ cần phải tham khảo cung Phụ Mẫu, để biết cuộc sống tốt hay xấu, và có được cha mẹ quan tâm lo lắng hay không. Cung Phụ Mẫu không tốt nửa cuộc đời lúc trẻ là lao tâm lao lực, thân tâm đều rất mệt mỏi. Cung Phụ Mẫu còn là cung văn thư; cổ thế dùng để xem các sự việc liên quan đến pháp luật, văn bằng, văn thư, khế ước, hợp đồng, kiện tụng...</p>
            <div class="content">
                <div style="text-align:center;margin: auto;width: 100px;height: 100px;
            border-radius:50px;border: 5px solid #000;">
                    <p class="font-weight-bold fs-24 m-t-10 m-b-5"><i class="fas fa-eye-slash text-danger"></i></p>
                    <p class="font-italic fs-16">điểm</p>
                </div>
                <p class="text-center m-b-0 m-t-5 fs-14 font-weight-bold">Đánh giá chung về cung Phụ mẫu của bạn: <i class="fas fa-eye-slash text-danger"></i> (<i class="fas fa-eye-slash text-danger"></i>/100 điểm)</p><br><em class="text-danger">Bạn cần nâng cấp Vip để xem được điểm đánh giá và luận giải của mục này!</em>
            </div>
        </div>
        <div class="text-left m-t-10 box-bg">
            <p class="font-weight-bold m-b-1" style="font-size:15px">7. Luận về Anh/Chị/Em</p>
            <p class="font-italic m-b-8 m-t-1 description">Ở mục này, chúng tôi sử dụng cung Huynh đệ của bạn làm chính cung để luận giải về gia đình và các vấn đề với anh chị em ruột.<br>Cung Huynh Đệ chủ yếu đại biểu cho anh chị em trong gia đình, tại cung này biểu thị được ít nhiều về dung mạo, tính tình, tài năng, mức độ thành tựu, tình huống phát triển của anh chị em, quan hệ giữa họ với mệnh chủ tốt hay xấu, có giúp ích hay không. Còn có thể xem kiếm cả bạn bè có quan hệ mật thiết, lẫn mối quan hệ hợp tác trong sự nghiệp.</p>
            <div class="content">
                <div style="text-align:center;margin: auto;width: 100px;height: 100px;
            border-radius:50px;border: 5px solid #000;">
                    <p class="font-weight-bold fs-24 m-t-10 m-b-5"><i class="fas fa-eye-slash text-danger"></i></p>
                    <p class="font-italic fs-16">điểm</p>
                </div>
                <p class="text-center m-b-0 m-t-5 fs-14 font-weight-bold">Đánh giá chung về cung Huynh đệ của bạn: <i class="fas fa-eye-slash text-danger"></i> (<i class="fas fa-eye-slash text-danger"></i>/100 điểm)</p><br><em class="text-danger">Bạn cần nâng cấp Vip để xem được điểm đánh giá và luận giải của mục này!</em>
            </div>
        </div>
        <div class="text-left m-t-10 box-bg">
            <p class="font-weight-bold m-b-1" style="font-size:15px">8. Luận về Con cái</p>
            <p class="font-italic m-b-8 m-t-1 description">Ở mục này, chúng tôi sử dụng cung Tử tức của bạn làm chính cung để luận giải về đường con cái.<br>Cung Tử Tức đại biểu cho số con cái, có thể biểu thị dung mạo, tính tình, tài năng, mức độ thành tựu, tiền đồ phát triển, và quan hệ tình cảm với mệnh chủ. Đây còn là điềm báo tình trạng của cơ quan sinh dục, năng lực chuyện sinh con đẻ cái, và tình hình sinh hoạt tình dục giữa vợ chồng. Cung Tử Tức xung chiếu với cung Điền Trạch nhưng tam hợp với cung Phụ Mẫu, từ đó có ảnh hưởng tốt xấu tới cung Mệnh</p>
            <div class="content">
                <div style="text-align:center;margin: auto;width: 100px;height: 100px;
            border-radius:50px;border: 5px solid #000;">
                    <p class="font-weight-bold fs-24 m-t-10 m-b-5"><i class="fas fa-eye-slash text-danger"></i></p>
                    <p class="font-italic fs-16">điểm</p>
                </div>
                <p class="text-center m-b-0 m-t-5 fs-14 font-weight-bold">Đánh giá chung về cung Tử tức của bạn: <i class="fas fa-eye-slash text-danger"></i> (<i class="fas fa-eye-slash text-danger"></i>/100 điểm)</p><br><em class="text-danger">Bạn cần nâng cấp Vip để xem được điểm đánh giá và luận giải của mục này!</em>
            </div>
        </div>
        <div class="text-left m-t-10 box-bg">
            <p class="font-weight-bold m-b-1" style="font-size:15px">9. Luận về Sức khỏe</p>
            <p class="font-italic m-b-8 m-t-1 description">Ở mục này, chúng tôi sử dụng cung Tật ách của bạn làm chính cung để luận giải về sức khỏe và bệnh tật.<br>Cung Tật Ách đại biểu cho thân thể của mệnh chủ, tình trạng sức khỏe, căn nguyên của bệnh và xu hướng của sức khỏe, có thể nhìn ra bộ phận yếu nhất trong cơ thể mệnh chủ, nguồn gốc nạn tai bệnh tật, dễ xảy ra loại sự cố bất trắc hay tật bệnh hung hiểm nào, và bộ phận bị tốn thương, v.v...
                Con người ai cũng sẽ trải qua hành trình Sinh - Lão - Bệnh - Tử, đây là quy luật tất yếu của cuộc sống. Cung Tật Ách sẽ chủ về những nguy cơ về bệnh tật mà bạn có thể mắc phải, để từ đó bạn biết cách chú ý và chăm sóc sức khỏe của mình tốt hơn. Nếu điểm cung thấp, bạn nên rèn luyện sức khỏe nhiều hơn, thay đổi thói quen sinh hoạt cũng như thăm khám bệnh thường xuyên để có thể cải thiện sức khỏe một cách tốt nhất. Bạn cũng không nên quá lo lắng vì chúng ta hoàn toàn có thể thay đổi kết quả nếu như chúng ta nỗ lực, "tích phúc cải mệnh", quyết định và lựa chọn của bạn ngày hôm nay có thể giúp bạn tốt hơn trong tương lai.</p>
            <div class="content">
                <div style="text-align:center;margin: auto;width: 100px;height: 100px;
            border-radius:50px;border: 5px solid #000;">
                    <p class="font-weight-bold fs-24 m-t-10 m-b-5"><i class="fas fa-eye-slash text-danger"></i></p>
                    <p class="font-italic fs-16">điểm</p>
                </div>
                <p class="text-center m-b-0 m-t-5 fs-14 font-weight-bold">Đánh giá chung về cung Tật ách của bạn: <i class="fas fa-eye-slash text-danger"></i> (<i class="fas fa-eye-slash text-danger"></i>/100 điểm)</p><br><em class="text-danger">Bạn cần nâng cấp Vip để xem được điểm đánh giá và luận giải của mục này!</em>
            </div>
        </div>
        <div class="text-left m-t-10 box-bg">
            <p class="font-weight-bold m-b-1" style="font-size:15px">10. Luận về Nhà cửa, đất đai</p>
            <p class="font-italic m-b-8 m-t-1 description">Ở mục này, chúng tôi sử dụng cung Điền trạch của bạn làm chính cung để luận giải về nhà cửa và đất đai.<br>Cung Điền Trạch đại biểu cho tình hình gia đình, nhà ở, kho tiền, bất động sản, xem người nhà, gia trạch có yên ổn hay không, xem hoàn cảnh cư trú, tình trạng bài trí và xếp đặt nội thất, xem có gia sản của cha ông hay không, và tình hình đắc thất thế nào, có dành dụm tiền được hay không, năng lực giao dịch bất động sản. Cũng dùng để xem tình hình dời nhà tốt hay xấu, tình hình kho chứa thế nào, tình trạng mua bán bất động sản (chủ yếu xem cung Điền Trạch của đại vận hoặc lưu niên).</p>
            <div class="content">
                <div style="text-align:center;margin: auto;width: 100px;height: 100px;
            border-radius:50px;border: 5px solid #000;">
                    <p class="font-weight-bold fs-24 m-t-10 m-b-5"><i class="fas fa-eye-slash text-danger"></i></p>
                    <p class="font-italic fs-16">điểm</p>
                </div>
                <p class="text-center m-b-0 m-t-5 fs-14 font-weight-bold">Đánh giá chung về cung Điền trạch của bạn: <i class="fas fa-eye-slash text-danger"></i> (<i class="fas fa-eye-slash text-danger"></i>/100 điểm)</p><br><em class="text-danger">Bạn cần nâng cấp Vip để xem được điểm đánh giá và luận giải của mục này!</em>
            </div>
        </div>
        <div class="text-left m-t-10 box-bg">
            <p class="font-weight-bold m-b-1" style="font-size:15px">11. Luận về Bạn bè</p>
            <p class="font-italic m-b-8 m-t-1 description">Ở mục này, chúng tôi sử dụng cung Nô bộc của bạn làm chính cung để luận giải về vấn đề giao lưu xã hội và bạn bè thân thiết.<br>Cung Nô Bộc đại biểu cho bạn bè thông thường, đồng sự, người dưới, thuộc hạ, người mệnh chủ thuê mướn, người làm công, nhân viên, người hợp tác, xem họ có đắc lực hay không, có giúp ích cho mệnh chủ hay không, xem mệnh chủ có được mọi người phục hay không, quan hệ giao tế và duyên với người chung quanh nhiều hay ít, và tình trạng kẻ thù; có thể xem được tai họa do người khác gây ra. Nếu cung Nô Bộc không tốt, lúc đến cung Nô Bộc của đại vận hoặc lưu niên, càng dễ bị tiểu nhân bắt nạt, hãm hại, lừa tiền. Đối tượng yêu đương và tình nhân sau khi kết hôn cũng có thể xem ở cung này.</p>
            <div class="content">
                <div style="text-align:center;margin: auto;width: 100px;height: 100px;
            border-radius:50px;border: 5px solid #000;">
                    <p class="font-weight-bold fs-24 m-t-10 m-b-5"><i class="fas fa-eye-slash text-danger"></i></p>
                    <p class="font-italic fs-16">điểm</p>
                </div>
                <p class="text-center m-b-0 m-t-5 fs-14 font-weight-bold">Đánh giá chung về cung Nô bộc của bạn: <i class="fas fa-eye-slash text-danger"></i> (<i class="fas fa-eye-slash text-danger"></i>/100 điểm)</p><br><em class="text-danger">Bạn cần nâng cấp Vip để xem được điểm đánh giá và luận giải của mục này!</em>
            </div>
        </div>
        <div class="text-left m-t-10 box-bg">
            <p class="font-weight-bold m-b-1" style="font-size:15px">12. Luận về Dòng họ</p>
            <p class="font-italic m-b-8 m-t-1 description">Ở mục này, chúng tôi sử dụng cung Phúc đức của bạn làm chính cung để luận giải về gia đình và các thế hệ đi trước.<br>Cung Phúc Đức là cung chủ về tư tưởng tinh thần, sinh hoạt hưởng thụ, còn đại biểu cho tuổi thọ của mệnh chủ, phúc phận tiên thiên và phúc ấm của cha ông (bao gồm hưởng thụ vật chất lẫn tinh thần), xem có hạnh phúc hay không, vất vả hay an nhàn, cách thức hưởng thụ vật chất, hay được hưởng thụ một phương diện nào đó, biểu thị tình trạng tu dưỡng của mệnh chủ tốt hay xấu, trạng thái tâm lý về phương diện hưởng thụ, thế giới nội tâm, tư tưởng và phẩm hạnh tốt hay xấu, xem tinh thần của mệnh chủ có vui vẻ hay không, lạc quan hay là bi quan, siêng năng hay là lười biếng, biểu thị hứng thú, yêu thích, xem có nhiều thị hiếu hay không. Có thể căn cứ tình của sao trong cung thì có thể biết mệnh chủ chủ yếu muốn làm gì nhất. Còn biểu thị nguồn để kiếm tiền, nơi tiền đến, xem nguồn để kiếm tiền có nhiều hay không, xem sinh hoạt vật chất của mệnh chủ ưu hay liệt, cách tiêu xài, tiền đi về đâu, hoàn cảnh đầu tư tốt hay xấu và năng lực quản lý tiền bạc thế nào.
                Cung Phúc Đức liên quan đến bà con họ hàng, mộ phần dòng tộc. Ngoài ra, cung Phúc Đức còn cho biết có thể tìm kiếm được bạn đời phù hợp. Nếu cung Phúc Đức tốt thì dù Mệnh, Ách xấu đều có thể tai qua nạn khỏi. Cung này xấu thường phải xa xứ làm ăn, tự thân lập nghiệp</p>
            <div class="content">
                <div style="text-align:center;margin: auto;width: 100px;height: 100px;
            border-radius:50px;border: 5px solid #000;">
                    <p class="font-weight-bold fs-24 m-t-10 m-b-5"><i class="fas fa-eye-slash text-danger"></i></p>
                    <p class="font-italic fs-16">điểm</p>
                </div>
                <p class="text-center m-b-0 m-t-5 fs-14 font-weight-bold">Đánh giá chung về cung Phúc đức của bạn: <i class="fas fa-eye-slash text-danger"></i> (<i class="fas fa-eye-slash text-danger"></i>/100 điểm)</p><br><em class="text-danger">Bạn cần nâng cấp Vip để xem được điểm đánh giá và luận giải của mục này!</em>
            </div>
        </div>
        <div class="text-left m-t-10 box-bg">
            <p class="font-weight-bold m-b-1" style="font-size:15px">13. Luận về Di chuyển</p>
            <p class="font-italic m-b-8 m-t-1 description">Ở mục này, chúng tôi sử dụng cung Thiên di của bạn làm chính cung để luận giải về việc đi lại và lập nghiệp gần xa.<br>Cung Thiên Di và cung Mệnh có quan hệ rất mật thiết, như bóng với hình, là mặt trong và mặt ngoài của nhau, cung Mệnh chủ về bên trong, cung Thiên Di chủ về bên ngoài. Nó đại biểu cho không gian, năng lực, và địa vị về hoạt động xã hội, mức độ của quan hệ đối ngoại, cơ hội gặp được và tình hình được xã hội ủng hộ, năng lực thích ứng hoàn cảnh xã hội, tình trạng cát hung lúc ở bên ngoài để hoạt động, xuất ngoại, du lịch, đi xa và giao thông, địa điểm xuất ngoại, quan hệ giao tế và các tình huống gặp phải; các sự việc liên quan đến hành động, di động, thăng chức, thăng tiến, điều động, chuyển dời (đến nơi xa), ly hương, đi xa, v.v... Có được quý nhân trong xã hội tương trợ hay không, cũng xem ở cung này.</p>
            <div class="content">
                <div style="text-align:center;margin: auto;width: 100px;height: 100px;
            border-radius:50px;border: 5px solid #000;">
                    <p class="font-weight-bold fs-24 m-t-10 m-b-5"><i class="fas fa-eye-slash text-danger"></i></p>
                    <p class="font-italic fs-16">điểm</p>
                </div>
                <p class="text-center m-b-0 m-t-5 fs-14 font-weight-bold">Đánh giá chung về cung Thiên di của bạn: <i class="fas fa-eye-slash text-danger"></i> (<i class="fas fa-eye-slash text-danger"></i>/100 điểm)</p><br><em class="text-danger">Bạn cần nâng cấp Vip để xem được điểm đánh giá và luận giải của mục này!</em>
            </div>
        </div>
        <div class="text-left m-t-10 box-bg">
            <p class="font-weight-bold m-b-1" style="font-size:15px">14. Luận năm 2024 và tháng 9</p>
            <p class="font-italic m-b-8 m-t-1 description">Mục này chúng tôi luận ngắn gọn năm bạn muốn xem (được gọi là tiểu vận) là năm 2024 và tháng bạn muốn xem (được gọi là nguyệt vận) là tháng 9.</p>
            <div class="content"><br><em class="text-danger">Bạn cần nâng cấp Vip để xem được luận giải của mục này!</em></div>
        </div>
        <div style="margin:auto; margin-top:10px; max-width: 700px;max-height: 1026px;overflow: scroll">
            <div class="m-b-10 pdf-app" style="height:calc(142vw); overflow: scroll;">
                <div class="pdf-toolbar">BẢN XEM THỬ LUẬN GIẢI LÁ SỐ CỦA BẠN</div>
                <div class="pdf-viewport-container">
                    <div role="main" id="viewport2" class="pdf-viewport">
                        <div style="width:100%"><canvas height="1847" width="1306"></canvas></div>
                        <div style="width:100%"><canvas height="1847" width="1306"></canvas></div>
                        <div style="width:100%"><canvas height="1798" width="1272"></canvas></div>
                        <div style="width:100%"><canvas height="1798" width="1272"></canvas></div>
                        <div style="width:100%"><canvas height="1798" width="1272"></canvas></div>
                        <div style="width:100%"><canvas height="1798" width="1272"></canvas></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center m-t-10" style="background: #f6f6f6;padding: 10px;border-radius: 10px;">
            <p class="text-danger m-b-8">Bạn đang sử dụng lượt tra miễn phí chỉ xem được lá số. Để xem luận giải chi tiết về lá số, vui lòng đăng ký tài khoản VIP!</p>
            <a href="purchase" target="_blank"><button class="btn btn-success" style="padding: 2px 4px;font-size:13px;"><i class="fas fa-external-link-alt"></i> Tới trang đăng ký VIP</button></a>
        </div>
    </div>
</div>
@endsection
