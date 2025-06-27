<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wishlists;
use Illuminate\Support\Facades\Auth;

class WishlistsController extends Controller
{
    public function toggle(Request $request)
    {
        $userId = Auth::user()->id;
        $bookId = $request->input('book_id');
        $exists = Wishlists::where('user_id', $userId)->where('book_id', $bookId)->exists();

        if ($exists) {
            Wishlists::where('user_id', $userId)->where('book_id', $bookId)->delete();
            return response()->json(['status' => 'removed']);
        } else {
            Wishlists::create(['user_id' => $userId, 'book_id' => $bookId]);
            return response()->json(['status' => 'added']);
        }
    }
}
