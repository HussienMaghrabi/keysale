<?php

namespace App\Http\Controllers\Api\User;

use App\Exam;
use App\Http\Resources\User\ExamSavedResource;
use App\Http\Resources\User\UserExamsResource;
use App\Traits\apiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SavedExamListController extends Controller
{
    use apiResponse;
    public function index(Request $request)
    {

        $userid = $request->user()->id;
        if (!$userid)
            abort(404);

        $saveExams = Exam::where('user_id',$userid)->where('deleted','0')->where('is_end','0')->get();
        $items = ExamSavedResource::collection($saveExams);
        return $this->apiResponse($request, trans('language.message'), $items, true);
    }
}
