<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ReviewsController extends Controller
{
    public function index()
    {
        $reviews = Review::with('HasUser')->all();

        return view('reviews.index', ['reviews' => $reviews]);
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'body' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $input = $request->input();

        try {
            DB::beginTransaction();

            $review = new Review();
            $review->user_id = auth()->id;
            $review->item_id = $input['item_id'];
            $review->content = $input['body'];
            $review->save();

            DB::commit();
        } catch (Exception $ex) {
            DB::rollBack();
            Log::error('Error review saving: ', $ex);
            return redirect()->back()->with('errors', 'Error on saving the review');
        }
    }

    public function delete($id)
    {

        $data = Review::find($id);
        if ($data == null) {
            $response = ['error review not found'];
        } else {
            $data->delete();
            $response = ['review deleted'];
        }
        return response()->json();
    }

    public function show($id)
    {
        $review = Review::with('HasUser')->where('id', $id)->first();

        return view('reviews.show', ['review' => $review]);
    }
}
