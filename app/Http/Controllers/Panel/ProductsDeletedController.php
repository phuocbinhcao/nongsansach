<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Products;

class ProductsDeletedController extends Controller
{
    // Show list deleted products
    public function index()
    {
        if (Auth::user()->rolename == 'admin') {

            $products = Products::all();
            return response()->view('panel.itemDelete.productsDeleted.productsDeleted',
            ['products' => $products]);
        } else {
            Auth::logout();
            return redirect('/')->withErrors('Thông tin không trùng khớp.');
        }

    }

    // Show detail products
    public function show($id)
    {
        if (Auth::user()->rolename == 'admin') {

            $product = Products::find((int) $id);
            return response()->view('panel.itemDelete.productsDeleted.detailProduct',
            ['product' => $product]);
        } else {
            Auth::logout();
            return redirect('/')->withErrors('Thông tin không trùng khớp.');
        }
    }

    // Get back information of the products
    public function restore($id)
    {
        if (Auth::user()->rolename == 'admin') {
            Products::findOrFail($id)->update(['active' => 1]);
            return redirect()->back();
        } else {
            Auth::logout();
            return redirect('/')->withErrors('Thông tin không trùng khớp.');
        }
    }
}
