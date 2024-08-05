<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Request;

class ApiDataController extends Controller
{
    public function index()
    {
        $perPage = 8;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $response = Http::get('https://fakestoreapi.com/products');
        if ($response->successful()) {
            $products = $response->json();

            $currentPageItems = array_slice($products, ($currentPage - 1) * $perPage, $perPage);

            $paginatedItems = new LengthAwarePaginator(
                $currentPageItems,
                count($products),
                $perPage,
                $currentPage,
                ['path' => LengthAwarePaginator::resolveCurrentPath()]
            );

            return view('products.products', compact('paginatedItems'));
        }

        return view('products.products', ['paginatedItems' => []]);
    }
}
