<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('first_name');
            $table->string('last_name');
			$table->string('email')->unique();
			$table->string('password', 60);
            $table->enum('type', ['admin', 'editor', 'contributor', 'subscriber', 'user']);
            $table->string('full_name');
			$table->rememberToken();
			$table->timestamps(); //created_at updated_at
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
