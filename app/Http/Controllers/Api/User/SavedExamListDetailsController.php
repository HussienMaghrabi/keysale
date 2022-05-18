<?php

namespace App\Http\Controllers\Api\User;

use App\Exam;
use App\Exam_details;
use App\Http\Resources\User\ExamDetailsQuestions;
use App\ModulesConst\PM;
use App\Traits\apiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SavedExamListDetailsController extends Controller
{
    use apiResponse;
    public function index(Request $request)
    {
        $request->validate([
            'exam_id' => 'required',
        ]);

        $userid = $request->user()->id;
        if (!$userid)
            abort(404);

        $checkIfNotExistItem = Exam::find($request->exam_id);
        if (!$checkIfNotExistItem) {
            return $this->apiResponse($request, trans('language.no_data'), null, false);
        }
        $exam = Exam::find($request->exam_id);
        $examDetails = Exam_details::where('exam_id',$request->exam_id)->get();
        $items =  ExamDetailsQuestions::collection($examDetails);
        $data['questions'] = $items;
        $data['counter'] = count($examDetails);
        $data['timer'] = (int)$exam->serv_timer_count;
        $data['exam_id'] = $exam->id;
        $data['created'] = strtotime($exam->created_at) * 1000;
        $data['is_paid'] = $exam->serv_exam_paid ;
        $data['user_is_paid_version'] = $request->user()->serv_is_paid ;
        return $this->apiResponse($request, trans('language.no_data'), $data, true);

    }
}
