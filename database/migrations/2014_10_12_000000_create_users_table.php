<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\User;

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
			$table->string('name')->unique();
			$table->string('email')->unique();
			$table->string('password', 60);
			$table->rememberToken();
            $table->string('address1');
            $table->string('address2');
            $table->string('city');
            $table->string('state');
            $table->string('postal_code');
            $table->string('country');
            $table->string('iso_code');
            $table->string('time_zone');
            $table->string('home_phone');
            $table->string('mobile_phone');
            $table->string('about');
            $table->decimal('rating', 3, 1);
            $table->string('google_place_id');
			$table->timestamps();
		});

		User::create([
			'name' => 'guigui',
			'email' => 'guigui@gmail.com',
			'password' => Hash::make('123456'),
			'google_place_id' => 'ChIJrQbIFN9x5kcRaat6G5YRso8'
		])
		->dishes()->create([
				'user_id' => 1,
				'price' => 4.0,
				'name' => 'Mousse au chocolat',
				'rating' => 2.2
			]);

		User::create([
			'name' => 'Norah',
			'email' => 'norah@gmail.com',
			'password' => Hash::make('123456'),
			'google_place_id' => 'ChIJg4GB8YTV4UcRkRT7sLL9epI'
		]);

		User::create([
			'name' => 'Camille',
			'email' => 'camille@gmail.com',
			'password' => Hash::make('123456'),
			'google_place_id' => 'ChIJaw-1XOtx5kcR50EKFS00-DE'
		]);

		User::create([
			'name' => 'Henry',
			'email' => 'henry@gmail.com',
			'password' => Hash::make('123456'),
			'google_place_id' => 'ChIJcYZXxLrU4UcRUPG8T0gUDAQ'
		]);

		User::create([
			'name' => 'Yura',
			'email' => 'yura@gmail.com',
			'password' => Hash::make('123456'),
			'google_place_id' => 'ChIJcYZXxLrU4UcRUPG8T0gUDAQ'
		]);

		User::create([
			'name' => 'Yannick',
			'email' => 'yannick@gmail.com',
			'password' => Hash::make('123456'),
			'google_place_id' => 'ChIJcYZXxLrU4UcRUPG8T0gUDAQ'
		]);

		User::create([
			'name' => 'Nady',
			'email' => 'nady@gmail.com',
			'password' => Hash::make('123456'),
			'google_place_id' => 'ChIJcYZXxLrU4UcRUPG8T0gUDAQ'
		]);

		User::create([
			'name' => 'ducj',
			'email' => 'ducj@gmail.com',
			'password' => Hash::make('123456'),
			'google_place_id' => 'ChIJcYZXxLrU4UcRUPG8T0gUDAQ'
		]);

		User::create([
			'name' => 'Victor',
			'email' => 'victor@gmail.com',
			'password' => Hash::make('123456'),
			'google_place_id' => 'ChIJcYZXxLrU4UcRUPG8T0gUDAQ'
		]);

		User::create([
			'name' => 'nicolaS',
			'email' => 'nicolas@gmail.com',
			'password' => Hash::make('123456'),
			'google_place_id' => 'ChIJcYZXxLrU4UcRUPG8T0gUDAQ'
		]);

		User::create([
			'name' => 'ChocoChef',
			'email' => 'chocochef@gmail.com',
			'password' => Hash::make('123456')
		]);

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		\DB::statement('SET FOREIGN_KEY_CHECKS = 0');
		Schema::drop('users');
		\DB::statement('SET FOREIGN_KEY_CHECKS = 1');
	}

}
