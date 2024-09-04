@foreach($comments as $key => $comment)
<div id="comment-list" class="comment-list" @if($comment->parent_id != null) style="margin-left:40px;" @endif>
    <div class="item-comment" id="comment_473">
        <div class="form-reply-comment">
            <div class="comment-name d-flex align-items-center justify-content-between">
                <div class="comment-form-left d-flex align-items-center gap-6">
                    <b class="avatar-user avatar-admin" style="width: 26px; height: 25px;">
                        <img src=" {{ asset( $comment->user->profile_photo_path ?? 'images/user/avatar.jpg') }}" alt="admin avatar" class="lazy loading" data-was-processed="true">
                    </b>
                    <b class="user-name d-flex align-items-center ">
                        {{ $comment->name_user   ?? ""}}
                    </b>
                    @if(!empty($comment->user->role))
                    @if($comment->user->role == 'admin' || $comment->user->role == 'staff' )
                    <p class="qtv-comment">QTV</p>
                    @endif
                    @endif
                </div>
                <div class="comment-form-right d-flex align-items-center gap-4">
                    <i class="fa fa-clock-o" style="font-size:15px; margin-right: 5px"></i>
                    <?php $date = date_format($comment->created_at, "d/m/Y") ?>
                    <span class="date-in-comment-display">{{$date}}</span>
                </div>
            </div>

            <div class="comment-content1 boder-radius-10 mt-12 position-relative">
                <div class="d-flex align-items-center" style="float: left; width: 90%">
                    <div class="d-flex jd-img-review flex-column gap-8">
                        <p style="font-size: 15px">{{ $comment->content }}</p>
                    </div>
                </div>
                @if($comment->parent_id == null )
                <div class="info_feeback align-items-center gap-6 d-flex" id="rep-comment" style="text-align: right; width: 10%">
                    <i class="far fa-comments" style="font-size:20px; margin-right: 5px; font-weight: 550"></i>
                    <div id="reply_comment_user_{{ $comment->id }}" onclick="handleReply($(this))" data-key="{{ $key }}" class="write_reply font-weight-500">{{ __('Trả lời') }}</div>
                </div>
                @endif
            </div>
            <div class="reply-list-container js-replyList-item" id="reply_list_473" data-item-id="473"></div>
        </div>
    </div>
    <div class="box-comment1">
        <div class="form-rep-comment">

            <div class="comment-detail user-rep-comment" id="user-rep-comment-{{ $comment->id }}" style="display: none">
                <form action="{{ route('storeComment') }}" method="post" enctype="multipart/form-data" class="menu1" id="reply-comment-{{ $key }} reply_comment_data">
                    {{ csrf_field() }}
                    <div class="form-comment gap-10 d-flex justify-content-between">
                        <div style="width: 100%;">
                            <textarea required class="reply_content-data boder-radius-10 form-input" id="content0" name="content" placeholder="Xin mời để lại câu trả lời"></textarea>
                            <input type="hidden" class="form-input" value="{{ $dataProduct->id }}" name="product_id">
                            <input type="hidden" name="parent_id" class="form-input" value="{{ $comment->id }}" />
                            <hr style="width: 100%;">
                        </div>
                        <div class="repply-comment" style="padding: 5px">
                            @if(auth()->user())
                            <input type="text" value="{{auth()->user()->name}}" name="name_user" placeholder="Tên">
                            <input type="text" name="email_user" value="{{auth()->user()->email}}" placeholder="Email" />
                            @else
                            <input type="text" name="name_user" placeholder="Tên" required>
                            <input type="text" name="email_user" placeholder="Email" required>
                            @endif
                        </div>
                        <div class="send-comment-in-display">
                            <div style="border: 0" id="submit-send">
                                <button type="submit" style="border: none" id="btn-send-data-comment-rep" class="btn-send-form-comment d-flex align-items-center justify-content-center gap-6 send-comment-pc cursor-pointer"> <i class="fa fa-send-o" style="font-size:24px"></i>{{ __('Gửi') }}</button>
                            </div>
                        </div>
                    </div>
                    <p id="js-content-note0" style="color: red;max-width: 100%;display: flex;font-weight:700;margin-bottom:10px;"></p>
                </form>
            </div>
        </div>
        @include('page.product.comment-display', ['comments' => $comment->replies])
    </div>
</div>
@endforeach
