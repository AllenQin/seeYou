<?php

use Hyperf\Database\Schema\Schema;
use Hyperf\Database\Schema\Blueprint;
use Hyperf\Database\Migrations\Migration;

class CreateLiveItems extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('live_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('name', '255')->nullable(false)->default('')->comment('活动名称');
            $table->text('describe')->nullable(false)->default('')->comment('活动介绍');
            $table->bigInteger('uid', false)->unsigned()->nullable(false)->default(0)->comment('创建者UID');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('live_items');
    }
}
