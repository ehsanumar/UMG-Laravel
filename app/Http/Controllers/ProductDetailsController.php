<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductDetailsController extends Controller
{

    public function details($id)
    {
        $response = Http::get("https://fakestoreapi.com/products/{$id}");

        if ($response->successful()) {
            $product = $response->json();


            return view('products.details', compact('product'));
        }

        return abort(404, 'Product not found');
    }
}
