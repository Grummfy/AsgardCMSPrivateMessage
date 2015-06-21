<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrivateMessageTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::beginTransaction();

		try {
			Schema::create('privatemessage__threads', function (Blueprint $table) {
				$table->increments('id');
				$table->timestamps();

				$table->integer('creator_id')->unsigned()->nullable();
				$table->foreign('creator_id')->references('id')->on('users')
					->onUpdate('cascade');

				$table->string('inbox', 10);

				$table->string('topic', 120);
			});

			Schema::create('privatemessage__thread_destinations', function (Blueprint $table) {
				$table->increments('id');

				$table->integer('thread_id')->unsigned();
				$table->foreign('thread_id')->references('id')->on('privatemessage__threads')
					->onUpdate('cascade');

				$table->integer('receiver_id')->unsigned()->nullable();
				$table->foreign('receiver_id')->references('id')->on('users')
					->onDelete('set null')
					->onUpdate('cascade');

				$table->integer('receivers_id')->unsigned()->nullable();
				$table->foreign('receivers_id')->references('id')->on('groups')
					->onDelete('set null')
					->onUpdate('cascade');
			});

			Schema::create('privatemessage__messages', function (Blueprint $table) {
				$table->increments('id');
				$table->timestamps();

				$table->integer('thread_id')->unsigned();
				$table->foreign('thread_id')->references('id')->on('privatemessage__threads')
					->onUpdate('cascade');

				$table->integer('author_id')->unsigned()->nullable();
				$table->foreign('author_id')->references('id')->on('users')
					->onDelete('set null')
					->onUpdate('cascade');

				$table->text('message');
				$table->string('format', 15);
			});

			DB::commit();
		}
		catch (Exception $e)
		{
			DB::rollback();
			throw $e;
		}

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('privatemessage__threads');
		Schema::drop('privatemessage__thread_destinations');
		Schema::drop('privatemessage__messages');
	}
}
