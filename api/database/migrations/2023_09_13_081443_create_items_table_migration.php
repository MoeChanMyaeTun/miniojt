<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
class CreateItemsTableMigration extends Migration
{
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id')->start(100);
            $table->integer('parent_id')->unsigned()->nullable();
            $table->integer('position', false, true);
            $table->softDeletes();

            $table->foreign('parent_id')
                ->references('id')
                ->on('items')
                ->onDelete('set null');
            $table->string('title');
            $table->integer('price')->nullable()->default(null);
            $table->json('image_path')->nullable()->default(null);
            $table->integer('model')->default('101');
            $table->integer('title_order')->nullable();
            $table->timestamps();   

        });

        Schema::create('itemclosure', function (Blueprint $table) {
            $table->increments('closure_id');

            $table->integer('ancestor', false, true);
            $table->integer('descendant', false, true);
            $table->integer('depth', false, true);

            $table->foreign('ancestor')
                ->references('id')
                ->on('items')
                ->onDelete('cascade');

            $table->foreign('descendant')
                ->references('id')
                ->on('items')
                ->onDelete('cascade');

        });
    }

    public function down()
    {
        Schema::table('itemclosure', function (Blueprint $table) {
            Schema::dropIfExists('itemclosure');
        });

        Schema::table('items', function (Blueprint $table) {
            Schema::dropIfExists('items');
        });
    }
}
