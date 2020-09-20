<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\BrandRequest;
use App\Models\Brand;

class BrandController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        $brands = Brand::paginate(20);
        return view('admin.brand.index')->with([
            'brands' => $brands
        ]);
    }

    public function create()
    {
        return view('admin.brand.create');
    }

    public function store(BrandRequest $request)
    {
        try {
            $brand = Brand::create($request->except(['_token']));
            if ($request->input('logo', false)) {
                $brand->addMedia($request->file('logo'))
                    ->toMediaCollection('brand');
            }
            return redirect()->route('admin.brand.index')
                ->with('success', 'Brand created successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit(Brand $brand)
    {
        return view('admin.brand.edit')->with([
            'brand' => $brand
        ]);
    }

    public function update(BrandRequest $request, Brand $brand)
    {
        $brand->update($request->except('_token','logo'));
        if ($request->file('logo', false)) {
            $brand->addMedia($request->file('logo'))
                ->toMediaCollection('brand');
        }
        return redirect()->route('admin.brand.index')
            ->with('success', 'Brand updated successfully');
    }

    public function destroy(Brand $brand)
    {
        $brand->delete();
        session()->flash('success', 'Brand updated successfully');
        return redirect()->back();
    }
}
