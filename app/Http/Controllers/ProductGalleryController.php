<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductGalleryRequest;
use App\Models\Product;
use App\Models\ProductGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Product Gallery';
        $data = array(
            'list' => 'List Product Gallery',
            'data' => ProductGallery::with('product')->get(),
        );
        return view('pages.products-gallery.index', compact('title', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Product Gallery';
        $data = array(
            'list' => 'Create Product Gallery',
            'menu' => 'Product Gallery',
            'type' => 'add',
            'data' => (object)array(
                'product' => '',
                'photo' => '',
                'is_default' => '',
            ),
            'productList' => Product::get(),
        );
        return view('pages.products-gallery.form', compact('title', 'data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductGalleryRequest $request)
    {
        DB::beginTransaction();
        try {
            $document = $request->photo;
            $document->storeAs('public/product', $document->hashName());
            $model = new ProductGallery();
            $model->products_id = $request->product;
            $model->photo = 'storage/product/' . $document->hashName();
            $model->is_default = $request->is_default;
            $model->save();

            DB::commit();

            return redirect()->route('product-gallery.index')->with('success', 'Product gallery created successfully.');
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
    public function show(ProductGallery $productGallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductGallery $productGallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductGallery $productGallery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductGallery $productGallery)
    {
        DB::beginTransaction();
        try {
            $productGallery->delete();

            DB::commit();

            return redirect()->route('product-gallery.index')->with('success', 'Product gallery has been deleted.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Something wrong. : ' . $e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Something wrong on database : ' . $e->getMessage());
        }
    }
}
