<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\TodayPic;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    protected $userPic = null;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            'identity' => [trans('auth.failed')],
        ]);
    }

    public function username()
    {
        $identity = request()->identity;
        $field = '';

        if (is_numeric($identity) && strlen($identity) == 4) {
            $field = 'pin';
        } else if (is_numeric($identity)) {
            $field = 'nomor_rekening';
        } else {
            $field = 'username';
        }

        request()->merge([$field => $identity]);

        return $field;
    }

    protected function validateLogin(Request $request)
    {
        $messages = [
            'identity.required' => 'Email or username cannot be empty',
            'password.required' => 'Password cannot be empty',
        ];

        $request->validate([
            'identity' => ['required', 'string', function ($attr, $value, $fail)
            {
                if ($this->username() == 'pin') {
                    $todayPic = TodayPic::where('pin', $value)->where('tanggal_tugas', date('Y-m-d'))->first();
                    $this->userPic = $todayPic->user;
                    if (!$todayPic) {
                        $fail('app.auth.today_pic.you_cannot_login_now');
                    }
                }
            }],
            'password' => 'required|string',
        ], $messages);
    }

    protected function attemptLogin(Request $request)
    {
        if ($this->username() == 'pin') {
            session()->put('today-pic', $this->userPic);
            return $this->guard()->loginUsingId($this->userPic->id);
        }
        return $this->guard()->attempt(
            $this->credentials($request), $request->filled('remember')
        );
    }
}
