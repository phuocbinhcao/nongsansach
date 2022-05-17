<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\comments;
use App\Models\GroupGoods;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Products::orderby('id', 'desc')->get();
        $product = $products->first();
        $vegetables1 = Products::where('product_type_id', '=', 9)->limit(4)->get();
        $vegetables2 = Products::orderby('id', 'desc')->where('product_type_id', '=', 9)->limit(4)->get();
        $rices1 = Products::where('product_type_id', '=', 3)->limit(4)->get();
        $rices2 = Products::orderby('id', 'desc')->where('product_type_id', '=', 7)->limit(4)->get();
        $flowers1 = Products::where('product_type_id', '=', 2)->limit(4)->get();
        $flowers2 = Products::orderby('id', 'desc')->where('product_type_id', '=', 6)->limit(4)->get();
        return view('organic.index',
            compact(
                'products',
                'product',
                'vegetables1',
                'vegetables2',
                'rices1',
                'rices2',
                'flowers1',
                'flowers2',
            ));
    }

    //Display products in shop
    public function shop()
    {
        // List categories and products
        $categories = GroupGoods::whereIn('id', [1, 2, 3])->get();
        $products = Products::latest('id', 'DESC')->get();

        // Product arrangements
        $min_price = Products::min('product_price');
        $max_price = Products::max('product_price');

        // Product arrangements follow price and name
        if (isset($_GET['sort_by'])) {
            $sort_by = $_GET['sort_by'];
            if ($sort_by == 'price_ASC') {
                $products = Products::orderBy('product_price', 'asc')->get();
            } elseif ($sort_by == 'price_DESC') {
                $products = Products::orderBy('product_price', 'desc')->get();
            } elseif ($sort_by == 'kytu_ASC') {
                $products = Products::orderBy('product_name', 'asc')->get();
            } elseif ($sort_by == 'kytu_DESC') {
                $products = Products::orderBy('product_name', 'desc')->get();
            }
        }

        // Filter products

        elseif (isset($_GET['start_price']) && $_GET['end_price']) {

            //Get amount price from frontend then fetch price from DB follow what price you got
            $min_price = $_GET['start_price'];
            $max_price = $_GET['end_price'];
            $products = Products::whereBetween('product_price', [$min_price, $max_price])
                                ->orderBy('product_price', 'asc')->get();
        } else {
            $products = Products::latest('id')->get();
        }

        return view('organic.cart.shop',
            compact(
                'categories',
                'products',
                'min_price',
                'max_price'
            ));
    }

    //Search products
    public function getSearch(Request $request)
    {
        //List category
        $categories = GroupGoods::whereIn('id', [1, 2, 3])->get();

        //Search product
        $products = Products::where('product_name', 'like', '%' . $request->search . '%')
                            ->orWhere('product_price', $request->search)->latest('id')->get();

        //All products
        $totalProducts = Products::all()->where('id')->count();

        // Product arrangements follow price and name

        $min_price = Products::min('product_price');
        $max_price = Products::max('product_price');

        if (isset($_GET['sort_by'])) {
            $sort_by = $_GET['sort_by'];

            if ($sort_by == 'price_ASC') {
                $products = Products::orderBy('product_price', 'asc')->get();
            } elseif ($sort_by == 'price_DESC') {
                $products = Products::orderBy('product_price', 'desc')->get();
            } elseif ($sort_by == 'kytu_ASC') {
                $products = Products::orderBy('product_name', 'asc')->get();
            } elseif ($sort_by == 'kytu_DESC') {
                $products = Products::orderBy('product_name', 'desc')->get();
            }
        }

        // Filter products

        elseif (isset($_GET['start_price']) && $_GET['end_price']) {

            //Get amount price from frontend then fetch price from DB follow what price you got
            $min_price = $_GET['start_price'];
            $max_price = $_GET['end_price'];
            $products = Products::whereBetween('product_price', [$min_price, $max_price])
                ->orderBy('product_price', 'asc')->get();
        } else {
            $products = Products::where('product_name', 'like', '%' . $request->search . '%')
                ->orWhere('product_price', $request->search)->latest('id')->get();
        }

        return view('organic.cart.shop',
            compact(
                'categories',
                'products',
                'totalProducts',
                'min_price',
                'max_price'
            ));

    }

    // Categories
    public function showCategory($product_type_name, $id)
    {
        $categories = GroupGoods::whereIn('id', [1, 2, 3])->get();

        $products = Products::where('product_type_id', $id)->get();

        //All products
        $totalProducts = Products::all()->where('id')->count();

        $min_price = Products::min('product_price');
        $max_price = Products::max('product_price');

        // Product arrangements follow price and name
        if (isset($_GET['sort_by'])) {
            $sort_by = $_GET['sort_by'];

            if ($sort_by == 'price_ASC') {
                $products = Products::orderBy('product_price', 'asc')
                    ->where('product_type_id', $id)
                    ->get();

            } elseif ($sort_by == 'price_DESC') {
                $products = Products::orderBy('product_price', 'desc')
                    ->where('product_type_id', $id)
                    ->get();

            } elseif ($sort_by == 'kytu_ASC') {
                $products = Products::orderBy('product_name', 'asc')
                    ->where('product_type_id', $id)
                    ->get();

            } elseif ($sort_by == 'kytu_DESC') {
                $products = Products::orderBy('product_name', 'desc')
                    ->where('product_type_id', $id)
                    ->get();
            }
        }

        // Filter products

        elseif (isset($_GET['start_price']) && $_GET['end_price']) {
            $min_price = $_GET['start_price'];
            $max_price = $_GET['end_price'];
            $products = Products::whereBetween('product_price', [$min_price, $max_price])
                ->where('product_type_id', $id)
                ->orderBy('product_price', 'asc')->get();

        } else {
            $products = Products::where('product_type_id', $id)->get();

        }

        return view('organic.cart.shop',
            compact(
                'categories',
                'products',
                'totalProducts',
                'min_price',
                'max_price'
            ));
    }

    // Details product
    public function detailsProduct($id)
    {
        // Get product follow id
        $product = Products::find($id);
        $comments = comments::orderby('id', 'desc')->where('product_id', (int) $product->id)->get();

        // Get all products has general  product_type_id
        $relatedProduct = Products::join('product_types', 'product_types.id', '=', 'products.product_type_id')
            ->where('product_types.id', '=', $product->product_type_id)
            ->select('products.id',
                'products.product_name',
                'products.product_image1',
                'products.product_image2',
                'products.product_image3',
                'products.product_price',
                'products.product_description')
            ->get();
        return view('organic.cart.product-detail', compact('product', 'comments', 'relatedProduct'));
    }

    // Add product when you click into session cart
    public function addToCart1(Request $request, $id)
    {
        $product = Products::findOrFail($id);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->product_name,
                "quantity" => $request->quantity,
                "price" => $product->product_price,
                "image" => $product->product_image1,
                "des" => $product->product_description,
            ];
        }
        session()->put('cart', $cart);
    }

    // Display cart
    public function showCart()
    {
        $carts = session()->get('cart');
        return response()->view('organic.cart.cart', compact('carts'));
    }

    // Change quantity of product
    public function update(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
        }
    }

    // Delete product out of cart
    public function remove(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
        }
    }

    // Show detail cart to checkout page
    public function checkout()
    {
        // When session cart existed then access checkout page, or alert nofitication
        if (session()->get('cart') != null) {
            $carts = session()->get('cart');
            return view('organic.checkout.checkout', compact('carts'));
        } else {

            return redirect()->back()->with('cartNull', 'Giỏ hàng rỗng, vui lòng chọn sản phẩm!');

        }
    }
}
