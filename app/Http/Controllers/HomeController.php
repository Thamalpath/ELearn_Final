<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::with('subCategories')->get();
        $products = Product::inRandomOrder()->limit(8)->get();

        $menProducts = Product::where('category_name', 'Men\'s Wear')->inRandomOrder()->limit(8)->get();
        $womenProducts = Product::where('category_name', 'Women\'s Wear')->inRandomOrder()->limit(8)->get();
        $kidsProducts = Product::where('category_name', 'Kids\'s Wear')->inRandomOrder()->limit(8)->get();

        $trendingProducts = Product::where('trending', 1)->inRandomOrder()->limit(8)->get();
        $popularProducts = Product::where('popular', 1)->inRandomOrder()->limit(8)->get();

        return view('home.index', compact('categories', 'products', 'menProducts', 'womenProducts', 'kidsProducts', 'trendingProducts', 'popularProducts'));
    }

    public function about()
    {
        $categories = Category::with('subCategories')->get();
        return view('web.about', compact('categories'));
    }

    public function contact()
    {
        $categories = Category::with('subCategories')->get();
        return view('web.contact', compact('categories'));
    }

    public function orderDetails()
    {
        $categories = Category::with('subCategories')->get();
        $orders = Order::where('user_id', Auth::id())->get();
        $user = User::find(Auth::id());

        return view('web.account.index', compact('orders', 'categories', 'user'));
    }

    public function updateAccount(Request $request)
    {
        $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
            'phone' => 'nullable|string|max:20',
            'address1' => 'nullable|string|max:255',
            'address2' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
            'zipcode' => 'nullable|string|max:20',
        ]);

        $user = User::find(Auth::id());

        if (!$user) {
            $user = new User();
            $user->id = Auth::id(); // Set the user ID if creating a new user
        }

        $user->fname = $request->input('fname');
        $user->lname = $request->input('lname');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->address1 = $request->input('address1');
        $user->address2 = $request->input('address2');
        $user->city = $request->input('city');
        $user->state = $request->input('state');
        $user->country = $request->input('country');
        $user->zipcode = $request->input('zipcode');

        $user->save();

        // return redirect()->route('my-account')->with('success', 'Account details updated successfully.');
        return response()->json([
            'status' => 'success',
            'message' => 'Account details updated successfully.'
        ]);
    }

    public function search(Request $request)
    {
        $categories = Category::with('subCategories')->get();
        $searched_product = $request->product_name;

        if ($searched_product != "") {
            $products = Product::where("name", "LIKE", "%$searched_product%")->get();

            if ($products->isEmpty()) {
                return view('web.products.search-list', compact('products', 'categories'))
                    ->with('noResults', true); // Add a flag to indicate no results
            }

            return view('web.products.search-list', compact('products', 'categories'));
        } else {
            return redirect()->route('home');
        }
    }
}
