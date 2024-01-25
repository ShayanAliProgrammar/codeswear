<?php

namespace App\Http\Controllers;

use App\Models\AboutInfo;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class AdminController extends Controller
{
    public function dashboard()
    {
        $products = Product::latest()->get();
        return view('admin.index', compact('products'));
    }

    public function adminChangeInfoPage()
    {
        $about_info = AboutInfo::latest()->get()[0];
        return view('admin.change-info', compact('about_info'));
    }

    public function productCategoriesPage()
    {
        $categories = Cache::remember('admin_products_categories', 5, function () {
            return Category::latest()->get();
        });
        return view('admin.categories.index', compact('categories'));
    }

    public function productAddPage()
    {
        $categories = Category::latest()->get();
        return view('admin.products.add', compact('categories'));
    }

    public function productAdd(Request $request)
    {
        $fields = $request->validate([
            'title' => 'required',
            'price' => 'required',
            'description' => 'required|max:255',
            'product_details' => 'required',
            'category' => 'required',
            'colors' => 'required',
            'designs' => 'required',
            'sizes' => 'required',
            'main_image' => 'required',
            'product_images' => 'required',
        ]);

        Cache::clear();

        $oldDdesc = $fields['description'];

        $fields['description'] = nl2br($oldDdesc);

        $main_image = $request->file('main_image')->store('products', 'public');
        $product_images = $request->file('product_images');

        $product_images_urls = [];

        foreach ($product_images as $product_image) {
            $image_url = $product_image->store('products/' . str_replace(' ', '-', $fields['title']), 'public');
            $product_images_urls[] = $image_url;
        }

        $existing_product = Product::where('title', '=', $fields['title'])->get();

        if (count($existing_product) > 0) {
            return redirect()->back()->with('error', 'Product Already Exists');
        }

        Product::create([
            'title' => $fields['title'],
            'price' => $fields['price'],
            'description' => $fields['description'],
            'product_details' => $fields['product_details'],
            'category_id' => $fields['category'],
            'colors' => json_encode($fields['colors']),
            'sizes' => json_encode($fields['sizes']),
            'designs' => json_encode($fields['designs']),
            'main_image' => $main_image,
            'product_images' => json_encode($product_images_urls),
        ]);

        return redirect()->back()->with('success', 'Product Added Successfully');
    }

    public function categoryAddPage()
    {
        return view('admin.categories.add');
    }

    public function categoryAdd(Request $request)
    {
        $fields = $request->validate(['name' => 'required', 'slug' => 'required']);

        $existing_category = Category::where('name', '=', $fields['name'])->get();

        if (count($existing_category) > 0) {
            return redirect()->back()->with('error', 'Category already exists');
        }

        Cache::clear();

        Category::create($fields);

        return redirect(route('admin-product-categories'))->with('success', 'Category created successfully');
    }

    public function categoryEdit(Request $request)
    {
        $fields = $request->validate(['name' => 'required', 'slug' => 'required', 'category_id' => 'required']);

        $existing_category = Category::find($fields['category_id']);

        if (!$existing_category) {
            return redirect()->back()->with('error', 'Category already exists');
        }


        Cache::clear();

        $existingCategoryWithSameName = Category::where('name', $fields['name'])
            ->where('id', '<>', $fields['category_id'])
            ->first();


        if ($existingCategoryWithSameName) {
            return redirect()->back()->with('error', 'Category already exists');
        }


        $existing_category->name = $fields['name'];
        $existing_category->slug = $fields['slug'];
        $existing_category->save();

        return redirect(route('admin-product-categories'))->with('success', 'Category updated successfully');
    }

    public function productEdit(Request $request)
    {
        $fields = $request->validate([
            'title' => 'required',
            'price' => 'required',
            'product_id' => 'required',
            'description' => 'required|max:255',
            'product_details' => 'required',
            'category_id' => 'required',
            'colors' => 'required',
            'designs' => 'required',
            'sizes' => 'required',
        ]);


        Cache::clear();

        $oldDdesc = $fields['description'];

        $fields['description'] = nl2br($oldDdesc);

        $existing_product = Product::find($fields['product_id']);

        if (!$existing_product) {
            return redirect()->back()->with('error', 'Product already exists');
        }


        Cache::clear();

        $existingProductWithSameName = Product::where('title', $fields['title'])
            ->where('id', '<>', $fields['product_id'])
            ->first();


        if ($existingProductWithSameName) {
            return redirect()->back()->with('error', 'Product already exists');
        }


        $existing_product->update($fields);


        return redirect(route('admin-products-all'))->with('success', 'Product updated successfully');
    }


    public function categoryDelete(Category $category)
    {

        Cache::clear();

        $category->delete();

        return redirect(route('admin-product-categories'))->with('success', 'Category deleted successfully');
    }

    public function productDelete(Product $product)
    {

        Cache::clear();

        $product->delete();

        return redirect(route('admin-products-all'))->with('success', 'Product deleted successfully');
    }

    public function categoryEditPage(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function productEditPage(Product $product)
    {
        $category = (Category::where('id', '=', $product->category_id)->get())[0];
        $all_category = (Category::all());
        return view('admin.products.edit', compact('product', 'category', 'all_category'));
    }

    public function productsPage()
    {
        $products = Product::latest()->get();
        return view('admin.products.index', compact('products'));
    }

    public function login()
    {
        if (auth('admin')->user()) {
            return redirect(route('admin-dashboard'));
        }
        return view('admin.login');
    }

    public function loginAdmin(Request $request)
    {
        $fields = $request->validate(['name' => 'required', 'password' => 'required']);

        $admin = Admin::where('name', '=', $fields['name'])->get();

        if (count($admin) === 0) {
            return redirect()->back()->with('error', 'You are not allowed to login');
        };

        if (!password_verify($fields['password'], $admin[0]->password)) {
            return redirect()->back()->with('error', 'You are not allowed to login');
        }

        Auth::guard('admin')->login($admin[0]);

        return redirect(route('admin-dashboard'));
    }
}
