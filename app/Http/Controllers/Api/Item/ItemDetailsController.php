<?php

    namespace App\Http\Controllers\Api\Item;

    use App\Http\Resources\UserAuth\UserLoginResource;
    use App\Item_request;
    use App\Items;
    use App\Traits\apiResponse;
    use App\User;
    use Carbon\Carbon;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;

    class ItemDetailsController extends Controller
    {
        use apiResponse;

        public function index(Request $request)
        {
            $request->validate([
                'item_id' => 'required'
            ]);
            $adv_item = Items::find($request->item_id);

            if ($adv_item->main_category_id == 2) { // check if this is Mazad ..
                if (Carbon::parse($adv_item->expired_at)->isPast()) {
                    // Get the Latest mazad request and make it sabled .
                    $latest_mazad = Item_request::where("item_id", $adv_item->id)->latest()->first();
                    if($latest_mazad){
                        $latest_mazad->status_id = 2;
                        $latest_mazad->save();
                    }
                    
                        $adv_item->view_no = $adv_item->view_no + 1;
                        $adv_item->save();
                        $user = User::find($adv_item['user_id']);
                        $data['profile'] = $item = new UserLoginResource($user);
                        $data['item'] = $adv_item;
                      
                    return $this->apiResponse($request, trans('language.Mazad_expired_time'), $data, true);
                }
            }

            $adv = Items::find($request->item_id)->item_obj();
        
            $adv_item->view_no = $adv_item->view_no + 1;
            $adv_item->save();
            $user = User::find($adv['user_id']);
            $data['profile'] = $item = new UserLoginResource($user);
            $data['item'] = $adv;

            return $this->apiResponse($request, trans('language.message'), $data, true);
        }
    }
