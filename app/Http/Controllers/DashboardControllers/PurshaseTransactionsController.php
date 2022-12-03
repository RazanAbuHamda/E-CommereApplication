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
        $productsPurchase = PurchaseTransaction::with('product.store')
            ->select('*')
            ->get();
        return view('dashboard.purchaseTransaction.index')->with('productsPurchase', $productsPurchase);
    }
    public function getTotalReport()
    {
        $products = Product::with('store')->select('*')->get();
        return view('dashboard.purchaseTransaction.report')->with('products', $products);
    }
}
