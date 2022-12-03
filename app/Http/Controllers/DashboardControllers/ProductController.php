<?php

namespace App\Http\Controllers\DashboardControllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create () {
        $stores = Store::get();
        return view('dashboard.products.createProduct')->with('stores', $stores);
    }
    public function store (Request $request) {
        $product_name = $request->input('name');
        $product_description = $request->input('description');
        $product_basePrice = $request->input('basePrice');
        $product_discountPrice = $request->input('discountPrice');
        $product_flag = $request->input('flag');
        $product_storeId = $request->input('store_id');

        $product = new Product;
        $product->numberOfTransaction=0;
        $product->name = $product_name;
        $product->description = $product_description;
        $product->basePrice = $product_basePrice;
        $product->discountPrice = $product_discountPrice;
        $product->flag = $product_flag;
        $product->store_id = $product_storeId;
        $product->save();

        return redirect()->back();
    }
    public function index () {
        $products = Product::withTrashed()->paginate(15);
        return view('dashboard.products.index')->with('products', $products);
    }
    public function delProduct () {
        $products = Product::withTrashed()->paginate(15);
        return view('dashboard.products.deleteProduct')->with('products', $products);
    }

    public function update (Request $request, $id) {
        $product_name = $request->input('name');
        $product_description = $request->input('description');
        $product_basePrice = $request->input('basePrice');
        $product_discountPrice = $request->input('discountPrice');
        $product_flag = $request->input('flag');
        $product_storeId = $request->input('store_id');

        $product = Product::find($id);
        $product->numberOfTransaction=0;
        $product->name = $product_name;
        $product->description = $product_description;
        $product->basePrice = $product_basePrice;
        $product->discountPrice = $product_discountPrice;
        $product->flag = $product_flag;
        $product->store_id = $product_storeId;
        $product->save();

        return redirect()->back();
    }

    public function edit ($id) {
        $stores = Store::get();
        $product = Product::select('*')
            ->where('id', $id)
            ->limit(1)
            ->first();

        return view('dashboard.products.editProduct')->with('id', $id)->with('product', $product)->with('stores', $stores);
    }
    public function edProductNav () {
        $products = Product::withTrashed()->paginate(15);

        return view('dashboard.products.editProductNav')->with('products', $products);;
    }

    public function destroy ($id) {
        $result = Product::where('id', $id)
            ->delete();
        return redirect()->back();
    }

    public function restore ($id) {
        $result = Product::where('id', $id)
            ->restore();
        return redirect()->back();
    }


}
