<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerDeletedController extends Controller
{
    // Get list customer has properties active = 0
    public function listCustomer()
    {
        $customers = Customer::where('active', '=', 0)->get();
        return view('panel.itemDelete.customerDelete.listCustomer', compact('customers'));
    }

    // Get back information customer
    public function restoreCustomer($id)
    {
        Customer::find($id)->update(['active'=>1]);
        return redirect()->back()->with('success', 'Đã khôi phục thành công!');
    }
}
