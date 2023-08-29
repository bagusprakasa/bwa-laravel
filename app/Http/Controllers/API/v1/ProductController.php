<?php

namespace App\Http\Controllers\API\v1;

use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        try {
            $id = $request->id;
            $limit = $request->limit ? $request->limit : 6;
            $name = $request->name;
            $slug = $request->slug;
            $type = $request->type;
            $price_from = $request->price_from;
            $price_to = $request->price_to;
            if ($id) {
                $product = Product::with('galleries')->findOrFail($id);
                if ($product) {
                    return Helpers::succesResponse($product, 'Get product successfully.');
                }
            }
            if ($slug) {
                $product = Product::with('galleries')->where('slug', $slug)->firstOrFail();
                if ($product) {
                    return Helpers::succesResponse($product, 'Get product successfully.');
                }
            }

            $product = Product::with('galleries')->where('quantity', '>', 0);
            if ($name) {
                $product->where('name', 'like', '%' . $name . '%');
            }
            if ($type) {
                $product->where('type', 'like', '%' . $type . '%');
            }
            if ($price_from) {
                $product->where('price', '>=', $price_from);
            }
            if ($price_to) {
                $product->where('price', '<=', $price_to);
            }

            return Helpers::succesResponse($product->paginate($limit), 'Get product successfully.');
        } catch (Exception $e) {
            return Helpers::errorResponse(null, 'Something wrong. : ' . $e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        } catch (QueryException $e) {
            return Helpers::errorResponse(null, 'Something wrong on database. : ' . $e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
