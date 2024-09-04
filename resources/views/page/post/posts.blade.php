@extends('layouts.page')

@section('title')
<title>{{ __('Bài viết') }} | Kattech PC</title>
@endsection

@section('description', __($firstPosts1 . ' với Kattech PC'))
@section('keywords', 'tech, tech pc, post, news, kattech')
@section('breadcrumb', __('Tin công nghệ'))

@section('css')
<link rel="stylesheet" href="{{ asset('css/page/post.css') }}" />
@endsection

@section('content')
<div class="container">
    <div class="row d-flex post-data">
        <div class="column1">
            <div class="top5 flex">
                <div class="left-side-top-post">
                    <div class="position-relative mb-3">
                        <img class="img-fluid w-100" alt="{{ $firstPosts1->title }}" src="{{ $firstPosts1->thumbnail ?? asset('images/page/no-image.png') }}">
                        <div class="content-top">
                            <?php $text = strlen($firstPosts1->title);
                            if ($text < 80) {
                                $post = $firstPosts1->title;
                            } else {
                                $post = \Illuminate\Support\Str::limit($firstPosts1->title, 80);
                            }
                            ?>
                            <h2><a href="{{ route('post.detail', $firstPosts1['slug']) }}" class="h4">{{ $post }}</a></h2>
                        </div>
                    </div>
                </div>

                <div class="second-after-post">
                    <div class="position-relative mb-3">
                        <img class="img-fluid w-100" alt="{{ $secondPost->title }}" src="{{ $secondPost->thumbnail ?? asset('images/page/no-image.png') }}">
                        <div class="content-top">
                            <?php $text = strlen($secondPost->title);
                            if ($text < 80) {
                                $post = $secondPost->title;
                            } else {
                                $post = \Illuminate\Support\Str::limit($secondPost->title, 80);
                            }
                            ?>
                            <h2><a href="{{ route('post.detail', $secondPost['slug']) }}" class="h4" href="">{{ $post}}</a></h2>
                            <?php $text = \Illuminate\Support\Str::limit($secondPost->short_description, 550) ?>
                            <p class="m-0">{{ $secondPost->short_description ."..." }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @if(count($postRandom3) >0)
            <div class="top1">
                <div class="parent">
                    @foreach($postRandom3 as $random)
                    <div class="child">
                        <img class="img-fluid w-100" src="{{ $random->thumbnail ?? asset('images/page/no-image.png') }}" style="object-fit: cover;">
                        <div class="">
                            <?php $text = strlen($random->title);
                            if ($text < 60) {
                                $post = $random->title;
                            } else {
                                $post = \Illuminate\Support\Str::limit($random->title, 60) . "...";
                            }
                            ?>
                            <h2><a class="text-tech" href="{{ route('post.detail', $random['slug']) }}">{{ $random->title }}</a></h2>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <hr>
            @endif
            @if(count($postRandom4) >0)
            <div class="top1">
                @foreach($postRandom4 as $random)
                <div class="child d-flex">
                    <div class="image-related-post" style="width: 30%;">
                        <img class="img-fluid w-100" src="{{ $random->thumbnail ?? asset('images/page/no-image.png') }}" style="object-fit: cover;">
                    </div>
                    <div class="random4-post">
                        <?php $text = strlen($random->title);
                        if ($text < 60) {
                            $post = $random->title;
                        } else {
                            $post = \Illuminate\Support\Str::limit($random->title, 60) . "...";
                        }
                        ?>

                        <h2 style="margin: 0"><a class="text-tech" href="{{ route('post.detail', $random->slug) }}">{{$post}}</a></h2>
                        <div class="post_info">
                            <span class="post_info_item-date d-flex">
                                <?php $getDate =  $random->created_at->format('N d/m/Y') ?? "";
                                    $explodeDate = explode(' ', $getDate);
                                    $changeLanguageDate = \App\Enums\DateLanguage::Day[$explodeDate[0]];
                                    $date = $changeLanguageDate . ' ' . $explodeDate[1];
                                ?>
                                <svg width="20" height="20" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.49968 3.99967C8.32287 3.99967 8.1533 4.06991 8.02827 4.19494C7.90325 4.31996 7.83301 4.48953 7.83301 4.66634V7.33301H6.49968C6.32287 7.33301 6.1533 7.40325 6.02827 7.52827C5.90325 7.65329 5.83301 7.82286 5.83301 7.99967C5.83301 8.17649 5.90325 8.34605 6.02827 8.47108C6.1533 8.5961 6.32287 8.66634 6.49968 8.66634H8.49968C8.67649 8.66634 8.84606 8.5961 8.97108 8.47108C9.09611 8.34605 9.16634 8.17649 9.16634 7.99967V4.66634C9.16634 4.48953 9.09611 4.31996 8.97108 4.19494C8.84606 4.06991 8.67649 3.99967 8.49968 3.99967ZM8.49968 1.33301C7.18114 1.33301 5.8922 1.724 4.79588 2.45654C3.69955 3.18909 2.84506 4.23028 2.34048 5.44845C1.8359 6.66663 1.70387 8.00707 1.96111 9.30028C2.21834 10.5935 2.85328 11.7814 3.78563 12.7137C4.71798 13.6461 5.90587 14.281 7.19908 14.5382C8.49228 14.7955 9.83273 14.6635 11.0509 14.1589C12.2691 13.6543 13.3103 12.7998 14.0428 11.7035C14.7754 10.6071 15.1663 9.31822 15.1663 7.99967C15.1644 6.23216 14.4614 4.5376 13.2116 3.28777C11.9618 2.03795 10.2672 1.33495 8.49968 1.33301ZM8.49968 13.333C7.44484 13.333 6.4137 13.0202 5.53664 12.4342C4.65957 11.8481 3.97599 11.0152 3.57232 10.0407C3.16865 9.06611 3.06304 7.99376 3.26882 6.95919C3.47461 5.92463 3.98256 4.97432 4.72844 4.22844C5.47432 3.48256 6.42463 2.97461 7.4592 2.76882C8.49376 2.56303 9.56612 2.66865 10.5407 3.07232C11.5152 3.47598 12.3481 4.15957 12.9342 5.03663C13.5202 5.91369 13.833 6.94484 13.833 7.99967C13.8312 9.41362 13.2688 10.7691 12.269 11.769C11.2692 12.7688 9.91362 13.3312 8.49968 13.333Z" fill="#535353"></path>
                                </svg>
                                <span style="margin-left: 5px;">{{__("Thời gian: ")}} {{ $date }}</span>
                            </span>
                            <span class="post_info_item-author">{{ $random->user->name ?? "" }}</span>
                        </div>
                    </div>
                </div>
                <hr>
                @endforeach
            </div>
            @endif
        </div>

        <div class="column2" id="post-column2">
            <div class="row top1">
                <h2 class="text-title"> {{ __('Chủ đề nóng') }}
                    <span style="position: absolute;">
                        <img id="img-icon-hot" src="{{ asset('/images/icon-hot.png') }}">
                    </span>
                </h2>
                <div class="parent1">
                    @foreach($listCategoryPost as $categoryPost)
                    <div class="child1">
                        <a href="{{ route('post.category', $categoryPost->slug) }}">
                            <img src="{{ $categoryPost->image }}" class="item-hot">
                            <span class="policy-title">{{ $categoryPost->name }}</span>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
            @if(count($postRandom5) >0)
            <div class="row top2">
                <h2 class="text-title" style="background-color: #03304b;"> {{__('TIN TỨC GẦN NHẤT')}}
                    <span style="position: absolute;">
                        <img id="img-icon-hot" src="{{ asset('/images/icon-blog.png') }}">
                    </span>
                </h2>
                @foreach($postRandom5 as $post)
                <div id="content">
                    <div id="left">
                        <img src="{{ $post->thumbnail ?? asset( 'images/page/no-image.png') }}" alt="Image Alt" class="img-fluid2" />
                    </div>
                    <div id="content-right">
                        <?php $text = \Illuminate\Support\Str::limit($post->short_description, 80) ?>
                        <h4><a href="{{ route('post.detail', $post->slug) }}"> {{ $text }} </a></h4>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
@endsection
