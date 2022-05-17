<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use App\Models\User;

class NewPasswordController extends Controller
{
    /**
     * Handle an incoming new password request.
     *
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'password_current'=>'required|string',
            'password'=>'required|confirmed',
        ]);
        if(Hash::check($request->password_current, Auth::user()->password))
        {
            $changePassword = User::find((int)Auth::user()->id);
            $changePassword->password = Hash::make($request->password);
            $changePassword->remember_token = Str::random(60);
            $changePassword->save();
            $request->session()->invalidate();

            return redirect()->route('login.admin')->with('status','Đổi mật khẩu thành công.');
        } else {
            return response()->back()->withErrors('Mật khẩu không đúng!');
        }

    }


}
