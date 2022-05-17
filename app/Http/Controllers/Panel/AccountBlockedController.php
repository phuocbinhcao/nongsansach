<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountBlockedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->rolename == 'admin') {

            $users = User::all();
            return response()->view('panel.itemDelete.lockedAccount.lockedaccounts', ['users' => $users]);
        } else {
            Auth::logout();
            return redirect('/')->withErrors('Thông tin đăng nhập không đúng.');
        }

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find((int) $id);
        return response()->view('panel.itemDelete.lockedAccount.detail-AccountsLocked', ['user' => $user]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::user()->rolename == 'admin') {

            $user = User::find($id);
            $user->update(['active' => 1]);

            return redirect()->back()->with('success','Bạn đã kích hoạt thành công');

        } else {
            Auth::logout();
            return redirect('/')->withErrors('Thông tin đăng nhập không đúng.');
        }

    }
}
