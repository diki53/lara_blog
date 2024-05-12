<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        $data = [
            'products' => $products,
            'title' => 'Halaman Products'
        ];
        return view('products.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create', ['title' => 'Create New Product']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $last = Product::latest()->first();
        $explode = explode('-', $last->item_code);
        $year = date('Y');
        $no_urut = sprintf('%04s', $explode[2] + 1);
        // Validasi data input
        $request->validate([
            'name' => 'required|string|max:255',
            'stock' => 'required|integer|min:0',
        ]);

        // Simpan data produk baru ke database
        Product::create([
            'name' => $request->name,
            'item_code' => 'P-' . $year.'-' . $no_urut,
            'stock' => $request->stock,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);
        $data = [
            'product' => $product,
            'title' => 'Edit Product'
        ];
        return view('products.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi data input
        $request->validate([
            'name' => 'required|string|max:255',
            'stock' => 'required|integer|min:0',
        ]);

        // Cari produk berdasarkan ID
        $product = Product::findOrFail($id);
        // Perbarui data produk
        $product->update([
            'name' => $request->name,
            'stock' => $request->stock,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        // Hapus produk
        $product->delete();
        // Redirect dengan pesan sukses
        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus.');
    }
}
