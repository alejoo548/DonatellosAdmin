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

            // Security Check: Scan first 8KB for PHP tags or scripts (prevents polyglot injection, avoids loading huge files into memory)
            $handle = fopen($file->getRealPath(), 'r');
            $head = fread($handle, 8192);
            fclose($handle);
            if (preg_match('/<\?php|<\?=|<script/i', $head)) {
                return back()->withErrors(['image' => 'The file contains malicious signatures and was blocked for security.'])->withInput();
            }

            $relativePath = $file->store('products', 'public');
            // Store a full public URL so it can be used directly by the mobile app / other clients as <img src="...">
            $validatedData['image'] = Storage::disk('public')->url($relativePath);
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

            // Security Check: Scan first 8KB for PHP tags or scripts (prevents polyglot injection)
            $handle = fopen($file->getRealPath(), 'r');
            $head = fread($handle, 8192);
            fclose($handle);
            if (preg_match('/<\?php|<\?=|<script/i', $head)) {
                return back()->withErrors(['image' => 'The file contains malicious signatures and was blocked for security.'])->withInput();
            }

            // Delete previous image using the relative storage path (handles both old relative and new full-URL values in DB)
            $oldPath = $product->image_path;
            if ($oldPath && Storage::disk('public')->exists($oldPath)) {
                Storage::disk('public')->delete($oldPath);
            }

            $relativePath = $file->store('products', 'public');
            // Store full public URL for direct use in the app
            $validatedData['image'] = Storage::disk('public')->url($relativePath);
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
        // Use the computed relative path so deletion works whether DB has relative path or full URL
        $path = $product->image_path;
        if ($path && Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Menu item deleted successfully.');
    }
}
