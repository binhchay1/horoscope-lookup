@if(isset($layout->small_banner_thumbnail_left))
@if($layout->hide_small_banner_thumbnail_left == 0)
<div class="fixed-left">
    <a target="_blank" href="{{ isset($layout->permarklink_small_banner_thumbnail_left) ? $layout->permarklink_small_banner_thumbnail_left : '#' }}">
        <img width="150" height="450" alt="banner-left" src="{{ asset($layout->small_banner_thumbnail_left) }}">
    </a>
</div>
@endif
@endif

@if(isset($layout->small_banner_thumbnail_right))
@if($layout->hide_small_banner_thumbnail_right == 0)
<div class="fixed-right">
    <a target="_blank" href="{{ isset($layout->permarklink_small_banner_thumbnail_right) ? $layout->permarklink_small_banner_thumbnail_right : '#' }}">
        <img width="150" height="450" alt="banner-right" src="{{ asset($layout->small_banner_thumbnail_right) }}">
    </a>
</div>
@endif
@endif
