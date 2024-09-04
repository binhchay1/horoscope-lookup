<?php

namespace App\Http\Controllers\Page;

use App\Enums\User;
use App\Enums\Utility;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserUpdateRequest;
use App\Repositories\OrderDetailRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Cache;

class AccountController extends Controller
{
    private $userRepository;
    private $utility;
    private $orderDetailRepository;

    public function __construct(
        UserRepository $userRepository,
        OrderDetailRepository $orderDetailRepository,
        Utility $utility

    ) {
        $this->userRepository = $userRepository;
        $this->utility = $utility;
        $this->orderDetailRepository = $orderDetailRepository;
    }

    public function show()
    {
        if (empty(Auth::user())) {
            return redirect('/404');
        }

        $idUser = Auth::user()->id;
        $dataUser = $this->userRepository->show($idUser);

        if (empty($dataUser)) {
            return redirect('/404');
        }

        $key = 'menu_homepage';
        $listCategory = Cache::store('redis')->get($key);
        $genderUser = User::SEX;

        return view('page.account.show', compact('dataUser', 'genderUser', 'listCategory'));
    }

    public function update(UserUpdateRequest $request, $userIdHash)
    {
        $input = $request->except(['_token']);
        if (isset($input['profile_photo_path'])) {
            $img = $this->utility->saveImageUser($input);
            if ($img) {
                $path = 'images/upload/user/' . $input['profile_photo_path']->getClientOriginalName();
                $input['profile_photo_path'] = $path;
            }
        }
        $this->userRepository->update($input, $userIdHash);
        return back()->with('success', __('Thông tin đã được cập nhập thành công!'));
    }

    public function changePassword()
    {
        if (empty(Auth::user())) {
            return redirect('/404');
        }

        $idUser = Auth::user()->id;
        $dataUser = $this->userRepository->show($idUser);

        if (empty($dataUser)) {
            return redirect('/404');
        }
        $key = 'menu_homepage';
        $listCategory = Cache::store('redis')->get($key);

        return view('page.account.change-password', compact('dataUser','listCategory'));
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        if (!Hash::check($request->old_password, auth()->user()->password)) {
            return back()->with("error", __("Mật khẩu không đúng!"));
        }

        \App\Models\User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with("success", __("Mật khẩu đã thay đổi thành công!"));
    }

    public function orderHistory()
    {
        if (empty(Auth::user())) {
            return redirect('/404');
        }

        $idUser = Auth::user()->id;
        $dataUser = $this->userRepository->show($idUser);
        foreach ($dataUser->orders as $order) {
            $details = $order->orderDetails;
            $totalDetail = 0;
            foreach ($details as $detail) {
                $totalDetail += $detail->price * $detail->quantity;
            }

            $order->total_detail = $totalDetail;
        }
        $genderUser = User::SEX;

        if (empty($dataUser)) {
            return redirect('/404');
        }

        $key = 'menu_homepage';
        $listCategory = Cache::store('redis')->get($key);

        return view('page.account.order-history', compact('dataUser', 'listCategory'));
    }

    public function getOrderDetail($order_id)
    {
        if (empty($order_id)) {
            return redirect('/404');
        }

        $listOrderDetail = $this->orderDetailRepository->getOrderDetailByOrderId($order_id);

        return response()->json($listOrderDetail);
    }
}
