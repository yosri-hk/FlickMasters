<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategorieProductsTable extends Migration
{
    public function up()
    {
        Schema::create('categorieProducts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->timestamps();
            // Add more columns as needed
        });
    }

    public function down()
    {
        Schema::dropIfExists('categorieProducts');
    }
}
