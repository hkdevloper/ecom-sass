<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    public function index()
    {
        $attributes = Attribute::all();
        return view('pages.attribute_listing', compact('attributes'));
    }

    public function create()
    {
        return view('pages.create_attribute');
    }

    public function store(Request $request)
    {
        Attribute::create([
            'name' => $request->input('attribute_name'),
            // Add more fields as needed
        ]);

        return redirect()->route('attributes.index');
    }
}
