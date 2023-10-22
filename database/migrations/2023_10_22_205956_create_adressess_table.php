<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
/**
* Run the migrations.
*/
public function up(): void
{
Schema::create('adresses', function (Blueprint $table) {
$table->id();
$table->string('Deliveryaddresse');
$table->string('City');
$table->string('Postal_code');
$table->unsignedBigInteger('cart_id')->nullable();

$table->timestamps();
$table->foreign('cart_id')->references('id')->on('carts');
});
}

/**
* Reverse the migrations.
*/
public function down(): void
{
Schema::dropIfExists('adresses');
}
};