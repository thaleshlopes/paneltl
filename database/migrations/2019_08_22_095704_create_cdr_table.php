<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCdrTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cdr', function(Blueprint $table)
		{
			$table->increments('id')->unique();
			$table->dateTime('calldate')->default('1994-05-16 00:00:00')->index('calldate');
			$table->string('clid', 80)->default('');
			$table->string('src', 80)->default('');
			$table->string('dst', 80)->default('')->index('dst');
			$table->string('dcontext', 80)->default('');
			$table->string('channel', 80)->default('');
			$table->string('dstchannel', 80)->default('');
			$table->string('lastapp', 80)->default('');
			$table->string('lastdata', 80)->default('');
			$table->integer('duration')->default(0);
			$table->integer('billsec')->default(0);
			$table->string('disposition', 45)->default('');
			$table->integer('amaflags')->default(0);
			$table->string('accountcode', 20)->default('')->index('accountcode');
			$table->string('uniqueid', 32)->default('');
			$table->string('userfield')->default('');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cdr');
	}

}
