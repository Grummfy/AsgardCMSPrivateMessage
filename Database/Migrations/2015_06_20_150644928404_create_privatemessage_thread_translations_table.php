<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrivateMessageThreadTranslationsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('privatemessage__thread_translations', function(Blueprint $table) {
            $table->increments('id');
            // Your translatable fields

            $table->integer('thread_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['thread_id', 'locale']);
            $table->foreign('thread_id')->references('id')->on('privatemessage__threads')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('privatemessage__thread_translations');
	}
}
