<?php

namespace App\Http\Controllers;

use App\Models\Entity;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        $stores = Entity::where('entity_type', 'store')->get();
        return view('pages.store_listing', compact('stores'));
    }

    public function create()
    {
        return view('pages.create_store');
    }

    public function store(Request $request)
    {
        Entity::create([
            'entity_type' => 'store',
            'name' => $request->input('store_name'),
        ]);

        return redirect()->route('stores.index');
    }
}
