<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

use RealRashid\SweetAlert\Facades\Alert;
class AdminController extends Controller
{
    // view category
    public function view_category()
    {
        // if id exist 
        if(Auth::id()) 
        {
            $data = Category::all(); // get all data from database
    
            return view('admin.category', compact('data'));
        } else {
            return redirect('login');
            
        }
    }

    // delete category 
    public function delete_category($id)
    {
        $data = Category::find($id);
        $data->delete();

        
        return redirect()->back();
    }

    // add category to database
    public function add_category(Request $request)
    {
        $data = new Category;
        $data->category_name = $request->category;
        $data->save();

        return redirect()->back()->with('message', 'Đã thêm danh mục');
    }

    // edit category
    public function edit_category($id)
    {
        $category = Category::find($id);

        return view('admin.edit_category', compact('category'));
    }

    // edit confirm
    public function edit_category_confirm(Request $request, $id)
    {
        $category = Category::find($id);
        $category->category_name = $request->category;
        $category->save();

        return redirect()->back()->with('message', 'Đã sửa danh mục');
    }

    // view product 
    public function view_product()
    {
        $category = Category::all();

        return view('admin.product', compact('category'));
    }

    // add product to database  
    // left side is call from database
    // right side call from the blade.php
    public function add_product(Request $request)
    {
        $product = new Product;

        $product->title = $request->title;

        $product->description = $request->description;

        $product->price = $request->price;

        $product->discount_price = $request->discount;

        $product->quantity = $request->quantity;

        $product->category = $request->category;


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $image->move('product', $imagename); // store the image in the product folder of public
            $product->image = $imagename;
        }

        $product->save();

        return redirect()->back()->with('message', 'Sản phẩm đã được thêm');

    }

    // show product
    public function show_product()
    {
        $product = Product::all();
        return view('admin.show_product', compact('product'));
    }

    // delete product
    public function delete_product($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->back()->with('message', 'Đã xóa sản phẩm');
    }

    // update product 
    public function update_product($id) 
    {
        $product = Product::find($id);
        $category = Category::all();

        return view('admin.update_product', compact('product', 'category'));
    }

    // edit category
   

    public function update_product_confirm(Request $request, $id)
    {
        if(Auth::id()) {
            
            $product = Product::find($id);
    
            $product->title = $request->title; 
    
            $product->description = $request->description; 
    
            $product->category = $request->category; 
    
            $product->price = $request->price; 
    
            $product->quantity = $request->quantity;
    
            $image = $request->image;
            
            if($image) {
                $imageName = time(). '.' . $image->getClientOriginalExtension();
                $request->image->move('product', $imageName);
                $product->image = $imageName;
            }
    
            $product->save();
    
            return redirect()->back()->with('message', 'Sản phẩm đã được cập nhật');
        } else {
            return redirect('login');
        }



    }

    // show order
    public function order()
    {
        $order = Order::all();

        return view('admin.order', compact('order'));
    }

    // deliver order
    public function delivered($id)
    {
        $order = Order::find($id);
        $order->delivery_status = "Đã giao hàng";
        $order->payment_status = "Đã thanh toán";
        $order->save();
        return redirect()->back();
    }
}