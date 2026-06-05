<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('products.index', [
            'products' => Product::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create', [
            'categories' => Category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['stock'] = (int) $validatedData['stock'];

        if ($request->hasFile('image')) {
            $file = $request->file('image');

            // Security Check: Scan for PHP tags or scripts to prevent polyglot injection
            $content = file_get_contents($file->getRealPath());
            if (preg_match('/<\?php|<\?=|<script/i', $content)) {
                return back()->withErrors(['image' => 'El archivo contiene firmas maliciosas y fue bloqueado por seguridad.'])->withInput();
            }

            $imagePath = $file->store('products', 'public');
            $validatedData['image'] = $imagePath;
        }

        $product = Product::create($validatedData);

        if ($request->has('sizes')) {
            foreach ($request->sizes as $size) {
                if (!empty($size['name'])) {
                    $product->options()->create([
                        'type' => 'size',
                        'name' => $size['name'],
                        'extra_price' => $size['extra_price'] ?? 0,
                    ]);
                }
            }
        }

        if ($request->has('crusts')) {
            foreach ($request->crusts as $crust) {
                if (!empty($crust['name'])) {
                    $product->options()->create([
                        'type' => 'crust',
                        'name' => $crust['name'],
                        'extra_price' => $crust['extra_price'] ?? 0,
                    ]);
                }
            }
        }

        return redirect()->route('products.index')->with('success', 'Menu item created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $product->load('options');

        return view('products.edit', [
            'product' => $product,
            'categories' => Category::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $validatedData = $request->validated();
        $validatedData['stock'] = (int) $validatedData['stock'];

        if ($request->hasFile('image')) {
            $file = $request->file('image');

            // Security Check: Scan for PHP tags or scripts to prevent polyglot injection
            $content = file_get_contents($file->getRealPath());
            if (preg_match('/<\?php|<\?=|<script/i', $content)) {
                return back()->withErrors(['image' => 'El archivo contiene firmas maliciosas y fue bloqueado por seguridad.'])->withInput();
            }

            if ($product->image && Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }

            $imagePath = $file->store('products', 'public');
            $validatedData['image'] = $imagePath;
        }

        $product->update($validatedData);

        $product->options()->delete();

        if ($request->has('sizes')) {
            foreach ($request->sizes as $size) {
                if (!empty($size['name'])) {
                    $product->options()->create([
                        'type' => 'size',
                        'name' => $size['name'],
                        'extra_price' => $size['extra_price'] ?? 0,
                    ]);
                }
            }
        }

        if ($request->has('crusts')) {
            foreach ($request->crusts as $crust) {
                if (!empty($crust['name'])) {
                    $product->options()->create([
                        'type' => 'crust',
                        'name' => $crust['name'],
                        'extra_price' => $crust['extra_price'] ?? 0,
                    ]);
                }
            }
        }

        return redirect()->route('products.index')->with('success', 'Menu item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product): RedirectResponse
    {
        if ($product->image && Storage::disk('public')->exists($product->image)) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Menu item deleted successfully.');
    }
}
