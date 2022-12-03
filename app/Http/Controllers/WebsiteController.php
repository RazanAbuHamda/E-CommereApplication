<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\PurchaseTransaction;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WebsiteController extends Controller
{
    public function index()
    {
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
//        $product = PurchaseTransaction::with('product')->find($id);
        $updatePurchase = PurchaseTransaction::select('*')
            ->where('product_id', $id)
            ->limit(1)
            ->first();
//        dd($updatePurchase);
        $request->ip = $request->ip();
        if($updatePurchase && $updatePurchase->user_ip){
            $updatePurchase->product_id=$id;
            $updatePurchase->quantity += 1;
            $updatePurchase->save();
        } else{
            $newPurchase = new PurchaseTransaction;
            $newPurchase->product_id =$id;
            $storeId= Product::select('*')
                ->where('id', $id)
                ->limit(1)
                ->first();
            $newPurchase->store_id =$storeId->store_id;
            $newPurchase->user_ip =$request->ip;
            $newPurchase->quantity =1;
            $newPurchase->save();
        }
        return redirect()->back();
    }
}
