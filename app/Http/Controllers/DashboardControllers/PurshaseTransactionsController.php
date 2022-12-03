<?php

namespace App\Http\Controllers\DashboardControllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Store;
use App\Models\PurchaseTransaction;
use Illuminate\Http\Request;

class PurshaseTransactionsController extends Controller
{
    public function index()
    {
        $productsPurchase = PurchaseTransaction::with('store')
            ->with('product')
            ->select('*')
            ->get();

//        $productsPurchase = Store::with('purchase_transactions')
//            ->with('products')
//            ->select('*')
//            ->get();
//        dd($productsPurchase)-toArray();
//        $productsPurchase = Product::with('products')->with('purchase_transactions')->select('*')->get();

        return view('dashboard.purchaseTransaction.index')->with('productsPurchase', $productsPurchase);
    }
}
