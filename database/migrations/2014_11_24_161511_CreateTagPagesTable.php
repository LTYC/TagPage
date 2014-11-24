<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagPagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tag_pages', function(Blueprint $table)
		{
			$table->increments('id');

            $table->string('perma_link')->unique();

            $table->integer('parent_id')->nullable()->unsigned()->index();
            $table->integer('lft')->nullable()->unsigned();
            $table->integer('rgt')->nullable()->unsigned();
            $table->integer('depth')->nullable()->unsigned();

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
		Schema::drop('tag_pages');
	}

}
