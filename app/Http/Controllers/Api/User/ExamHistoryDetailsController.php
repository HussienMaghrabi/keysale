<?php

namespace App\Http\Controllers\Api\User;

use App\Exam;
use App\Exam_details;
use App\Http\Resources\User\ExamDetailsQuestions;
use App\Traits\apiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExamHistoryDetailsController extends Controller
{
    use apiResponse;

    public function index(Request $request)
    {
        $request->validate([
            'exam_id' => 'required',
        ]);
        $checkIfNotExistItem = Exam::find($request->exam_id);
        if (!$checkIfNotExistItem) {
            return $this->apiResponse($request, trans('language.no_data'), null, false);
        }
        $exam = Exam::find($request->exam_id);
        $exam_details = Exam_details::where('exam_id',$exam->id)->get();
        $items =  ExamDetailsQuestions::collection($exam_details);
        $data['questions'] = $items;
        $data['created'] = strtotime($exam->created_at) * 1000;
        return $this->apiResponse($request, trans('language.message'), $data, true);

    }
}
