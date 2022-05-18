<?php

    namespace App\Http\Controllers\Api\UserFollow;

    use App\Follow;
    use App\ModulesConst\Paginate;
    use App\Traits\apiResponse;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;

    class IndexController extends Controller
    {
        use apiResponse;

        public function add_item_follow(Request $request)
        {
            $data = $request->validate([
                'person_two' => 'required|string',
            ]);

            $check = Follow::where('person_one', $request->user()->id)->where('person_two', $request->person_two)->first();
            if ($check) {
                return $this->apiResponse($request, trans('language.exist'), null, false);
            }
            $data['person_one'] = $request->user()->id;
            $data['person_two'] = $request->person_two;
            $item = Follow::create($data);
            return $this->apiResponse($request, trans('language.message'), $item, true);
        }

        public function remove_item_follow(Request $request)
        {
            $request->validate([
                'person_two' => 'required|string',
            ]);
            $item = Follow::where('person_one', $request->user()->id)->where('person_two', $request->person_two)->first();
            if (!$item) {
                return $this->apiResponse($request, trans('language.no_data'), null, false);
            }
            $item->delete();
            return $this->apiResponse($request, trans('language.message'), null, true);
        }

        public function following_list(Request $request)
        {
            $user = $request->user();
            $items = Follow::where("person_one",$user->id)->orderBy("id","desc")->get();
            return $this->apiResponse($request, trans('language.message'), $items, true);
        }

        public function followers_list(Request $request)
        {
            $user = $request->user();
            $items = Follow::where("person_two", $user->id)->orderBy("id", "desc")->get();
            return $this->apiResponse($request, trans('language.message'), $items, true);
        }
    }
