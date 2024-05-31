<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class BrandController extends Controller
{

    const PATH_VIEW = 'admin.brands.';
    const PATH_UPLOAD = 'admin.brands';
    public function index()
    {
        $data = Brand::query()->latest()->paginate(5);
        return view(self::PATH_VIEW . __FUNCTION__, compact('data'));
    }

    public function create()
    {
        return view(self::PATH_VIEW . __FUNCTION__);
    }

    public function store()
    {

        request()->validate([
            'name' => 'required|unique:brands|max:50',
            'img' => 'nullable|image|max:2048',
            'is_show' => [
                Rule::in([1, 0])
            ]
        ]);

        $data = request()->except('img');

        if (request()->hasFile('img')) {
            $data['img'] = Storage::put(self::PATH_UPLOAD, request()->file('img'));
        }
        
        Brand::query()->create($data);

        return back()->with('msg', 'Success');
    }

    public function show(Brand $brand)
    {
        return view(self::PATH_VIEW . __FUNCTION__, compact('brand'));
    }

    public function edit(Brand $brand)
    {
        return view(self::PATH_VIEW . __FUNCTION__, compact('brand'));
    }

    public function update(Brand $brand)
    {
        request()->validate([
            'name' => 'required|max:50|unique:brands,name',
            'img' => 'nullable|image|max:10240',
            'is_show' => [
                Rule::in([1, 0])
            ]
        ]);

        $data = request()->except('img');

        if (request()->hasFile('img')) {
            $data['img'] = Storage::put(self::PATH_UPLOAD, request()->file('img'));
        }

        $oldPathImg = $brand->img;

        if (request()->hasFile('img') && Storage::exists($oldPathImg)) {
            Storage::delete($oldPathImg);
        }

        $brand->update($data);

        return back()->with('msg', 'Success');
    }

    public function destroy(Brand $brand)
    {
        $brand->delete();

        if (Storage::exists($brand->img)) {
            Storage::delete($brand->img);
        }

        return back()->with('msg', 'Success');
    }
}
