<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\GroupGoods;
use App\Models\ProductType;
use Illuminate\Http\Request;

class ProductTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = ProductType::all();

        return response()->view('panel.ProductType.index', compact('list'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groupGoods = GroupGoods::all();

        return response()->view('panel.ProductType.create', compact('groupGoods'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'product_type_name' => 'required|string',
            'product_type_description' => 'required|string',
            'group_goods_id' => 'required',
        ];
        $request->validate($rules);

        ProductType::create([
            'product_type_name' => $request->product_type_name,
            'product_type_description' => $request->product_type_description,
            'group_goods_id' => $request->group_goods_id,
            'active'=>1,
        ]);

        return redirect()->route('product-type.index')->with('success', 'Bạn đã thêm thành công');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $productType = ProductType::find($id);
        $groupGood = ProductType::find((int)$id)->getGroupGoodsOwner;
        return response()->view('panel.ProductType.showdetail', [
            'productType'=>$productType,
            'groupGood'=>$groupGood
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
        $groupGoods = GroupGoods::all();
        $productType = ProductType::findOrFail($id);
        $group_goods_id = GroupGoods::find((int)$productType->group_goods_id);
        return response()->view('panel.ProductType.edit', compact('groupGoods', 'productType', 'group_goods_id'));

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
        $data = ProductType::findOrFail($id);

        $data->update([
            'product_type_name' => $request->product_type_name,
            'product_type_description' => $request->product_type_description,
            'group_goods_id' => (int)$request->group_goods_id,
        ]);

        return redirect(route('product-type.index'))->with('success', 'Bạn đã thêm thành công');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = ProductType::findOrFail($id);
        $data->update(['active'=>0]);

        return redirect()->back()->with('success', 'Bạn đã thêm thành công');

    }
}
