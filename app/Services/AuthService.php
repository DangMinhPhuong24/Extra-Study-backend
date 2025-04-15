<?php

namespace App\Services;

use Illuminate\Support\Str;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\AuthResource;
use App\Http\Resources\UserResource;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Resources\ProfileResource;

class AuthService
{
    /** @var UserRepository */
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    /**
     * Get a JWT via given credentials.
     *
     * @param $request
     * @return array
     */
    public function login($request)
    {
        $credentials = $request->only('username', 'password');
        $token = auth('api')->attempt($credentials);
        $checkUsername = $this->userRepository->checkUsernameAPI($request->username);
        
        if(!empty($token))
        {
            $user = auth('api')->user();

            $data = [
                'token' => $token,
                'user' => $user
            ];

            $dataLogin = [
                'statusCode' => Response::HTTP_OK,
                'message' => __('messages.post.login.success'),
                'data' => new AuthResource($data)
            ];
        }elseif($checkUsername) {
            $dataLogin = [
                'statusCode' => Response::HTTP_UNPROCESSABLE_ENTITY,
                'message' => ['password' => [__('messages.post.login.wrong_password')]],
            ];
        }elseif(empty($token)) {
            $dataLogin = [
                'statusCode' => Response::HTTP_UNPROCESSABLE_ENTITY,
                'message' => ['username' => [__('messages.post.login.wrong_username')]],
            ];
        }else {
            $dataLogin = [
                'statusCode' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => __('messages.post.login.error')
            ];
        }

        return $dataLogin;
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return array
     */
    public function logoutWithToken(): array
    {
        $user = auth('api')->user();

        if ($user) {
            auth()->logout();

            $dataLogout = [
                'statusCode' => Response::HTTP_OK,
                'message' => __('messages.post.logout.success')
            ];
        } else {
            $dataLogout = [
                'statusCode' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => __('messages.post.logout.error'),
            ];
        }

        return $dataLogout;
    }

    /**
     * Get user profile.
     *
     * @return array
     */
    public function profile()
    {
        $user = auth('api')->user();
        if ($user) {
            $dataProfile = [
                'statusCode' => Response::HTTP_OK,
                'message' => __('messages.get.profile.success'),
                'data' => new ProfileResource($user)
            ];
        } else {
            $dataProfile = [
                'statusCode' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => __('messages.get.profile.error')
            ];
        }
        return $dataProfile;
    }

    /**
     * User update profile
     *
     * @param $data
     * @return array
     */
    public function updateProfile($data)
    {
        $userUpdate = $this->userRepository->findOrFailAPI($data['id']);

        if ($userUpdate) {
            $data['change_password_at'] = $data['password'] ? now() : $userUpdate->change_password_at;
            $data['password'] = $data['password'] ? Hash::make($data['password']) : $userUpdate->password;

            $userUpdate->update($data);

            $dataUpdate = [
                'statusCode' => Response::HTTP_OK,
                'message' => __('messages.put.user.success'),
                'data' => new ProfileResource($userUpdate)
            ];
        } else {
            $dataUpdate = [
                'statusCode' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => __('messages.put.user.error')
            ];
        }

        return $dataUpdate;
    }

    /**
     * Forgot Password.
     *
     * @return array
     */
    public function forgotPassword($email)
    {
        try {
            $token = Str::random(64);
            DB::table('password_reset_tokens')->insert([
                'email' => $email,
                'token' => $token,
                'created_at' => now()
            ]);

            Mail::send('email.forgotPassword', ['token' => $token], function($message) use ($email) {
                $message->to($email);
                $message->subject('Reset Password');
            });

            return [
                'statusCode' => Response::HTTP_OK,
                'message' => __('messages.get.profile.success'),
                'data' => $email
            ];
        } catch (\Throwable $th) {
            return [
                'statusCode' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => __('messages.get.profile.error'),
                'data' => $th
            ];
        }
    }

    /**
     * Reset Password.
     *
     * @return array
     */
    public function resetPassword($data)
    {
        try {
            $reset = DB::table('password_reset_tokens')->where('token', $data['token'])->first();
            if($reset) {
                $userUpdate = $this->userRepository->getUserByEmail($reset->email);
                $userUpdate->update([
                    'change_password_at' => now(),
                    'password' => Hash::make($data['password'])
                ]);

                DB::table('password_reset_tokens')->where('token', $data['token'])->delete();
    
                $dataUpdate = [
                    'statusCode' => Response::HTTP_OK,
                    'message' => __('messages.put.user.success'),
                    'data' => new UserResource($userUpdate)
                ];
            } else {
                $dataUpdate = [
                    'statusCode' => Response::HTTP_UNAUTHORIZED,
                    'message' => __('messages.error.token.invalid'),
                ];
            }
        } catch (\Throwable $th) {
            $dataUpdate = [
                'statusCode' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => __('messages.put.user.error'),
                'data' => $th
            ];
        }

        return $dataUpdate;
    }
}
