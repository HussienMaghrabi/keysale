<?php

namespace App\Http\Controllers\Api\User;

use App\Exam;
use App\Traits\apiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DeleteExamController extends Controller
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
        $exam->deleted = 1 ;
        $exam->save();
        return $this->apiResponse($request, trans('language.message'), null, true);
    }
}
