<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Coupon;
use App\Models\OrdersDetails;
class CrudOrdersController extends Controller
{
    /**
     * Login page
     */
    public function login()
    {
        return view('crud_orders.login');
    }

    /**
     * User submit form login
     */
    public function authUser(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',

        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('list')
                ->withSuccess('Signed in');
        }

        return redirect("login")->withSuccess('Login details are not valid');
    }

    /**
     * Registration page
     */
    public function createOrder()
    {
        $dataCoupons = Coupon::all();
        return view('crud_orders.create', ['dataCoupons' => $dataCoupons]);
    }

    /**
     * User submit form register
     */
    public function postOrder(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'order_date' => [
                'required',
                'date',
                'before_or_equal:today',
                function ($attribute, $value, $fail) {
                    $year = (int) date('Y', strtotime($value));
                    if ($year < 1900 || $year > now()->year) {
                        $fail('The ' . $attribute . ' must have a valid year between 1900 and ' . now()->year . '.');
                    }
                }
            ],
            'status' => 'required|string|max:255',
            'tracking_number' => 'required|integer|min:1',
            'carrier' => 'required|string|max:255',
            'coupon_id' => 'nullable|integer|exists:coupons,id',
        ]);

        $data = $request->all();
        $total_price = 0;

        Orders::create([
            'user_id' => $data['user_id'],
            'order_date' => $data['order_date'],
            'status' => $data['status'],
            'tracking_number' => $data['tracking_number'],
            'carrier' => $data['carrier'],
            'coupon_id' => $data['coupon_id'],
            'total_price' => $total_price,
        ]);

        return redirect("listOrder")->with('status', 'Registration successful');
    }

    /**
     * View user detail page
     */
    public function readOrder(Request $request)
    {
        $order_id = $request->get('order_id');
        $order = Orders::find($order_id);
        return view('crud_orders.read', ['order' => $order]);
    }

    /**
     * Delete user by id
     */
    public function deleteOrder(Request $request)
    {
        $order_id = $request->get('order_id');
        $order = Orders::destroy($order_id);

        return redirect("listOrder")->with('status', 'Delete successfully');
    }

    /**
     * Form update user page
     */
    public function updateOrder(Request $request)
    {
        $dataCoupons = Coupon::all();

        $order_id = $request->get('order_id');
        $order = Orders::find($order_id);
        return view('crud_orders.update', ['order' => $order], ['dataCoupons' => $dataCoupons]);
    }
    public static function upDatePrice($order_id)
    {
        $order = Orders::find($order_id);
        $odersDetails = OrdersDetails::where('order_id', $order_id)->get();
        $total_price = 0;
        foreach ($odersDetails as $orderDetail) {
            $total_price += $orderDetail->price;
        }
        if (isset($order->coupon_id)) {
            $coupon = Coupon::find($order->coupon_id);
            $order->total_price = $total_price - ($total_price * $coupon->discount_amount / 100);
            $order->save();
            return;
        } else {
            $order->total_price = $total_price;
            $order->save();
            return;
        }
    }

    /**
     * Submit form update user
     */
    public function postUpdateOrder(Request $request)
    {
        $input = $request->all();

        $request->validate([
            'order_id' => 'required|exists:orders,order_id',
            'user_id' => 'required|integer|exists:users,id',
            'order_date' => [
                'required',
                'date',
                'before_or_equal:today',
                function ($attribute, $value, $fail) {
                    $year = (int) date('Y', strtotime($value));
                    if ($year < 1900 || $year > now()->year) {
                        $fail('The ' . $attribute . ' must have a valid year between 1900 and ' . now()->year . '.');
                    }
                }
            ],
            'status' => 'required|string|max:255',
            'tracking_number' => 'required|integer|min:1',
            'carrier' => 'required|string|max:255',
            'coupon_id' => 'nullable|integer|exists:coupons,id',
        ]);


        $order = Orders::find($input['order_id']);
        $order->user_id = $input['user_id'];
        $order->order_date = $input['order_date'];
        $order->status = $input['status'];
        $order->tracking_number = $input['tracking_number'];
        $order->carrier = $input['carrier'];
        $order->coupon_id = $input['coupon_id'];
        $order->save();
        CrudOrdersController::upDatePrice($order->order_id);

        return redirect("listOrder")->with('status', 'Update successfully');
    }



    /**
     * List of orders with search functionality
     */
    public function listOrders(Request $request)
    {
        $search = $request->input('search');

        $orders = Orders::when($search, function ($query, $search) {
            $query->where('status', 'like', "%{$search}%")
                ->orWhere('tracking_number', 'like', "%{$search}%")
                ->orWhere('carrier', 'like', "%{$search}%");
        })
            ->orderBy('created_at', 'desc') // Sắp xếp theo đơn mới nhất
            ->paginate(10)
            ->appends(['search' => $search]); // Giữ tham số search khi phân trang

        return view('crud_orders.list', compact('orders'));
    }

    /**
     * Sign out
     */
    public function signOut()
    {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
}