<?php
    namespace App\Http\Controllers\Api\Representative;

    use App\Http\Resources\UserAuth\UserLoginResource;
    use App\ModulesConst\UserTyps;
    use App\Traits\apiResponse;
    use App\User;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;

    class IndexController extends Controller
    {
        use apiResponse;

        public function index(Request $request)
        {
            $items = User::where("user_type_id", UserTyps::representative)->orderBy("id", "desc")->get();
            $items = UserLoginResource::collection($items);
            return $this->apiResponse($request, trans('language.message'), $items, true);
        }
    }
