<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\OrderDetails;
use App\Models\Orders;
use App\Models\Products;
use App\Models\User;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    // Order product
    public function payment(Request $request)
    {
        // If customer signed up, get information follow account
        if (Auth()->user() != null) {

            $customer = Customer::where('user_id', (int)Auth()->user()->id)->first();

        } else {
        // Or not, create new customer information
            $rule = [
                'name' => 'required|string',
                'phone' => 'required|string|unique:users,phone',
                'address' => 'required|string',
                'email' => 'required|email|unique:users,email',

            ];
            $request->validate($rule);

            $customer = Customer::create([
                'customer_name' => $request->name,
                'customer_phone' => $request->phone,
                'customer_email' => $request->email,
                'customer_address' => $request->address,
                'active' => 1,
            ]);
        }

        // Get total price of the order
        $totalPrice = 0;
        foreach (session()->get('cart') as $id => $cart) {
            $totalPrice += $cart['price'] * $cart['quantity'];
        }
        // Create new order
        $order = Orders::create([

            'order_customer_name' => $customer->customer_name,
            'order_customer_phone' => $customer->customer_phone,
            'order_customer_email' => $customer->customer_email,
            'order_customer_address' => $customer->customer_address,
            'order_total_price' => $totalPrice ,
            'customer_id' => (int) $customer->id,
            'active' => 1,
            'order_status' => 'Tiếp nhận',

        ]);

        // Create new product details
        foreach (session()->get('cart') as $id => $cart) {

            $product = Products::find($id);
            $productId = $product->id;

            OrderDetails::create([
                'product_id' => (int) $productId,
                'orders_id' => (int) $order->id,
                'order_detail_quantity' => $cart['quantity'],
                'order_detail_price' => $cart['price'] * $cart['quantity'],
                'active' => 1,
            ]);

        }

        session()->forget('cart');
        return redirect()->route('shop.index')->with('orders', 'Đơn hàng của bạn đã được đặt');
    }

    // Payment online
    public function payOnline()
    {
        if (Auth()->user() != null) {

            return view('organic.checkout.payOnline');

        } else {
             return redirect()->back()->with('payOnline', 'Đăng nhập để thực hiện thanh toán');
        }
    }

    // Diplay credit card page
    public function viewCreditCard()
    {
        return view('organic.checkout.creditCard');
    }

    // Payment by credit card
    public function payCreditCard(Request $request)
    {
        // Get information of customer
        $customer = Customer::where('user_id', (int) Auth()->user()->id)->first();

        // Get total price of the order
        $totalPrice = 0;
        foreach (session()->get('cart') as $id => $cart) {
            $totalPrice += $cart['price'] * $cart['quantity'];
        }

        // Create new order follow information of customer
        $order = Orders::create([

            'order_customer_name' => $customer->customer_name,
            'order_customer_phone' => $customer->customer_phone,
            'order_customer_email' => $customer->customer_email,
            'order_customer_address' => $customer->customer_address,
            'order_note' => 'Thanh toán online',
            'order_total_price' => $totalPrice ,
            'customer_id' => (int) $customer->id,
            'active' => 1,
            'order_status' => 'Tiếp nhận',

        ]);

        // Save product details  of the order into DB
        foreach (session()->get('cart') as $id => $cart) {

            $product = Products::find($id);
            $productId = $product->id;

            OrderDetails::create([
                'product_id' => (int) $productId,
                'orders_id' => (int) $order->id,
                'order_detail_quantity' => $cart['quantity'],
                'order_detail_price' => $cart['price'] * $cart['quantity'],
                'active' => 1,
            ]);

        }
        session()->forget('cart');
        return redirect()->route('shop.index')->with('orders', 'Đơn hàng của bạn đã được đặt');
    }
}
