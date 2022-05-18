<?php

    namespace App\Http\Controllers\Api\Support;

    use App\Contact_us;
    use App\Technical_support;
    use App\Traits\apiResponse;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;

    class IndexController extends Controller
    {
        use apiResponse;

        public function index(Request $request)
        {
            $data = $request->validate([
                'message' => 'required',
            ]);
            $user = $request->user();
            $data["user_id"] = $user->id;
            $item = Technical_support::create($data);
            return $this->apiResponse($request, trans('language.message'), $item, true);

        }
    }
