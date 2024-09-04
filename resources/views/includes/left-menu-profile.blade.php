<div class="leftcolumn">
    <div class="card" id="profile-user">
        <h2>{{ $dataUser->name }}</h2>
        <a href="{{ route('profile') }}">
            <div class="hover menu-profile">
                <h5>{{ __('Thông tin tài khoản') }}</h5>
            </div>
        </a>
        <a href="{{ route('orderHistory') }}">
            <div class="hover menu-profile">
                <h5>{{ __('Quản lý đơn hàng') }}</h5>
            </div>
        </a>
        <a href="{{ route('change-password') }}">
            <div class="hover menu-profile">
                <h5>{{ __('Thay đổi mật khẩu') }}</h5>
            </div>
        </a>
        <form method="POST" action="{{ route('logout') }}" id="form-logout">
            @csrf
            <a onclick="$('#form-logout').submit();">
                <div class="hover menu-profile">
                    <h5>{{ __('Đăng xuất') }}</h5>
                </div>
            </a>
        </form>
    </div>
</div>
