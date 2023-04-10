<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Database\QueryException;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Product::class, 'product');
    }

    public function index()
    {
        $products = Product::all();
        return View::make('products.index', compact(['products']));
    }

    public function create()
    {
        $categories = $this->getMappedCategories();
        return View::make('products.create', compact(['categories']));
    }

    public function store(StoreProductRequest $request)
    {
        Product::create($request->validated());
        return Redirect::route('products.index');
    }

    public function show(Request $request, Product $product)
    {
        if ($request->get('backTo'))
            $backTo = $request->get('backTo');
        else
            $backTo = route('products.index');

        return View::make('products.show', compact(['product', 'backTo']));
    }

    public function edit(Product $product)
    {
        $categories = $this->getMappedCategories();
        return View::make('products.edit', compact(['product', 'categories']));
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        try
        {
            $product->update($request->validated());
            return Redirect::route('products.show', $product->id);
        }
        catch (QueryException $err)
        {
            $msg = $err->getMessage();

            if (Str::contains($msg, 'products_name_unique'))
                return Redirect::back()->withErrors(['name' => 'Esse nome já está cadastrado. Escolha outro, por favor.'])->withInput();
            else if (Str::contains($msg, 'products_code_unique'))
                return Redirect::back()->withErrors(['code' => 'Esse código já está cadastrado. Escolha outro, por favor.'])->withInput();
            else
                throw $err;
        }
        
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return Redirect::route('products.index');
    }

    private function getMappedCategories()
    {
        return ProductCategory::all()->map(fn($category) => ['label' => $category->name, 'value' => $category->id]);
    }
}
