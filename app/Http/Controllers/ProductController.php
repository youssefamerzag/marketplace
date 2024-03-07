<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index() {
        return view('product.index', [
            'products' => Product::all(),
            'categories' => Category::all()
        ]);
    }

    public function create() {
        return view('product.create',[
            'categories' => Category::all()
        ]);
    }

    public function store(Request $request ) {
        $request->validate([
            'product-title' => 'required',
            'product-price' => 'required',
            'product-image' => 'required',
            'category_id' => 'required',
        ]);


        $user = Auth::user();

        $product = new Product();
        $product->title = $request->input('product-title');
        $product->price = $request->input('product-price');
        $product->address = $request->input('product-address');
        
        //decode json string 
        $categoryObject = json_decode($request->input('category_id'));
        $product->category_id = $categoryObject;


        $product->user_id = $user->id;


        if ($request->hasFile('product-image')) {
            $image = $request->file('product-image');
            $extension = $image->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $image->move(public_path('images'), $filename);
            $product->image = $filename;
        }
        

        $product->save();
        return to_route('profile.show', [
            'id' => $user->id
        ]);
    } 


    public function show($id) {
        return view('product.show', [
            'product' => Product::findOrFail($id)
        ]);
    }

    public function destroy($id) {
        $to_Delete = Product::find($id);
        $to_Delete -> delete();

        $user = Auth::user();

        return to_route('profile.show', [
            'id' => $user->id
        ]);
    }

    public function edit($id) {
        return view('product.edit', [
            'product' => Product::find($id)
        ]);
    }

    public function update(Request $request , $id) {
        $request->validate([
            'product-title' => 'required',
            'product-price' => 'required',
            'product-image' => 'nullable'
        ]);

        $product = Product::find($id);
        $product->title = $request->input('product-title');
        $product->price = $request->input('product-price');

        if ($request->hasFile('product-image')) {
            $image = $request->file('product-image');
            $extension = $image->getClientOriginalExtension();
            $filename = time() . 'Edited' . "." . $extension;
            $image->move(public_path('images'), $filename);
            $product->image = $filename;
        }

        $product-> save();

        $user = Auth::user();
        
        return to_route('profile.show', [
            'id' => $user->id
        ]);
    }

    public function search(Request $request) {
        $request->validate([
            'search-value' => 'required'
        ]);

        $searchValue = $request->input('search-value');

        return view('product.search', [
            'products' => Product::where('title','like', '%' . $searchValue . '%')->get()
        ]);
    }

    //category

    public function indexCategory($category) {
        return view('category.index', [
            'products' => Product::where('category_id' , $category)->get()
        ]);
    }
}
