<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Psy\Readline\Hoa\Console;

class ReviewController extends Controller
{
    public function storeReview(Request $request)
    {
        // RÀNG BUỘC DỮ LIỆU
        $request->validate([
            'book_id' => 'required|exists:books,book_id',
            'rating' => 'required|integer|min:0|max:5',
            'comment' => 'required|string|max:1000',
        ]);

        // Tạo đánh giá
        $review = Review::create([
            'book_id' => $request->book_id,
            'user_id' => Auth::user()->id,
            'rating' => $request->rating,
            'comment' => $request->comment,
            'date_review' => now()->toDateString(), // để đúng kiểu `date` trong DB
        ]);

        return response()->json([
            'message' => 'Đánh giá thành công',
            'review' => $review
        ]);
    }


    public function updateReview(Request $request)
    {
        $request->validate([
            'review_id' => 'required|exists:reviews,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
        ]);

        $review = Review::findOrFail($request->review_id);

        $review->update([
            'rating' => $request->rating,
            'comment' => $request->comment,
            'date_review' => now(),
        ]);

        return response()->json(['message' => 'Cập nhật đánh giá thành công', 'review' => $review]);
    }

    public function deleteReview(Request $request)
    {

        $review = Review::findOrFail($request->review_id);
        $review->delete();

        return response()->json(['message' => 'Xóa đánh giá thành công']);
    }
}
