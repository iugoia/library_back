<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Feedback\FeedbackStoreRequest;
use App\Http\Requests\Feedback\FeedbackUpdateRequest;
use App\Http\Resources\FeedbacksResource;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    public function index()
    {
        return FeedbacksResource::collection(Feedback::all());
    }
    public function store(FeedbackStoreRequest $request)
    {
        $feedback = Feedback::create($request->all());
        $feedback->save();

        return response()->json([
            'message' => 'Спасибо за отзыв!'
        ]);
    }
    public function show(Feedback $feedback)
    {
        return new FeedbacksResource($feedback);
    }
    public function update(FeedbackUpdateRequest $request, Feedback $feedback)
    {
        $feedback->update($request->validated());

        return response()->json([
            'message' => 'Успешное обновление'
        ]);
    }
    public function destroy(Feedback $feedback)
    {
        $feedback->delete();

        return response()->json([
            'message' => 'Отзыв успешно удален'
        ]);
    }
}
