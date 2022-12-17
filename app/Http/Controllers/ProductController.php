<?php
    
    namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\UProduct;
use Closure;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(5);
        return view('products.view', compact('products'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    public function create()
    {
        return view('products.add');
    }

    public function show(Product $products)
    {
        return view('products.view', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'p_name' => 'required',
            'p_type' => 'required',
            'p_qoh' => 'required',
            'price' => 'required'
        ]);

        $product = new Product();
        $product->p_name = $request->p_name;
        $product->p_type = $request->p_type;
        $product->p_qoh = $request->p_qoh;
        $product->price = $request->price;
        $product->u_id = $request->session()->get('userdata')['id'];
        $product->save();
        return redirect('products')->with('success','Product created successfully.');
    }

    public function edit(Product $product)
    {
        // $product = Product::find($id);
        return view('products.update', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'p_name' => 'required',
            'p_type' => 'required',
            'p_qoh' => 'required',
            'price' => 'required'
        ]);
    
            $product->p_name = $request->p_name;
            $product->p_type = $request->p_type;
            $product->p_qoh = $request->p_qoh;
            $product->price = $request->price;
            $product->u_id = $request->session()->get('userdata')['id'];
            $product->save();
        return redirect('products')->with('success','Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect('products')->with('success','Product deleted successfully.');
    }
}
