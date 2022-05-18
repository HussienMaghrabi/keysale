<?php

namespace App\Http\Controllers\Api\User;

use App\Exam;
use App\Exam_details;
use App\Traits\apiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExamUpdateQuestionController extends Controller
{
    use apiResponse;
    public function index(Request $request)
    {
        $request->validate([
            'exam_id' => 'required',
            'question_id' => 'required',
            'answer_num' => 'required',
            'status' => 'required',
        ]);
        $checkIfNotExistItem = Exam::find($request->exam_id);
        if (!$checkIfNotExistItem) {
            return $this->apiResponse($request, trans('language.no_data'), null, false);
        }
        $exam = Exam::find($request->exam_id);
        $examDetails = Exam_details::where('exam_id',$exam->id)->where('question_id',$request->question_id)->first();
        if($examDetails){
            $data['answer_id'] = $request->answer_num;
            $data['status'] = $request->status;
            $examDetails->update($data);
            return $this->apiResponse($request, trans('language.message'), null, true);
        }else{
            return $this->apiResponse($request, trans('language.notExistExam'), null, true);
        }

    }
}
