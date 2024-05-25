<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use App\Models\Entity;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Entity::where('entity_type', 'product')->get();
        return view('pages.product_listing', compact('products'));
    }

    public function create()
    {
        // Fetch attributes dynamically and pass them to the view
        $attributes = Attribute::all();
        return view('pages.create_product', compact('attributes'));
    }

    public function store(Request $request)
    {
        return $request->all();
    }
}
