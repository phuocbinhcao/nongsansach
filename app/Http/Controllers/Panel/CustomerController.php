<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\OrderDetails;
use App\Models\Orders;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all customer into index page, display
        $customers = Customer::all();
        return response()->view('panel.customer.index', ['customers' => $customers]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('panel.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(),
            [
                'customer_name' => 'required|string',
                'customer_phone' => 'required|string|unique:customers,customer_phone',
                'customer_email' => 'required|string|unique:users,email',
                'customer_address' => 'required|string',

            ],
            [
                'required' => ' :attribute không được để trống',
                'unique' => ' :attribute đã tồn tại',
            ]);
        if ($validate->fails()) {
            return redirect()->route('customers.create')->withErrors($validate);
        }

        Customer::create([
            'customer_name' => $request->customer_name,
            'customer_phone' => $request->customer_phone,
            'customer_email' => $request->customer_email,
            'customer_address' => $request->customer_address,
            'active' => 1,
        ]);
        return redirect()->route('customers.index')->with('success', 'Đã thêm khách hàng thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        // Display details information of customer
        $customer = Customer::find((int)$id);

        $dataOrders = OrderDetails::join('orders', 'orders.id','=','orderdetails.orders_id')
            ->join('products', 'products.id', '=', 'orderdetails.product_id')
            ->where('orders.customer_id', '=', $id  )
            ->select(
                'orderdetails.order_detail_quantity',
                'orderdetails.order_detail_price',
                'orders.created_at',
                'products.product_symbol',
                'products.product_name',
                'products.product_description',
                )
            ->get();

        return response()->view('panel.customer.historyCustomer', [
            'customer' => $customer,
            'dataOrders' => $dataOrders,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::find((int) $id);
        return response()->view('panel.customer.edit', ['customer' => $customer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Customer::find((int) $id)->update([
            'customer_name' => $request->customer_name,
            'customer_phone' => $request->customer_phone,
            'customer_email' => $request->customer_email,
            'customer_address' => $request->customer_address,
        ]);
        return redirect()->route('customers.index')->with('success', 'Đã sửa thông tin khách hàng thành công!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Delete information customer, avoid foreign key error
        Customer::find((int) $id)->update(['active' => 0]);
        return redirect()->route('customers.index')->with('success', 'Đã xóa khách hàng thành công!');
    }

}
