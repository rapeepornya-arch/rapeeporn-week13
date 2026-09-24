<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        return view('products', ['products' => DB::table('products')->latest()->get()]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'max:255'], 'price' => ['required', 'numeric', 'min:0'],
            'description' => ['nullable'],
        ]);
        DB::table('products')->insert($data + ['status' => true, 'created_at' => now(), 'updated_at' => now()]);
        return back()->with('status', 'เพิ่มสินค้าแล้ว');
    }

    public function change(int $id): RedirectResponse
    {
        $product = DB::table('products')->find($id);
        abort_unless($product, 404);
        DB::table('products')->where('id', $id)->update(['status' => ! $product->status, 'updated_at' => now()]);
        return back();
    }

    public function edit(int $id): View
    {
        $product = DB::table('products')->find($id);
        abort_unless($product, 404);
        return view('edit-product', compact('product'));
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'max:255'], 'price' => ['required', 'numeric', 'min:0'],
            'description' => ['nullable'],
        ]);
        DB::table('products')->where('id', $id)->update($data + ['updated_at' => now()]);
        return redirect()->route('products.index');
    }
}
