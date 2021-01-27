<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
	public function up()
	{
		Schema::create('products', function (Blueprint $table){
			$table->increments('id');
			$table->string("name", 255)->nullable();
			$table->text("description")->nullable();
			$table->string("photo", 255)->nullable();
			$table->decimal("price", 6, 2);
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
		Schema::dropIfExists('products');
	}
}
?>