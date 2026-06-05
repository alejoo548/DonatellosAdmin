<?php

namespace App\Http\Controllers;

use App\Models\CarouselItem;
use App\Models\Product;
use Illuminate\Http\Request;

class CarouselItemController extends Controller
{
    public function index()
    {
        $items = CarouselItem::with('product')->orderBy('order')->get();
        return view('carousel.index', compact('items'));
    }

    public function create()
    {
        $products = Product::orderBy('name')->get();
        return view('carousel.create', compact('products'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'product_id'  => 'required|exists:products,id',
            'title'       => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'badge_text'  => 'nullable|string|max:100',
            'order'       => 'required|integer|min:0',
            'is_active'   => 'boolean',
        ]);

        $data['is_active'] = $request->boolean('is_active');

        CarouselItem::create($data);

        return redirect()->route('carousel.index')->with('success', 'Carousel item added.');
    }

    public function edit(CarouselItem $carousel)
    {
        $products = Product::orderBy('name')->get();
        return view('carousel.edit', compact('carousel', 'products'));
    }

    public function update(Request $request, CarouselItem $carousel)
    {
        $data = $request->validate([
            'product_id'  => 'required|exists:products,id',
            'title'       => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'badge_text'  => 'nullable|string|max:100',
            'order'       => 'required|integer|min:0',
            'is_active'   => 'boolean',
        ]);

        $data['is_active'] = $request->boolean('is_active');

        $carousel->update($data);

        return redirect()->route('carousel.index')->with('success', 'Carousel item updated.');
    }

    public function destroy(CarouselItem $carousel)
    {
        $carousel->delete();
        return redirect()->route('carousel.index')->with('success', 'Carousel item removed.');
    }
}
