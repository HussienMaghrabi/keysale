<?php

namespace App\Http\Controllers\Api\ResetPassword;

use App\Mail\resetPassworMail;
use App\ModulesConst\UserVerify;
use App\Traits\apiResponse;
use App\User;
use App\User_lastpasswords;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;

class indexController extends Controller
{
    use apiResponse;

    public function index(Request $request)
    {
        $request->validate([
            'email' => 'required',
        ]);

        // check if this email existed ..
        $EmailCheck = User::where('email', $request->email)->get();
        if (!$EmailCheck->count() > 0) {
            return $this->apiResponse($request, trans('language.not_Existemail'), null, false);
        }
        $user = User::where('email', $request->email)->first();
        // Create user new Pass Code
//        $data['passCode'] = rand(1111, 9999);
        $data['passCode'] = 1234;
        $data['user_id'] = $user->id;
        $data['expired_at'] = \Carbon\Carbon::today()->addDays(7);
        User_lastpasswords::create($data);
        $user->passCode = $data['passCode'];
        $user->save();
//        Mail::to($user)->send(new resetPassworMail($user));
            $code['code'] = $data['passCode']; // only for Test

        return $this->apiResponse($request, trans('language.sendEmail'), $code, true);
    }

    public function confirm_code(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'code' => 'required',
        ]);

        // check if this email existed ..
        $EmailCheck = User::where('email', $request->email)->get();
        if (!$EmailCheck->count() > 0) {
            return $this->apiResponse($request, trans('language.not_Existemail'), null, false);
        }

        $user = User::where('email', $request->email)->first();

        // check expired of this passCode
        $userPassCode = $user->lastpasswords->last()->passCode;
        if ($userPassCode == $request->code) {
            $userPassCodedate = User_lastpasswords::where('passCode', $request->code)->where('expired_at', '>', Carbon::now())->count();
            if ($userPassCodedate >= 1) {
                $data['is_code_expired '] = false;
            } else {
                $data['is_code_expired '] = true;
                return $this->apiResponse($request, trans('language.code_expired_resend_code'), null, false);
            }
        } else {
            return $this->apiResponse($request, trans('language.invalid_code'), null, false);
        }
        $user->userVerify = UserVerify::yes;
        $info['api_token'] = $user->api_token;
        return $this->apiResponse($request, trans('language.message'), $info, true);
    }

    public function resend_password_code(Request $request)
    {
        $request->validate([
            'email' => 'required',
        ]);

        // check if this email existed ..
        $EmailCheck = User::where('email', $request->email)->get();
        if (!$EmailCheck->count() > 0) {
            return $this->apiResponse($request, trans('language.not_Existemail'), null, false);
        }
        $user = User::where('email', $request->email)->first();
//        $data['passCode'] = rand(1111, 9999);
        $data['passCode'] = 1234;
        $data['user_id'] = $user->id;
        $data['expired_at'] = \Carbon\Carbon::today()->addDays(7);
        User_lastpasswords::create($data);
        $user->passCode = $data['passCode'];
        $user->save();
//        Mail::to($user)->send(new resetPassworMail($user));
        $code['code'] = $data['passCode']; // only for Test
        return $this->apiResponse($request, trans('language.sendEmail'), $code, true);
    }

    public function reset_new_password(Request $request)
    {
        $request->validate([
            'password' => 'required',
        ]);
        $user = $request->user();
        if (!$user)
            abort(404);
        $user->password = \Hash::make($request->password);
        $user->save();
        return $this->apiResponse($request, trans('language.message'), null, true);
    }

}
