
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
Schema::create('carts', function (Blueprint $table) {
$table->id();
$table->unsignedBigInteger('user_id');
$table->text('items');
$table->text('Delivery_address');
$table->decimal('discounts', 8, 2);
$table->decimal('subtotal', 8, 2);
$table->string('payment_method');
$table->timestamps();

});
}

/**
* Reverse the migrations.
*/
public function down(): void
{
Schema::dropIfExists('carts');
}
};