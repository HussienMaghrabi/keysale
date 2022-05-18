<?php

    namespace App\Http\Controllers\Api\Item;

    use App\Item_request;
    use App\Traits\apiResponse;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;

    class ItemRequestsController extends Controller
    {
        use apiResponse;

        public function index(Request $request)
        {
            $request->validate([
                'item_id' => 'required',
                'price' => 'required',
            ]);

            $item_request = Item_request::where("user_id", $request->user()->id)
                ->where("item_id", $request->item_id)
                ->latest()
                ->first();
            if ($item_request) {
                //check if latest price equal or less than new price ?
                if ($item_request->price >= $request->price) {
                    return $this->apiResponse($request, trans('language.youMustAddLargPrice'), null, false);
                }
            }

            $data['item_id'] = $request->item_id;
            $data['price'] = $request->price;
            $data['user_id'] = $request->user()->id;
            $data['status_id'] = 1;
            $item = Item_request::create($data);

            // add on firebase
            $database = $this->setUpFirebase();
            $reference = "requests/items/$request->item_id/";
            $test = $database->getReference($reference);
            $test->set([
                'id' => $request->item_id,
                'user_id' => $request->user()->id,
                'item_id' => $request->item_id,
                'user_name' => $item->user->serv_name,
                'price' => $request->price,
            ]);
            return $this->apiResponse($request, trans('language.message'), $item, true);

        }
    }
