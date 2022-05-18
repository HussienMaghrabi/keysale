<?php

    use Illuminate\Support\Facades\Schema;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Migrations\Migration;

    class CreateItemRequestsTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('item_requests', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string("item_id")->nullable();
                $table->string("user_id")->nullable();
                $table->string("price")->nullable();
                $table->string("status_id")->nullable(); // 1->pending , 2->  sold
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
            Schema::dropIfExists('item_requests');
        }
    }
