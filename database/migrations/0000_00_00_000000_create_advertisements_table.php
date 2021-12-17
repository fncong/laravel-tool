<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertisementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisements', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('标题');
            $table->string('group')->comment('分组');
            $table->string('description')->nullable()->comment('描述');
            $table->string('image')->comment('封面图片');
            $table->integer('action')->comment('动作类型:0=无,1=TAB跳转,2=内页跳转,3=WebView跳转,4=外部url');
            $table->string('value')->nullable()->comment('动作内容');
            $table->integer('weight')->default(0)->index()->comment('排序');
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
        Schema::dropIfExists('advertisements');
    }
}
