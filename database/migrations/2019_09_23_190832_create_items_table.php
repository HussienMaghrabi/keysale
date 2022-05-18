<?php

    use Illuminate\Support\Facades\Schema;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Migrations\Migration;

    class CreateItemsTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('items', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('user_id')->nullable();
                $table->string('country_id')->nullable();
                $table->string('main_category_id')->nullable();
                $table->string('category_id')->nullable();
                $table->string('sub_category_id')->nullable();
                $table->string('sub_sub_category_id')->nullable();
                $table->string('name')->nullable();
                $table->string('name')->nullable();
                $table->string('price')->nullable();
                $table->longText('description')->nullable();
                $table->string('is_special')->default('1'); // 1-> no , 2-> yes
                $table->string('status_id')->nullable();
                $table->string('view_no')->default(0);
                $table->string('expired_at')->nullable();
                $table->string('video_file')->nullable();
                $table->string('thumb_image')->nullable();
                $table->timestamps();
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::dropIfExists('items');
        }
    }
