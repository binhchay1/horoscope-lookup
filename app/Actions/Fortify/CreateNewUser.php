<?php

namespace App\Actions\Fortify;

use App\Mail\WelcomeEmail;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use App\Enums\Role;
use App\Jobs\SendMailByGoogle;
use App\Rules\ReCaptcha;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => $this->passwordRules(),
        ], [
            'name.required' => 'Tên không được để trống.',
            'name.string' => 'Tên không đúng định dạng.',
            'name.max' => 'Tên không quá 255 kí tự.',
            'username.required' => 'Tài khoản được để trống.',
            'username.string' => 'Tài khoản không đúng định dạng.',
            'username.max' => 'Tài khoản không quá 255 kí tự.',
            'username.unique' => 'Tài khoản đã tồn tại.',
            'email.max' => 'Email không quá 255 kí tự.',
            'email.required' => 'Email không được để trống.',
            'email.string' => 'Email không đúng định dạng.',
            'email.email' => 'Email không đúng định dạng.',
            'password.string' => 'Mật khẩu không đúng định dạng.',
            'password.required' => 'Mật khẩu không được để trống.',
            'password.confirmed' => 'Xác nhận mật khẩu không đúng.',
        ])->validate();

        return DB::transaction(function () use ($input) {
            $user =  User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
                'role' => Role::USER
            ]);

            return $user;
        });
    }
}
