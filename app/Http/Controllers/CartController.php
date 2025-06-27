<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function showCart()
    {
        $user = Auth::user();
        $cartItems = [];
        $totalQuantity = 0;
        if ($user) {
            $cartItems = Cart::with('book')->where('user_id', $user->id)->get();
            $totalQuantity = $cartItems->sum('quantity');
        }
        return view('cart.cart', compact('cartItems', 'totalQuantity'));
    }
    public function addToCart($id, Request $request)
    {
        $book = Books::findOrFail($id);
        $user = auth()->user();
        if (!$user) {
            return redirect()->back()->with('error', 'Bạn cần đăng nhập để thêm sản phẩm vào giỏ hàng.');
        }

        // Get quantity from request, default to 1 if not provided
        $quantity = (int) $request->input('quantity', 1);

        // Check if item already in cart
        $cartItem = Cart::where('user_id', $user->id)
            ->where('book_id', $id)
            ->first();

        if ($cartItem) {
            // Update quantity by the amount added
            $cartItem->quantity += $quantity;
            $cartItem->save();
        } else {
            // Add new item with specified quantity
            Cart::create([
                'user_id' => $user->id,
                'book_id' => $id,
                'quantity' => $quantity,
            ]);
        }

        return redirect()->back()->with('success', 'Sản phẩm đã được thêm vào giỏ hàng!');
    }
    public function cartApi()
    {
        $user = auth()->user();
        if (!$user) {
            return response()->json(['success' => false, 'message' => 'Bạn cần đăng nhập.'], 401);
        }
        $cartItems = \App\Models\Cart::with('book')->where('user_id', $user->id)->get();
        return response()->json([
            'success' => true,
            'cart' => $cartItems
        ]);
    }
    public function deleteApi($cart_id)
    {
        $user = auth()->user();
        $cartItem = \App\Models\Cart::where('cart_id', $cart_id)->where('user_id', $user->id)->first();
        if (!$cartItem) {
            return response()->json(['success' => false, 'message' => 'Không tìm thấy sản phẩm trong giỏ hàng.'], 404);
        }
        $cartItem->delete();

        // Get updated total quantity
        $totalQuantity = \App\Models\Cart::where('user_id', $user->id)->sum('quantity');

        return response()->json([
            'success' => true,
            'total_quantity' => $totalQuantity
        ]);
    }
    public function updateQuantity(Request $request, $cart_id)
    {
        $user = auth()->user();
        $cartItem = Cart::where('cart_id', $cart_id)->where('user_id', $user->id)->first();
        if (!$cartItem) {
            return response()->json(['success' => false, 'message' => 'Không tìm thấy sản phẩm trong giỏ hàng.'], 404);
        }
        $quantity = (int) $request->input('quantity', 1);
        if ($quantity < 1) $quantity = 1;
        $cartItem->quantity = $quantity;
        $cartItem->save();

        // Get updated total quantity
        $totalQuantity = Cart::where('user_id', $user->id)->sum('quantity');

        return response()->json([
            'success' => true,
            'quantity' => $cartItem->quantity,
            'total_quantity' => $totalQuantity
        ]);
    }
    public function searchProducts(Request $request)
    {
        $sarch = $request->input('q');
        $products = Books::where('title', 'like', "%{$sarch}%")
            ->orWhere('author', 'like', "%{$sarch}%")
            ->get();

        return response()->json([
            'success' => true,
            'products' => $products
        ]);
    }
    public function searchCartAPI($keyword)
    {
        $carts = Cart::with(['book.author']) // Giả sử có quan hệ với book và author
            ->whereHas('book', function ($query) use ($keyword) {
                $query->where('title', 'like', '%' . $keyword . '%')
                    ->orWhereHas('author', function ($q) use ($keyword) {
                        $q->where('author_name', 'like', '%' . $keyword . '%');
                    });
            })
            ->get();

        return response()->json($carts);
    }
}
