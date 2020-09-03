<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->comment('使用者');
            $table->integer('channel_id')->comment('頻道');
            $table->string('title')->nullable()->comment('標題');
            $table->string('icon')->nullable()->comment('icon');
            $table->longtext('message')->nullable()->comment('訊息內容');
            $table->string('footer')->nullable()->comment('底部內容');
            $table->string('width')->nullable()->comment('寬度');
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
        Schema::dropIfExists('notifications');
    }
}
