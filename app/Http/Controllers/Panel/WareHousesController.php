<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\Suppliers;
use App\Models\WareHouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class WareHousesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lists = WareHouse::all();
        return response()->view('panel.warehouse.index', compact('lists'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Products::all();
        $suppliers = Suppliers::all();

        return response()->view('panel.warehouse.create', compact('products', 'suppliers'));

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
            'consignment_symbol' => 'required|string',
            'consignment_name' => 'required|string',
            'consignment_expiry' => 'required|date:m/d/Y',
            'consignment_purchase_price' => 'required|numeric',
            'consignment_sale_price' => 'required|numeric',
            'consignment_quantity' => 'required|integer',
            'product_id' => 'required|integer',
            'supplier_id' => 'required|integer',
            ],
            [
                'required' => ' không được để trống',
                'date' => '  Phải là dang ngày',
                'numeric' => ' Phải là số',
            ]);
        if ($validate->fails()) {
            return redirect()->route('warehouses.create')->withErrors($validate);
        }

        WareHouse::create([
            'consignment_symbol' => $request->consignment_symbol,
            'consignment_name' => $request->consignment_name,
            'consignment_expiry' => $request->consignment_expiry,
            'consignment_purchase_price' => $request->consignment_purchase_price,
            'consignment_sale_price' => $request->consignment_sale_price,
            'consignment_quantity' => $request->consignment_quantity,
            'consignment_currently'=> $request->consignment_quantity,
            'product_id' => $request->product_id,
            'supplier_id' => $request->supplier_id,
            'active' => 1,

        ]);

        return redirect(route('warehouses.index'))->with('success','Bạn đã thêm thành công');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = WareHouse::find($id)->getProduct;
        $supplier = WareHouse::find($id)->getSupplier;
        $data = WareHouse::findOrFail($id);
        return response()->view('panel.warehouse.showdetail', compact('data', 'product', 'supplier'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = Products::all();
        $suppliers = Suppliers::all();
        $data = WareHouse::findOrFail($id);

        return response()->view('panel.warehouse.edit', compact('products', 'suppliers', 'data'));

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
        $data = WareHouse::findOrFail($id);
        $data->update([
            'consignment_symbol' => $request->consignment_symbol,
            'consignment_name' => $request->consignment_name,
            'consignment_expiry' => $request->consignment_expiry,
            'consignment_purchase_price' => $request->consignment_purchase_price,
            'consignment_sale_price' => $request->consignment_sale_price,
            'consignment_quantity' => $request->consignment_quantity,
            'consignment_saled' => $request->consignment_saled,
            'consignment_return' => $request->consignment_return,
            'consignment_currently' => $request->consignment_currently,
            'consignment_status' => $request->consignment_status,
            'product_id' => $request->product_id,
            'supplier_id' => $request->supplier_id,
        ]);

        return redirect(route('warehouses.index'))->with('success','Bạn đã sửa thành công');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = WareHouse::findOrFail($id);
        $data->update(['active' => 0]);
        return redirect()->back()->with('success','Bạn đã xóa thành công');

    }
}
