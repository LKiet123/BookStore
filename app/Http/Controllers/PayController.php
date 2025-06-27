<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class PayController extends Controller
{
    public function showPay(Request $request)
    {
        $user = Auth::user();
        $cartItems = [];
        $total = 0;
        $totalQuantity = 0;
        $cartIds = $request->query('cart_ids');
        if ($user && $cartIds) {
            $ids = explode(',', $cartIds);
            $cartItems = \App\Models\Cart::with('book')
                ->where('user_id', $user->id)
                ->whereIn('cart_id', $ids)
                ->get();
            foreach($cartItems as $item) {
                $total += $item->book->price * $item->quantity;
                $totalQuantity += $item->quantity;
            }
        }
        return view('pay.pay', compact('cartItems', 'user', 'total', 'totalQuantity'));
    }
}
