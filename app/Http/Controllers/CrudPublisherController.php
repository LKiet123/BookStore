<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * CRUD User controller
 */
class CrudPublisherController extends Controller
{

    /**
     * Login page
     */
    public function login()
    {
        return view('crud_book.login');
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
    public function createPublisher()
    {
        return view('crud_publisher.create');
    }

    /**
     * User submit form register
     */
    public function postPublisher(Request $request)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email|unique:users',
        //     'password' => 'required|min:6',
        // ]);
        $request->validate([
            'publisher_name' => 'required|string|max:100|unique:publishers,publisher_name',
            'contact_info' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
        ]);

        $data = $request->all();


        Publisher::create([
            'publisher_name' => $data['publisher_name'],
            'contact_info' => $data['contact_info'],
            'address' => $data['address'] ?? '',
        ]);

        return redirect("listPublisher")->with('status', 'Registration successful');
    }

    /**
     * View user detail page
     */
    public function readPublisher(Request $request)
    {
        $publisher_id = $request->get('publisher_id');
        $publisher = Publisher::find($publisher_id);
        if (!$publisher) {
            return redirect()->route('publisher.list')->with('error', 'Publisher not found.');
        }

        return view('crud_publisher.read', ['publisher' => $publisher]);
    }

    /**
     * Delete user by id
     */
    public function deletePublisher(Request $request)
    {
        $publisher_id = $request->get('publisher_id');
        $publisher = Publisher::find($publisher_id);
        if (!$publisher) {
            return redirect("listPublisher")->with('error', 'Publisher not found');
        }
        $publisher->delete();

        return redirect("listPublisher")->with('status', 'Delete successfully');
    }

    /**
     * Form update user page
     */
    public function updatePublisher(Request $request)
    {
        $publisher_id = $request->get('publisher_id');
        $publisher = Publisher::find($publisher_id);

        if (!$publisher) {
            return redirect()->route('publisher.list')->with('error', 'Publisher not found.');
        }

        return view('crud_publisher.update', ['publisher' => $publisher]);
    }

    /**
     * Submit form update user
     */
    public function postUpdatePublisher(Request $request)
    {
        $input = $request->all();
        $request->validate([
            'publisher_name' => 'required|string|max:100|unique:publishers,publisher_name,' . $input['publisher_id'] . ',publisher_id',
            'contact_info' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
        ]);

        $publisher = Publisher::find($input['publisher_id']);

        if ($request->has('updated_at') && $publisher->updated_at != $request->input('updated_at')) {
            return redirect()->back()->with('error', 'This book has been updated by another user. Please reload and try again.');
        }

        $publisher->publisher_name = $input['publisher_name'];
        $publisher->contact_info = $input['contact_info'];
        $publisher->address = $input['address'] ?? '';
        $publisher->save();

        return redirect("listPublisher")->with('status', 'Update successfully');
    }

    /**
     * List of users
     */
    public function listPublisher(Request $request)
    {
        $search = $request->input('search');

        $publishers = Publisher::when($search, function ($query, $search) {
            $query->where('publisher_name', 'like', "%{$search}%")
                ->orWhere('contact_info', 'like', "%{$search}%")
                ->orWhere('address', 'like', "%{$search}%");
        })->paginate(10)->appends(['search' => $search]); // Append search query to pagination links

        if ($publishers->isEmpty() && $publishers->currentPage() > 1) {
            return redirect()->route('publisher.list', ['page' => 1, 'search' => $search])
                ->with('error', 'No publishers found on page '. $publishers->currentPage().', redirected to first page.');
        }

        return view('crud_publisher.list', compact('publishers'));
    }





}
