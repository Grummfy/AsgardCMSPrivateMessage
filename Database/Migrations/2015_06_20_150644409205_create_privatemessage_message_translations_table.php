<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrivateMessageMessageTranslationsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('privatemessage__message_translations', function(Blueprint $table) {
            $table->increments('id');
            // Your translatable fields

            $table->integer('message_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['message_id', 'locale']);
            $table->foreign('message_id')->references('id')->on('privatemessage__messages')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('privatemessage__message_translations');
	}
}
