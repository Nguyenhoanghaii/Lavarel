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
        // Schema::create('products', function (Blueprint $table) {

        //     $table->id();
        //     $table->string('name');
        //     $table->integer('id_type')->nullable();
        //     $table->string('description')->nullable();
        //     $table->float('unit_price')->nullable();
        //     $table->float('promotion_price')->nullable();
        //     $table->string('image')->nullable();
        //     $table->integer('unit')->nullable();
        //     $table->boolean('new')->nullable();
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
