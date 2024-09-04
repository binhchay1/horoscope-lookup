<?php

namespace App\Http\Controllers\Admin;

use App\Enums\User;
use App\Enums\Utility;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserUpdateRequest;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    private $userRepository;
    private $utility;

    public function __construct(
        UserRepository $userRepository,
        Utility $utility
    )
    {
        $this->userRepository = $userRepository;
        $this->utility = $utility;
    }

    public function editProfile(string $id)
    {
        $user = $this->userRepository->show($id);
        if (empty($user)) {
            return redirect('/404');
        }
        $genderUser = User::SEX;

        return view('admin.profile.edit', compact('user','genderUser'));
    }

    public function updateProfile(UserUpdateRequest $request,  $id)
    {
        $input = $request->except(['_token']);
        if (isset($input['profile_photo_path'])) {
            $img = $this->utility->saveImageUser($input);
            if ($img) {
                $path = '/images/upload/user/' . $input['profile_photo_path']->getClientOriginalName();
                $input['profile_photo_path'] = $path;
            }
        }

        $user = $this->userRepository->update($input, $id);

        return back()->with('success', __('Thông tin được thay đổi thành công'));
    }
}
