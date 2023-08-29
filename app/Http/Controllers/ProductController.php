<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\STR;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = 'Product';
        $data = array(
            'list' => 'List Product',
            'data' => Product::get(),
        );
        return view('pages.products.index', compact('title', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Product';
        $data = array(
            'list' => 'Create Product',
            'menu' => 'Product',
            'type' => 'add',
            'data' => (object)array(
                'name' => '',
                'type' => '',
                'price' => '',
                'quantity' => 0,
                'description' => '',
            ),
        );
        return view('pages.products.form', compact('title', 'data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        DB::beginTransaction();
        try {
            $product = new Product();
            $product->name = $request->name;
            $product->slug = Str::slug($request->name);
            $product->type = $request->type;
            $product->price = $request->price;
            $product->quantity = $request->quantity;
            $product->description = $request->description;
            $product->save();

            DB::commit();

            return redirect()->route('product.index')->with('success', 'Product created successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Something wrong. : ' . $e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Something wrong on database : ' . $e->getMessage());
        }
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
        $title = 'Product';
        $data = array(
            'list' => 'Edit Product',
            'menu' => 'Product',
            'type' => 'edit',
            'data' => $product,
        );
        return view('pages.products.form', compact('title', 'data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        DB::beginTransaction();
        try {
            $product->name = $request->name;
            $product->slug = Str::slug($request->name);
            $product->type = $request->type;
            $product->price = $request->price;
            $product->quantity = $request->quantity;
            $product->description = $request->description;
            $product->save();

            DB::commit();

            return redirect()->route('product.index')->with('success', 'Product updated successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Something wrong. : ' . $e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Something wrong on database : ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        DB::beginTransaction();
        try {
            $product->delete();

            DB::commit();

            return redirect()->route('product.index')->with('success', 'Product has been deleted.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Something wrong. : ' . $e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Something wrong on database : ' . $e->getMessage());
        }
    }
}
