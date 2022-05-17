<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\OrderDetails;
use App\Models\Orders;
use App\Models\Products;
use App\Models\User;
use App\Models\WareHouse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;


class OrderController extends Controller
{
    // Show list orders
    public function index()
    {
        $list = Orders::orderby('created_at','asc')->get();
        return response()->view('panel.orders.index', compact('list'));
    }

    public function create()
    {
        $products = Products::all();
        return response()->view('panel.orders.create', compact('products'));
    }

    // Get information of the customer to autocomplete field
    public function getCustomer(Request $request)
    {

        $search = $request->search;

        if ($search == '') {
            $customers = Customer::orderby('customer_phone', 'asc')
                ->select('customer_phone', 'customer_name', 'customer_email','customer_address')
                ->limit(5)->get();
        } else {
            $customers = Customer::orderby('customer_phone', 'asc')
                ->select('customer_phone', 'customer_name', 'customer_email','customer_address' )
                ->where('customer_phone', 'like', '%' . $search . '%')
                ->limit(5)->get();
        }

        $response = array();
        foreach ($customers as $customer) {
            $response[] = array(
                "phone" => $customer->customer_phone,
                "label" => $customer->customer_name,
                "email" => $customer->customer_email,
                "address" => $customer->customer_address,
            );
        }

        return response()->json($response);
    }

    // Add product to cart
    public function addToCart( $id)
    {

        $product = Products::find($id);
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $cart[$id]['quantity'] + 1;
        } else {
            $cart[$id] = [
                'name' => $product->product_name,
                'price' => $product->product_price,
                'quantity' => 1,
                'image' => $product->product_image1,
            ];
        }
        session()->put('cart', $cart);
        return response()->json([
            'code' => 200,
            'message' => 'success',
        ], status:200);

    }

    // Show Your card
    public function showCart()
    {
        return response()->view('panel.orders.showOrders');
    }

    // Change quantity of product
    public function updateCart(Request $request)
    {
        if ($request->id && $request->quatity) {
            $carts = session()->get('cart');
            $carts[$request->id]['quantity'] = $request->quatity;
            session()->put('cart', $carts);
            $carts = session()->get('cart');
            return response()->json(['carts'=>$carts]);
        }
    }

    // Save information of order you have chosen
    public function store(Request $request)
    {
        // Validate the fields from Form input
        $validate = Validator::make($request->all(),
            [
            'customer_name' => 'required|string',
            'customer_phone' => 'required|string',
            'customer_address' => 'required|string',
            'customer_email' => 'required|email',

        ],
            [
                'required' => ' Không được để trống',
                'email' => '  Email không hợp lệ',
            ]);
        if ($validate->fails()) {
            return redirect()->route('showCart')->withErrors($validate);
        }
        // Get information of the customer if it have
        $customers = Customer::all();
        $customer = $customers->where('customer_phone', $request->customer_phone)->first();

        if ($customer == null) {

            $customer = Customer::create([
                'customer_name' => $request->customer_name,
                'customer_phone' => $request->customer_phone,
                'customer_email' => $request->customer_email,
                'customer_address' => $request->customer_address,
                'active' => 1,
            ]);

            $customerId = $customer->id;

        } else {
            $customerId = $customer->id;
        }
        // Total price of order
        $totalPrice = 0;
        foreach (session()->get('cart') as $id => $cart) {
            $totalPrice += $cart['price'] * $cart['quantity'];
        }
        // Create new order
        $order = Orders::create([

            'order_customer_name' => $customer->customer_name,
            'order_customer_phone' => $customer->customer_phone,
            'order_customer_email' => $customer->customer_email,
            'order_customer_address' => $request->customer_address,
            'order_total_price' => $totalPrice,
            'customer_id' => $customerId,
            'active' => 1,
            'order_status' => $request->order_status ,

        ]);
        // Create new order details
        foreach (session()->get('cart') as $id => $cart) {

            $product = Products::find($id);
            $productId = $product->id;

            OrderDetails::create([
                'product_id' => (int) $productId,
                'orders_id' => $order->id,
                'order_detail_quantity' => $cart['quantity'],
                'order_detail_price' => $cart['price'] * $cart['quantity'],
                'active' => 1,
            ]);
            // When customer buy any products from the store, change quantity of product in the Warehouse
            $consignment = WareHouse::where('product_id', (int) $id)
                        ->select(
                            'id',
                            'product_id',
                            'consignment_quantity',
                            'consignment_saled',
                            'consignment_currently',
                        )
                        ->first();

            $consignment->update([
                'consignment_saled'=>$consignment->consignment_saled + $cart['quantity'],
                'consignment_currently'=>$consignment->consignment_currently - $cart['quantity'],
            ]);
        };
        session()->forget('cart');
        return redirect()->route('order.index')->with('success', 'Bạn đã thêm thành công');
    }

    // Show order details
    public function show($id)
    {
        $order = Orders::find((int) $id)->getCustomer;

        $dataOrders = OrderDetails::join('products', 'products.id', '=', 'orderdetails.product_id')
            ->where('orderdetails.orders_id', '=', (int) $id)
            ->get();

        return response()->view('panel.orders.showDetail', compact('order', 'dataOrders'));
    }

    // Show information into edit page
    public function edit($id)
    {
        $order = Orders::find($id);
        $dataOrders = OrderDetails::join('products', 'products.id', '=', 'orderdetails.product_id')
            ->where('orderdetails.orders_id', '=', (int) $id)
            ->select(
                'orderdetails.id',
                'orderdetails.order_detail_quantity',
                'orderdetails.order_detail_price',
                'products.product_name',
                'products.product_symbol',
                )
            ->get();
        return response()->view('panel.orders.edit', compact('order', 'dataOrders'));
    }

    // Change quantity of the product you want
    public function editCart(Request $request)
    {
        if($request->id && $request->quatity) {
                $detail = OrderDetails::find((int)$request->id);
                $detail->update([
                    'order_detail_price'=>($detail->order_detail_price/$detail->order_detail_quantity)*$request->quatity,
                    'order_detail_quantity'=>$request->quatity,
                ]);
            }
    }

    // Change information of the order you want
    public function update(Request $request, $id)
    {
        $orderDetails = OrderDetails::where('orders_id',(int)$id)->get();
        $totalPrice = 0;
        foreach($orderDetails as $detail) {
            $totalPrice += $detail->order_detail_price * $detail->order_detail_quantity;
        }
        Orders::find((int) $id)->update([
            'order_customer_name' => $request->order_customer_name,
            'order_customer_phone' => $request->order_customer_phone,
            'order_customer_email' => $request->order_customer_email,
            'order_customer_address' => $request->order_customer_address,
            'order_note' => $request->order_note,
            'order_status' => $request->order_status,
            'order_total_price'=>$totalPrice,
        ]);


        return redirect()->route('order.index')->with('success', 'Đã thay đổi thành công');
    }

    // Delete orders
    public function destroy($id)
    {
        Orders::where('id', (int) $id)->update(['active' => 0]);
        return redirect()->route('order.index')->with('success', 'Đã xóa thành công');
    }

    // SHow list deleted orders
     public function tableOrderDelete()
    {
        $list = Orders::all();
        return response()->view('panel.itemDelete.orderDeleted.orderDelete', compact('list'));
    }

    // Restore information of the orders
    public function getBack($id)
    {
        Orders::where('id', (int) $id)->update(['active' => 1]);
        return redirect()->route('order.tableDelete')->with('success', 'Đã khôi phục thành công');
    }
}
