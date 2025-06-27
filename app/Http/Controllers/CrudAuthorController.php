<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use Illuminate\Support\Str;
class CrudAuthorController extends Controller
{

    /**
     * Display a listing of authors.
     */
    public function listAuthor(Request $request)
    {
        $search = $request->input('search');

        $authors = Author::when($search, function ($query, $search) {
            $query->where('author_name', 'like', "%{$search}%")
                ->orWhere('hometown', 'like', "%{$search}%");
        })->paginate(10)->appends(['search' => $search]);
        return view('crud_author.list', compact('authors'));
    }

    /**
     * Show the form for creating a new author.
     */
    public function createAuthor()
    {
        return view('crud_author.create');
    }

    /**
     * Store a newly created author in storage.
     */
    public function postAuthor(Request $request)
    {
        $validated = $request->validate([
            'author_name' => 'required|string|max:255',
            'birth_date' => 'nullable|date|before_or_equal:today',
            'hometown' => 'nullable|string|max:255',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
            'bio' => 'nullable|string|max:2000',
        ], [
            'author_name.required' => 'Tên tác giả là bắt buộc.',
            'author_name.max' => 'Tên tác giả không được vượt quá 255 ký tự.',
            'birth_date.date' => 'Ngày sinh không hợp lệ.',
            'birth_date.before_or_equal' => 'Ngày sinh không được vượt quá ngày hiện tại.',
            'hometown.max' => 'Quê quán không được vượt quá 255 ký tự.',
            'cover_image.image' => 'Tệp tải lên phải là hình ảnh.',
            'cover_image.mimes' => 'Ảnh phải có định dạng: jpeg, png, jpg hoặc svg.',
            'cover_image.max' => 'Ảnh không được lớn hơn 2MB.',
            'bio.max' => 'Tiểu sử không được vượt quá 2000 ký tự.',
        ]);

        // Xử lý ảnh nếu có upload
        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');
            $filename = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $validated['cover_image'] = $filename;
        } else {
            $validated['cover_image'] = 'placeholder.png';
        }

        // Tạo mới Author
        Author::create($validated);

        return redirect()->route('authors.list')->with('status', 'Author created successfully!');
    }

    /**
     * Show the form for editing the specified author.
     */
    public function editAuthor($id)
    {
        $author = Author::findOrFail($id);
        return view('crud_author.edit', compact('author'));
    }

    /**
     * Update the specified author in storage.
     */

    public function updateAuthor(Request $request, $id)
    {
        $request->validate([
            'author_name' => 'required|string|max:255',
            'birth_date' => 'nullable|date|before_or_equal:today',
            'hometown' => 'nullable|string|max:255',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
            'bio' => 'nullable|string|max:2000',
        ], [
            'author_name.required' => 'Tên tác giả là bắt buộc.',
            'author_name.max' => 'Tên tác giả không được vượt quá 255 ký tự.',
            'birth_date.date' => 'Ngày sinh không hợp lệ.',
            'birth_date.before_or_equal' => 'Ngày sinh không được lớn hơn ngày hiện tại.',
            'hometown.max' => 'Quê quán không được vượt quá 255 ký tự.',
            'cover_image.image' => 'Ảnh phải là tệp hình ảnh.',
            'cover_image.mimes' => 'Ảnh chỉ chấp nhận các định dạng jpeg, png, jpg, svg.',
            'cover_image.max' => 'Ảnh không được vượt quá 2MB.',
            'bio.max' => 'Tiểu sử không được dài quá 2000 ký tự.',
        ]);

        $author = Author::findOrFail($id);

        $author->fill($request->only(['author_name', 'birth_date', 'hometown', 'bio']));

        if ($request->hasFile('cover_image')) {
            // Delete old image if exists
            if ($author->cover_image && file_exists(public_path('images/' . $author->cover_image))) {
                unlink(public_path('images/' . $author->cover_image));
            }

            // Save new image
            $file = $request->file('cover_image');
            $filename = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $author->cover_image = $filename;
        }

        $author->save();

        return redirect()->route('authors.list')->with('status', 'Author updated successfully!');
    }

    /**
     * Remove the specified author from storage.
     */
    public function deleteAuthor($id)
    {
        Author::destroy($id);
        return redirect()->route('authors.list')->with('status', 'Author deleted successfully!');
    }

    /**
     * Display the specified author.
     */
    public function readAuthor($id)
    {
        $author = Author::findOrFail($id);
        return view('crud_author.read', compact('author'));
    }

}
