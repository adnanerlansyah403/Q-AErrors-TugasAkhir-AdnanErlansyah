<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{

    public function show(Review $review)
    {

        return view("pages.backend.admin.notification.review.show", compact("review"));
    }

    public function destroy(Review $review)
    {
        $review->delete();

        return redirect()->route('admin.notification.index')->with("success", "The review has been declined!");
    }

    public function update(Review $review, Request $request)
    {

        // dd("test");

        $review->update([
            'status' => 1
        ]);

        return redirect()->route('admin.notification.index')
            ->with('success', 'The review has been accepted!');
    }
}
