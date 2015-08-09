<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Dish;

class CreateDishesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dishes', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->decimal('price', 8, 2);
            $table->string('currency');
            $table->string('name');
            $table->text('description');
            $table->decimal('rating', 3, 1);
			$table->timestamps();

            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
		});

		\DB::statement('SET FOREIGN_KEY_CHECKS = 0');
		Dish::create([
			'user_id' => 1,
			'price' => 4.0,
			'name' => 'Mousse au chocolat',
			'rating' => 2.2
		]);

		Dish::create([
			'user_id' => 1,
			'price' => 3.0,
			'name' => 'Tarte au citron meringuée',
			'rating' => 4.2
		]);

		Dish::create([
			'user_id' => 2,
			'price' => 5.0,
			'name' => 'Risotto au poulet',
			'rating' => 3.2
		]);

		Dish::create([
			'user_id' => 3,
			'price' => 7.0,
			'name' => 'Filet de dorade sauce citronnelle',
			'rating' => 4.1
		]);

		Dish::create([
			'user_id' => 3,
			'price' => 6.0,
			'name' => 'Pizza maison',
			'rating' => 4.2
		]);

		Dish::create([
			'user_id' => 3,
			'price' => 5.0,
			'name' => 'Raviolis au calmar',
			'rating' => 4.8
		]);

		Dish::create([
			'user_id' => 4,
			'price' => 4.0,
			'name' => 'Soupe aux épinards',
			'rating' => 4.0
		]);
		\DB::statement('SET FOREIGN_KEY_CHECKS = 1');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		\DB::statement('SET FOREIGN_KEY_CHECKS = 0');
		Schema::drop('dishes');
		\DB::statement('SET FOREIGN_KEY_CHECKS = 1');
	}

}
