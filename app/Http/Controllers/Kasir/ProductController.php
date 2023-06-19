<?php

namespace App\Http\Controllers\Kasir;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Suplayer;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::paginate(3);
        $filterKeyword = $request->get('keyword');
        if ($filterKeyword) {
            //dijalankan jika ada pencarian
            $products = Product::where('nama', 'LIKE', "%$filterKeyword%")->paginate(2);
        }
        return view('kasir/product.index', compact('products'));
    }
}