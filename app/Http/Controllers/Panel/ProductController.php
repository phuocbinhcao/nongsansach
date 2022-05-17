<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\ProductType;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Products::with('productType')->get();
        return response()->view('panel.products.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productTypes = ProductType::all();
        return response()->view('panel.products.create', compact('productTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'product_name' => 'required|string',
            'product_symbol' => 'required|string',
            'product_price' => 'required|numeric',
            'product_image1' => 'required|image',
            'product_image2' => 'required|image',
            'product_image3' => 'required|image',
            'product_description' => 'required|string',
            'product_type_id' => 'required',
        ];
        $request->validate($rules);
        if ($request->hasFile('product_image1')
            && $request->hasFile('product_image2')
            && $request->hasFile('product_image3'))
        {   // Image 1
            $file1 = $request->file('product_image1');
            $filename1 = $file1->getClientOriginalName();
            $file1->move('img/products', $filename1);
            // Image 2
            $file2 = $request->file('product_image2');
            $filename2 = $file2->getClientOriginalName();
            $file2->move('img/products', $filename2);
            // Image 3
            $file3 = $request->file('product_image3');
            $filename3 = $file3->getClientOriginalName();
            $file3->move('img/products', $filename3);
        }

         Products::create([
            'product_name' => $request->product_name,
            'product_symbol' => $request->product_symbol,
            'product_price' => $request->product_price,
            'product_image1' => $filename1,
            'product_image2' => $filename2,
            'product_image3' => $filename3,
            'product_description' => $request->product_description,
            'product_type_id' => $request->product_type_id,
            'active' => 1,
        ]);
        return redirect(route('products.index'))->with('success','Bạn đã thêm thành công');
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
        $data = Products::findOrFail($id);
        $productTypes = $data->productType->product_type_name;

        return response()->view('panel.products.showdetail', compact('productTypes', 'data'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productTypes = ProductType::all();
        $data = Products::findOrFail($id);

        return response()->view('panel.products.edit', compact('productTypes', 'data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Products::find($id);
        // Image 1
        if ($request->hasFile('product_image1'))
        {
            $file1 = $request->file('product_image1');
            $filename1 = $file1->getClientOriginalName();
            $file1->move('img/products', $filename1);
        } else {
            $filename1 = $data->product_image1;

        }
        // Image 2
        if( $request->hasFile('product_image2'))
        {
            $file2 = $request->file('product_image2');
            $filename2 = $file2->getClientOriginalName();
            $file2->move('img/products', $filename2);
        }else {
            $filename2 = $data->product_image2;

        }
        // Image 3
        if( $request->hasFile('product_image3'))
        {
            $file3 = $request->file('product_image3');
            $filename3 = $file3->getClientOriginalName();
            $file3->move('img/products', $filename3);
        }
        else {

            $filename3 = $data->product_image3;
        }
        $data->update([
            'product_name' => $request->product_name,
            'product_symbol' => $request->product_symbol,
            'product_price' => $request->product_price,
            'product_image1' => $filename1,
            'product_image2' => $filename2,
            'product_image3' => $filename3,
            'product_description' => $request->product_description,
            'product_type_id' => $request->product_type_id,
            'active' => 1,
        ]);

        return redirect(route('products.index'))->with('success','Bạn đã thay đổi thành công');
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
        $data = Products::findOrFail($id);
        $data->update(['active' => 0]);

        return redirect()->back()->with('success','Bạn đã xóa thành công');
    }
}
