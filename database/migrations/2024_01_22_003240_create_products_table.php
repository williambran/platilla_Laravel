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
            $table->string('codeID')->unique();
            $table->string('name');
            $table->double('price');
            $table->double('priceCompra');
            $table->string('cantidad');
            $table->string('images')->nullable();
            $table->string('brand')->nullable();
            $table->string('tags')->nullable();
            $table->string('gender')->nullable();
            $table->boolean('active')->default(0);
            $table->date('fecha_activacion')->nullable();
            $table->boolean('shipplable')->default(0);
            $table->foreignId('model_id')->constrained('models')->onDelete('cascade');
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
