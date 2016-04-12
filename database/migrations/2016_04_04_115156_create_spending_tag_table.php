<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpendingTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spending_tag', function (Blueprint $table) {
            $table->integer('spending_id')->unsigned();
            $table->integer('tag_id')->unsigned();
            $table->primary(['spending_id', 'tag_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('spending_tag');
    }
}
