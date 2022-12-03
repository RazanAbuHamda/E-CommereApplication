<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\PurchaseTransaction;
use App\Models\Store;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WebsiteController extends Controller
{
    public function index(Request $request)
    {
        session(['user-ip'=>$request->ip()]);
        $stores = Store::get();
        foreach ($stores as $store) {
            $store->logo_url = Storage::disk('public')->url($store->logo);
        }
        return view('website.index')->with('stores', $stores);
    }

    public function showStoreProducts($store_id)
    {
        $store = Store::select('*')
            ->where('id', $store_id)
            ->first();
        $products = Product::select('*')
            ->where('store_id', $store_id)
            ->get();
        return view('website.storeProducts')->with('products',$products)->with('store',$store);
    }


    public function addTransaction($id,Request $request){
        $updatePurchase = PurchaseTransaction::select('*')
            ->where('product_id', $id)
            ->limit(1)
            ->first();
        $product= Product::select('*')
            ->where('id', $id)
            ->limit(1)
            ->first();
        $product->numberOfTransaction+=1;
        $product->save();

//        dd($updatePurchase);
        if($updatePurchase && session('user-ip') == $updatePurchase->user_ip){
            $updatePurchase->product_id=$id;
            $updatePurchase->quantity += 1;
            $updatePurchase->save();
        } else{
            $newPurchase = new PurchaseTransaction;
            $newPurchase->product_id =$id;
            $newPurchase->user_ip =session('user-ip');
            $newPurchase->quantity =1;
            $newPurchase->save();
        }
        return redirect()->back();
    }
    public function search(Request $request){
        $keyword = $request->input('search');
        $products = Product::select('*')->where('name', 'LIKE', "%$keyword%")->get();
        return view('website.searchForProductsByName')->with('products',$products);
    }
}
