<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Category;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Publisher;
use App\Models\Author;

/**
 * CRUD User controller
 */
class CrudBookController extends Controller
{


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
    public function createBook()
    {
        $publishers = Publisher::all(); // Assuming you have a Publisher model
        $authors = Author::all();
        $categories = Category::all(); // Assuming you have an Author model
        return view('crud_book.create', ['publishers' => $publishers, 'authors' => $authors, 'categories' => $categories]);
    }

    /**
     * User submit form register
     */
    public function postBook(Request $request)
    {


        $request->validate([
            'title' => [
                'required',
                'string',
                function ($attribute, $value, $fail) {
                    if (mb_strlen($value) >= 100) {
                        $fail('The ' . $attribute . ' must be less than 100 characters.');
                    }
                }
            ],
            'author_id' => 'required|exists:authors,author_id',
            'publisher_id' => 'required|exists:publishers,publisher_id',
            'summary' => 'required|string|max:500',
            'description' => 'required|string|max:500',
            'published_date' => 'required|date|before:today',
            'price' => 'required|numeric|min:0|max:999999999',
            'volume_sold' => 'required|integer|min:0|max:999999999', 
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048', 
            'categories' => 'required|array|min:1',
            'categories.*' => 'exists:categories,category_id', 
        ]);

        $data = $request->all();

        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename); // Save the file to 'public/uploads'
            $data['cover_image'] = $filename; // Save the filename in the database
        } else {
            $data['cover_image'] = "placeholder.png"; // Default image if no file is uploaded
        }


        $book = Books::create([
            'title' => $data['title'],
            'summary' => $data['summary'],
            'author_id' => $data['author_id'],
            'published_date' => $data['published_date'], // Ensure this is included
            'publisher_id' => $data['publisher_id'],
            'description' => $data['description'],
            'price' => $data['price'],
            'cover_image' => $data['cover_image'],
            'volume_sold' => $data['volume_sold'],
        ]);

        $book->categories()->attach($request->categories);

        return redirect("listBook")->with('status', 'Registration successful');
    }


    public function readBook(Request $request)
    {
        $book_id = $request->get('book_id');
        $book = Books::find($book_id);

        if (!$book) {
            return redirect()->route('book.list')->with('error', 'Book not found.');
        }

        return view('crud_book.read', ['book' => $book]);
    }


    public function deleteBook(Request $request)
    {
        $book_id = $request->get('book_id');
        $book = Books::find($book_id);

        if (!$book) {
            return redirect()->route('book.list')->with('error', 'Book not found or already deleted.');
        }

        $book->delete();

        return redirect()->route('book.list')->with('status', 'Delete successfully');
    }


    public function updateBook(Request $request)
    {
        $book_id = $request->get('book_id');
        $book = Books::find($book_id);

        if (!$book) {
            return redirect()->route('book.list')->with('error', 'Book not found.');
        }

        $authors = Author::all();
        $publishers = Publisher::all();
        $categories = Category::all();

        return view('crud_book.update', [
            'book' => $book,
            'authors' => $authors,
            'publishers' => $publishers,
            'categories' => $categories,
        ]);
    }


    public function postUpdateBook(Request $request)
    {
        $input = $request->all();
        $book = Books::find($input['book_id']);

        if (!$book) {
            return redirect()->route('book.list')->with('error', 'Book not found.');
        }
        $request->validate([
            'title' => [
                'required',
                'string',
                function ($attribute, $value, $fail) {
                    // mb_strlen counts multibyte (full-width) and single-byte (half-width) as 1 each
                    if (mb_strlen($value) >= 100) {
                        $fail('The ' . $attribute . ' must be less than 100 characters.');
                    }
                }
            ],
            'author_id' => 'required|exists:authors,author_id',
            'publisher_id' => 'required|exists:publishers,publisher_id',
            'summary' => 'required|string|max:500',
            'description' => 'required|string|max:500',
            'published_date' => 'required|date|before:today',
            'price' => 'required|numeric|min:0|max:999999999',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
            'volume_sold' => 'required|integer|min:0|max:999999999',
            'categories' => 'required|array|min:1',
            'categories.*' => 'exists:categories,category_id', 
        ]);

        if ($request->has('updated_at') && $book->updated_at != $request->input('updated_at')) {
            return redirect()->back()->with('error', 'This book has been updated by another user. Please reload and try again.');
        }

        if ($request->hasFile('cover_image')) {
            if ($book->cover_image && file_exists(public_path('uploads/' . $book->cover_image))) {
                unlink(public_path('uploads/' . $book->cover_image));
            }

            $file = $request->file('cover_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            $book->cover_image = $filename;
        }



        $book->title = $input['title'];
        $book->summary = $input['summary'];
        $book->author_id = $input['author_id'];
        $book->publisher_id = $input['publisher_id'];
        $book->published_date = $input['published_date'];
        $book->description = $input['description'];
        $book->price = $input['price'];
        $book->volume_sold = $input['volume_sold'];
        $book->save();

        if ($request->has('categories')) {
            $book->categories()->sync($request->categories);
        } else {
            $book->categories()->detach();
        }

        return redirect("listBook")->with('status', 'Update successfully');
    }

    /**
     * List of users
     */


    /**
     * List of books with search functionality
     */
    public function listBook(Request $request)
    {
        $search = $request->input('search');

        $books = Books::with('author', 'publisher', 'categories')
            ->when($search, function ($query, $search) {
                $query->where('title', 'like', "%{$search}%")
                    ->orWhereHas('author', function ($q) use ($search) {
                        $q->where('author_name', 'like', "%{$search}%");
                    });
            })
            ->paginate(10)
            ->appends(['search' => $search]);

        if ($books->isEmpty() && $books->currentPage() > 1) {
            return redirect()->route('book.list', ['page' => 1, 'search' => $search])
                ->with('error', 'No books found on page ' . $books->currentPage() . ', redirected to first page.');
        }

        return view('crud_book.list', compact('books'));
    }

    /**
     * Sign out
     */


}
