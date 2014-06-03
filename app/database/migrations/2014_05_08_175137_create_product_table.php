<?php
use Tokoku\Products\Product;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create((new Product)->getTable(), function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('sku');
			$table->string('name');
			$table->string('slug');
			$table->string('description');
			$table->datetime('availableOn');
			$table->string('metaDescription');
			$table->string('metaKeywords');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop((new Product)->getTable());
	}

}
