<div class="global-menu-container">
    <p class="group-title"><i class="fa fa-bars"></i> {{ __('Danh mục sản phẩm') }}</p>
    <div class="global-menu-holder">
        @foreach($listCategory['default'] as $category)
        @if($category->status == 0 or $category->parent != 0)
        @continue
        @endif

        <div class="item">
            <a href="{{ route('showDataCategory', $category->slug) }}" class="cat-1">
                <img class="lazy icon-menu entered loaded" alt="{{ $category->name }}" width="1" height="1" src="{{ asset($category->image) }}">
                <span class="cat-title line-clamp-1">{{ $category->name }}</span>
            </a>

            <div class="sub-menu-list">
                <div class="sub-cat-2">
                    <p class="cat-2">{{ __('CHỌN THEO NHU CẦU') }}</p>
                    <div class="sub-cat-2-link">
                        @foreach($category->children as $categoryChild)
                        <a href="{{ route('showDataCategory', $categoryChild['slug']) }}">{{ $categoryChild->name }}</a>
                        @endforeach
                    </div>
                </div>

                <div class="sub-cat-2">
                    <p class="cat-2">{{ __('CHỌN THEO KHOẢNG GIÁ') }}</p>
                    <div class="sub-cat-2-link">
                        <a href="{{ route('showDataCategory', $category->slug) }}?price=duoi-10trieu">{{ __('Dưới 10 Triệu') }}</a>
                        <a href="{{ route('showDataCategory', $category->slug) }}?price=tu-10trieu-15trieu">{{ __('10 Triệu - 15 Triệu') }}</a>
                        <a href="{{ route('showDataCategory', $category->slug) }}?price=tu-15trieu-20trieu">{{ __('15 Triệu - 20 Triệu') }}</a>
                        <a href="{{ route('showDataCategory', $category->slug) }}?price=tu-20trieu-30trieu">{{ __('20 Triệu - 30 Triệu') }}</a>
                        <a href="{{ route('showDataCategory', $category->slug) }}?price=tu-30trieu-50trieu">{{ __('30 Triệu - 50 Triệu') }}</a>
                        <a href="{{ route('showDataCategory', $category->slug) }}?price=tu-50trieu-100trieu">{{ __('50 Triệu - 100 Triệu') }}</a>
                        <a href="{{ route('showDataCategory', $category->slug) }}?price=tren-100trieu">{{ __('Trên 100 Triệu') }}</a>
                    </div>
                </div>

                @if(array_key_exists('brand', $listCategory))
                @if(array_key_exists($category->name, $listCategory['brand']))
                <div class="sub-cat-2">
                    <p class="cat-2">{{ __('CHỌN THEO HÃNG') }}</p>
                    <div class="sub-cat-2-link">
                        @foreach($listCategory['brand'][$category->name] as $categoryBrand)
                        <a href="{{ route('showDataCategory', $category->slug) }}?brand={{ $categoryBrand }}">{{ $categoryBrand }}</a>
                        @endforeach
                    </div>
                </div>
                @endif
                @endif

                @if(array_key_exists('keyword', $listCategory))
                @if(array_key_exists($category->name, $listCategory['keyword']))
                @foreach($listCategory['keyword'][$category->name] as $title => $listKeyword)
                <div class="sub-cat-2">
                    <p class="cat-2">{{ __('CHỌN THEO') }} {{ $title }}</p>
                    <div class="sub-cat-2-link">
                        @foreach($listKeyword as $keyword)
                        <a href="{{ route('showDataCategory', $category->slug) }}?{{ $title }}={{ $keyword }}">{{ $keyword }}</a>
                        @endforeach
                    </div>
                </div>
                @endforeach
                @endif
                @endif
            </div>
        </div>
        @endforeach
    </div>
</div>
