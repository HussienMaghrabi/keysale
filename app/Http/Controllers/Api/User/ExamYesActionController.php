<?php

namespace App\Http\Controllers\Api\User;

use App\Exam;
use App\Exam_details;
use App\Traits\apiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExamYesActionController extends Controller
{
    use apiResponse;
    public function index(Request $request){

        $request->validate([
            'exam_id' => 'required',
            'timer' => 'required',
        ]);
        $checkIfNotExistItem = Exam::find($request->exam_id);
        if (!$checkIfNotExistItem) {
            return $this->apiResponse($request, trans('language.no_data'), null, false);
        }
        $exam = Exam::find($request->exam_id);
        $exam->timer = $request->timer;
        $exam->save();
        return $this->apiResponse($request, trans('language.message'), null, true);
    }
}
