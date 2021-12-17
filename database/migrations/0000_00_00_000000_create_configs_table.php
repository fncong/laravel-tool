<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configs', function (Blueprint $table) {
            $table->id();
            $table->string('group')->comment('配置组');
            $table->string('name')->comment('配置名称');
            $table->string('key')->comment('配置key')->unique();
            $table->text('value')->comment('配置值');
            $table->enum('type', ['string', 'json', 'integer', 'float', 'rich', 'text', 'image', 'images', 'file', 'files', 'boolean'])->comment('配置类型');
            $table->string('description')->comment('配置描述');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('configs');
    }
}
