<?php

namespace App\Http\Controllers\FrontEnd\Auth;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Validator;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('organic.auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        // Validate information of customer
        $validate = Validator::make($request->all(),
            [
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:12', 'unique:users,phone','unique:customers,customer_phone'],
            'address' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users','unique:customers,customer_email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ],
            [
                'required' => ' Không được để trống',
                'unique' => ' :attribute đã tồn tại',
                'email' => ' :attribute không hợp lệ',
                'confirmed' => ' Mật khẩu nhập lại không đúng',
            ]);
        // Notify failed
        if ($validate->fails()) {
            return redirect()->route('register')->withErrors($validate);
        }

        // Create new account
        $user = User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'rolename' => 'Khách hàng',
        ]);
        Customer::create([
            'customer_name' => $request->name,
            'customer_phone' => $request->phone,
            'customer_email' => $request->email,
            'customer_address' => $request->address,
            'user_id' => (int) $user->id,
            'active' => 1,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('shop.index'))->with('success','Đăng ký thành công, mời bạn mua hàng');
    }
}
