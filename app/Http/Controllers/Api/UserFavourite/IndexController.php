<?php

    namespace App\Http\Controllers\Api\UserFavourite;


    use App\Brand;
    use App\Brand_favourite;
    use App\Item_favourite;
    use App\Items;
    use App\Traits\apiResponse;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;

    class IndexController extends Controller
    {
        use apiResponse;
        public function index(Request $request)
        {
            $userid = $request->user()->id;
            if (!$userid)
                abort(404);
            $items_ids = Item_favourite::where('user_id',$request->user()->id)->pluck("item_id")->unique();
            $items =  Items::whereIn("id",$items_ids)->orderBy('id','desc')->get();
            return $this->apiResponse($request,trans('language.message') ,$items,true);
        }
        public function add_item_favourite(Request $request)
        {
            $data = $request->validate([
                'item_id' => 'required|string',
            ]);
            $item = Items::findOrFail($request->item_id);
            $check = Item_favourite::where('user_id',$request->user()->id)->where('item_id',$request->item_id)->first();
            if($check)
            {
                return $this->apiResponse($request, trans('language.exist'), null, false);
            }
            $data['user_id'] = $request->user()->id;
            $item = Item_favourite::create($data);
            return $this->apiResponse($request,trans('language.message') ,null,true);
        }

        public function remove_item_favourite(Request $request)
        {
            $data = $request->validate([
                'item_id' => 'required|string',
            ]);
            $item = Items::findOrFail($request->item_id);
            $check = Item_favourite::where('user_id',$request->user()->id)->where('item_id',$request->item_id)->first();
            if(!$check)
            {
                return $this->apiResponse($request, trans('language.no_data'), null, false);
            }
            $check->delete();
            return $this->apiResponse($request, trans('language.message'), null, true);
        }
    }
