<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;

class AuthorController extends Controller
{
    //
    public function showAuthor($id)
    {
        $author = Author::findOrFail($id);
        $books = $author->books;
        return view('author', compact('author', 'books'));
    }
}
