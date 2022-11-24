<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
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
            $table->string('art');
            $table->foreignId('category_id')
            ->constrained()
            ->nullable()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('maker_id')
            ->constrained()
            ->nullable()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('brand')->nullable();
            $table->string('name', 500);
            $table->float('price');
            $table->text('description')->nullable();
            $table->string('image')->default('/img/default.jpg');
            $table->boolean('nalichie')->default(0);
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
