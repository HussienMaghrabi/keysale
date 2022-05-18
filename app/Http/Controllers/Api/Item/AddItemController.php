<?php

    namespace App\Http\Controllers\Api\Item;

    use App\Item_images;
    use App\Items;
    use App\Traits\apiResponse;
    use App\Traits\storeImage;
    use Carbon\Carbon;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;

    class AddItemController extends Controller
    {
        use apiResponse, storeImage;

        public function index(Request $request)
        {

            $data = $request->validate([
                'image' => '',
                'name' => 'required',
                'main_category_id' => 'required',
                'category_id' => '',
                'sub_category_id' => '',
                'sub_sub_category_id' => '',
                'price' => 'required',
                'description' => 'required',
                'is_special' => 'required',
                'status_id' => 'required',
                'country_id' => 'required',
                'video_file' => '',
                'thumb_image' => '',
            ]);
            $data['user_id'] = $request->user()->id;
            $data['is_special'] = $request->is_special;
            $data['status_id'] = $request->status_id;
            $data['expired_at'] = Carbon::now()->addHours(24);

            if ($request->thumb_image) {
                $data["thumb_image"] = $this->storeImage($request->thumb_image);
            }
            if ($request->video_file) {
                $data["video_file"] = $this->storeFiles($request->video_file);
            }
            $item = Items::create($data);
            $this->ItemImagesHandler($request, $item);
            return $this->apiResponse($request, trans('language.message'), $item->item_obj(), true);
        }

        public function ItemImagesHandler($request, $item)
        {

            $info["item_id"] = $item->id;
            if ($request->image) {
                foreach ($request->image as $image) {
                    $info["image"] = $this->storeImage($image);
                    Item_images::create($info);
                }
            }

        }
    }
