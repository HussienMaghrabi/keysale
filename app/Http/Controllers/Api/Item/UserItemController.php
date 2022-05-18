<?php

    namespace App\Http\Controllers\Api\Item;

    use App\Items;
    use App\Traits\apiResponse;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;

    class UserItemController extends Controller
    {
        use apiResponse;

        public function index(Request $request)
        {
            $items = Items::where('user_id', $request->user()->id)->get();
            return $this->apiResponse($request, trans('language.message'), $items, true);
        }

        public function delete(Request $request)
        {
            $request->validate([
                'item_id' => 'required|string',
            ]);

            $item = Items::findorfail($request->item_id);
            $item->delete();
            return $this->apiResponse($request, trans('language.message'), null, true);
        }

    }
