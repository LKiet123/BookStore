<?php
namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Books;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CrudReviewController extends Controller
{
    public function index(Request $request)
    {
        $query = Review::with(['user', 'book']);

        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->whereHas('user', function ($q) use ($search) {
                    $q->where('full_name', 'LIKE', "%{$search}%");
                })
                    ->orWhereHas('book', function ($q) use ($search) {
                        $q->where('title', 'LIKE', "%{$search}%");
                    });
            });
        }

        $reviews = $query->orderBy('date_review', 'desc')->paginate(10);
        return view('crud_review.list', compact('reviews'));
    }

    public function create()
    {
        $users = User::all();
        $books = Books::all();
        if ($books->isEmpty()) {
            return redirect()->back()->with('error', 'No books available to review.');
        }
        return view('crud_review.create', compact('users', 'books'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'book_id' => 'required|exists:books,book_id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable',
            'date_review' => 'required|date',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        Review::create($request->all());
        return redirect()->route('reviews.list')
            ->with('success', 'Review created successfully.');
    }

    public function show($id)
    {
        $review = Review::with(['user', 'book'])->findOrFail($id);
        return view('crud_review.read', compact('review'));
    }

    public function edit($id)
    {
        $review = Review::findOrFail($id);
        $users = User::all();
        $books = Books::all();
        if ($books->isEmpty()) {
            return redirect()->back()->with('error', 'No books available to update.');
        }
        return view('crud_review.update', compact('review', 'users', 'books'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'book_id' => 'required|exists:books,book_id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable',
            'date_review' => 'required|date',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $review = Review::findOrFail($id);
        $review->update($request->all());
        return redirect()->route('reviews.list')
            ->with('success', 'Review updated successfully');
    }

    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();
        return redirect()->route('reviews.list')
            ->with('success', 'Review deleted successfully');
    }
}