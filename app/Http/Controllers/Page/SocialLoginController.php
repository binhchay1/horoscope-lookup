<?php

namespace App\Http\Controllers\Page;

use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use App\Enums\Role;
use App\Http\Controllers\Controller;
use Exception;

class SocialLoginController extends Controller
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
            $getUserByEmail = $this->userRepository->getUserByEmail($user->email);

            if ($getUserByEmail) {
                $this->userRepository->updateSocialID($user->email, ['google_id' => $user->id]);
                Auth::login($getUserByEmail);

                return redirect()->route('home');
            } else {
                $getUserByGoogle = $this->userRepository->getUserByGoogle($user->id);

                if ($getUserByGoogle) {
                    Auth::login($getUserByGoogle);

                    return redirect()->route('home');
                } else {
                    $data = [
                        'email' => $user->email,
                        'name' => $user->name,
                        'google_id' => $user->id,
                        'password' => Hash::make('123456dummy'),
                        'email_verified_at' => date("Y-m-d h:i:s"),
                        'role' => Role::USER,
                        'profile_photo_path' => $user->avatar
                    ];

                    $newUser = $this->userRepository->create($data);
                    Auth::loginUsingId($newUser->id);

                    return redirect()->route('home');
                }
            }
        } catch (Exception $e) {
            return redirect()->intended('login')->with('error', $e->getMessage());
        }
    }

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        try {
            $user = Socialite::driver('facebook')->user();
            $getUserByEmail = $this->userRepository->getUserByEmail($user->email);

            if ($getUserByEmail) {
                $this->userRepository->updateSocialID($user->email, ['facebook_id' => $user->id]);
                Auth::login($getUserByEmail);

                return redirect()->route('home');
            } else {
                $getUserByFacebook = $this->userRepository->getUserByFacebook($user->id);

                if ($getUserByFacebook) {
                    Auth::login($getUserByFacebook);

                    return redirect()->route('home');
                } else {
                    $data = [
                        'email' => $user->email,
                        'name' => $user->name,
                        'google_id' => $user->id,
                        'password' => Hash::make('123456dummy'),
                        'email_verified_at' => date("Y-m-d h:i:s"),
                        'role' => Role::USER,
                        'profile_photo_path' => $user->avatar
                    ];

                    $newUser = $this->userRepository->create($data);
                    Auth::loginUsingId($newUser->id);

                    return redirect()->route('home');
                }
            }
        } catch (Exception $e) {
            return redirect()->intended('login')->with('error', $e->getMessage());
        }
    }
}
