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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image');
            $table->string('publishing_company');
            $table->date('publishing_year');
            $table->text('description');
            $table->float('price');
            $table->integer('quantity');
            $table->enum('status', ['Còn hàng', 'Hết hàng']);
            $table->float('discount');
            $table->foreignId('author_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }

};
