<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{

    const PATH_VIEW = 'products.';
    const PATH_UPLOAD = 'products';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Product::query()->latest()->paginate(5);
        return view(self::PATH_VIEW . __FUNCTION__, compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(self::PATH_VIEW . __FUNCTION__);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100|unique:products',
            'price' => 'decimal: 2',
            'price_sale' => 'nullable|decimal: 2',
            'img' => 'nullable|image|max:255',
            'is_active' => [
                Rule::in([1, 0])
            ],
            'describe' => 'nullable',
        ]);


        $data = $request->except('img');

        if ($request->hasFile('img')) {
            $data['img'] = Storage::put(self::PATH_UPLOAD, $request->file('img'));
        }

        Product::query()->create($data);

        return back()->with('msg', 'Success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view(self::PATH_VIEW . __FUNCTION__, compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view(self::PATH_VIEW . __FUNCTION__, compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|max:100|unique:products' ,
            'price' => 'decimal:2',
            'price_sale' => 'nullable|decimal:2',
            'img' => 'nullable|image|max:255',
            'is_active' => [
                Rule::in([1, 0])
            ],
            'describe' => 'nullable',
        ]);


        $data = $request->except('img');


        $oldImg = $product->img;

        if ($request->hasFile('img')) {
            $data['img'] = Storage::put(self::PATH_UPLOAD, $request->file('img'));
        }

        $product->update($data);

        if ($request->hasFile('img') && Storage::exists($oldImg)) {
            Storage::delete($oldImg);
        }


        return back()->with('msg', 'Success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        if (Storage::exists($product->img)) {
            Storage::delete($product->img);
        }

        return back()->with('msg', 'Success');
    }
}
