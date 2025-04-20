<?php

namespace App\Http\Controllers\API;

use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->stateless()->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();
            $avatar = $googleUser->avatar->store("", [
                "disk" => "s3",
                "visibility" => "public"
            ]);

            $user = User::firstOrCreate(
                ['email' => $googleUser->email],
                [
                    'avatar' => $avatar,
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'password' => Hash::make('Password@12'),
                    'role_id' => 3,
                    'google_id' => $googleUser->id
                ]
            );

            Auth::login($user);
        } catch (\Exception $e) {
            return false;
            // return [
            //     'statusCode' => Response::HTTP_INTERNAL_SERVER_ERROR,
            //     'message' => __('messages.post.login.error'),
            //     'data' => $e->getMessage()
            // ];
        }
    }
}
