<?php

namespace App\Http\Controllers;

use App\ot_mobile_token;
use App\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function loginPhone()
    {
        return view('auth.mlogin');
    }

    public function doLoginPhone(Request $request)
    {
        $data = $request->all();
        $this->validate($request, [
            'mobile' => 'required|exists:ot_users',
        ]);
        $user = User::where('Mobile', $request->input('mobile'))->first();

        $token = ot_mobile_token::create([
            'USER_ID' => $user->id
        ]);
        if ($token->sendCode()) {
            session()->put("code_id", $token->id);
            session()->put("user_id", $user->id);

            return redirect()->route('mobile.verify');
        }

        $token->delete();
        return redirect()->route('login')->withErrors([
            "Unable to send verification code"
        ]);
    }

    public function verify() {
        return view('auth.mverify');
    }

    public function doVerify(Request $request) {
        $this->validate($request, [
            'code' => 'required|numeric'
        ]);

        if (!session()->has('code_id') || !session()->has('user_id'))
            redirect()->route('mobile.login');

        $token = ot_mobile_token::where('user_id', session()->get('user_id'))->find(session()->get('code_id'));

    if (!$token || empty($token->id))
        redirect()->route('mobile.login');

    if (!$token->isValid())
        redirect()->back()->withErrors('The code is either expired or used.');

    if ($token->code !== $request->input('code'))
        redirect()->back()->withErrors('The code is wrong.');

    $token->update([
        'used' => true
    ]);

    $user = User::find(session()->get('user_id'));

    $rememberMe = session()->get('remember');

    auth()->login($user, $rememberMe);

    return redirect()->route('Dashboard');
}


}
