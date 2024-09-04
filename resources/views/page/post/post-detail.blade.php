@extends('layouts.page')

@section('title')
<title>{{ $post->title }} | Kattech PC</title>
@endsection

@section('description', $post->short_description)
@section('keywords', 'tech, tech pc, post, news, kattech')
@section('breadcrumb', $post->title)

@section('css')
<link rel="stylesheet" href="{{ asset('css/page/post-detail.css') }}" />
<link rel="stylesheet" href="{{ asset('/css/page/ckeditor.css') }}" type="text/css">
@endsection

@section('content')
<div class="row " id="content-post">
    <div class="leftcolumn">
        <div class="card d-flex" style="flex-direction: column;">
            <div class="d-flex flex-direction-column">
                <h1>{{ $post->title }}</h1>
                <ul class="article-info-more">
                    <li>
                        <time pubdate="" datetime="Thứ Năm 30/05/2024">
                            <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.49968 3.99967C8.32287 3.99967 8.1533 4.06991 8.02827 4.19494C7.90325 4.31996 7.83301 4.48953 7.83301 4.66634V7.33301H6.49968C6.32287 7.33301 6.1533 7.40325 6.02827 7.52827C5.90325 7.65329 5.83301 7.82286 5.83301 7.99967C5.83301 8.17649 5.90325 8.34605 6.02827 8.47108C6.1533 8.5961 6.32287 8.66634 6.49968 8.66634H8.49968C8.67649 8.66634 8.84606 8.5961 8.97108 8.47108C9.09611 8.34605 9.16634 8.17649 9.16634 7.99967V4.66634C9.16634 4.48953 9.09611 4.31996 8.97108 4.19494C8.84606 4.06991 8.67649 3.99967 8.49968 3.99967ZM8.49968 1.33301C7.18114 1.33301 5.8922 1.724 4.79588 2.45654C3.69955 3.18909 2.84506 4.23028 2.34048 5.44845C1.8359 6.66663 1.70387 8.00707 1.96111 9.30028C2.21834 10.5935 2.85328 11.7814 3.78563 12.7137C4.71798 13.6461 5.90587 14.281 7.19908 14.5382C8.49228 14.7955 9.83273 14.6635 11.0509 14.1589C12.2691 13.6543 13.3103 12.7998 14.0428 11.7035C14.7754 10.6071 15.1663 9.31822 15.1663 7.99967C15.1644 6.23216 14.4614 4.5376 13.2116 3.28777C11.9618 2.03795 10.2672 1.33495 8.49968 1.33301ZM8.49968 13.333C7.44484 13.333 6.4137 13.0202 5.53664 12.4342C4.65957 11.8481 3.97599 11.0152 3.57232 10.0407C3.16865 9.06611 3.06304 7.99376 3.26882 6.95919C3.47461 5.92463 3.98256 4.97432 4.72844 4.22844C5.47432 3.48256 6.42463 2.97461 7.4592 2.76882C8.49376 2.56303 9.56612 2.66865 10.5407 3.07232C11.5152 3.47598 12.3481 4.15957 12.9342 5.03663C13.5202 5.91369 13.833 6.94484 13.833 7.99967C13.8312 9.41362 13.2688 10.7691 12.269 11.769C11.2692 12.7688 9.91362 13.3312 8.49968 13.333Z" fill="#535353"></path>
                            </svg>
                            {{ date_format($post->created_at, "F j, Y, g:i a") }}
                        </time>
                    </li>
                    <li><a href="#"> {{ $post->user->name ?? "" }}</a></li>
                </ul>
                <p>{{ $post->short_description }}</p>
            </div>

            <div>
                <img class="boder-radius-10" style="width: 100%" src="{{ $post->thumbnail ?? asset('/images/test_post/2904-viettel-dau-gia-thanh-cong-bang-tan-5g-1.jpg') }}" alt="{{ $post->title }}" width="300" height="300">
            </div>
        </div>

        <div class="row" id="data-post">
            <p class="">{!! $post->content !!}</p>
        </div>
    </div>

    <div class="product-related">
        <div class="new-relate">
            <h3 id="title-post"> {{ __('Tin tức liên quan') }}</h3>
            <div style="margin-top: 30px">
                <div>
                    <img src="{{ $firstPosts1->thumbnail ?? asset( 'images/page/no-image.png') }}" alt="Image Alt" class="image-post" />
                </div>
                <div>
                    <h3> {{$firstPosts1->title}}</h3>
                </div>
            </div>
            @foreach($postRandom as $post)
            <div id="content">
                <div id="left">
                    <img src="{{ $post->thumbnail ?? asset( 'images/page/no-image.png') }}" alt="Image Alt" class="image-post" />
                </div>
                <div id="content-right">
                    <?php $text = \Illuminate\Support\Str::limit($post->short_description, 80) ?>
                    <a href="{{ route('post.detail', $post['slug']) }}">
                        <h3> {{$text}}</h3>
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        <div class="new-read-late">
            <h3 id="title-post"> {{ __('Bài viết mới nhất') }}</h3>
            @foreach($postNews as $post)
            <div id="" style="margin-top: 30px">
                <div id="">
                    <img src="{{ $post->thumbnail ?? asset( 'images/page/no-image.png') }}" alt="Image Alt" class="image-post" />
                </div>
                <div id="">
                    <a href="{{ route('post.detail', $post['slug']) }}">
                        <h3> {{$post->title}}</h3>
                    </a>
                </div>
                <span id="post-des">{{$post->short_description}}</span>
            </div>
            @endforeach
            <div style="margin-top: 30px">
                <div id="">
                    <img src="{{ asset( 'images/logo/logo.png') }}" alt="Image Alt" class="image-post" />
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
