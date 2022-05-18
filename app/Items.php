<?php

    namespace App;

    use Carbon\Carbon;
    use Illuminate\Database\Eloquent\Model;
    use PhpParser\Node\Expr\Cast\Double;

    class Items extends Model
    {
        protected $fillable = [
            'user_id',
            'country_id',
            'main_category_id',
            'category_id',
            'sub_category_id',
            'sub_sub_category_id',
            'name',
            'price',
            'description',
            'is_special',
            'status_id',
            'view_no',
            'expired_at',
            'video_file',
            'thumb_image',
        ];

        public function toArray()
        {
            $data['id'] = $this->id;
            $data['user_id'] = $this->user_id;
            $data['name'] = $this->serv_name;
            $data['price'] = $this->serv_price;
            $data['description'] = $this->serv_description;
            $data['is_special'] = $this->serv_is_special;
            $data['is_favourite'] = $this->serv_is_favourite;
            $data['status_id'] = $this->status_id;
            $data['status_name'] = $this->getServStatusNameAttribute();
            $data['main_category_name'] = $this->getServMainCategoryNameAttribute();
            $data['category_name'] = $this->getServCategoryNameAttribute();
            $data['sub_category_name'] = $this->getServSubCategoryNameAttribute();
            $data['sub_sub_category_name'] = $this->getServSubSubCategoryNameAttribute();
            $data['image'] = $this->serv_one_image;
            $data["images"] = $this->images;
            $data['mazad_reauesst'] = $this->mazad_reauesst();
            $data['is_mazad'] = $this->is_mazad();
            $data["view_no"] = (Int)$this->view_no;
            $data["expired_at"] = strtotime($this->expired_at) * 1000;
            $data["created_at"] = strtotime($this->created_at) * 1000;
            $data["is_past"] = $this->getIsPastAttribute();
            $data["video_file"] = $this->video_file;
            $data["thumb_image"] = $this->thumb_image;
            return $data;
        }

        public function item_obj()
        {
            $data['id'] = $this->id;
            $data['user_id'] = $this->user_id;
            $data['name'] = $this->serv_name;
            $data['price'] = $this->serv_price;
            $data['description'] = $this->serv_description;
            $data['is_special'] = $this->serv_is_special;
            $data['is_favourite'] = $this->serv_is_favourite;
            $data['status_id'] = $this->status_id;
            $data['status_name'] = $this->getServStatusNameAttribute();
            $data['main_category_name'] = $this->getServMainCategoryNameAttribute();
            $data['category_name'] = $this->getServCategoryNameAttribute();
            $data['sub_category_name'] = $this->getServSubCategoryNameAttribute();
            $data['sub_sub_category_name'] = $this->getServSubSubCategoryNameAttribute();
            $data['image'] = $this->serv_one_image;
            $data["images"] = $this->images;
            $data['mazad_reauesst'] = $this->mazad_reauesst();
            $data['is_mazad'] = $this->is_mazad();
            $data["view_no"] = (Int)$this->view_no;
            $data["expired_at"] = strtotime($this->expired_at) * 1000;
            $data["created_at"] = strtotime($this->created_at) * 1000;
            $data["is_past"] = $this->getIsPastAttribute();
            $data["video_file"] = $this->video_file;
            $data["thumb_image"] = $this->thumb_image;
            return $data;
        }

        public function getIsPastAttribute()
        {
            if ($this->main_category_id == 2) { // check if this is Mazad ..
                if (Carbon::parse($this->expired_at)->isPast()) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }

        }

        public function getServExpiredAttribute()
        {
            $attribute = "";
            if ($this->expired_at)
                $attribute = strtotime($this->expired_at) * 1000;
            return $attribute;
        }


        public function mazad_reauesst()
        {
            $items = Item_request::where("item_id", $this->id)->take(5)->latest()->get();
            return $items;
        }

        public function is_mazad()
        {
            if ($this->main_category_id != null) {
                if ($this->main_category_id == 2) {
                    return true;
                } else {
                    return false;
                }
            }

            return false;
        }

        public function getServIsFavouriteAttribute()
        {

            if (\request()->api_token) {
                $user = User::where("api_token", \request()->api_token)->first();
                if (!$user) {
                    return false;
                }
                $checkFav = Item_favourite::where('user_id', $user->id)
                    ->where('item_id', $this->id)->first();

                if ($checkFav) {
                    return true;
                } else {
                    return false;
                }

            } else {
                return false;
            }

        }

        function getServIsSpecialAttribute()
        {
            $attribute = "";
            if ($this->is_special == 2)
                return true;
            else
                return false;
        }


        public
        function getServHasSubcategoryAttribute()
        {
            $attribute = "";
            if (count($this->sub_categories) > 0) {
                $attribute = true;
            } else {
                $attribute = false;
            }
            return $attribute;
        }

        public
        function getServImageAttribute()
        {
            $attribute = "";
            if ($this->images)
                $attribute = $this->images;
            return $attribute;
        }

        public function getServOneImageAttribute()
        {
            $attribute = "";
            if ($this->images) {
                $attribute = Item_images::where('item_id', $this->id)->first();
                if ($attribute) {
                    $attribute = $attribute->serv_image;
                } else {
                    $attribute = asset('assets/admin/images/logo.png');
                }
            } else {
                $attribute = asset('assets/admin/images/logo.png');
            }
            return $attribute;
        }

        function getServPriceAttribute()
        {
            $attribute = "";
            if (app()->getLocale() == "en") {
                return $this->price . "KD";
            } else {
                return $this->price . " دينار كويتي";
            }
        }

        function getServDescriptionAttribute()
        {
            $attribute = "";
            if ($this->description)
                $attribute = $this->description;
            return $attribute;
        }

        function getServNameAttribute()
        {
            $attribute = "";
            if ($this->name)
                $attribute = $this->name;
            return $attribute;
        }

        function getServStatusNameAttribute()
        {
            $attribute = "";
            if ($this->status)
                $attribute = $this->status->serv_name;
            return $attribute;
        }

        function getDashPriceAttribute()
        {
            $attribute = "";
            if ($this->price)
                $attribute = $this->price;
            return $attribute;
        }

        function getDashDescriptionAttribute()
        {
            $attribute = "";
            if ($this->description)
                $attribute = $this->description;
            return $attribute;
        }

        function getDashNameAttribute()
        {
            $attribute = "";
            if ($this->name)
                $attribute = $this->name;
            return $attribute;
        }

        function getDashIsSpecialAttribute()
        {
            $attribute = "";
            if ($this->is_special == 2)
                return "Yes";
            else
                return "No";
        }

        public function getDashCreatedAttribute()
        {
            $attribute = "";
            if ($this->created_at)
                $attribute = $this->created_at->format('Y-m-d');
            return $attribute;
        }


        public function status()
        {
            return $this->belongsTo('App\Item_status', 'status_id');
        }

        public function item()
        {
            return $this->belongsTo('App\Item', 'conversation_id');
        }

        public function images()
        {
            return $this->hasMany(Item_images::class, 'item_id');
        }

        public function requests()
        {
            return $this->hasMany(Item_request::class, 'item_id');
        }

        // Categories
        public function MainCategory()
        {
            return $this->belongsTo('App\MainCategory', 'main_category_id');
        }

        public function Category()
        {
            return $this->belongsTo('App\Category', 'category_id');
        }

        public function SubCategory()
        {
            return $this->belongsTo('App\Sub_category', 'sub_category_id');
        }

        public function SubSubCategory()
        {
            return $this->belongsTo('App\Sub_sub_category', 'sub_sub_category_id');
        }


        function getServMainCategoryNameAttribute()
        {
            $attribute = "";
            if ($this->MainCategory)
                return $this->MainCategory->serv_name;
            return null;
        }

        function getServCategoryNameAttribute()
        {
            $attribute = "";
            if ($this->Category)
                return $this->Category->serv_name;
            return null;
        }

        function getServSubCategoryNameAttribute()
        {
            $attribute = "";
            if ($this->SubCategory)
                return $this->SubCategory->serv_name;
            return null;
        }

        function getServSubSubCategoryNameAttribute()
        {
            $attribute = "";
            if ($this->SubSubCategory)
                return $this->SubSubCategory->serv_name;
            return null;
        }
    }
