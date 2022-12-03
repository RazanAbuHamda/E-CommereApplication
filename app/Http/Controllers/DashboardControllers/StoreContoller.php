<?php

namespace App\Http\Controllers\DashboardControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Store;
use Illuminate\Support\Facades\Storage;


class StoreContoller extends Controller
{
    public function create () {
        $stores = Store::get();
        return view('dashboard.stores.createStore')->with('stores', $stores);
    }
    public function store (Request $request) {
        $store_name = $request->input('name');
        $store_address = $request->input('address');

        $image = $request->file('logo');
        $image_name = time()+rand(0, 1000000000000) . '.' . $image->getClientOriginalExtension();
        $path = 'uploads/images/' . $image_name;

        Storage::disk('public')->put($path, file_get_contents($image));
        $store = new Store;
        $store->name = $store_name;
        $store->address = $store_address;
        $store->logo = $path;
        $store->save();

        return redirect()->back();
    }
    public function index () {
        $stores = Store::withTrashed()->paginate(15);

        foreach ($stores as $store) {
            $store->logo_url = Storage::disk('public')->url($store->logo);
        }

        return view('dashboard.stores.index')->with('stores', $stores);
    }
    public function delStore () {
        $stores = Store::withTrashed()->paginate(15);
        foreach ($stores as $store) {
            $store->logo_url = Storage::disk('public')->url($store->logo);
        }

        return view('dashboard.stores.deleteStore')->with('stores', $stores);
    }

    public function update (Request $request, $id) {
        $store_name = $request->input('name');
        $store_address = $request->input('address');
        $image = $request->file('logo');
        $image_name = time()+rand(0, 1000000000000) . '.' . $image->getClientOriginalExtension();
        $path = 'uploads/images/' . $image_name;
        Storage::disk('public')->put($path, file_get_contents($image));
        $store = Store::find($id);
        $store->name = $store_name;
        $store->logo = $path;
        $store->address = $store_address;
        $store->save();

        return redirect()->back();
    }

    public function edit ($id) {
        $store = Store::select('*')
            ->where('id', $id)
            ->limit(1)
            ->first();
        $store->logo_url = Storage::disk('public')->url($store->logo);
        return view('dashboard.stores.editStore')->with('id', $id)->with('store', $store);
    }
    public function edStoreNav () {
        $stores = Store::withTrashed()->paginate(15);
        foreach ($stores as $store) {
            $store->logo_url = Storage::disk('public')->url($store->logo);
        }
        return view('dashboard.stores.editStoreNav')->with('stores', $stores);;
    }

    public function destroy ($id) {
        $result = Store::where('id', $id)
            ->delete();
        return redirect()->back();
    }

    public function restore ($id) {
        $result = Store::where('id', $id)
            ->restore();
        return redirect()->back();
    }


}
