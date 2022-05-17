<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\WareHouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConsignmentDeleteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->rolename == 'admin') {

            $consignments = WareHouse::all();
            return response()->view('panel.itemDelete.consignmentDelete.index', ['consignments' => $consignments]);
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
        $consignment = Warehouse::find((int) $id);
        return response()->view('panel.itemDelete.lockedAccount.detail-AccountsLocked', ['consignment' => $consignment]);

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
            WareHouse::findOrFail($id)->update(['active' => 1]);
            return redirect()->back();
        } else {
            Auth::logout();
            return redirect('/')->withErrors('Thông tin đăng nhập không đúng.');
        }
    }
}
