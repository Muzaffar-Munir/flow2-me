<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function index()
    {


        $products = Product::select('id', 'name', 'price', 'description', 'image', 'status', )->paginate(10);

        return view('product.index', compact('products',));
    }
    public function create()
    {

        $users = User::whereHas('roles', function ($query) {
            $query->where('name', 'user');
        })->get();

        $products = Product::get();
        return view('product.create', compact('products','users' ));
    }
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'price' => 'required',
                'description' => 'required',
                // 'image' => 'required|mimes:jpeg,jpg,png|max:400',
                'status' => 'required',
                'user_id'=>'required'


            ]);
            $number = preg_replace('/[^0.00-9.00]/s', "", $request->price);
            $price = sprintf('%.2f', $number);
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $name = time() . '.' . $extension;
            $url = public_path('images/product');
            $image->move($url, $name);
            $products = Product::create([
                'name' => $request->name,
                'price' => $price,
                'description' => $request->description,
                'image' => "images/product/{$name}",
                'status' => $request->status,
                'user_id' => $request->user_id,
            ]);
            Session::flash('success', 'Product Has Been Created Successfully!');
            return redirect(route('products.index'));
        } catch (\Exception $e) {
            // Catch any other generic exceptions
            Session::flash('error',  $e->getMessage());
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        try {
            $product = Product::find($id);

            $users = User::whereHas('roles', function ($query) {
                $query->where('name', 'user');
            })->get();



            if ($product != null) {
                return view('product.update', compact('product','users', ));
            } else {
                Session::flash('error', 'Product has not found.');
                return redirect()->route('products.index');
            }
        } catch (\Exception $e) {
            Session::flash('error',  $e->getMessage());
            return redirect()->back();
        }
    }
    public function update(Request $request, $id)
    {
        try {

            $request->validate([
                'name' => 'required',
                'price' => 'required',
                'description' => 'required',
                'status' => 'required',
                'product_color' => 'required',
                'user_id' => 'required',
                // 'image' => 'mimes:jpeg,jpg,png|max:400',
            ]);
            $number = preg_replace('/[^0.00-9.00]/s', "", $request->price);
            $price = sprintf('%.2f', $number);
            $product = Product::find($id);

            $product->update([
                'name' => $request->name,
                'price' => $price,
                'description' => $request->description,
                'status' => $request->status,
                // 'product_color' => $request->product_color,
                'user_id' => $request->user_id,
            ]);
            if ($request->image != '') {
                $image_path = public_path($product->image);
                if (file_exists($image_path)) {
                    unlink($image_path);
                }
                $image = $request->file('image');
                $extension = $image->getClientOriginalExtension();
                $name = time() . '.' . $extension;
                $url = public_path('images/product');
                $image->move($url, $name);
                $product->image = "images/product/{$name}";
                $product->save();
            }
            Session::flash('success', 'Product  Has Been Updated Successfully!');
            return redirect('/products');
        } catch (\Exception $e) {
            // Catch any other generic exceptions
            Session::flash('error',  $e->getMessage());
            return redirect()->back();
        }
    }
    public function destroy($id)
    {
        try {
            $product = Product::find($id);
            if ($product) {
                if ($product->image != '') {
                    $image_path = public_path($product->image);
                    if (file_exists($image_path)) {
                        unlink($image_path);
                    }
                }
                $product->delete();
                Session::flash('error', 'Product Has Been Deleted Successfully!');
                return redirect(route('products.index'));
            } else {
                Session::flash('success', 'Product Has Been Deleted Successfully!');
                return redirect(route('products.index'));
            }
        } catch (\Exception $e) {
            Session::flash('error',  $e->getMessage());
            return redirect()->back();
        }
    }


    public function show($id)
    {
        try {
            $product = Product::find($id);
            if ($product != null) {
                return view('product.view', compact('product',));
            } else {
                Session::flash('error', 'Product has not found.');
                return redirect()->route('products.index');
            }
        } catch (\Exception $e) {
            Session::flash('error',  $e->getMessage());
            return redirect()->back();
        }
    }
    public function search(Request $request)
    {
        $search = $request->input('search');
        $products = Product::where('name', 'LIKE', "%$search%")->paginate(10);
        $view = view('product.search-products', compact('products'))->render();
        return response()->json(['products' => $view]);
    }
    public function clear_search_products(){
        $products = Product::select('id', 'name', 'price', 'description', 'image', 'status', )->with(',name')->paginate(10);
        $view = view('product.search-products', compact('products'))->render();
        return response()->json(['products' => $view]);
    }
}
