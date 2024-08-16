<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('imageCover');
            $table->string('images')->nullable();
            $table->string('brand')->nullable();
            $table->string('tags')->nullable();
            $table->double('price');
            $table->string('gender')->nullable();
            $table->boolean('active')->default(0);
            $table->boolean('shipplable')->default(0);
            $table->double('weight')->nullable();
            $table->double('height')->nullable();
            $table->double('width')->nullable();
            $table->double('length')->nullable();
            $table->string('dealer')->nullable();
            $table->string('presention')->nullable();
            $table->string('model');
            $table->string('talla');
            $table->string('expiration')->nullable();
            $table->foreignId('model_product_id')->constrained('model_products')->onDelete('cascade');
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
        Schema::dropIfExists('products');
    }
};
