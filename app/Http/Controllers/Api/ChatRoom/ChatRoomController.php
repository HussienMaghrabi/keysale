<?php

    namespace App\Http\Controllers\Api\ChatRoom;

    use App\ChatRoom;
    use App\Http\Resources\CharRoomListResource;
    use App\Items;
    use App\ModulesConst\NotificationTyps;
    use App\ModulesConst\Paginate;
    use App\ModulesConst\UserTyps;
    use App\Product;
    use App\Traits\apiResponse;
    use App\User;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use Str;

    class ChatRoomController extends Controller
    {
        use  apiResponse;

        public function index(Request $request)
        {
            $request->validate([
                "item_id" => "required|exists:items,id"
            ],[
                "required" => "you must send item id in this api .",
                "exists" => "this is not exist in dataasbe make sure yo send right one ? ."
            ]);
            $product = Items::find($request->item_id);
            if (!$product) {
                return $this->apiResponse($request, trans('This Product Not Exist.'), null, false);
            }
            $checkIfChatRoomExist_1 = ChatRoom::where(["person_one" => $request->user()->id, "person_two" => $product->user_id, "item_id" => $request->item_id])->first();
            $checkIfChatRoomExist_2 = ChatRoom::where(["person_two" => $request->user()->id, "person_one" => $product->user_id, "item_id" => $request->item_id])->first();
            if ($checkIfChatRoomExist_1) {
                return $this->apiResponse($request, trans('يوجد محادثه بالفعل بين الطرفيين .'), $checkIfChatRoomExist_1, true);
            }

            if ($checkIfChatRoomExist_2) {
                return $this->apiResponse($request, trans('يوجد محادثه بالفعل بين الطرفيين .'), $checkIfChatRoomExist_2, true);
            }

            $data["person_one"] = $request->user()->id;
            $data["person_two"] = $product->user_id;
            $data["item_id"] = $product->id;
            $item = ChatRoom::create($data);
            return $this->apiResponse($request, trans('تم انشاء محادثه جديده بين الطرفيين .'), $item, true);

        }

        public function ChatRoomList(Request $request)
        {
            $rooms= ChatRoom::where(["person_one" => $request->user()->id])
                ->orWhere(["person_two" => $request->user()->id])
                ->orderBy("id", "desc")->paginate(10)->getCollection();
            return $this->apiResponse($request, trans('قائمه المحادثات الخاصه بك .'), $rooms, true);
        }

        public function sendNewMessageNotification(Request $request)
        {
            $request->validate([
                "user_id" => "required",
                "message" => "required",
            ]);
            $userId = User::find($request->user_id);
            $myinfo = $request->user();
            // Send Notification
            $body = Str::limit($request->message, 30);
            // Get Room Id
            $checkIfChatRoomExist_1 = ChatRoom::where(["person_one" => $request->user()->id, "person_two" => $request->user_id])->first();
            $checkIfChatRoomExist_2 = ChatRoom::where(["person_two" => $request->user()->id, "person_one" => $request->user_id])->first();
            $room_id = null;
            if ($checkIfChatRoomExist_1) {
                $room_id = $checkIfChatRoomExist_1->id;
            }

            if ($checkIfChatRoomExist_2) {
                $room_id = $checkIfChatRoomExist_2->id;
            }
            $this->notificationHandler($myinfo->name, $body, [$request->user_id], NotificationTyps::message, $room_id);
            return $this->apiResponse($request, trans('تم ارسال الاشعار.'), null, true);
        }
    }
