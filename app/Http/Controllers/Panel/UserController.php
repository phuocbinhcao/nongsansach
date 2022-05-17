<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\User;
// use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// use Illuminate\Support\Facades\DB as FacadesDB;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->rolename == 'admin') {

            $list = User::all();

            return response()->view('panel.users.index', compact('list'));
        } else {
            Auth::logout();
            return redirect('/')->withErrors('Thông tin của bạn không chính xác!');
        }
    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Auth::user()->rolename == 'admin') {

            $user = User::find($id);
            return response()->view('panel.users.showUser', ['user' => $user]);
        } else {
            Auth::logout();
            return redirect('/')->withErrors('Thông tin của bạn không chính xác!');
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::user()->rolename == 'admin') {
            $data = User::find($id);
            $data->update(['active' => 0]);

            return redirect()->back()->with('success','Bạn đã xóa thành công');
        } else {
            Auth::logout();
            return redirect('/')->withErrors('Thông tin không khớp với dữ liệu');
        }
    }
}
