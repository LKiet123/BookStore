<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Coupon;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    //
    public function index()
    {
        // Logic to display a list of vouchers
        $vouchers = Coupon::orderBy('valid_to')->take(6)->get();
        $soldBooks = Books::with(['author', 'categories'])->orderBy('volume_sold', 'desc')->take(8)->get();
        return view('voucher', compact('soldBooks', 'vouchers'));
    }
    public function all()
    {
        $vouchers = Coupon::orderBy('valid_to')->paginate(9);
        return response()->json($vouchers);
    }
}
