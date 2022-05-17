<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Orders;
use App\Models\Customer;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MyAccountController extends Controller
{
    //Display information of account page
    public function get()
    {

        $customer = Customer::where('user_id',(int)Auth()->user()->id)->first();

        // Get list orders of customer
        $orders = Orders::where('customer_id', (int)$customer->id)->get();

        // Select order details of customer
        foreach($orders as $id=> $order) {

            $dataOrders[$id] = OrderDetails::join('orders', 'orders.id', '=', 'orderdetails.orders_id')
            ->join('products', 'products.id', '=', 'orderdetails.product_id')
            ->where('orderdetails.orders_id', '=', (int)$order->id)
            ->select(
                'orderdetails.orders_id',
                'orderdetails.order_detail_quantity',
                'orderdetails.order_detail_price',
                'orders.order_total_price',
                'orders.id',
                'orders.created_at',
                'products.product_symbol',
                'products.product_name',
                'products.product_description',
                )
                ->get();
        }
        return view('organic.auth.myaccount', compact('orders','dataOrders'));
    }

    public function post(Request $request)
    {
        //Validate password have correct with the password confirm
        $request->validate([
            'password' => 'string|confirmed',
        ]);

        if (isset($request->old_password) || isset($request->password) || isset($request->password_confirmation)) {
            // Compare password you enterd has correct with password in DB, and set new password
            if (Hash::check($request->old_password, auth()->user()->password)) {
                $password = Hash::make($request->password);
                $update['password'] = $password;
            } else {
                return redirect()->back()->with('message', 'Mật khẩu không đúng');
            }
        }
        $user = User::find(auth()->user()->id);
        $user->update($update);

        return redirect()->route('logout');
    }
}
