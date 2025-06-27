<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\CategoryBook;
use App\Models\Repo;
use App\Models\Wishlists;
use Illuminate\Http\Request;
use App\Models\Category;
use League\CommonMark\Extension\Footnote\Node\FootnoteRef;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;



class ItemController extends Controller
{
    public function showItemDetail($book_id)
    {
        $book = Books::with(['categories', 'publisher', 'author', 'reviews.user'])->findOrFail($book_id);

        $relatedBooks = collect();
        foreach ($book->categories as $category) {
            $categoryWithBooks = Category::with('books')->findOrFail($category->category_id);
            $relatedBooks = $relatedBooks->merge($categoryWithBooks->books);

        }
        $relatedBooks = $relatedBooks
            ->where('book_id', '!=', $book_id)
            ->unique('book_id')
            ->take(4)
            ->values();

        $relatedAuthorBooks = Books::where('author_id', $book->author_id)
            ->where('book_id', '!=', $book_id)
            ->take(4)
            ->get();

        $bookWishList = false;
        if (Auth::check()) {
            $bookWishList = Wishlists::where('book_id', $book_id)
                ->where('user_id', Auth::id())
                ->exists();
        }
        $reviews = Review::where('book_id', $book->book_id)
            ->orderByDesc('date_review')
            ->with('user')
            ->paginate(5);

        return view('item', compact('book', 'relatedBooks', 'bookWishList', 'relatedAuthorBooks', 'reviews'));

    }
}
