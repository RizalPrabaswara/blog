<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterForeign extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::table('posts', function (Blueprint $table) {
        //     $table->foreign('category_id')->references('id')->on('categories');
        //     $table->foreign('user_id')->references('id')->on('users');
        // });
        // Schema::table('comments', function (Blueprint $table) {
        //     $table->foreign('post_id')->references('id')->on('posts');
        //     $table->foreign('user_id')->references('id')->on('users');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('posts', function (Blueprint $table) {
        //     $table->dropForeign('posts_category_id_foreign');
        //     $table->dropForeign('posts_user_id_foreign');
        // });
        // Schema::table('comments', function (Blueprint $table) {
        //     $table->dropForeign('comments_post_id_foreign');
        //     $table->dropForeign('comments_user_id_foreign');
        // });
    }
}
